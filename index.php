<?php

// Inclui a classe Banco
require_once __DIR__ . '/config/Database.php';

// Inicia a sessão
session_start();

// Declara a variável global
global $dbConnection;

// Estabelece a conexão com o banco de dados
try {
    $dbConnection = Database::conectar();
} catch (Exception $e) {
    die('Erro ao conectar ao banco de dados: ' . $e->getMessage());
}

// Lista de páginas permitidas, apenas 'login' pode ser acessada sem estar logado
$allowedPages = ['login', '404', 'dashboard', 'pacientes', 'cadastrarPaciente','agenda','prontuario','financeiro','relatorios','configuracoes'];

// Obtém a página solicitada da URL ou define a página padrão como 'login'
$page = isset($_GET['page']) ? $_GET['page'] : 'login';

// Sanitiza o nome da página para evitar ataques
$page = preg_replace('/[^a-zA-Z0-9_-]/', '', $page);

// Verifica se o usuário está autenticado
if (!isset($_SESSION['user']) && !in_array($page, $allowedPages)) {
    // Se o usuário não estiver logado, redireciona para a página de login
    header('Location: index.php?page=login');
    exit();
}

// Verifica se a página está na lista de permitidas
if (!in_array($page, $allowedPages)) {
    $page = '404'; // Redireciona para a página 404 se a página não for válida
}

// Caminho para a pasta de páginas
$pagesDir = __DIR__ . '/src/pages/';

// Verifica se o arquivo da página existe
$pageFile = $pagesDir . $page . '.php';

if (!file_exists($pageFile)) {
    $page = '404'; // Redireciona para a página 404
    $pageFile = $pagesDir . '404.php';
}

// Inclui a página solicitada

include_once $pageFile;
