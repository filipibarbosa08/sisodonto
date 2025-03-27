<form id="formTratamentos">
    <div class="card-box profile-header">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-12">
                        <h4 class="page-title">Lista de Tratamentos</h4>
                    </div>

                </div>
            </div>
        </div>


                <div class="row">
                    <div class="col-md-12">
                        <div class=" ">

                            <div class="tab-content">
                                <div class="tab-pane show active" id="bottom-tab1">
                                    <div class="table-responsive">

                                        <table class="table mb-0 new-patient-table card  " id="tableTratamentos">
                                            <thead class=" ">
                                                <tr>
                                                    <th>Aprovação do Orçamento</th>
                                                    <th>Descrição</th>
                                                    <th>Valor</th>
                                                    <th>Evolução do tratamento</th>
                                                    <th>Status</th>
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


    <div class="modal fade" id="modalEvolucao" tabindex="-1" role="dialog" aria-labelledby="modalEvolucaoLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalEvolucaoLabel">Tratamento</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="formEvolucao">
            <input type="hidden" id="idTratamento" name="idTratamento" >
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="descricao">Descrição</label>
              <input type="text" class="form-control" id="descricao" >
            </div>
            <div class="form-group col-md-6">
              <label for="data">Data de Aprovação</label>
              <input disabled="true" type="date" class="form-control" id="data">
            </div>
          </div>

                    <div class="mt-3">
            <h6>Procedimentos do Tratamento</h6>
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>Procedimento</th>
                  <th>Dente</th>
                  <th>Valor</th>
                </tr>
              </thead>
              <tbody id="listaProcedimentos">
                <!-- Os procedimentos serão inseridos aqui via JavaScript -->
              </tbody>
            </table>
          </div>


          <div class="form-group">
            <label for="evolucao">Evolução</label>
            <textarea class="form-control" id="evolucao" rows="4" placeholder="Digite a evolução"></textarea>
          </div>

                    <!-- Checkbox para Finalizar Tratamento -->
          <div class="form-check">
            <input type="checkbox" class="form-check-input" id="finalizarTratamento">
            <label class="form-check-label" for="finalizarTratamento">Finalizar Tratamento</label>
          </div>

        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
        <button type="button" class="btn btn-primary" onclick="salvarEvolucao()">Salvar</button>
      </div>
    </div>
  </div>
</div>


</form>

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
    tableTratamentos = $('#tableTratamentos').DataTable({
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

    function getTratamentos(){
                $.ajax({
                url: '/src/ajax/getTratamentos.php',
                type: 'POST',
                data: JSON.stringify({ paciente_id: id}),
                contentType: 'application/json', // Envia como JSON
                success: function(response) {
                    var response = JSON.parse(response);

                    dados = response.tratamentos;

                    tableTratamentos.clear();

                    // Loop pelos dados e adicionar ao DataTable
                    dados.forEach(function(item) {

                        let status = item.tratamento_finalizado == 1 ? 'Finalizado' : 'Em andamento';

                        tableTratamentos.row.add([
                            item.data_orcamento ? item.data_orcamento.split('-').reverse().join('/') : '',
                            item.descricao || '', 
                            item.valor_total || '',
                            `<a onclick="visualizarTratamento('${item.id}')" class="btn btn-white text-dark btn-rounded fa-1x">
                                Ver/Editar
                            </a>`,
                            status

                        ]);

                    });


                    // Redesenhar a tabela para mostrar as novas linhas
                    tableTratamentos.draw();


                    if (response.status === 'success') {
                        //window.location.href = '../index.php?page=dashboard'; 
                    } 
                },
            });
    }
    
    getTratamentos();

    function visualizarTratamento(tratamento_id){

                $.ajax({
                    url: '/src/ajax/visualizarTratamento.php',
                    type: 'POST',
                    data: { id: tratamento_id},
                    success: function(response) {
                        let res = JSON.parse(response);
                        dadosTratamento = res.dadosTratamento;


                            let tabelaBody = document.getElementById('listaProcedimentos');
                            tabelaBody.innerHTML = ""; 
                            let valorTotal = 0;

                            dadosTratamento.forEach(dado => {
                                let linha = `
                                    <tr>
                                        <td>${dado.procedimento}</td>
                                        <td>${dado.dente_regiao}</td>
                                        <td>${dado.valor}</td>
                                    </tr>
                                `;
                                tabelaBody.innerHTML += linha;
                                valorTotal += parseFloat(dado.valor); 
                            });

                            document.getElementById('descricao').value = dadosTratamento[0].descricao;
                            document.getElementById('data').value = dadosTratamento[0].data_aprovacao;
                            document.getElementById('idTratamento').value = dadosTratamento[0].idtratamento;
                            document.getElementById('evolucao').value = dadosTratamento[0].evolucao;

                                if (dadosTratamento[0].tratamento_finalizado == '1') {
                                    // Desabilita o campo de evolução
                                    document.getElementById('evolucao').disabled = true;
                                    document.getElementById('finalizarTratamento').checked = true;

                                    // Desabilita o checkbox "Finalizar Tratamento"
                                    document.getElementById('finalizarTratamento').disabled = true;
                                }


                    },
            });



                $('#modalEvolucao').modal('show');
    }

    function salvarEvolucao(){

            $.ajax({
                    url: '/src/ajax/salvarEvolucao.php',
                    type: 'POST',
                    data: { 
                        id: document.getElementById('idTratamento').value, 
                        evolucao: document.getElementById('evolucao').value,
                        finalizarTratamento: document.getElementById('finalizarTratamento').checked // Adiciona o valor do checkbox
                    },
                    success: function(response) {
                        const res = JSON.parse(response);
                        alert(res.message);
                        getTratamentos();

                    },
            });
    }
 

</script>
