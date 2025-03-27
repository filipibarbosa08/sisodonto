<?php

// Incluindo a classe Anamnese
require_once '../classes/Anamnese.php';

// Instancia a classe Anamnese
$anamnese = new Anamnese();

try {

    $paciente_id = $_POST['paciente_id'];
    $anamnese = $anamnese->getById($paciente_id);

    echo json_encode(['status' => 'success','anamnese' => $anamnese], JSON_UNESCAPED_UNICODE);

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
