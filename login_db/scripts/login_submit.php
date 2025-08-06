<?php

// verifica se aconteceu um POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php?rota=login');
    exit;
}

//vai buscar os dados no bd
$usuario = $_POST['text_usuario'] ?? null;
$senha = $_POST['text_senha'] ?? null;

//verifica se os dados foram preenchidos
if (empty($usuario) || empty($senha)) {
    header('Location: index.php?rota=login');
    exit;
}

// a class da bd ja esta carregada no index.php
$database = new database();
$params = [
    ':usuario' => $usuario
];

$sql = 'SELECT * FROM users WHERE usuario = :usuario';
$result = $database->query($sql, $params);
var_dump($result);


//verifica se aconteceu algum erro
if ($result['status'] === 'error') {
    header('Location: index.php?rota=404');
    exit;
}

//verifica se o usuario existe
if (!password_verify($senha, $result['data'][0]->senha)) {

    $_SESSION['erro'] = 'Usuário ou senha inválidos';

    header('Location: index.php?rota=login');
    exit;
}

//define a sessão do usuario
$_SESSION['usuario'] = $result['data'][0]->usuario;

//redireciona para a home
header('Location: index.php?rota=home');