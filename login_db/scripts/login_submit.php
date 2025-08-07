<?php

// Verifica se o método é POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php?rota=login');
    exit;
}

// Busca os dados do formulário
$usuario = $_POST['text_usuario'] ?? null;
$senha = $_POST['text_senha'] ?? null;

// Verifica se os campos foram preenchidos
if (empty($usuario) || empty($senha)) {
    header('Location: index.php?rota=login');
    exit;
}

// Consulta ao banco de dados
$database = new database();
$sql = 'SELECT * FROM users WHERE usuario = :usuario';
$result = $database->query($sql, [':usuario' => $usuario]);

// Verifica erro de conexão ou usuário não encontrado
if ($result['status'] === 'error' || empty($result['data'])) {
    $_SESSION['erro'] = 'Usuário ou senha inválidos.';
    header('Location: index.php?rota=login');
    exit;
}

$usuario_bd = $result['data'][0];

// Verifica a senha
if (!password_verify($senha, $usuario_bd->senha)) {
    $_SESSION['erro'] = 'Usuário ou senha inválidos.';
    header('Location: index.php?rota=login');
    exit;
}

// Login bem-sucedido
$_SESSION['usuario'] = $usuario_bd->usuario;
unset($_SESSION['erro']);
header('Location: index.php?rota=home');
exit;

$sql = 'SELECT * FROM users WHERE usuario = :usuario';
$result = $database->query($sql, $params);

//verifica se aconteceu algum erro
if ($result['status'] === 'error') {
    header('Location: index.php?rota=404');
    exit;
}

//verifica se o usuario existe
if (empty($result['data']) || !password_verify($senha, $result['data'][0]->senha)) {
    $_SESSION['erro'] = 'Usuário ou senha inválidos';
    header('Location: index.php?rota=login');
    exit;
}

//define a sessão do usuario
$_SESSION['usuario'] = $result['data'][0]->usuario;

//redireciona para a home
header('Location: index.php?rota=home'); 



