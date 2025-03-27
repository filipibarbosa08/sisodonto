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
                        <h4 class="page-title">Configurações</h4>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="card-box">
                            <ul class="nav nav-tabs nav-tabs-top">
                                <li class="nav-item"><a class="nav-link active" href="#usuarios" data-toggle="tab">Usuários</a></li>
                                <li class="nav-item"><a class="nav-link" href="#dentistas" data-toggle="tab">Dentistas</a></li>
                                <li class="nav-item"><a class="nav-link" href="#procedimentos" data-toggle="tab">Procedimentos</a></li>
                                <li class="nav-item"><a class="nav-link" href="#convenios" data-toggle="tab">Convênios</a></li>
                                <li class="nav-item"><a class="nav-link" href="#caixa" data-toggle="tab">Caixa</a></li>
                                <li class="nav-item"><a class="nav-link" href="#anamneses" data-toggle="tab">Anamneses</a></li>
                                <li  class="nav-item"><a class="nav-link" href="#permissoes" data-toggle="tab">Permissões</a></li>

                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane show active" id="usuarios">
                                    <?php include 'usuarios.php'; ?>
                                </div>
                                <div class="tab-pane" id="dentistas">
                                    Em Desenvolvimento... </div>
                                <div class="tab-pane" id="procedimentos">
                                    Em desenvolvimento...
                                </div>
                                <div class="tab-pane" id="convenios">
                                    Em desenvolvimento...
                                </div>
                                <div class="tab-pane" id="caixa">
                                    Em desenvolvimento...
                                </div>
                                <div class="tab-pane" id="anamneses">
                                    Em desenvolvimento...
                                </div>
                                <div class="tab-pane" id="permissoes">
                                    Em desenvolvimento...
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

    </script>

</body>

<!-- patients23:19-->

</html>