<?php

// Incluindo a classe Paciente
require_once '../classes/Paciente.php';

// Instancia a classe Paciente
$paciente = new Paciente();

try {


    $pacienteById = $paciente->getById($_POST['id']);
    $alertas = $paciente->alertas($_POST['id']);
    $alertas = array_map('utf8_encode', $alertas);

    echo json_encode(['status' => 'success','paciente' => $pacienteById,'alertas' => $alertas], JSON_UNESCAPED_UNICODE);

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
