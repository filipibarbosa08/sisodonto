<?php

try {
        require_once __DIR__ . '/../../config/Database.php';
        $dbConnection = Database::conectar();


          $queries = [
                'total_pacientes' => "SELECT COUNT(*) AS total_pacientes FROM pacientes",
                'contas_atrasadas' => "SELECT COUNT(*) AS contas_atrasadas FROM parcela WHERE status_pagamento = 0 AND vencimento > CURDATE()",
                'orcamentos' => "SELECT COUNT(*) AS orcamentos FROM tratamento WHERE orcamento_aprovado = 0",
                'aniversariantes' => "SELECT COUNT(*) AS aniversariantes FROM pacientes WHERE data_nascimento = CURDATE()",
                'consultas' => "SELECT COUNT(*) AS consultas FROM agendamentos WHERE DATE(data_inicio) = CURDATE()"
            ];
            
            $informacoesDashboard = [];
            
            foreach ($queries as $key => $sql) {
                $stmt = $dbConnection->query($sql);
                $informacoesDashboard[$key] = $stmt->fetchColumn();
            }
            

            echo json_encode(['status' => 'success','informacoesDashboard' => $informacoesDashboard], JSON_UNESCAPED_UNICODE);

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
