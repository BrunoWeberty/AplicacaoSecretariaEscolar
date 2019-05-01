<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Disciplina;

class DisciplinaController extends Controller
{
    function index(Request $request){
    	if($request->get("id") == null){
    		$disciplina = new Disciplina();
    	}else {
    		$disciplina = Disciplina::Where('id', $request->get("id"))->first();//Chamando metodo statico cliente where semelhante ao select, fazendo busca no banco, onde request traz o resultado do banco, o first garante que pega da colection somente primeiro objeto semelhante limite 1

    	}
    	return view('disciplinas.cadastro', array('disciplinas' => $disciplina));
        //como chamar um arquivo dentro de uma pasta
        //categorias é o objeto, categoria nome da classe
    }

    function lista(){
    	return view('disciplinas.lista', array('disciplinas'=> Disciplina::All()));
        //como chamar um arquivo dentro de uma pasta
    	//nao precisa da chamada da pasta app pq ja foi chamada
    }

    function salvar(Request $request){//Framework de requisição http
    //var_dump($request->all());//Serve para mostrar os arquivo enviados pelo submit

    $validatedData = $request->validate([
            "descricao" => "required|max:100",
        ]);
            
    if($request->get('id') == null){
        $disciplina = new Disciplina();
    }else{
        $disciplina = Disciplina::Where('id', $request->get('id'))->first();
        // SELECT * FROM disciplina WHERE id = $_GET['id'] LIMIT 1
    }

    $disciplina->descricao = $request->get('descricao');//pegando os valores e colocando dentro do objetos

    $disciplina->save();//Salvando objeto

    return $this->lista();

    }

    function excluir(Request $request){

        if($request->get('id') != null){
            $disciplina = Disciplina::Where('id', $request->get('id'))->first();
            $disciplina->delete();
            return $this->lista();
        }
    }
}
