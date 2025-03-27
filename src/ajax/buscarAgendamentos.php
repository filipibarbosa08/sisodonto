<?php

// Incluindo a classe Agendamento
require_once '../classes/Agendamento.php';

// Instancia a classe Paciente
$agendamento = new Agendamento();

try {

    $agendamentos = $agendamento->getAll();

// Formatação dos agendamentos para o formato de evento
$eventos = array_map(function($agendamento) {
    return [
        'id' => $agendamento['id'],  // Incluindo o 'id' do banco
        'title' => $agendamento['nome_paciente'],  // Nome do paciente
        'start' => $agendamento['data_inicio'],    // Data e hora de início
        'end' => $agendamento['data_fim'],         // Data e hora de término
        'procedimento' => $agendamento['procedimento'],
        'informacoes_complementares' => $agendamento['informacoes_complementares'],  // Procedimento ou outro detalhe relevante
    ];
}, $agendamentos);


// Retorno da resposta em JSON
echo json_encode([
    'status' => 'success',
    'events' => $eventos,  // A chave 'events' agora contém o array de eventos
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
