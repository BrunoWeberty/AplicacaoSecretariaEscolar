@extends("layouts.app")

@section("content")      

          <div class="container">
              <div class="page-header">
                <CENTER><h1>Cadastro de Disciplinas</h1></CENTER>        
               </div>
               <br/>
               <br/>
                <form id="form" action="/disciplina/salvar" method="post" class="valid rsform" enctype="multipart/form-data"><!-- Formulário-->

                  <input type="hidden" name="_token" value="{{ csrf_token() }}" /><!-- Mantem a sessão ativa, gerando um token novo sempre, a cada conexao-->

                  <div class="form-group row col-sm-10"><!-- Div do input do nome-->
                    <label for="descricao" class="col-sm-1 col-form-label">Descrição: </label>
                    <div class="col-sm-11">
                      <input type="text" class="form-control required" id="descricao" name="descricao" placeholder="Digite aqui a disciplina" value="{{ $disciplinas->descricao }}" data-nome="Descrição"/>
                    </div>
                  </div>
                  <br/>                 

                    <input type="hidden" name="id" value="{{ $disciplinas->id }}" />

                    <div class="col-sm-4 row"><!-- Div do botao-->
                        <button onclick="return validar();" type="submit" class="btn btn-primary btn-right">Salvar</button>
                    </div>
                                
                </form>

          </div>

  <script type="text/javascript">
    
    function validar(){

              var sucesso = true;//cria campo para o each validar

              $(".required").each(function() {
                if($(this).val() == ""){
                  var nome_campo = $(this).data("nome");
                  alert("Campo " +nome_campo +" obrigatório!");
                  sucesso = false;
                }
              });

              return sucesso;
    }



  </script>

@stop