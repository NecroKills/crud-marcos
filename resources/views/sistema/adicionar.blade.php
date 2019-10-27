@extends('layout.site')

@section('titulo','Cadastrar')

@section('conteudo')
  <div class="container">
    @if(isset($errors) && count($errors) >0)
      <script>
       $(document).ready(function() {
          $('#modalErro').modal('show');
       });
      </script>
    @endif

    <div class="panel-heading headerCinza">
      <div class="row">
        <div class="col-md-3">
          <h3 class="panel-title">Manter Sistema</h3>
        </div>
        <div class="col-md-9 text-right">
          <span class="panel-title required">*Campo Obrigatório</span>
        </div>
      </div>
    </div>
    <form class="" action="{{route('sistema.salvar')}}" method="post">
      <div class="panel-body">
        <!-- DADOS DO SISTEMA -->
        <fieldset class="scheduler-border">
          <legend class="scheduler-border">Dados do Sistema</legend>
          {{ csrf_field() }}
          <!-- DESCRIÇÃO -->
          <div class="form-group row" >
            <label for="descricao" class="col-md-6 col-form-label">Descrição
              <span class="required">*</span>
              <hr class="mt">
            </label>
            <div class="col-sm-6">
              <input type="text" class="form-control" name="descricao" maxlength="100" size="100" value="{{old('descricao')}}">
            </div>
          </div>

          <!-- SIGLA -->
          <div class="form-group row" >
            <label for="sigla" class="col-md-6 col-form-label">Sigla
              <span class="required">*</span>
              <hr class="mt">
            </label>
            <div class="col-sm-6">
              <input type="text" class="form-control" name="sigla" maxlength="10" size="10" value="{{old('sigla')}}">
            </div>
          </div>

          <!-- E-MAIL -->
          <div class="form-group row" >
            <label for="email" class="col-md-6 col-form-label">E-mail de atendimento do sistema
              <hr class="mt">
            </label>
            <div class="col-sm-6">
              <input type="text" class="form-control" maxlength="100" size="100" name="email" value="{{old('email')}}">
            </div>
          </div>

          <!-- URL -->
          <div class="form-group row" >
            <label for="url" class="col-md-6 col-form-label">URL
              <hr class="mt">
            </label>
            <div class="col-sm-6">
              <input type="text" class="form-control" maxlength="50" size="50" name="url" value="{{old('url')}}">
            </div>
          </div>
        </fieldset>
      </div>

      <!-- Footer - Botões -->
      <div class="panel-footer clearfix footerCinza">
        <div class="row">
          <div class="col-md-2 primeiro">
            <button class="font-color-footer pull-right" >Salvar</button>
            <i class="fas fa-save font-color-footer"></i>
          </div>
      </form>
      <div class="col-md-10 ultimo">
        <button type="button" id="voltar" class="font-color-footer">
          <i class="fas fa-arrow-left font-color-footer"></i>Voltar</button>
      </div>
        </div>
      </div>


  <!-- CSS -->
  <style media="screen">
  /* troca a ordem das divs */
  .primeiro {
  order: 2;
  }
  .ultimo {
    order: 1;
  }
  /* fim trocar ordem das div */

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
