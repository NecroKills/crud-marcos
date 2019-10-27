<!-- Modal de erro-->
<div class="modal fade" id="modalErro" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Mensagem</h5>
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        @if(isset($errors) && count($errors) >0)
          @foreach($errors->all() as $error)
            <p>{{$error}}</p>
          @endforeach
          @else
            <p>Nenhum Sistema foi encontrado. Favor revisar os critérios da sua pesquisa!</p>
          @endif
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary"  data-dismiss="modal">OK</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal de sucesso-->
<div class="modal fade" id="modalSucesso" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <p>Operação realizada com sucesso.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary"  id="voltar" data-dismiss="modal">OK</button>
      </div>
    </div>
  </div>
</div>

<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<script type="text/javascript">
  $(document).ready(function (){

    // botão limpar dados
    $("#limpar").on("click", function(){
        $('#tabela').remove();
        window.location.replace("/");
    });

    // Parametros de configuração da tabela
    $('#table_id').DataTable( {
      "responsive": true, //responsive ativo
      "pageLength": 50,
      "searching": false,
      "lengthChange": false,
      "pagingType": "full_numbers",
      "order":[],
      "columnDefs": [{"orderable": false, "targets": [0,1,2,3,5] }],
      "bInfo" : false,
      "language": {
        "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Portuguese-Brasil.json"
      },
    });

     // botão voltar da pagina de cadastro
    $("#voltar").on("click", function(){
        window.location.replace("/");
    });

    // botão adicionar da pagina inicial
    $("#novoSistema").on("click", function(){
        window.location.replace("http://127.0.0.1:8000/sistema/adicionar");
    });

      // botão salvar, se salvo com sucesso chama o modal de sucesso
     $("#salvar").on("click", function(){
       $('#modalSucesso').modal('show');
     });

  });
</script>

</body>
</html>
