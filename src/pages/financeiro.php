<!DOCTYPE html>
<html lang="pt-br">
    <!-- blank-page24:04-->
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0" />
        <link rel="shortcut icon" type="image/x-icon" href="../assets/img/icon_odonto.ico" />
        <title>SisOdonto</title>
        <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css" />
        <link rel="stylesheet" type="text/css" href="../assets/css/font-awesome.min.css" />
        <link rel="stylesheet" type="text/css" href="../assets/css/style.css" />
        <link rel="stylesheet" type="text/css" href="../assets/fontawesome-free-5.12.1-web/css/all.css" />
        <!--[if lt IE 9]>
            <script src="assets/js/html5shiv.min.js"></script>
            <script src="assets/js/respond.min.js"></script>
        <![endif]-->
    </head>

    <body>
        <div class="main-wrapper">
            <?php include 'header.php'; ?>
            <?php include 'sidebar.php'; ?>

            <div class="page-wrapper">
                <div class="content">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="row">
                                <div class="col-sm-12">
                                    <h4 class="page-title">Financeiro</h4>
                                </div>

                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <select class="form-control rounded" disabled>
                                            <option selected="">Todo período</option>
                                            <option>Hoje</option>
                                            <option>Dessa semana</option>
                                            <option>Desse Mês</option>
                                            <option>Escolher período</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="card-box border p-3">
                                <div class="row justify-content-md-center">
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label class="mb-0 card-title name"> Receitas </label>

                                            <a id="receitas" class="form-control rounded d-flex justify-content-start font-weight-bold shadow-none"> R$ 0,00 </a>
                                            <small class="d-flex justify-content-end" id="receitasprevistas" > Total previsto R$ 0,00 </small>
                                        </div>
                                    </div>

                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label class="mb-0 card-title"> Despesas </label>

                                            <a id="despesas" class="form-control rounded d-flex justify-content-start font-weight-bold shadow-none"> R$ 400,00 </a>
                                            <small id="despesasprevistas" class="d-flex justify-content-end"> Total previsto R$ 0,00 </small>
                                        </div>
                                    </div>

                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label class="mb-0 card-title"> Lucro </label>

                                            <a id="lucro" class="form-control rounded d-flex justify-content-start font-weight-bold shadow-none"> R$ 400,00 </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card-box border p-3">
                                <div class="row">
                                    <div class="col-6">
                                        <h4 class="page-title">Fluxo de Caixa</h4>
                                    </div>

                                    <div class="col-6 text-right m-b-20">
                                        <div class="dropdown action-label d-inline-block">
                                            <a class="btn btn-primary btn-rounded dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="false"> <i class="fa fa-plus"></i> Adicionar </a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item"><i class="fa fa-arrow-down text-success" aria-hidden="true"></i> Receita</a>
                                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#despesa"> <i class="fa fa-arrow-up text-danger" aria-hidden="true"></i> Despesa </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12">
                                        <div class=" ">
                                            <div class="tab-content">
                                                <div class="tab-pane show active" id="bottom-tab1">
                                                    <div class="table-responsive">
                                                        <table class="table mb-0 new-patient-table card" id="tabelaFinanceiro">
                                                            <thead class=" ">
                                                                <tr>
                                                                    <th> </th>
                                                                    <th>Data</th>
                                                                    <th>Descrição</th>
                                                                    <th>Valor</th>
                                                                    <th>Status</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody class="text-dark"></tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="despesa" class="modal fade delete-modal" role="dialog">
                    <form id="formDespesa">
                        <div class="modal-dialog modal-lg modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Nova despesa</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-sm-9">
                                            <div class="form-group">
                                                <label>Descrição <span class="text-danger">*</span></label>
                                                <input id="descricao" name="descricao" class="form-control rounded" type="text" />
                                            </div>
                                        </div>

                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Valor <span class="text-danger">*</span></label>
                                            <input id="valor" class="form-control rounded" type="text" 
                                                oninput="this.value = this.value.replace(/[^\d]/g, '').replace(/(\d{1,})(\d{2})$/, '$1,$2')" 
                                                placeholder="0,00" />
                                        </div>
                                    </div>




                                        <div class="col-sm-9">
                                            <div class="form-group">
                                                <label>Categoria <span class="text-danger">*</span></label>
                                                <select id="categoria" name="categoria" class="form-control rounded" type="text">
                                                    <option value="Outras">Outras</option>
                                                    <option value="Despesas bancárias">Despesas bancárias</option>
                                                    <option value="Contabilidade">Contabilidade</option>
                                                    <option value="Infraestrutura">Infraestrutura</option>
                                                    <option value="Encargos de funcionários">Encargos de funcionários</option>
                                                    <option value="Laboratórios">Laboratórios</option>
                                                    <option value="Materiais odontológicos">Materiais odontológicos</option>
                                                    <option value="Custos Fixos">Custos fixos</option>
                                                </select>
                                            </div>
                                        </div>



                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label>Vencimento <span class="text-danger">*</span></label>
                                                    <div class="cal-icon">
                                                        <input type="text" id="vencimento" name="vencimento" class="form-control datetimepicker rounded" value="<?php echo date('d/m/Y'); ?>">
                                                </div>
                                            </div>
                                        </div>



                                        <div class="col-sm-12 d-flex justify-content-center m-t-5">
                                            <a class="rounded text-primary" type="button"> Anexar comprovante</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" onclick="salvarDespesa()">Salvar</button>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Sair</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
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
            table = $("#tabelaFinanceiro").DataTable({
                bJQueryUI: true,
                oLanguage: {
                    sProcessing: "Processando...",
                    sLengthMenu: "Mostrar _MENU_ registros",
                    sZeroRecords: "Não foram encontrados resultados",
                    sInfo: "Mostrando de _START_ até _END_ de _TOTAL_ registros",
                    sInfoEmpty: "Mostrando de 0 até 0 de 0 registros",
                    sInfoFiltered: "",
                    sInfoPostFix: "",
                    sSearch: "Buscar:",
                    sUrl: "",
                    oPaginate: {
                        sFirst: "Primeiro",
                        sPrevious: "Anterior",
                        sNext: "Seguinte",
                        sLast: "Último",
                    },
                },
            });

            ativarMenu("menu-financeiro");

            function salvarDespesa(){

                let descricao = document.getElementById('descricao').value;
                let valor = document.getElementById('valor').value;
                let categoria = document.getElementById('categoria').value;
                let vencimento = document.getElementById('vencimento').value;

                if (!descricao || !valor || !categoria || !vencimento) {
                    alert('Por favor, preencha todos os campos obrigatórios.');
                    return false;
                }

                const form = document.getElementById('formDespesa');
                const formData = new FormData(form);
                const data = Object.fromEntries(formData.entries());

                valor = document.getElementById('valor').value.replace(',', '.');
                data.valor = parseFloat(valor).toFixed(2);
                data.vencimento = document.getElementById('vencimento').value.split('/').reverse().join('-');
                data.status_pagamento = 1;

                $.ajax({
                    url: '/src/ajax/salvarDespesa.php',
                    type: 'POST',
                    data: JSON.stringify(data),
                    contentType: 'application/json', // Envia como JSON
                    success: function(response) {
                        const res = JSON.parse(response);
                        alert(res.message);
                    },
                });

            }

           $.ajax({
                    url: '/src/ajax/getFluxoDeCaixa.php',
                    type: 'POST',
                    contentType: 'application/json', // Envia como JSON
                    success: function(response) {
                    var response = JSON.parse(response);
                    valores = response.valores;
                    fluxodecaixa = response.fluxodecaixa;

                    document.getElementById('receitas').innerText = "R$ " + valores.receitas;
                    document.getElementById('receitasprevistas').innerText = "Total previsto: R$ " + valores.receitasprevistas;
                    document.getElementById('despesas').innerText = "R$ " + valores.despesas;
                    document.getElementById('despesasprevistas').innerText = "Total previsto R$ " + valores.despesasprevistas;
                    document.getElementById('lucro').innerText = valores.receitas - valores.despesas;


                    table.clear();

                    // Loop pelos dados e adicionar ao DataTable
                    fluxodecaixa.forEach(function(item) {

                        let status = item.status_pagamento == 1 ? 'Pago' : 'Pagamento Pendente';

                        let tipo = item.tipo == "entrada" ? '<p> <i class="fa fa-arrow-down text-success" aria-hidden="true"></i> Receita</p>' : '<p> <i class="fa fa-arrow-up text-danger" aria-hidden="true"></i> Despesa </p>';
       

                        table.row.add([
                            tipo,
                            item.vencimento ? item.vencimento.split('-').reverse().join('/') : '',
                            item.descricao || '', 
                            item.valor || '',
                            status
                        ]);

                    });


                    // Redesenhar a tabela para mostrar as novas linhas
                    table.draw();


                    },
            });

        </script>
    </body>

    <!-- blank-page24:04-->
</html>
