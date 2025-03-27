<?php

class Paciente
{
    private $id, $nome, $foto, $dataNascimento, $sexo, $cpf, $observacoes, $celular, $telefone, $email, $cep, $cidade, $estado, $endereco, $numero, $complemento, $bairro, $nomeResponsavel, $dataNascimentoResponsavel, $cpfResponsavel;


    // Método para salvar os dados no banco de dados
    public function salvar(array $data)
    {
        require_once __DIR__ . '/../../config/Database.php';
        $dbConnection = Database::conectar();

        $sql = "INSERT INTO pacientes (nome, foto, data_nascimento, sexo, cpf, observacoes, celular, telefone, email, 
                cep, cidade, estado, rua, numero, complemento, bairro)
                VALUES (:nome, :foto, :data_nascimento, :sexo, :cpf, :observacoes, :celular, :telefone, :email, :cep, :cidade, :estado, 
                        :rua, :numero, :complemento, :bairro)";

        $stmt = $dbConnection->prepare($sql);

        // Definindo cada valor manualmente
        $stmt->bindValue(':nome', $data['nome'] ?? null);
        $stmt->bindValue(':foto', $data['foto'] ?? null);
        $stmt->bindValue(':data_nascimento', isset($data['data_nascimento']) ? DateTime::createFromFormat('d/m/Y', $data['data_nascimento'])->format('Y-m-d') : null);
        $stmt->bindValue(':sexo', $data['sexo'] ?? null);
        $stmt->bindValue(':cpf', $data['cpf'] ?? null);
        $stmt->bindValue(':observacoes', $data['observacoes'] ?? null);
        $stmt->bindValue(':celular', $data['celular'] ?? null);
        $stmt->bindValue(':telefone', $data['telefone'] ?? null);
        $stmt->bindValue(':email', $data['email'] ?? null);
        $stmt->bindValue(':cep', $data['cep'] ?? null);
        $stmt->bindValue(':cidade', $data['cidade'] ?? null);
        $stmt->bindValue(':estado', $data['estado'] ?? null);
        $stmt->bindValue(':rua', $data['rua'] ?? null);
        $stmt->bindValue(':numero', $data['numero'] ?? null);
        $stmt->bindValue(':complemento', $data['complemento'] ?? null);
        $stmt->bindValue(':bairro', $data['bairro'] ?? null);

        return $stmt->execute();
    }

    // Método para alterar os dados do paciente no banco de dados
