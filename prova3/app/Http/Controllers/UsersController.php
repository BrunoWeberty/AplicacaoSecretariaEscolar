<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    function index(Request $request){
    	if($request->get('id') == null){
    		$user = new User();
    	} else {
    		$user = User::Where('id', $request->get('id'))->first();
    	}
    	//Categorias.cadastro: nome da view, vai estar em Resources\viewa\categorias.blade.php
    	//'categoria' é o nome do objeto que será acessado na view
    	// $categoria é o ojbeto passado do controller pra view
    	return view('users.cadastro', array('users' => $user));
    }

    function salvar(Request $request) {
        $validatedData = $request->validate([
            "name" => "required|max:255",
            "email" => "required|email|max:255",
            "password" => "required|min:6",
            "remember_token" => "required",
        ]);

    	if($request->get('id') == null){
    		$user = new User();
    	}else {
    		$user = User::Where('id', $request->get('id'))->first();
    	}
    	//Atribuição de todos os parametros
    	$user->name = $request->get('name');
    	$user->email = $request->get('email');

    	$user->password = Hash::make($request->get('password'));

    	$user->remember_token = $request->get('remember_token');
    	//Persite os dados
    	$user->save();
    	//Redireciona para a lista
    	return $this->lista();
    }

    function excluir(Request $request){
    	if($request->get('id') != null){
    		//Destroy semelhante ao delete, mas exclui pela chave primaria
    		User::destroy($request->get('id'));
    	}
    	return $this->lista();
    }

    function lista(){
    	//categorias.lista é a view em Resources\Views\categorias\lista.blade.php
    	// 'categorias' é o nome a ser acessado no view
    	//Categoria::All() é um metodo estatico da Model que retorna uma lista com todos os elementos da Model
    	return view('users.lista', array('users' => User::All()));
    }
}

