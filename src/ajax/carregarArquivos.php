<?php
require_once __DIR__ . '/../../config/Database.php';


function listarDocumentos() {
    // Cria a conexão com o banco de dados
    $dbConnection = Database::conectar();

    $idpaciente = $_POST['id'];
    // Consulta para pegar os documentos
    $query = "SELECT id, descricao, arquivo FROM documento where id_paciente = $idpaciente"; 
    $stmt = $dbConnection->prepare($query);
    $stmt->execute();

    $documentos = [];
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        // Codifica o arquivo em Base64 para poder exibir no DataTable
        $documentos[] = [
            'descricao' => $row['descricao'],
            'arquivo' => base64_encode($row['arquivo']) // Codifica o arquivo em Base64
        ];
    }

    // Retorna os documentos como JSON
    return $documentos;
}

// Chama a função e retorna os resultados
$documentos = listarDocumentos();
echo json_encode($documentos); // Gera a resposta JSON
?>
