<?php
// Inclui a classe Database
require_once __DIR__ . '/../../config/Database.php';

// Inicia a sessão
session_start();

// Verifica se o login e a senha foram enviados via POST
if (isset($_POST['login']) && isset($_POST['senha'])) {
    $login = $_POST['login'];
    $senha = $_POST['senha'];

    try {
        // Obtém a conexão com o banco de dados
        $dbConnection = Database::conectar();

        // Consulta para buscar o usuário com o login fornecido
        $sql = "SELECT * FROM usuarios WHERE login = :login";
        $stmt = $dbConnection->prepare($sql);
        $stmt->bindParam(':login', $login);
        $stmt->execute();

        // Verifica se o usuário foi encontrado
        if ($stmt->rowCount() > 0) {
            
            // Obtém o usuário e a senha criptografada
            $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

            // Verifica se a senha fornecida corresponde à senha criptografada
            if (password_verify($senha, $usuario['senha'])) {
                // A senha é válida, então armazene os dados do usuário na sessão
                $_SESSION['user'] = $usuario['login'];

                // Retorna uma resposta de sucesso
                echo json_encode(['status' => 'success', 'message' => 'Login bem-sucedido.'], JSON_UNESCAPED_UNICODE);
            } else {
                // A senha não é válida
                echo json_encode(['status' => 'error', 'message' => 'Senha inválida.'], JSON_UNESCAPED_UNICODE);
            }
        } else {
            // Usuário não encontrado
            echo json_encode(['status' => 'error', 'message' => 'Usuário não encontrado.'], JSON_UNESCAPED_UNICODE);
        }
    } catch (Exception $e) {
        // Em caso de erro na conexão com o banco
        echo json_encode(['status' => 'error', 'message' => 'Erro ao conectar ao banco de dados: ' . $e->getMessage()], JSON_UNESCAPED_UNICODE);
    }
} else {
    // Se o login ou a senha não forem enviados
    echo json_encode(['status' => 'error', 'message' => 'Login e senha são obrigatórios.'], JSON_UNESCAPED_UNICODE);
}
?>
