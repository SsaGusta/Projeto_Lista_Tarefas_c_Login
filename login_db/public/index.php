<?php

// inicio da sessao
session_start();

// carregamento do script permanentes
require_once __DIR__ . "/../inc/config.php";
require_once __DIR__ . "/../inc/database.php";

// carregamento das rotas permitidas
$rotas = require_once __DIR__ . '/../inc/rotas.php';

// definicao da rota
$rota = $_GET['rota'] ?? 'home';

// verificacao se o usuario esta logado
if (!isset($_SESSION['usuario']) && $rota !== 'login_submit') {
    $rota = 'login';
}
if (isset($_SESSION['usuario']) && $rota === 'login') {
    $rota = 'home';
}

// se a rota nao existe
if (!in_array($rota, $rotas)) {
    $rota = '404';
}

// preparacao da pagina
$scripts = [
    '404' => '404.php',
    'login' => 'login.php',
    'login_submit' => 'login_submit.php',
    'home' => 'home.php'
];
$script = $scripts[$rota] ?? '404.php';

// //teste
// $database = new database();
// $usuarios = $database->query('SELECT * FROM users');
// echo '<pre>';
// print_r($usuarios);
// echo '<pre>';
// die();

// apresentao da pagina
require_once __DIR__ . "/../inc/header.php";
require_once __DIR__ . "/../scripts/$script";
require_once __DIR__ . "/../inc/footer.php";