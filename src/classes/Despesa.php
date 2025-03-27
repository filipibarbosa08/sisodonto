<?php

class Despesa
{
    private $id, $descricao, $valor, $vencimento, $categoria, $status_pagamento, $comprovante;

    public function salvar(array $data)
    {
        require_once __DIR__ . '/../../config/Database.php';
        $dbConnection = Database::conectar();

        $sql = "INSERT INTO despesas (descricao, valor, vencimento, categoria, status_pagamento)
                VALUES (:descricao, :valor, :vencimento, :categoria, :status_pagamento)";

        $stmt = $dbConnection->prepare($sql);

        foreach ($data as $key => $value) {
            $stmt->bindValue(':' . $key, $value ?? null);
        }

        return $stmt->execute();
    }

    public function getAll()
    {
        require_once __DIR__ . '/../../config/Database.php';
        $dbConnection = Database::conectar();

        $stmt = $dbConnection->prepare("SELECT * FROM despesas");
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}

?>
