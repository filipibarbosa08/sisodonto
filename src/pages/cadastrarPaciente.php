<!DOCTYPE html>
<html lang="pt-br">

<!-- patients23:17 -->

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
</head>

<body>
    <div class="main-wrapper">

        <?php include 'header.php'; ?>
        <?php include 'sidebar.php'; ?>

        <div class="page-wrapper">
            <div class="content">

                <div class="row">

                    <!-- Modal paciente cadastrado -->
                    <div id="modalRetornoCadastro" class="modal fade delete-modal" role="dialog">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-body text-center">
                                    <h3 id="textoRetornoCadastro"></h3>
                                    <div class="m-t-20">
                                        <a href="#" class="btn btn-white" data-dismiss="modal">Ok</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Formulário cadastrar paciente -->
                    <div class="col-lg-8 offset-lg-2">
                        <form id="cadastrarPaciente" action="" method="POST" enctype="multipart/form-data">
                            <div class="row card-box shadow rounded">

                                <div class="col-sm-12">
                                    <h3 class="page-title">Dados do paciente </h3>
                                </div>

                                <div class="col-lg-12 m-b-20">
                                    <a class="h5 text-primary" data-toggle="collapse" href="#collapsePaciente" role="button"
                                        aria-expanded="false" aria-controls="collapseExample">
                                        <i class="fa fa-caret-down" aria-hidden="true"></i>
                                        Dados pessoais
                                    </a>
                                </div>

                                <div class="col-sm-7 collapse show" id="collapsePaciente">
                                    <div class="form-group">
                                        <label>Nome completo <span class="text-danger">*</span></label>
                                        <div class="input-group has-validation">
                                            <input class="form-control rounded" type="text" id="nome" name="nome" required>
                                            <div class="invalid-feedback">
                                                Obrigatório preencher o nome do paciente.
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-5 collapse show" id="collapsePaciente">
                                    <div class="form-group">
                                        <label>Foto</label>
                                        <div class="profile-upload">
                                            <div class="upload-img">
                                                <img alt="" src="../assets/img/user.jpg">
                                            </div>
                                            <div class="upload-input">
                                                <input type="file" class="form-control rounded" id="foto" name="foto">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-4 collapse show" id="collapsePaciente">
                                    <div class="form-group">
                                        <label>Data de nascimento</label>
                                        <div class="cal-icon">
                                            <input type="text" class="form-control datetimepicker rounded" id="data_nascimento"
                                                name="data_nascimento">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-4 collapse show" id="collapsePaciente">
                                    <div class="form-group gender-selected">
                                        <label class="gen-label">Sexo:</label>
                                        <div class="form-check-inline">
                                            <label class="form-check-label">
                                                <input type="radio" name="sexo" class="form-check-input" value="m" checked>Masculino
                                            </label>
                                        </div>
                                        <div class="form-check-inline">
                                            <label class="form-check-label">
                                                <input type="radio" name="sexo" class="form-check-input" value="f">Feminino
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6 collapse show" id="collapsePaciente">
                                    <div class="form-group">
                                        <label>CPF</label>
                                        <input class="form-control rounded" type="text" id="cpf" name="cpf">
                                    </div>
                                </div>

                                <div class="col-sm-6 collapse show" id="collapsePaciente">
                                    <div class="form-group">
                                        <label>RG</label>
                                        <input class="form-control rounded" type="text" id="rg" name="rg">
                                    </div>
                                </div>

                                <div class="col-sm-12 collapse show" id="collapsePaciente">
                                    <div class="form-group">
                                        <label>Observações</label>
                                        <textarea class="form-control rounded" rows="1" id="observacoes" name="observacoes"></textarea>
                                    </div>
                                </div>

                                <div class="col-lg-12 m-b-20">
                                    <a class="h5 text-primary" data-toggle="collapse" href="#collapseContato" role="button"
                                        aria-expanded="false" aria-controls="collapseExample">
                                        <i class="fa fa-caret-down" aria-hidden="true"></i>
                                        Contato
                                    </a>
                                </div>

                                <div class="col-sm-6 collapse show" id="collapseContato">
                                    <div class="form-group">
                                        <label>Celular<span class="text-danger">*</span></label>
                                        <div class="input-group ">
                                            <input class="form-control rounded telefone" type="text" id="celular"
                                                name="celular" placeholder="(99) 99999-9999">

                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6 collapse show" id="collapseContato">
                                    <div class="form-group">
                                        <label>Telefone</label>
                                        <input class="form-control rounded telefone" type="text" id="telefone"
                                            name="telefone" placeholder="(99) 99999-9999">
                                    </div>
                                </div>

                                <div class="col-sm-12 collapse show" id="collapseContato">
                                    <div class="form-group">
                                        <label>Email </label>
                                        <input class="form-control rounded" type="email" id="email" name="email">
                                    </div>
                                </div>

                                <div class="col-lg-12 m-b-20">
                                    <a class="h5 text-primary" data-toggle="collapse" href="#collapseEndereco" role="button"
                                        aria-expanded="false" aria-controls="collapseExample">
                                        <i class="fa fa-caret-down" aria-hidden="true"></i>
                                        Endereço
                                    </a>
                                </div>

                                <div class="col-sm-3 collapse" id="collapseEndereco">
                                    <div class="form-group">
                                        <label>CEP</label>
                                        <input class="form-control rounded" type="text" id="cep" name="cep">
                                    </div>
                                </div>

                                <div class="col-sm-5 collapse" id="collapseEndereco">
                                    <div class="form-group">
                                        <label>Cidade</label>
                                        <input type="text" class="form-control rounded" id="cidade" name="cidade">
                                    </div>
                                </div>

                                <div class="col-sm-4 collapse" id="collapseEndereco">
                                    <div class="form-group">
                                        <label>Estado</label>
                                        <select class="form-control select rounded" id="estado" name="estado">
                                            <option value="AC">Acre</option>
                                            <option value="AL">Alagoas</option>
                                            <option value="AP">Amapá</option>
                                            <option value="AM">Amazonas</option>
                                            <option value="BA">Bahia</option>
                                            <option value="CE">Ceará</option>
                                            <option value="DF">Distrito Federal</option>
                                            <option value="ES">Espírito Santo</option>
                                            <option value="GO">Goiás</option>
                                            <option value="MA">Maranhão</option>
                                            <option value="MT">Mato Grosso</option>
                                            <option value="MS">Mato Grosso do Sul</option>
                                            <option value="MG">Minas Gerais</option>
                                            <option value="PA">Pará</option>
                                            <option value="PB">Paraíba</option>
                                            <option value="PR">Paraná</option>
                                            <option value="PE">Pernambuco</option>
                                            <option value="PI">Piauí</option>
                                            <option value="RJ">Rio de Janeiro</option>
                                            <option value="RN">Rio Grande do Norte</option>
                                            <option value="RS">Rio Grande do Sul</option>
                                            <option value="RO">Rondônia</option>
                                            <option value="RR">Roraima</option>
                                            <option value="SC">Santa Catarina</option>
                                            <option value="SP">São Paulo</option>
                                            <option value="SE">Sergipe</option>
                                            <option value="TO">Tocantins</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-sm-12 collapse show" id="collapseEndereco">
                                    <div class="form-group">
                                        <label>Rua</label>
                                        <input class="form-control rounded" type="text" id="rua" name="rua">
                                    </div>
                                </div>

                                <div class="col-sm-12 collapse show" id="collapseEndereco">
                                    <div class="form-group">
                                        <label>Complemento</label>
                                        <input class="form-control rounded" type="text" id="complemento"
                                            name="complemento">
                                    </div>
                                </div>

                                <div class="col-sm-3 collapse show" id="collapseEndereco">
                                    <div class="form-group">
                                        <label>Bairro</label>
                                        <input class="form-control rounded" type="text" id="bairro" name="bairro">
                                    </div>
                                </div>

                                <div class="col-sm-3 collapse show" id="collapseEndereco">
                                    <div class="form-group">
                                        <label>Número</label>
                                        <input class="form-control rounded" type="number" id="numero" name="numero">
                                    </div>
                                </div>

                                <div class="col-lg-12 text-center">
                                    <div class="form-group">
                                        <button onclick="cadastrarPaciente()" type="button" id="btnCadastrar" class="btn btn-primary">Cadastrar</button>
                                    </div>
                                </div>

                            </div>
                        </form>
                    </div>

                </div>

            </div>
        </div>

    </div>

    <script src="../assets/js/jquery-3.2.1.min.js"></script>
    <script src="../assets/js/popper.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/js/jquery.slimscroll.js"></script>
    <script src="../assets/js/select2.min.js"></script>
    <script src="../assets/js/moment.min.js"></script>
    <script src="../assets/js/bootstrap-datetimepicker.min.js"></script>
    <script src="../assets/js/app.js"></script>
    <script src="../assets/js/jquery.mask.min.js"></script>

    <script>

        ativarMenu('menu-pacientes');

        function cadastrarPaciente() {
            // Obtém os dados do formulário e converte para JSON
            const form = document.getElementById('cadastrarPaciente');
            const formData = new FormData(form);
            const data = Object.fromEntries(formData.entries());

            $.ajax({
                url: '/src/ajax/cadastrarPaciente.php',
                type: 'POST',
                data: JSON.stringify(data),
                contentType: 'application/json', // Envia como JSON
                success: function(response) {
                    const res = JSON.parse(response);
                    $('#modalRetornoCadastro').modal('show'); // Exibe modal de sucesso
                    document.getElementById('textoRetornoCadastro').innerText = res.message;
                },
            });
        }
    </script>

</body>

</html>