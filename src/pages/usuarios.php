<!DOCTYPE html>
<html lang="pt-br">


<!-- patients23:17-->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="../assets/img/icon_odonto.ico">
    <title>SisOdonto</title>
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/select2.min.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="../assets/fontawesome-free-5.12.1-web/css/all.css">

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
                    <div class="col-sm-4 col-3">
                        <h4 class="page-title">Usuários</h4>
                    </div>
                    <div class="col-sm-8 col-9 text-right m-b-20">
                        <a href="javascript:void(0);" onclick="redirectMenu('cadastrarPaciente')" class="btn btn btn-primary btn-rounded float-right"><i class="fa fa-plus"></i> Cadastrar Usuário</a>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class=" ">

                            <div class="tab-content">
                                <div class="tab-pane show active" id="bottom-tab1">
                                    <div class="table-responsive">

                                        <table class="table mb-0 new-patient-table card  " id="tabelaPacientes">
                                            <thead class=" ">
                                                <tr>
                                                    <th>Usuário</th>
                                                    <th>Senha</th>
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

        ativarMenu('menu-configuracoes');

          table = $('#tabelaPacientes').DataTable({
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



        </script>

</body>

<!-- patients23:19-->

</html>