<?php

// Incluindo a classe Agendamento
require_once '../classes/Agendamento.php';


// Recebe o JSON enviado via AJAX
$data = json_decode(file_get_contents('php://input'), true);

// Instancia a classe Agendamento
$agendamento = new Agendamento();

try {
    // Salva o paciente usando o array de dados
    if ($agendamento->salvar($data)) {
        echo json_encode([
            'status' => 'success',
            'message' => 'Agendamento salvo com sucesso!',
        ], JSON_UNESCAPED_UNICODE);
    } else {
        echo json_encode([
            'status' => 'error',
            'message' => 'Ocorreu um erro ao salvar o agendamento. Tente novamente.',
        ], JSON_UNESCAPED_UNICODE);
    }
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
