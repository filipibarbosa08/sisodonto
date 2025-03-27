<?php

class Pagamento
{
    private $id, $formaPagamento, $dataRecebimento, $parcelaId;

    // Método para salvar um novo pagamento no banco de dados
    public function salvar(array $data)
    {
        require_once __DIR__ . '/../../config/Database.php';
        $dbConnection = Database::conectar();

        $sql = "INSERT INTO pagamento (forma_pagamento, data_recebimento, parcela_id) 
                VALUES (:forma_pagamento, :data_recebimento, :parcela_id)";

        $stmt = $dbConnection->prepare($sql);
        
        $stmt->bindValue(':forma_pagamento', $data['forma_pagamento'], PDO::PARAM_STR);
        $stmt->bindValue(':data_recebimento', $data['data_recebimento'], PDO::PARAM_STR);
        $stmt->bindValue(':parcela_id', $data['parcela_id'], PDO::PARAM_INT);

        $stmt->execute();


        // Atualizar o status de pagamento da parcela
        $sqlUpdateParcela = "UPDATE parcela SET status_pagamento = 1 WHERE id = :parcela_id";
        $stmtUpdate = $dbConnection->prepare($sqlUpdateParcela);
        $stmtUpdate->bindValue(':parcela_id', $data['parcela_id'], PDO::PARAM_INT);
        $stmtUpdate->execute();


        return $dbConnection->lastInsertId();
    }

}
?>
