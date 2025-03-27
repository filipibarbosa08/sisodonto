<?php
require_once __DIR__ . '/../../config/Database.php';
$dbConnection = Database::conectar();

// Função para salvar o documento
function salvarDocumento($descricao, $id_paciente, $arquivo, $dbConnection) {
    // Verificar se o diretório 'uploads' existe, caso contrário, criar
    $diretorio = __DIR__ . '/../../tmp/'; // Caminho absoluto
    if (!is_dir($diretorio)) {
        mkdir($diretorio, 0777, true); // Cria o diretório com permissões apropriadas
    }

    // Verificar o tipo de arquivo permitido
    $tiposPermitidos = array('pdf','png','jpeg','zip','xlsx','docx', 'txt'); // Adicione os tipos que você deseja permitir
    $nomeArquivo = basename($arquivo['name']);
    $extensaoArquivo = strtolower(pathinfo($nomeArquivo, PATHINFO_EXTENSION));

    if (!in_array($extensaoArquivo, $tiposPermitidos)) {
            echo json_encode([
        'status' => 'error',
        'message' => 'Tipo de arquivo não permitido',
    ], JSON_UNESCAPED_UNICODE); exit;
    }

    // Ler o conteúdo do arquivo
    $conteudoArquivo = file_get_contents($arquivo['tmp_name']);

    // Preparar a query para inserir no banco de dados
    $query = "INSERT INTO documento (id_paciente, descricao, arquivo) VALUES (:id_paciente, :descricao, :arquivo)";
    $stmt = $dbConnection->prepare($query);

    // Bind dos parâmetros
    $stmt->bindParam(':id_paciente', $id_paciente, PDO::PARAM_INT);
    $stmt->bindParam(':descricao', $descricao, PDO::PARAM_STR);
    $stmt->bindParam(':arquivo', $conteudoArquivo, PDO::PARAM_LOB);

    // Executar a consulta
    if ($stmt->execute()) {
        return array(
            'nome_documento' => $nomeArquivo,
            'status' => 'Arquivo salvo com sucesso.'
        );
    } else {
        return 'Erro ao salvar no banco de dados: ' . $stmt->errorInfo()[2];
    }
}

// Verificar se o arquivo foi enviado
if ($_FILES['arquivo']['error'] == 0) {
    // Obter os dados enviados pelo formulário
    $descricao = $_POST['descricao'];
    $id_paciente = $_POST['id']; // Substitua com o ID do paciente correto

    // Salvar o documento
    $documento = salvarDocumento($descricao, $id_paciente, $_FILES['arquivo'], $dbConnection);

    // Retornar a resposta como JSON
    echo json_encode($documento);
} else {
    echo json_encode(array('erro' => 'Nenhum arquivo foi enviado.'));
}
?>
