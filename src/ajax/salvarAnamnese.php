<?php

// Incluindo a classe Paciente
require_once '../classes/Anamnese.php';

// Recebe o JSON enviado via AJAX
$data = json_decode(file_get_contents('php://input'), true);

// Instancia a classe Anamnese
$anamnese = new Anamnese();

try {

    if(empty($anamnese->getById($data['paciente_id']))){

        if ($anamnese->salvar($data)) {
          echo json_encode(['status' => 'success','message' => 'Anamnese salva com sucesso!',], JSON_UNESCAPED_UNICODE);
          exit;
        } 

        echo json_encode(['status' => 'error','message' => 'Ocorreu um erro ao cadastrar a anamnese. Tente novamente.',],JSON_UNESCAPED_UNICODE);

    }

    if ($anamnese->alterar($data)) {
        echo json_encode(['status' => 'success','message' => 'Anamnese alterada com sucesso!',], JSON_UNESCAPED_UNICODE);
        exit;
    } 

    echo json_encode(['status' => 'error','message' => 'Ocorreu um erro ao alterar a anamnese. Tente novamente.',],JSON_UNESCAPED_UNICODE);


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
