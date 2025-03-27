<?php

class Parcela
{
    private $id, $valor, $vencimento, $statusPagamento, $tratamentoId;

    // Método para salvar uma nova parcela no banco de dados
    public function salvar(array $data)
    {
        require_once __DIR__ . '/../../config/Database.php';
        $dbConnection = Database::conectar();

        $sql = "INSERT INTO parcela (valor, vencimento, status_pagamento, tratamento_id) 
                VALUES (:valor, :vencimento, :status_pagamento, :tratamento_id)";

        $stmt = $dbConnection->prepare($sql);
        
        $stmt->bindValue(':valor', $data['valor'], PDO::PARAM_STR);
        $stmt->bindValue(':vencimento', $data['vencimento'], PDO::PARAM_STR);
        $stmt->bindValue(':status_pagamento', $data['status_pagamento'] ?? 'pendente', PDO::PARAM_STR);
        $stmt->bindValue(':tratamento_id', $data['tratamento_id'], PDO::PARAM_INT);

        $stmt->execute();

        return $dbConnection->lastInsertId();
    }

    // Método para buscar todas as parcelas de um tratamento específico
    public function getParcelas($paciente_id)
    {
        require_once __DIR__ . '/../../config/Database.php';
        $dbConnection = Database::conectar();

        $stmt = $dbConnection->prepare("SELECT parcela.* from parcela
                                        inner join tratamento on tratamento_id = tratamento.id
                                        where paciente_id = :paciente_id
                                        ;");
        $stmt->bindValue(':paciente_id', $paciente_id, PDO::PARAM_INT);
        $stmt->execute();
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Método para atualizar o status de pagamento de uma parcela
    public function atualizarStatus($id, $status)
    {
        require_once __DIR__ . '/../../config/Database.php';
        $dbConnection = Database::conectar();

        $stmt = $dbConnection->prepare("UPDATE parcela SET status_pagamento = :status_pagamento WHERE id = :id");
        $stmt->bindValue(':status_pagamento', $status, PDO::PARAM_STR);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);

        return $stmt->execute();
    }
}
