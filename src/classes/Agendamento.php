<?php


class Agendamento
{
    private $id, $nome_paciente, $procedimento, $data_inicio, $data_fim, $informacoes_complementares;

    public function salvar(array $data)
    {
        require_once __DIR__ . '/../../config/Database.php';
        $dbConnection = Database::conectar();

        $data['data_consulta'] = implode('-', array_reverse(explode('/', $data['data_consulta'])));
        $data['data_inicio'] = $data['data_consulta'] . ' ' . $data['data_inicio'];
        $data['data_fim'] = $data['data_consulta'] . ' ' . $data['data_fim'];
        unset($data['data_consulta']);

        $sql = "INSERT INTO agendamentos (nome_paciente, procedimento, data_inicio, data_fim, informacoes_complementares)
                VALUES (:nome_paciente, :procedimento, :data_inicio, :data_fim, :informacoes_complementares)";

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

        $sql = "SELECT * FROM agendamentos";
        $stmt = $dbConnection->prepare($sql);

        $stmt->execute();
        
        // Retorna todos os pacientes como um array associativo
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function excluirAgendamento($id)
    {
        require_once __DIR__ . '/../../config/Database.php';
        $dbConnection = Database::conectar();

        $stmt = $dbConnection->prepare("DELETE FROM agendamentos WHERE id = :id");
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->rowCount(); // Retorna o número de linhas afetadas
    }


}
