<?php

// Incluindo a classe Paciente
require_once '../classes/Tratamento.php';

$data = json_decode(file_get_contents('php://input'), true);


// Instancia a classe Paciente
$tratamento = new Tratamento();

try {

    $tratamentos = $tratamento->getTratamentos($data['paciente_id']);

    echo json_encode(['status' => 'success','tratamentos' => $tratamentos], JSON_UNESCAPED_UNICODE);

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
