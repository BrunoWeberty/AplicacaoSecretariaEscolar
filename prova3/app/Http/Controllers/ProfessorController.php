<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Professor;
use App\Disciplina;
use App\Professor_Disciplina;
use Carbon\Carbon;
use Carbon\CarbonInterval;
use DB;

class ProfessorController extends Controller
{
    function index(Request $request){
    	if($request->get("id") == null){
    		$professor = new Professor();
            $disciplina = Disciplina::All()->sortBy("descricao");
    	}else {
    		$professor = Professor::Where('id', $request->get("id"))->first();
            
            $id_prof = $request->get('id');
            $disciplina = DB::select('
                SELECT * FROM disciplina AS d LEFT JOIN professor_disciplina as pd on pd.disciplina_id = d.id AND pd.professor_id ='.$id_prof.' ORDER BY d.descricao');  
    	}
    	return view('professores.cadastro', array('professores' => $professor, 'disciplinas' => $disciplina));//como chamar um arquivo dentro de uma pasta
        //categorias é o objeto, categoria nome da classe
    }

    function lista(){
    	return view('professores.lista', array('professores'=> Professor::All()));
        //como chamar um arquivo dentro de uma pasta
    	//nao precisa da chamada da pasta app pq ja foi chamada
    }

    function salvar(Request $request){//Framework de requisição http
    //var_dump($request->all());//Serve para mostrar os arquivo enviados pelo submit

    
    date_default_timezone_set("Brazil/East");
    $data = date("d M Y", strtotime('0 year'));
    $dn = new Carbon($request->get('dataN'));

    $agora = Carbon::now();

    $idade = $agora->diff($dn);

    $idade = $idade->y;

    $validatedData = $request->validate([
            "nome" => "required|max:100",
         	"cpf" => "required|max:100",
            "dataN" => "required|before:$agora",
            "telefone" => "required|max:100",
    ]);

    if($request->get('id') == null){
        $professor = new Professor();
    }else{
        $professor = Professor::Where('id', $request->get('id'))->first();
        // SELECT * FROM professor WHERE id = $_GET['id'] LIMIT 1
    }


    $professor->nome = $request->get('nome');//pegando os valores e colocando dentro do objetos
    $professor->cpf = $request->get('cpf');
    $professor->dataN = $request->get('dataN');
    $professor->telefone = $request->get('telefone');
    $professor->idade = $idade;

    $professor->save();//Salvando objeto

    if($request->get('id') == null){//novo professor, ai tenho que buscar o ultimo ID cadastrado
                $id_prof = Professor::max('id');
    }else{// aqui sera um quando estiver editando professor
                $id_prof = $request->get('id');
                Professor_Disciplina::where('professor_id',$id_prof)->delete();
    }

    $disciplinas = $request->disciplinas;

    //Se ao editar não for checkado nenhuma disciplina, assim não precisa rodar o foreach, resultando em erro
    if($disciplinas == null){

        return $this->lista();

    }else{//Tendo checkado, roda o foreach para cadastrar as novas escolhas
        foreach ($disciplinas as $disciplina) {
            $professor_Disciplina = new Professor_Disciplina();
            $professor_Disciplina->professor_id = $id_prof;
            $professor_Disciplina->disciplina_id = $disciplina;

            $professor_Disciplina->save();
        }
    }

    return $this->lista();    
    
    

    }

    function excluir(Request $request){

        if($request->get('id') != null){
            //Comando para apagar registro, mesmo associado a chave estrangeira numa tabela nxn
            //Recebe o id ao exclui um professor, apagar os registros na tabela Professor disciplina, depois apaga o professor cadastrado
            $deletedRows = Professor_Disciplina::Where('professor_id', 
                $request->get('id'))->delete();
            $professor = Professor::Where('id', $request->get('id'))->first();
            $professor->delete();
            return $this->lista();
        }
    }

    function graficos(){
        //Pega os dados do professor no banco
        $professores = DB::table('professor')->get()->sortBy("nome");
        //Pega os dados da disciplina no banco
        $disciplinas = DB::table('disciplina')->get()->sortBy("descricao");

        //array professor disciplina
        $professor_disciplina = array();
        //String que vai receber os dados  do grafico 1
        $string_grafico1 = "";

        //For rodando os dados de forma a pegar os dados dos professores do banco e contar quantas materias eles dão aula
        foreach($professores as $professor){
            $id = $professor->id;
            $nome = $professor->nome;
            //Comando para verificar atravez do id do professor, quantas materias eles dão aula
            $qtd_disciplina = Professor_Disciplina::Where('professor_id', $id)->count();

            //Comando para Adiciona os elementos no final do array
            array_push($professor_disciplina, $qtd_disciplina, $nome);

            //String recebe os dados formando json para o grafico
            $string_grafico1 .= "{ 'professor' : '" . $nome . "', 'qtd' : ". $qtd_disciplina . "}, ";
            
        }

        //array disciplina professor
        $disciplina_professor = array();
        //String que vai receber os dados  do grafico 2
        $string_grafico2 = "";


        //For rodando os dados de forma a pegar os dados das disciplinas do banco e contar quantos professores ministram aquela disciplina
        foreach($disciplinas as $disciplina)
        {
            $id = $disciplina->id;
            $descricao = $disciplina->descricao;
            //Comando para verificar atravez do id da disciplina, quantos professores que ministram a disciplina
            $qtd_professor = Professor_Disciplina::Where('disciplina_id', $id)->count();
            //Comando para Adiciona os elementos no final do array
            array_push($disciplina_professor, $qtd_professor, $descricao);

            //String recebe os dados formando json para o grafico
            $string_grafico2 .="{ 'disciplina' : '" . $descricao . "', 'qtd' : ". $qtd_professor . "}, ";
        }

        //retorna para view grafico, os dados de professores para grafico 1 e disciplinas para grafico 2
        return view('layouts.grafico', array('grafico2' => $string_grafico2), array('grafico' => $string_grafico1));
    }

    
}