public function alterar(array $data)
{
        require_once __DIR__ . '/../../config/Database.php';
        $dbConnection = Database::conectar();

        // Atualizar os dados do paciente
        $sql = "UPDATE pacientes 
            SET nome = :nome, 
                foto = :foto, 
                data_nascimento = :data_nascimento, 
                sexo = :sexo, 
                cpf = :cpf, 
                observacoes = :observacoes, 
                celular = :celular, 
                telefone = :telefone, 
                email = :email, 
                cep = :cep, 
                cidade = :cidade, 
                estado = :estado, 
                rua = :rua, 
                numero = :numero, 
                complemento = :complemento, 
                bairro = :bairro 
            WHERE id = :id";

        $stmt = $dbConnection->prepare($sql);

        // Definindo cada valor manualmente
        $stmt->bindValue(':nome', $data['nome'] ?? null);
        $stmt->bindValue(':foto', $data['foto'] ?? null);
        $stmt->bindValue(':data_nascimento', isset($data['data_nascimento']) ? DateTime::createFromFormat('d/m/Y', $data['data_nascimento'])->format('Y-m-d') : null);
        $stmt->bindValue(':sexo', $data['sexo'] ?? null);
        $stmt->bindValue(':cpf', $data['cpf'] ?? null);
        $stmt->bindValue(':observacoes', $data['observacoes'] ?? null);
        $stmt->bindValue(':celular', $data['celular'] ?? null);
        $stmt->bindValue(':telefone', $data['telefone'] ?? null);
        $stmt->bindValue(':email', $data['email'] ?? null);
        $stmt->bindValue(':cep', $data['cep'] ?? null);
        $stmt->bindValue(':cidade', $data['cidade'] ?? null);
        $stmt->bindValue(':estado', $data['estado'] ?? null);
        $stmt->bindValue(':rua', $data['rua'] ?? null);
        $stmt->bindValue(':numero', $data['numero'] ?? null);
        $stmt->bindValue(':complemento', $data['complemento'] ?? null);
        $stmt->bindValue(':bairro', $data['bairro'] ?? null);
        $stmt->bindValue(':id', $data['id'], PDO::PARAM_INT);  // Passando o ID do paciente para identificar qual registro alterar

        return $stmt->execute();
    }

    public function getById($id){

        require_once __DIR__ . '/../../config/Database.php';
        $dbConnection = Database::conectar();

        $dbConnection->exec("SET lc_time_names = 'pt_BR';");

        $stmt = $dbConnection->prepare(" SELECT *,
               CONCAT(
                   TIMESTAMPDIFF(YEAR, data_nascimento, CURDATE()) - 
                   (DATE_FORMAT(CURDATE(), '%m%d') < DATE_FORMAT(data_nascimento, '%m%d')),
                   ' anos'
               ) AS idade,
               CASE
                   WHEN sexo = 'm' THEN 'Masculino'
                   WHEN sexo = 'f' THEN 'Feminino'
                   ELSE 'Desconhecido'
               END AS sexo_formatado,
                DATE_FORMAT(data_nascimento, '%d de %M') AS aniversario,
                DATE_FORMAT(data_nascimento, '%d/%m/%Y') AS data_nascimento
        FROM pacientes
        WHERE id = $id;
        ");

        $stmt->execute();
        
        $paciente = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($paciente) {
            // Chama a função debitos para buscar os débitos do paciente
            $paciente['debitos'] = $this->debitos($id);
        } else {
            return null; // Retorna null caso o paciente não seja encontrado
        }

        return $paciente;
    }

    public function buscarTodos()
    {
        require_once __DIR__ . '/../../config/Database.php';
        $dbConnection = Database::conectar();

        $sql = "SELECT * FROM pacientes";
        $stmt = $dbConnection->prepare($sql);

        $stmt->execute();
        
        // Retorna todos os pacientes como um array associativo
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function debitos($id) {
        require_once __DIR__ . '/../../config/Database.php';
        $dbConnection = Database::conectar();

        $stmt = $dbConnection->prepare("
            SELECT COALESCE(SUM(valor_total), 0) AS debitos 
            FROM tratamento
            INNER JOIN parcela ON tratamento.id = parcela.tratamento_id 
            WHERE paciente_id = :id
            AND status_pagamento = 0 
            AND CURDATE() > vencimento;
        ");

        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

        return $resultado ? $resultado['debitos'] : 0;
    }

    public function alertas($id){
        require_once __DIR__ . '/../../config/Database.php';
        $dbConnection = Database::conectar();

        $stmt = $dbConnection->prepare(" SELECT 
    CASE 
        WHEN doencas_sistemicas IS NOT NULL AND doencas_sistemicas <> '' THEN 'Possui doenças sistêmicas' 
        ELSE '' 
    END AS doencas_sistemicas_status,
    CASE 
        WHEN doencas_transmissiveis IS NOT NULL AND doencas_transmissiveis <> '' THEN 'Possui doenças transmissíveis' 
        ELSE '' 
    END AS doencas_transmissiveis_status,
    CASE 
        WHEN alergia_medicamentos IS NOT NULL AND alergia_medicamentos <> '' THEN 'Possui alergia a medicamentos' 
        ELSE '' 
    END AS alergia_medicamentos_status,
    CASE 
        WHEN condicao_alergica IS NOT NULL AND condicao_alergica <> '' THEN 'Possui condição alérgica' 
        ELSE '' 
    END AS condicao_alergica_status
FROM anamneses 
WHERE paciente_id = $id;
        ");

        $stmt->execute();
        
    return $stmt->fetch(PDO::FETCH_ASSOC) ?: [];
    }


}
