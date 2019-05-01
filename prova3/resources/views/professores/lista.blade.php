@extends("layouts.app")

@section("content")
	<div class="container">

       <div class="page-header">
        <CENTER><h1>Listagem</h1></CENTER>        
       </div>


         <div>
           <table class="table table-striped table-bordered table-hover table-bordered">
            <!--1-Coloca cores alternadas de linhas-->
            <!--2-Coloca bordas envolta da tabela-->
            <!--3-Coloca efeito hover nas linhas-->
            <!--4-Condensa os espacos dentro da tabela-->
             <thead>
               <tr>
                 <th>Nome</th>
                 <th>CPF</th>
                 <th>Data de nascimento</th>
                 <th>Telefone</th>
                 <th>Idade</th>
                 <th>Editar</th>
                 <th>Excluir</th>
               </tr>
             </thead>
             <tbody>
               @foreach($professores as $row)
               		<tr>
               			<td>{{ $row->nome }}</td>
                    <td>{{ $row->cpf }}</td>
                    <td>{{date('d/m/Y',  strtotime( $row->dataN ))}}</td>
                    <td>{{ $row->telefone }}</td>
                    <td>{{ $row->idade }}</td>
                    <td>
                      <a href="/professor?id={{$row->id }}">Editar</a>
                    </td>
                    <td>
                      <a onclick="return confirm('Deseja realmente excluir?');" href="/professor/excluir?id={{ $row->id }}">Excluir</a>
                    </td>
               		</tr>
               @endforeach
             </tbody>

           </table>

           
         </div>

     </div> 

@stop