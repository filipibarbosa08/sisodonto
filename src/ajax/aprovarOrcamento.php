<?php

require_once '../classes/Tratamento.php';

// Ativa a exibição de erros
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Instancia a classe Paciente
$tratamento = new Tratamento();

try {

      $tratamento->aprovarOrcamento($_POST['id']);

        echo json_encode([
            'status' => 'success',
            'message' => 'Orçamento aprovado com sucesso',
        ], JSON_UNESCAPED_UNICODE);
    
} catch (PDOException $e) {
    echo json_encode([
        'status' => 'error',
        'message' => 'Erro de banco de dados. Por favor, tente novamente mais tarde.' . $e->getMessage(),
    ], JSON_UNESCAPED_UNICODE);
} catch (Exception $e) {
    echo json_encode([
        'status' => 'error',
        'message' => 'Ocorreu um erro inesperado. Tente novamente.',
    ], JSON_UNESCAPED_UNICODE);
}
