<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Usuários
Route::get('/user', 
'UsersController@index');

Route::post('/user/salvar',
'UsersController@salvar');

Route::get('/user/listagem',
'UsersController@lista');

Route::get('/user/excluir',
 'UsersController@excluir');

//Disciplinas
Route::get('/disciplina', 
'DisciplinaController@index');

Route::post('/disciplina/salvar',
'DisciplinaController@salvar');

Route::get('/disciplina/listagem',
'DisciplinaController@lista');

Route::get('/disciplina/excluir',
 'DisciplinaController@excluir');

//Professor
Route::get('/professor', 
'ProfessorController@index');

Route::post('/professor/salvar',
'ProfessorController@salvar');

Route::get('/professor/listagem',
'ProfessorController@lista');

Route::get('/professor/excluir',
 'ProfessorController@excluir');


Route::get('/gerar-graficos', 'ProfessorController@graficos');
