<?php

class Tratamento
{
    private $id, $descricao, $dataOrcamento, $dataAprovacao, $valorTotal, $valorParcelas, $orcamentoAprovado, $parcelas, $pacienteId;

    // Método para salvar os dados no banco de dados
    public function salvar(array $data)
    {
        require_once __DIR__ . '/../../config/Database.php';
        $dbConnection = Database::conectar();

        $sql = "INSERT INTO tratamento (descricao, data_orcamento, data_aprovacao, valor_total, valor_parcelas, orcamento_aprovado, parcelas, paciente_id) 
                VALUES (:descricao, :data_orcamento, :data_aprovacao, :valor_total, :valor_parcelas, :orcamento_aprovado, :parcelas, :paciente_id)";

        $stmt = $dbConnection->prepare($sql);
        
        $stmt->bindValue(':descricao', $data['descricao'] ?? null);
        $stmt->bindValue(':data_orcamento', $data['data_orcamento'] ?? null);
        $stmt->bindValue(':data_aprovacao', $data['data_aprovacao'] ?? null);
        $stmt->bindValue(':valor_total', $data['valor_total'] ?? null);
        $stmt->bindValue(':valor_parcelas', $data['valor_parcelas'] ?? null);
        $stmt->bindValue(':orcamento_aprovado', $data['orcamento_aprovado'] ?? null, PDO::PARAM_BOOL);
        $stmt->bindValue(':parcelas', $data['parcelas'] ?? null, PDO::PARAM_INT);
        $stmt->bindValue(':paciente_id', $data['paciente_id'], PDO::PARAM_INT);

        $stmt->execute();

        return $dbConnection->lastInsertId();

    }

    public function getOrcamentos($paciente_id)
    {
        require_once __DIR__ . '/../../config/Database.php';
        $dbConnection = Database::conectar();

        $stmt = $dbConnection->prepare("SELECT * FROM tratamento WHERE paciente_id = :paciente_id");
        $stmt->bindValue(':paciente_id', $paciente_id, PDO::PARAM_INT);
        $stmt->execute();
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getValorReceber($paciente_id){
        require_once __DIR__ . '/../../config/Database.php';
        $dbConnection = Database::conectar();

        $stmt = $dbConnection->prepare("SELECT SUM(valor_total) AS valorreceber FROM tratamento WHERE paciente_id = :paciente_id AND orcamento_aprovado = 1");
        $stmt->bindValue(':paciente_id', $paciente_id, PDO::PARAM_INT);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['valorreceber'] ?? 0; // Retorna o valor ou 0 caso não haja resultado
    }

    public function getValorRecebido($paciente_id){

            require_once __DIR__ . '/../../config/Database.php';
        $dbConnection = Database::conectar();

        $stmt = $dbConnection->prepare("SELECT sum(valor_total) as valorrecebido from tratamento
                                        inner join parcela on tratamento.id = parcela.tratamento_id 
                                        where paciente_id = :paciente_id and status_pagamento = 1 and orcamento_aprovado = 1");
        $stmt->bindValue(':paciente_id', $paciente_id, PDO::PARAM_INT);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['valorrecebido'] ?? 0; // Retorna o valor ou 0 caso não haja resultado
    

    }


    // Método para buscar todos os tratamentos
    public function getTratamentos($paciente_id)
    {
        require_once __DIR__ . '/../../config/Database.php';
        $dbConnection = Database::conectar();

        $stmt = $dbConnection->prepare("SELECT * FROM tratamento WHERE paciente_id = :paciente_id and orcamento_aprovado = 1");
        $stmt->bindValue(':paciente_id', $paciente_id, PDO::PARAM_INT);
        $stmt->execute();
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function aprovarOrcamento($idTratamento){
        require_once __DIR__ . '/../../config/Database.php';
        $dbConnection = Database::conectar();

        $stmt = $dbConnection->prepare("UPDATE tratamento SET orcamento_aprovado = 1, data_aprovacao = CURDATE() WHERE id = :id");
        $stmt->bindParam(':id', $idTratamento, PDO::PARAM_INT);
        $stmt->execute();
    }

    public function visualizarOrcamento($tratamento_id)
    {
        require_once __DIR__ . '/../../config/Database.php';
        $dbConnection = Database::conectar();

        $stmt = $dbConnection->prepare("select * from tratamento
        inner join procedimentos_do_tratamento on tratamento.id = procedimentos_do_tratamento.tratamento_id
        where tratamento_id = :tratamento_id");
        $stmt->bindValue(':tratamento_id', $tratamento_id, PDO::PARAM_INT);
        $stmt->execute();
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function visualizarTratamento($tratamento_id)
    {
        require_once __DIR__ . '/../../config/Database.php';
        $dbConnection = Database::conectar();

        $stmt = $dbConnection->prepare("select *, tratamento.id as idtratamento from tratamento
        inner join procedimentos_do_tratamento on tratamento.id = procedimentos_do_tratamento.tratamento_id
        where tratamento_id = :tratamento_id");
        $stmt->bindValue(':tratamento_id', $tratamento_id, PDO::PARAM_INT);
        $stmt->execute();
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function excluirOrcamento($tratamento_id)
    {
        require_once __DIR__ . '/../../config/Database.php';
        $dbConnection = Database::conectar();

        // Deleta os registros da tabela procedimentos_do_tratamento vinculados ao tratamento
        $stmt = $dbConnection->prepare("DELETE FROM procedimentos_do_tratamento WHERE tratamento_id = :tratamento_id");
        $stmt->bindValue(':tratamento_id', $tratamento_id, PDO::PARAM_INT);
        $stmt->execute();

        // Deleta o orçamento (tratamento) principal
        $stmt = $dbConnection->prepare("DELETE FROM tratamento WHERE id = :tratamento_id");
        $stmt->bindValue(':tratamento_id', $tratamento_id, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->rowCount(); // Retorna o número de linhas afetadas
    }

    public function salvarEvolucao($idTratamento, $evolucao,$finalizarTratamento){
        require_once __DIR__ . '/../../config/Database.php';
        $dbConnection = Database::conectar();

        // Atualizar o tratamento com a evolução
        $stmt = $dbConnection->prepare("UPDATE tratamento SET evolucao = :evolucao WHERE id = :id");
        $stmt->bindParam(':id', $idTratamento, PDO::PARAM_INT);
        $stmt->bindParam(':evolucao', $evolucao, PDO::PARAM_STR); // Para texto
        $stmt->execute();

        
    // Se finalizarTratamento for verdadeiro, atualizar os campos tratamento_finalizado e data_finalizacao
    if ($finalizarTratamento) {
        $stmt = $dbConnection->prepare("UPDATE tratamento SET tratamento_finalizado = 1, data_finalizacao = CURDATE() WHERE id = :id");
        $stmt->bindParam(':id', $idTratamento, PDO::PARAM_INT);
        $stmt->execute();
    }
    }

}
