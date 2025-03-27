<!DOCTYPE html>
<html lang="pt-br">


<!-- index22:59-->

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
  <link rel="shortcut icon" type="image/x-icon" href="assets/img/icon_odonto.ico">
  <title>SisOdonto</title>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="../assets/css/font-awesome.min.css">
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
          <div class="col-md-6 col-sm-6 col-lg-6 col-xl-4">
            <div class="dash-widget">
              <span class="dash-widget-bg1"><i class="fas fa-birthday-cake" aria-hidden="true"></i></span>
              <div class="dash-widget-info text-right">
                <h3 id="aniversariantes">0</h3>
                <span class="btn btn-primary">Aniversariantes de hoje <i class="fas fa-check" aria-hidden="true"></i></span>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-sm-6 col-lg-6 col-xl-4">
            <div class="dash-widget">
              <span class="dash-widget-bg2"><i class="fas fa-user"></i></span>
              <div class="dash-widget-info text-right">
                <h3 id="pacientescadastrados">0</h3>
                <span class="btn btn-success">Pacientes cadastrados <i class="fa fa-check" aria-hidden="true"></i></span>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-sm-6 col-lg-6 col-xl-4">
            <div class="dash-widget">
              <span class="dash-widget-bg5"><i class="fas fa-file-invoice-dollar" aria-hidden="true"></i></span>
              <div class="dash-widget-info text-right">
                <h3 id="contasatrasadas">0</h3>
                <span class="btn btn-danger">Contas em atraso<i class="fa fa-check" aria-hidden="true"></i></span>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-sm-6 col-lg-6 col-xl-4">
            <div class="dash-widget">
              <span class="dash-widget-bg1"><i class="fas fa-pause-circle" aria-hidden="true"></i></span>
              <div class="dash-widget-info text-right">
                <h3 id="orcamentosparaaprovar">0</h3>
                <span class="text-sm btn btn-primary  text-wrap">Orçamentos a aprovar <i class="fa fa-check" aria-hidden="true"></i></span>
              </div>
            </div>
          </div>

          <div class="col-md-6 col-sm-6 col-lg-6 col-xl-4">
            <div class="dash-widget">
              <span class="dash-widget-bg2"><i class="fas fa-calendar-day" aria-hidden="true"></i></span>
              <div class="dash-widget-info text-right">
                <h3 id="consultasdodia">0</h3>
                <span class="btn btn-success">Consultas de hoje <i class="fa fa-check" aria-hidden="true"></i></span>
              </div>
            </div>
          </div>

          <div class="col-md-6 col-sm-6 col-lg-6 col-xl-4">
            <div class="dash-widget">
              <span class="dash-widget-bg5"><i class="fas fa-phone-alt" aria-hidden="true"></i></span>
              <div class="dash-widget-info text-right">
                <h3 id="consultasparaconfirmar">0</h3>
                <span class="btn btn-danger">Consultas a confirmar <i class="fa fa-check" aria-hidden="true"></i></span>
              </div>
            </div>
          </div>
        </div>
      </div>


    </div>

  </div>
  </div>
  <div class="sidebar-overlay" data-reff=""></div>
  <script src="../assets/js/utils.js"></script>
  <script src="../assets/js/jquery-3.2.1.min.js"></script>
  <script src="../assets/js/popper.min.js"></script>
  <script src="../assets/js/bootstrap.min.js"></script>
  <script src="../assets/js/jquery.slimscroll.js"></script>
  <script src="../assets/js/app.js"></script>
  <script>
      ativarMenu('menu-dashboard');


        function getInformacoesDashboard(){


            $.ajax({
                url: '/src/ajax/getInformacoesDashboard.php',
                type: 'POST',
                contentType: 'application/json', // Envia como JSON
                success: function(response) {
                    var dados = JSON.parse(response);

                    document.getElementById('aniversariantes').innerText = dados.informacoesDashboard.aniversariantes;
                    document.getElementById('pacientescadastrados').innerText = dados.informacoesDashboard.total_pacientes;
                    document.getElementById('contasatrasadas').innerText = dados.informacoesDashboard.contas_atrasadas;
                    document.getElementById('orcamentosparaaprovar').innerText = dados.informacoesDashboard.orcamentos;
                    document.getElementById('consultasdodia').innerText = dados.informacoesDashboard.consultas;

                },
            });

        }

        getInformacoesDashboard();

   </script> 

</body>

</html>