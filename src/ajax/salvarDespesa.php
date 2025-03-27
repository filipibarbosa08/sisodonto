<?php

require_once '../classes/Despesa.php';

// Recebe o JSON enviado via AJAX
$data = json_decode(file_get_contents('php://input'), true);

$despesa = new Despesa();

try {

    $despesa->salvar($data);
        echo json_encode([
            'status' => 'success',
            'message' => 'Despesa salvo com sucesso!',
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
