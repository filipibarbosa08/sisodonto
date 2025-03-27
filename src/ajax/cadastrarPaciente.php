<?php

// Incluindo a classe Paciente
require_once '../classes/Paciente.php';

// Define os campos obrigatórios
$requiredFields = ['nome', 'cpf'];

// Recebe o JSON enviado via AJAX
$data = json_decode(file_get_contents('php://input'), true);

// Filtrar os campos obrigatórios
$errors = array_filter($requiredFields, fn($field) => empty($data[$field]));

if ($errors) {
    echo json_encode([
        'status' => 'error',
        'message' => 'Campos obrigatórios não preenchidos: ' . implode(', ', $errors),
    ], JSON_UNESCAPED_UNICODE);
    exit;
}

// Instancia a classe Paciente
$paciente = new Paciente();

try {
    // Salva o paciente usando o array de dados
    if ($paciente->salvar($data)) {
        echo json_encode([
            'status' => 'success',
            'message' => 'Paciente cadastrado com sucesso!',
        ], JSON_UNESCAPED_UNICODE);
    } else {
        echo json_encode([
            'status' => 'error',
            'message' => 'Ocorreu um erro ao cadastrar o paciente. Tente novamente.',
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
