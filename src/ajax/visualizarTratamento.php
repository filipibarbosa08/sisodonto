<?php

// Incluindo a classe Paciente
require_once '../classes/Tratamento.php';

// Instancia a classe Paciente
$tratamento = new Tratamento();

try {


    $dadosTratamento = $tratamento->visualizarTratamento($_POST['id']);

    echo json_encode(['status' => 'success','dadosTratamento' => $dadosTratamento], JSON_UNESCAPED_UNICODE);

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
