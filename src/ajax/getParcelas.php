<?php

require_once '../classes/Parcela.php';
require_once '../classes/Tratamento.php';

$data = json_decode(file_get_contents('php://input'), true);


$parcela = new Parcela();
$tratamento = new Tratamento();

try {

    $parcelas = $parcela->getParcelas($data['paciente_id']);
    $valorReceber = $tratamento->getValorReceber($data['paciente_id']);
    $valorRecebido = $tratamento->getValorRecebido($data['paciente_id']);

    echo json_encode(['status' => 'success','parcelas' => $parcelas,'valorReceber' => $valorReceber,'valorRecebido' => $valorRecebido], JSON_UNESCAPED_UNICODE);

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
