<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="../assets/images/icon_odonto.ico">
    <title>SisOdonto</title>

    <!-- Arquivos de estilo -->
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">

</head>

<body>
    <div class="main-wrapper account-wrapper">
        <div class="account-page">
            <div class="account-center">
                <div class="account-box">
                    <form id="loginForm" class="form-signin">
                        <div class="account-logo">
                            <a><img src="assets/img/icon_odonto.ico" alt=""></a>
                        </div>

                        <div class="form-group">
                            <label>Usuário</label>
                            <input name="usuario" id="usuario" type="text" autofocus="" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Senha</label>
                            <input name="senha" id="senha" type="password" class="form-control">
                        </div>
                        <div class="form-group text-right">
                            <a href="forgot-password.html">Esqueceu sua senha?</a>
                        </div>
                        <div class="form-group text-center">
                            <button type="button" class="btn btn-primary account-btn" id="loginButton">Login</button>
                        </div>
                        <div class="text-center register-link">
                            Não possui uma conta? <a href="register.html">Registrar agora</a>
                        </div>
                    </form>
                    <div class="alert alert-danger mt-5" role="alert" id="errorMessage" style="display: none;"></div>
                </div>
            </div>
        </div>
    </div>

    <script src="../assets/js/jquery-3.2.1.min.js"></script>
    <script src="../assets/js/popper.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/js/app.js"></script>

    <script>
        $(document).ready(function() {
            $('#loginButton').click(function() {
                // Obtém os dados do formulário
                var login = $('#usuario').val();
                var senha = $('#senha').val();

                if (usuario != "" && senha != "") {
                    $.ajax({
                        url: '/src/ajax/login.php',
                        type: 'POST',
                        data: { login: login, senha: senha },
                        success: function(response) {
                            var response = JSON.parse(response);

                            if (response.status === 'success') {
                                window.location.href = '../index.php?page=dashboard'; 
                            } else {
                                $('#errorMessage').show().text(response.message); // Exibe a mensagem de erro
                            }
                        },
                    });
                } else {
                    $('#errorMessage').show().text('Por favor, preencha todos os campos.');
                }
            });
        });
    </script>

</body>

</html>
