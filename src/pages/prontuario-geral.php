<form id="formProntuarioGeral">
    <div class="card-box profile-header">
        <div class="row">
            <div class="col-md-12">
                <div class="profile-view">
                    <div class="profile-img-wrap">
                        <div class="profile-img">
                            <a>
                                <img class="avatar" src="../assets/img/user.jpg" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="profile-basic">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="profile-info-left">
                                    <h3 class="user-name m-t-0 mb-0" id="nome">
                                    </h3>
                                    <small class="text-muted">Entrar em contato:</small>
                                    <div>
                                        <a href="https://api.whatsapp.com/send?phone=+55 38 999529263&text=sua%20mensagem" target="_blank" class="btn btn-success">
                                            <i class="fab fa-whatsapp"></i> WhatsApp
                                        </a>
                                        <a target="_blank" class="btn btn-primary">
                                            <i class="fas fa-sms"></i> SMS
                                        </a>
                                    </div>
                                    <div class="staff-msg msg_paciente">
                                           <span id="alertas" class="d-inline-block " tabindex="0" data-toggle="tooltip" title="" data-original-title="">
                                            <button class="btn btn-warning text-dark" href="anamnese" style="pointer-events: none;" type="button">
                                                <span class="badge badge-pill bg-danger float-left text-white" id="quantidadealertas"></span> Alertas de saúde
                                            </button>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-7">
                                <ul class="personal-info">
                                    <li>
                                        <span class="title">Telefone:</span>
                                        <span class="text" id="telefone">
                                        </span>
                                    </li>
                                    <li>
                                        <span class="title">E-mail:</span>
                                        <span class="text" id="email">
                                        </span>
                                    </li>
                                    <li>
                                        <span class="title">Idade:</span>
                                        <span class="text" id="idade">
                                        </span>
                                    </li>
                                    <li>
                                        <span class="title">Aniversário:</span>
                                        <span class="text" id="aniversario">

                                        </span>
                                    </li>
                                    <li>
                                        <span class="title">Sexo:</span>
                                        <span class="text" id="sexo">
                                        </span>
                                    </li>
                                    <li>
                                        <span class="title">Débito(s) em atraso:</span>
                                        <span class="text text-danger" id="debitos">- - - -</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

                <div class="row m-t-10">
                <div class="col-md-12">
                    <div class="card-box ">
                        <h3 class="card-title">Linha do tempo do paciente:</h3>
                        <div class="experience-box">
                            <ul class="experience-list">

                            </ul>
                        </div>
                    </div>

                </div>
            </div>


</form>
