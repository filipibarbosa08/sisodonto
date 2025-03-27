<form id="formParcelas">
    <div class="card-box profile-header">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-12">
                        <h4 class="page-title">Financeiro</h4>
                    </div>

                </div>
            </div>
        </div>

        <div class="row justify-content-md-center">
            <div class="col-lg-3">
                <div class="form-group">
                    <label > <b> TOTAL RECEBIDO </b> </label>
                    <a class="form-control rounded  btn btn-outline-success  ">
                        <strong id="totalrecebido"> R$ 0,00 </strong> </a>
                </div>
            </div>

            <div class="col-lg-3">
                <div class="form-group">
                    <label > <b> TOTAL A RECEBER </b> </label>
                        <a class="form-control rounded  btn btn-outline-danger  ">
                            <strong id="totalareceber"> R$ 0,00 </strong> </a>
                        </div>
                </div>
            </div>


                <div class="row">
                    <div class="col-md-12">
                        <div class=" ">

                            <div class="tab-content">
                                <div class="tab-pane show active" id="bottom-tab1">
                                    <div class="table-responsive">

                                        <table class="table mb-0 new-patient-table card  " id="tableParcelas">
                                            <thead class=" ">
                                                <tr>
                                                    <th>Vencimento</th>
                                                    <th>Valor</th>
                                                    <th>Pagamento</th>
                                                    <th> </th>
                                                </tr>
                                            </thead>
                                            <tbody class="text-dark">


                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>


                </div>
    </div>


</form>

<div class="modal fade" id="modalPagamento" tabindex="-1" role="dialog" aria-labelledby="modalPagamentoLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalPagamentoLabel">Cadastro de Pagamento</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="formPagamento">
          <!-- Forma de Pagamento - Agora é um Select -->
          <div class="mb-3">
            <label for="formaPagamento" class="form-label">Forma de Pagamento</label>
            <select class="form-control" id="formaPagamento" name="forma_pagamento" required>
              <option value="" disabled selected>Selecione...</option>
              <option value="1">Boleto</option>
              <option value="2">Cartão de Crédito</option>
              <option value="3">Transferência Bancária</option>
              <option value="4">Dinheiro</option>
              <option value="5">Pix</option>
              <!-- Adicione mais opções conforme necessário -->
            </select>
          </div>

          <!-- Data de Recebimento -->
          <div class="mb-3">
            <label for="dataRecebimento" class="form-label">Data de Recebimento</label>
            <input type="date" class="form-control" id="dataRecebimento" name="data_recebimento" required>
          </div>

          <!-- ID da Parcela - Campo oculto -->
          <div class="mb-3 d-none">
            <label for="parcelaId" class="form-label">ID da Parcela</label>
            <input type="number" class="form-control" id="parcelaId" name="parcela_id" required>
          </div>

          <button type="button" class="btn btn-primary" onclick="salvarPagamento()">Salvar</button>
        </form>
      </div>
    </div>
  </div>
</div>



<div class="sidebar-overlay" data-reff=""></div>
<script src="../assets/js/jquery-3.2.1.min.js"></script>
<script src="../assets/js/popper.min.js"></script>
<script src="../assets/js/bootstrap.min.js"></script>
<script src="../assets/js/jquery.slimscroll.js"></script>
<script src="../assets/js/select2.min.js"></script>
<script src="../assets/js/jquery.dataTables.min.js"></script>
<script src="../assets/js/dataTables.bootstrap4.min.js"></script>
<script src="../assets/js/moment.min.js"></script>
<script src="../assets/js/bootstrap-datetimepicker.min.js"></script>
<script src="../assets/js/app.js"></script>
<script src="../assets/js/utils.js"></script>

<script>
    tableParcelas = $('#tableParcelas').DataTable({
        "bJQueryUI": true,
        "oLanguage": {
            "sProcessing": "Processando...",
            "sLengthMenu": "Mostrar _MENU_ registros",
            "sZeroRecords": "Não foram encontrados resultados",
            "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
            "sInfoEmpty": "Mostrando de 0 até 0 de 0 registros",
            "sInfoFiltered": "",
            "sInfoPostFix": "",
            "sSearch": "Buscar:",
            "sUrl": "",
            "oPaginate": {
                "sFirst": "Primeiro",
                "sPrevious": "Anterior",
                "sNext": "Seguinte",
                "sLast": "Último"
            }
        }
    });

    function loadParcelas(){


            $.ajax({
                url: '/src/ajax/getParcelas.php',
                type: 'POST',
                data: JSON.stringify({ paciente_id: id}),
                contentType: 'application/json', // Envia como JSON
                success: function(response) {
                    var response = JSON.parse(response);

                    dados = response.parcelas;

                    tableParcelas.clear();

                    // Loop pelos dados e adicionar ao DataTable
                    dados.forEach(function(item) {

                        let statusPagamento = item.status_pagamento == 1 ? "Pago" : "Pagamento Pendente";

                        let receberPagamento = item.status_pagamento == 0 ?  `<a class="btn btn-primary btn-sm" onclick="openModalPagamento('${item.id}')">
                                Receber Pagamento
                            </a>` : '';

                        tableParcelas.row.add([
                            item.vencimento ? item.vencimento.split('-').reverse().join('/') : '',
                            item.valor || '', 
                            statusPagamento,
                            receberPagamento
                        ]);

                    });


                    // Redesenhar a tabela para mostrar as novas linhas
                    tableParcelas.draw();

                    document.getElementById('totalareceber').innerText = response.valorReceber;
                    document.getElementById('totalrecebido').innerText = response.valorRecebido;
                },
            });

        }

        loadParcelas();

    function openModalPagamento(parcela_id){
        $('#modalPagamento').modal('show');
        document.getElementById('parcelaId').value = parcela_id;
    } 


    function salvarPagamento() {
    // Coleta os valores do formulário
        var formaPagamento = document.getElementById('formaPagamento').value;
        var dataRecebimento = document.getElementById('dataRecebimento').value;
        var parcelaId = document.getElementById('parcelaId').value;

        // Verifique se os campos estão preenchidos
        if (formaPagamento && dataRecebimento && parcelaId) {


                const form = document.getElementById('formPagamento');
                const formData = new FormData(form);
                const data = Object.fromEntries(formData.entries());

                $.ajax({
                    url: '/src/ajax/salvarPagamento.php',
                    type: 'POST',
                    data: JSON.stringify(data),
                    contentType: 'application/json', // Envia como JSON
                    success: function(response) {
                        const res = JSON.parse(response);
                        alert(res.message);
                        loadParcelas();
                    },
                }); 

          // Fechar o modal após salvar
          $('#modalPagamento').modal('hide');
        } else {
          alert('Por favor, preencha todos os campos.');
        }
    }
 

</script>
