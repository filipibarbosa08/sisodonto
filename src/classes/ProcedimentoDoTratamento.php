<?php

class ProcedimentoDoTratamento
{
    private $id, $procedimento, $denteRegiao, $valor, $status, $tratamentoId, $dentistaId;

    // Método para salvar os dados no banco de dados
    public function salvar(array $data)
    {
        require_once __DIR__ . '/../../config/Database.php';
        $dbConnection = Database::conectar();

        $sql = "INSERT INTO procedimentos_do_tratamento (procedimento, dente_regiao, valor, status, tratamento_id, dentista_id) 
                VALUES (:procedimento, :dente_regiao, :valor, :status, :tratamento_id, :dentista_id)";

        $stmt = $dbConnection->prepare($sql);

        $stmt->bindValue(':procedimento', $data['procedimento'] ?? null);
        $stmt->bindValue(':dente_regiao', $data['dente_regiao'] ?? null);
        $stmt->bindValue(':valor', $data['valor'] ?? null);
        $stmt->bindValue(':status', $data['status'] ?? null);
        $stmt->bindValue(':tratamento_id', $data['tratamento_id'], PDO::PARAM_INT);
        $stmt->bindValue(':dentista_id', $data['dentista_id'], PDO::PARAM_INT);

        return $stmt->execute();
    }

    // Método para buscar todos os procedimentos
    public function getAll()
    {
        require_once __DIR__ . '/../../config/Database.php';
        $dbConnection = Database::conectar();

        $stmt = $dbConnection->prepare("SELECT * FROM procedimentos_do_tratamento");
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Método para buscar os procedimentos por tratamento_id
    public function getByTratamentoId($tratamentoId)
    {
        require_once __DIR__ . '/../../config/Database.php';
        $dbConnection = Database::conectar();

        $stmt = $dbConnection->prepare("SELECT * FROM procedimentos_do_tratamento WHERE tratamento_id = :tratamento_id");
        $stmt->bindValue(':tratamento_id', $tratamentoId, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Método para buscar os procedimentos por dentista_id
    public function getByDentistaId($dentistaId)
    {
        require_once __DIR__ . '/../../config/Database.php';
        $dbConnection = Database::conectar();

        $stmt = $dbConnection->prepare("SELECT * FROM procedimentos_do_tratamento WHERE dentista_id = :dentista_id");
        $stmt->bindValue(':dentista_id', $dentistaId, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
