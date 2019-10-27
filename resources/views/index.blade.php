@extends('layout.site')

@section('titulo', 'Página Inicial')

@section('conteudo')
<div class="container">

    <!--Verifica se está recebendo registro, se não não estiver ira mostrar na interface  -->
    <!--Verifica se existem erros, se exister mais de um erro então ira mostrar na interface  -->
    @if(((isset($registro) && count($registro)== 0) || isset($nothing)!= 0) || (isset($errors) && count($errors) >0))
      <script>
       $(document).ready(function() {
          $('#modalErro').modal('show');
       });
      </script>
    @endif
    <!-- chama o modal de sucesso -->
    @if(isset($resposta) == true)
      <script>
       $(document).ready(function() {
          $('#modalSucesso').modal('show');
       });
      </script>
    @endif

    <div class="panel-heading headerCinza">
      <h3 class="panel-title">Pesquisar Sistema</h3>
    </div>
    <div class="panel-body">
      <form class="" action="{{route('sistema.buscar')}}" method="get">
        {{ csrf_field() }}
        <!-- DADOS DO SISTEMA -->
        <fieldset class="scheduler-border">
            <legend class="scheduler-border">Filtro de Conulta</legend>

            <!-- DESCRIÇÃO -->
            <div class="form-group row" >
              <label for="descricao" class="col-md-6 col-form-label">Descrição
                <hr class="mt">
              </label>
              <div class="col-sm-6">
                <input type="text" class="form-control" name="descricao" id="descricao" maxlength="100">
              </div>
            </div>

            <!-- SIGLA -->
            <div class="form-group row" >
              <label for="sigla" class="col-md-6 col-form-label">Sigla
                <hr class="mt">
              </label>
              <div class="col-sm-6">
                <input type="text" class="form-control" name="sigla" id="sigla" maxlength="10">
              </div>
            </div>

            <!-- E-MAIL -->
            <div class="form-group row" >
              <label for="email" class="col-md-6 col-form-label">E-mail de atendimento do sistema
                <hr class="mt">
              </label>
              <div class="col-sm-6">
                <input type="text" class="form-control" name="email" id="email" maxlength="100">
              </div>
            </div>

          </fieldset>

        <!--Verifica se está recebendo registro,se e existir sera mostrado na interface  -->
        @if(isset($registro) == true && count($registro) > 0)
        <fieldset class="scheduler-border" >
          <legend class="scheduler-border">Resultado da Consulta</legend>
          <div class="row"id="tabela">
            <div class="col-md-12">
              <table class="table table-bordered" id="table_id" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Descrição</th>
                    <th>Sigla</th>
                    <th>E-mail de atendimento</th>
                    <th>URL</th>
                    <th>Status</th>
                    <th>Ações</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($registro as $registros)
                  <tr>
                    <td>{{$registros->descricao}}</td>
                    <td>{{$registros->sigla}}</td>
                    <td>{{$registros->email}}</td>
                    <td>{{$registros->url}}</td>
                    <td>{{$registros->status}}</td>
                    <td>
                      <a href="{{route('sistema.editar',$registros->id)}}"><i class="fas fa-pencil-alt"></i></a>
                    </td>
                  </tr>
                  @endforeach
                  </tbody>
                </tbody>
              </table>
            </div>
        </div>
        </fieldset>
        @endif

        <!-- Footer - Botões -->
        <div class="row footerCinza">
          <div class="col-md-offset-5 col-md-5"></div>
          <div class="col-md-2">
            <button id="pesquisar" type="submit" class="font-color-footer" >
              Pesquisar
              <i class="fas fa-search"></i>
            </button>
          </div>
          <div class="col-md-2">
            <button type="reset" id="limpar" class="font-color-footer">
              Limpar
              <i class="fas fa-broom"></i>
            </button>
          </div>
      </form>
          <div class="col-md-3">
            <button type="button" id="novoSistema" class="font-color-footer">
              Novo Sistema
              <i class="fas fa-arrow-right font-color-footer"></i>
            </button>
          </div>
        </div>
    </div>

<!-- CSS -->
<style media="screen">

  /* Cor do Required */
  .required{
    color: red;
  }

  /* Margin dos panel */
  .panel {
    margin-top: 5%;
  }

  /* Cor legenda */
  legend {
    color: #4CAF50;
  }

  /* linha da descrição */
  .mt {
    margin-top: 1px;
  }

  /* Borda do fieldset */
  fieldset.scheduler-border {
    border: 1px groove #ddd;
    padding: 0 1.4em 1.4em 1.4em;
    margin: 0 0 1.5em 0;
    -webkit-box-shadow:  0px 0px 0px 0px #000;
            box-shadow:  0px 0px 0px 0px #000;
  }

  /* Borda da legenda */
  legend.scheduler-border {
    font-size: 1.2em;
    font-weight: bold;
    text-align: left;
    width:auto;
    padding:0 10px;
    border-bottom:none;
  }

  /* Cor do footer */
  .font-color-footer {
    color: #4CAF50;
    font-size: 1.2em;
    font-weight: bold;
    text-align: left;
    width:auto;
    padding:0 10px;
    background-color: #e6e6e6;
    border:none;
  }

  /* Cor do background do footer */
  .footerCinza{
      background-color: #e6e6e6;
  }

  /* Cor do background do heeader */
  .headerCinza{
    background-color: #e6e6e6;
  }

  /* Cor do background do body */
  .colorFundo{
    background-color: #fcf9f9;
  }

  </style>

@endsection
