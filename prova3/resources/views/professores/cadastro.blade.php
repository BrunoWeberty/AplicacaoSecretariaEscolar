@extends("layouts.app")

@section("content")      
          <div class="Container">
            <div class="page-header">
                <CENTER><h1>Cadastro de Professores</h1></CENTER>        
               </div>
               <br/>
               <br/>
            <div class="col-sm-12"><!-- Container principal-->
                <form id="form" action="/professor/salvar" method="post" class="valid rsform"><!-- Formulário-->

                  <input type="hidden" name="_token" value="{{ csrf_token() }}" /><!-- Mantem a sessão ativa, gerando um token novo sempre, a cada conexao-->

                  <div class="form-group row col-sm-9"><!-- Div do input do nome-->
                    <label for="nome" class="col-sm-1 col-form-label">Nome: </label>
                    <div class="col-sm-11">
                      <input type="text" class="form-control required" id="nome" name="nome" placeholder="Digite aqui seu nome" value="{{ $professores->nome }}" data-nome="Nome"/>
                    </div>
                  </div>
                  <br/>

                  <div class="form-group row col-sm-9"><!-- Div do input do nome-->
                    <label for="cpf" class="col-sm-1 col-form-label">CPF: </label>
                    <div class="col-sm-11">
                      <input type="text" class="form-control required" id="cpf" name="cpf" value="{{ $professores->cpf }}" data-nome="Cpf"/>
                    </div>
                  </div>
                  <br/>

                  <div class="form-group row col-sm-9"><!-- Div do input do nome-->
                    <label for="telefone" class="col-sm-1 col-form-label">Telefone: </label>
                    <div class="col-sm-11">
                      <input type="text" class="form-control required" id="telefone" name="telefone" value="{{ $professores->telefone }}" data-nome="Telefone"/>
                    </div>
                  </div>
                  <br/>

                  <div class="form-group row col-sm-9"><!-- Div do input do nome-->
                    <label for="disciplina" class="col-sm-1 col-form-label">Disciplinas: </label><br>
                    <div class="col-sm-4">

                      <!-- Quando cadastramos um professor novo, temos que listar todas as disciplinas, porque não tem restrição para exibir checkds -->
                      @if($professores->id == NULL) 
                            @foreach ($disciplinas as $rowDisciplina)
                                <div class="checkbox">
                                    <label><input class="margin_top_1x" type="checkbox" name="disciplinas[]" id="disciplina" value="{{$rowDisciplina->id}}">{{$rowDisciplina->descricao}}</label>
                                </div>
                            @endforeach
                      @else
                            <!-- Se editarmos um professor, precisamos de um foreach é pra percorrer o array de todas as disciplinas, sem restrição se for pra estar marcada ou não. -->
                            @foreach ($disciplinas as $row)
                            <!-- se o id da disciplina não é NULL porque quando a disciplina não está cadastrado na tabela ProfessorDisciplina ele me retorna null, (nesse caso seria check normal).-->
                                @if($row->id == NULL)
                                    @foreach ($disciplinas as $rowDisc)
                                        @if($row->descricao == $rowDisc->descricao)
                                            <div class="checkbox">
                                                <label><input  class="margin_top_1x" type="checkbox" name="disciplinas[]" id="disciplina" value="{{$rowDisc->id}}">{{$row->descricao}}</label>
                                            </div>
                                        @endif
                                    @endforeach
                               <!-- quando o ID da disciplina for o mesmo do ID que eu estpa relacionado com a tabela ProfessorDisciplina ele deve mostrar o checked. -->
                                @else
                                    <div class="checkbox">
                                        <label><input checked="" class="margin_top_1x" type="checkbox" name="disciplinas[]" id="disciplina" value="{{$row->disciplina_id}}">{{$row->descricao}}</label>
                                    </div>
                                @endif
                            @endforeach
                      @endif
                    </div>
                  </div>
                  <br/>

                  <div class="form-group"><!-- Div da data-->
                    <label for="dataN" class="col-sm-3 col-form-label">Data de nascimento:</label>
                    <div class="col-sm-3">
                      <input type="date" class="form-control required" id="dataN" name="dataN" value="{{ $professores->dataN }}" data-nome="Data de nascimento"/>
                    </div>
                  </div>
                  <br/>



                  <input type="hidden" name="id" value="{{ $professores->id }}" />

                  <div class="col-sm-1"><!-- Div do botao-->
                      <button onclick="return validar();" type="submit" class="btn btn-primary btn-right">Salvar</button>
                  </div>                               

                </form>
            </div>

          </div>

          <script>
            $(document).ready(function () { 
                var $cpf = $("#cpf");
                $cpf.mask('000.000.000-00', {placeholder:"___.___.___-__"});
            });



            $(document).ready(function () { 
                var $telefone = $("#telefone");
                $telefone.mask('00 00000-0000', {placeholder:"(__) _____-____"});
            });





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