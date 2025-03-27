<!DOCTYPE html>
<html lang="pt-br">

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
    <link href="../assets/fullcalendar/packages/core/main.css" rel="stylesheet" />
    <link href="../assets/fullcalendar/packages/daygrid/main.css" rel="stylesheet" />
    <link href="../assets/fullcalendar/packages/timegrid/main.css" rel="stylesheet" />
    <link href="../assets/fullcalendar/packages/list/main.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">

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
                    <div class="col-sm-8 col-4">
                        <h4 class="page-title">Agenda</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card-box mb-0">
                            <div class="row">
                                <div class="col-md-12">
                                    <div id="calendar"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


  <div class="modal fade" id="marcarConsulta" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <form id="formAgendamento">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detalhes da consulta</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-8">
                        <div class="form-group">
                            <label>Paciente</label>
                            <input class="form-control rounded" type="text" name="nome_paciente" id="nome_paciente" placeholder="Nome do paciente">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Data</label>
                            <input class="form-control rounded text-dark bg-white" id="data_consulta" name="data_consulta" type="text" value="" readonly>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Início</label>
                            <input class="form-control rounded text-dark bg-white" id="data_inicio" name="data_inicio" type="text" readonly value="">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Término</label>
                            <input class="form-control rounded text-dark bg-white" type="text" id="data_fim" name="data_fim" readonly value="">
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group m-b-10">
                            <label>Procedimento</label>
                            <select class="form-control select rounded" id="procedimento" name="procedimento">
                                <option value="Orçamento">Orçamento</option>
                                <option value="Clareamento">Clareamento</option>
                                <option value="Restauração">Restauração</option>
                                <option value="Manutenção">Manutenção</option>
                                <option value="Limpeza">Limpeza</option>
                                <option value="Remoção">Remoção</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Informações complementares</label>
                            <textarea class="form-control rounded" id="informacoes_complementares" name="informacoes_complementares" rows="2"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer d-flex justify-content-center">
                <div class="m-b-20 text-center">
                    <button type="button" class="btn btn-primary submit-btn" onclick="agendarConsulta()">Agendar consulta</button>
                </div>
            </div>
        </div>
      </form>
    </div>
</div>


  <div class="modal fade" id="visualizarConsulta" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <form id="formVisualizarAgendamento">
        <input type="text" id="idagendamento" style="display: none;">

        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detalhes da consulta</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-8">
                        <div class="form-group">
                            <label>Paciente</label>
                            <input disabled="true" class="form-control rounded" type="text" name="pacienteAgendado" id="pacienteAgendado" placeholder="Nome do paciente">
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Data</label>
                            <input disabled="true" class="form-control rounded text-dark bg-white" id="dataConsultaMarcada" name="dataConsultaMarcada" type="text" value="" readonly>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Início</label>
                            <input disabled="true" class="form-control rounded text-dark bg-white" id="inicioConsultaMarcada" name="inicioConsultaMarcada" type="text" readonly value="">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>Término</label>
                            <input disabled="true" class="form-control rounded text-dark bg-white" type="text" id="terminoConsultaMarcada" name="terminoConsultaMarcada" readonly value="">
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group m-b-10">
                            <label> Procedimento</label>
                            <select disabled="true" class="form-control  rounded" id="procedimentoAgendado" name="procedimentoAgendado">
                                <option value="Orçamento">Orçamento</option>
                                <option value="Clareamento">Clareamento</option>
                                <option value="Restauração">Restauração</option>
                                <option value="Manutenção">Manutenção</option>
                                <option value="Limpeza">Limpeza</option>
                                <option value="Remoção">Remoção</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Informações complementares</label>
                            <textarea disabled="true" class="form-control rounded" id="informacoes_complementares_agendamento" name="informacoes_complementares_agendamento" rows="2"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer d-flex justify-content-center">
                <div class="m-b-20 text-center">
                    <button type="button" class="btn btn-primary submit-btn" onclick="excluirAgendamento()">Desmarcar Consulta</button>
                </div>
            </div>
        </div>
      </form>
    </div>
