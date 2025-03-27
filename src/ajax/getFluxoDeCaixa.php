<?php

try {
        require_once __DIR__ . '/../../config/Database.php';
        $dbConnection = Database::conectar();

        $sql = "SELECT vencimento, descricao, valor, status_pagamento, 'saida' AS tipo
                FROM despesas

                UNION

                SELECT vencimento, CONCAT('Tratamento do paciente: ', nome) AS descricao, valor, status_pagamento, 'entrada' AS tipo
                FROM tratamento
                INNER JOIN parcela ON tratamento.id = parcela.tratamento_id
                INNER JOIN pacientes ON pacientes.id = tratamento.paciente_id
                WHERE orcamento_aprovado = 1;";

        $stmt = $dbConnection->query($sql);
        $fluxodecaixa = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $queries = [
            'receitasprevistas' => "SELECT sum(valor_total) as receitasprevistas from tratamento where orcamento_aprovado = 1",
            'receitas' => "SELECT sum(valor_total) as receitas  from tratamento INNER JOIN parcela ON tratamento.id = parcela.tratamento_id
                            where orcamento_aprovado = 1 and status_pagamento = 1",
            'despesasprevistas' => "select sum(valor) as despesasprevistas from despesas",
            'despesas' => "select sum(valor) as despesas from despesas  where status_pagamento = 1"
        ];
            
            $valores = [];
            
            foreach ($queries as $key => $sql) {
                $stmt = $dbConnection->query($sql);
                $valores[$key] = $stmt->fetchColumn();
            }


        echo json_encode(['status' => 'success','fluxodecaixa' => $fluxodecaixa,'valores' => $valores], JSON_UNESCAPED_UNICODE);

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
