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
                        <h4 class="page-title">Prontuário</h4>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="card-box">
                            <ul class="nav nav-tabs nav-tabs-top">
                                <li class="nav-item"><a class="nav-link active" href="#prontuario-geral" data-toggle="tab">Geral</a></li>
                                <li class="nav-item"><a class="nav-link" href="#prontuario-dadoscadastrais" data-toggle="tab">Dados Cadastrais</a></li>
                                <li class="nav-item"><a class="nav-link" href="#prontuario-anamnese" data-toggle="tab">Anamnese</a></li>
                                <li class="nav-item"><a class="nav-link" href="#prontuario-orcamentos" data-toggle="tab">Orçamentos</a></li>
                                <li class="nav-item"><a class="nav-link" href="#prontuario-tratamentos" data-toggle="tab">Tratamentos</a></li>
                                <li class="nav-item"><a class="nav-link" href="#prontuario-financeiro" data-toggle="tab">Financeiro</a></li>
                                <li class="nav-item"><a class="nav-link" href="#prontuario-atestado" data-toggle="tab">Atestado</a></li>
                                <li class="nav-item"><a class="nav-link" href="#prontuario-receituario" data-toggle="tab">Receituário</a></li>
                                <li class="nav-item"><a class="nav-link" href="#prontuario-galeria" data-toggle="tab">Galeria</a></li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane show active" id="prontuario-geral">
                                    <?php include 'prontuario-geral.php'; ?>
                                </div>
                                <div class="tab-pane" id="prontuario-dadoscadastrais">
                                    <?php include 'prontuario-dadoscadastrais.php'; ?>
                                </div>
                                <div class="tab-pane" id="prontuario-anamnese">
                                    <?php include 'prontuario-anamnese.php'; ?>
                                </div>
                                <div class="tab-pane" id="prontuario-orcamentos">
                                    <?php include 'prontuario-orcamentos.php'; ?>
                                </div>
                                <div class="tab-pane" id="prontuario-tratamentos">
                                    <?php include 'prontuario_tratamentos.php'; ?>
                                </div>
                                <div class="tab-pane" id="prontuario-financeiro">
                                    <?php include 'prontuario_financeiro.php'; ?>
                                </div>
                                <div class="tab-pane" id="prontuario-atestado">
                                    <?php include 'prontuario_atestado.php'; ?>
                                </div>
                                <div class="tab-pane" id="prontuario-receituario">
                                    <?php include 'prontuario_receituario.php'; ?>
                                </div>
                                <div class="tab-pane" id="prontuario-galeria">
                                    <?php include 'prontuario_galeria.php'; ?>
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

        ativarMenu('menu-pacientes');

        params = new URLSearchParams(window.location.search);
        id = params.get('id');

        $.ajax({
            url: '/src/ajax/pacienteGetById.php',
            type: 'POST',
            data: { id: id},
            success: function(response) {
                var response = JSON.parse(response);

                if (response.status === 'success') {
                    paciente = response.paciente;
                    alertas = response.alertas;
                    preencheDadosGerais(paciente,alertas);
                    preencheDadosCadastrais(paciente);
                    preencherLinhadoTempo();

                }
            },
        });

        function preencheDadosGerais(paciente,alertas){

            document.querySelector("#formProntuarioGeral #nome").innerText = paciente.nome || "-";
            document.querySelector("#formProntuarioGeral #telefone").innerText = paciente.telefone || "-";
            document.querySelector("#formProntuarioGeral #email").innerText = paciente.email || "-";
            document.querySelector("#formProntuarioGeral #idade").innerText = paciente.idade || "-";
            document.querySelector("#formProntuarioGeral #aniversario").innerText = paciente.aniversario || "-";
            document.querySelector("#formProntuarioGeral #sexo").innerText = paciente.sexo_formatado || "-";
            document.querySelector("#formProntuarioGeral #debitos").innerText = "R$ " + paciente.debitos || "-";

            let alertasConcatenados = [
                alertas.doencas_sistemicas_status,
                alertas.doencas_transmissiveis_status,
                alertas.alergia_medicamentos_status,
                alertas.condicao_alergica_status
            ]
            .filter(item => item && item.trim() !== "") // Filtra os valores vazios ou nulos
            .join(", "); // Junta os valores com vírgula

            let quantidadeAlertas = [
                alertas.doencas_sistemicas_status,
                alertas.doencas_transmissiveis_status,
                alertas.alergia_medicamentos_status,
                alertas.condicao_alergica_status
            ].filter(item => item && item.trim() !== "").length;


            // Selecione o elemento pelo ID
            let alertaElement = document.getElementById('alertas');

            // Defina o valor do atributo 'data-original-title'
            alertaElement.setAttribute('data-original-title', alertasConcatenados);

            // Atualize o tooltip (caso o tooltip esteja sendo usado com o Bootstrap, por exemplo)
            $(alertaElement).tooltip('update');

           document.querySelector("#formProntuarioGeral #quantidadealertas").innerText = quantidadeAlertas;

            
        }

        function preencheDadosCadastrais(paciente){
            document.querySelector("#formProntuarioDadosCadastrais #nome").value = paciente.nome;
            document.querySelector("#formProntuarioDadosCadastrais #data_nascimento").value = paciente.data_nascimento;
            document.querySelector("#formProntuarioDadosCadastrais #sexo").value = paciente.sexo;
            document.querySelector("#formProntuarioDadosCadastrais #cpf").value = paciente.cpf;
            document.querySelector("#formProntuarioDadosCadastrais #rg").value = paciente.rg;
            document.querySelector("#formProntuarioDadosCadastrais #observacoes").value = paciente.observacoes;
            document.querySelector("#formProntuarioDadosCadastrais #celular").value = paciente.celular;
            document.querySelector("#formProntuarioDadosCadastrais #telefone").value = paciente.telefone;
            document.querySelector("#formProntuarioDadosCadastrais #email").value = paciente.email;
            document.querySelector("#formProntuarioDadosCadastrais #rua").value = paciente.rua;
            document.querySelector("#formProntuarioDadosCadastrais #complemento").value = paciente.complemento;
            document.querySelector("#formProntuarioDadosCadastrais #bairro").value = paciente.bairro;
            document.querySelector("#formProntuarioDadosCadastrais #numero").value = paciente.numero;

        }

        function preencherLinhadoTempo(){

$.ajax({
    url: '/src/ajax/getTratamentos.php',
    type: 'POST',
    data: JSON.stringify({ paciente_id: id }),
    contentType: 'application/json', // Envia como JSON
    success: function(response) {
        var response = JSON.parse(response);
        var dados = response.tratamentos;
        var eventos = []; // Array para armazenar os eventos

        // Verifica os campos e adiciona os eventos ao array
        dados.forEach(function(item) {
            if (item.data_orcamento) {
                eventos.push({
                    titulo: "Orçamento realizado em:",
                    data: item.data_orcamento
                });
            }
            if (item.data_aprovacao) {
                eventos.push({
                    titulo: "Orçamento aprovado em:",
                    data: item.data_aprovacao
                });
            }
            if (item.data_finalizacao) {
                eventos.push({
                    titulo: "Tratamento Finalizado em:",
                    data: item.data_finalizacao
                });
            }
        });

        // Adiciona os eventos na linha do tempo no HTML
        const lista = document.querySelector(".experience-list");
        lista.innerHTML = ""; // Limpa a lista antes de adicionar novos itens

        eventos.forEach(evento => {
            const li = document.createElement("li");
            li.innerHTML = `
                <div class="experience-user">
                    <div class="before-circle"></div>
                </div>
                <div class="experience-content">
                    <div class="timeline-content">
                        <a href="#/" class="name">${evento.titulo}</a>
                        <div></div>
                        <span class="time">${evento.data}</span>
                    </div>
                </div>
            `;
            lista.appendChild(li);
        });
    }
});

}
    </script>

</body>

<!-- patients23:19-->

</html>