</div>


    <div class="sidebar-overlay" data-reff=""></div>

    <script src="../assets/js/jquery-3.2.1.min.js"></script>
    <script src="../assets/js/popper.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/js/jquery.slimscroll.js"></script>
    <script src="../assets/js/select2.min.js"></script>
    <script src="../assets/js/moment.min.js"></script>
    <script src="../assets/js/jquery-ui.min.html"></script>
    <script src="../assets/js/chosen.jquery.js"></script>
    <script src="../assets/fullcalendar/packages/core/locales/pt-br.js"></script>
    <script src="../assets/fullcalendar/packages/core/main.js"></script>
    <script src="../assets/fullcalendar/packages/interaction/main.js"></script>
    <script src="../assets/fullcalendar/packages/daygrid/main.js"></script>
    <script src="../assets/fullcalendar/packages/timegrid/main.js"></script>
    <script src="../assets/fullcalendar/packages/list/main.js"></script>
    <script src="../assets/js/app.js"></script>
    <script src="../assets/js/utils.js"></script>

    <script>

        ativarMenu('menu-agenda');

        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                slotDuration: '00:15:00',
                minTime: '06:00:00',
                maxTime: '23:30:00',
                defaultView: 'timeGridWeek',
                selectable: true,
                selectMirror: true,
                height: $(window).height() - 200,
                timeFormat: 'HH:mm',
                locale: 'pt-br',
                plugins: ['dayGrid', 'timeGrid', 'list', 'interaction'],
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
                },
                slotLabelFormat: {
                    hour: 'numeric',
                    minute: '2-digit',
                    omitZeroMinute: false,
                    meridiem: 'short'
                },
                defaultDate: new Date().toISOString().split('T')[0],
                navLinks: true,
                editable: true,
                eventLimit: true,
                events: function(fetchInfo, successCallback, failureCallback) {
                    $.ajax({
                        url: '/src/ajax/buscarAgendamentos.php',
                        type: 'POST',
                        dataType: 'json',
                        success: function(response) {
                            // Verifique se 'response.events' existe e é um array
                            if (response.status === 'success' && Array.isArray(response.events)) {
                                var eventos = response.events.map(function(evento) {
                                    return {
                                        id: evento.id,  // Exemplo de ID, ajuste conforme sua lógica
                                        title: evento.title,  // Nome do paciente (assumindo que está em 'title')
                                        start: evento.start,  // Data e hora de início
                                        end: evento.end,      // Data e hora de término
                                          extendedProps: {
                                            procedimento: evento.procedimento,
                                            infocomplementares: evento.informacoes_complementares
                                            //
                                            } 
                                    };
                                });
                                successCallback(eventos);  // Passa os eventos para o callback de sucesso
                            } else {
                                // Se a resposta não for válida, chama o callback de erro
                                failureCallback();
                            }
                        },
                        error: function() {
                            failureCallback();  // Chama o callback de erro em caso de falha
                        }
                    });
                },

                eventClick: function(eventClickInfo) {

                    $('#visualizarConsulta').modal('show');
                    document.getElementById('dataConsultaMarcada').value = eventClickInfo.event.start.toLocaleDateString();
                    document.getElementById('inicioConsultaMarcada').value = eventClickInfo.event.start.toLocaleTimeString();
                    document.getElementById('terminoConsultaMarcada').value = eventClickInfo.event.end.toLocaleTimeString();
                    document.getElementById('pacienteAgendado').value = eventClickInfo.event.title;
                    document.getElementById('procedimentoAgendado').value = eventClickInfo.event.extendedProps.procedimento;
                    document.getElementById('informacoes_complementares_agendamento').value = eventClickInfo.event.extendedProps.infocomplementares;
                    document.getElementById('idagendamento').value = eventClickInfo.event.id;

                    
                },
                select: function(info) {
                    $('#marcarConsulta').modal('show');
                    document.getElementById('data_consulta').value = info.start.toLocaleDateString();
                    document.getElementById('data_inicio').value = info.start.toLocaleTimeString();
                    document.getElementById('data_fim').value = info.end.toLocaleTimeString();
                }
            });
            calendar.render();
        });

        function agendarConsulta(){
            const form = document.getElementById('formAgendamento');
            const formData = new FormData(form);
            const data = Object.fromEntries(formData.entries());
            
            $.ajax({
                url: '/src/ajax/agendamento.php',
                type: 'POST',
                data: JSON.stringify(data),
                contentType: 'application/json', // Envia como JSON
                success: function(response) {
                    const resposta = JSON.parse(response);
                    if(resposta.status == 'success'){
                        alert(resposta.message)
                        location.reload();
                    }
                },
            });

        }

        function excluirAgendamento(){
            $.ajax({
                url: '/src/ajax/excluirAgendamento.php',
                type: 'POST',
                data: { id: document.getElementById('idagendamento').value },
                success: function(response) {
                    const resposta = JSON.parse(response);
                    if(resposta.status == 'success'){
                        alert(resposta.message)
                        location.reload();
                    }
                },
            });
        }

    </script>
</body>

</html>
