@extends('layout.site')

@section('titulo','Sistemas')

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
    <form class="" action="{{route('sistema.atualizar', $registro->id)}}" method="post">
      <div class="panel-body">
        <!-- DADOS DO SISTEMA -->
        <fieldset class="scheduler-border">
          <legend class="scheduler-border">Dados do Sistema</legend>
          <input type="hidden" name="_method" value="put">
          {{ csrf_field() }}

          <!-- DESCRIÇÃO -->
          <div class="form-group row" >
            <label for="descricao" class="col-md-6 col-form-label">Descrição
              <span class="required">*</span>
              <hr class="mt">
            </label>
            <div class="col-sm-6">
              <!-- verifica se existe a variavel descrição, então mostra no campo, caso não exista mostrar vazio -->
              <input type="text" class="form-control" name="descricao" maxlength="100" size="100" value="{{isset($registro->descricao) ? $registro->descricao : ''}}">
            </div>
          </div>

          <!-- SIGLA -->
          <div class="form-group row" >
            <label for="sigla" class="col-md-6 col-form-label">Sigla
              <span class="required">*</span>
              <hr class="mt">
            </label>
            <div class="col-sm-6">
              <input type="text" class="form-control" name="sigla" maxlength="10" size="10" value="{{isset($registro->sigla) ? $registro->sigla : ''}}">
            </div>
          </div>

          <!-- E-MAIL -->
          <div class="form-group row" >
            <label for="email" class="col-md-6 col-form-label">E-mail de atendimento do sistema
              <hr class="mt">
            </label>
            <div class="col-sm-6">
              <input type="text" class="form-control" maxlength="100" size="100" name="email" value="{{isset($registro->email) ? $registro->email : ''}}">
            </div>
          </div>

          <!-- URL -->
          <div class="form-group row" >
            <label for="url" class="col-md-6 col-form-label">URL
              <hr class="mt">
            </label>
            <div class="col-sm-6">
              <input type="text" class="form-control" maxlength="50" size="50" name="url" value="{{isset($registro->url) ? $registro->url : ''}}">
            </div>
          </div>

        </fieldset>

        <!-- CONTROLE DO SISTEMA -->
        <fieldset class="scheduler-border" >
          <legend class="scheduler-border">Controle do Sistema</legend>

          <!-- STATUS -->
          <div class="form-group row">
            <label for="status" class="col-md-6 col-form-label">Status
              <span class="required">*</span>
              <hr class="mt">
            </label>
            <div class="col-sm-6">
              <select class="form-control" type ="text" name="status"  value="{{isset($registro->status) ? $registro->status : ''}}">
                <option value="Ativo">Ativo</option>
                <option value="Cancelado">Cancelado</option>
              </select>
            </div>
          </div>

          <!-- USUARIO RESPONSAVEL PELA ÚLTIMA ALTERAÇÃO -->
          <div class="form-group row">
            <label for="dataUltimaAlteracao" class="col-md-6 col-form-label">Usuário responsavel pela última alteração
              <hr class="mt">
            </label>
            <div class="col-sm-6">
              <input type="text" class="form-control" disabled value="{{isset($registro->usuario) ? $registro->usuario : ''}}">
            </div>
          </div>

          <!-- DATA DA ÚLTIMA ALTERAÇÃO -->
          <div class="form-group row">
            <label for="dataUltimaAlteracao" class="col-md-6 col-form-label">Data da última alteração
              <hr class="mt">
            </label>
            <div class="col-sm-6">
              <input type="text" name="updated_at" class="form-control" disabled value="{{isset($registro->updated_at) ? $registro->updated_at : ''}}">
            </div>
          </div>

          <!-- ÚLTIMA JUSTIFICATIVA -->
          <div class="form-group row">
            <label class="col-md-6 col-form-label">Justificativa da última alteração
              <hr class="mt">
            </label>
            <div class="col-sm-6">
              <textarea class="form-control" rows="4" maxlength="500" size="500" name="justificativa" disabled value="">{{isset($registro->justificativa) ? $registro->justificativa : ''}}</textarea>
            </div>
          </div>

          <!-- NOVA JUSTIFICATIVA -->
          <div class="form-group row" >
            <label for="justificativaAlteracao" class="col-md-6 col-form-label">Nova justificativa de alteração
              <span class="required">*</span>
              <hr class="mt">
            </label>
            <div class="col-sm-6">
              <textarea class="form-control" rows="4" maxlength="500" size="500"name="justificativa"></textarea>
            </div>
          </div>

        </fieldset>


        <!-- Footer - Botões -->
        <div class="panel-footer clearfix footerCinza">
          <div class="row">
            <div class="col-md-2 primeiro">
              <button class="font-color-footer pull-right">Salvar</button>
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
