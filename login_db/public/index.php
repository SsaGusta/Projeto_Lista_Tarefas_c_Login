<?php

// inicio da sessao
session_start();

// carregamento das rotas permitidas
$rotas_permitidas = require_once __DIR__ . '/../inc/rotas.php';

//definicao da rota
$rota = $_GET['rota'] ?? 'home';

// verificac se o usuario esta logado

if(!isset($_SESSION['usuario']) && $rota !== 'login_submit'){
    $rota = 'login';
}

//se o usuario esta logado e tenta entrar no login...
if(isset($_SESSION['usuario']) && $rota === 'login'){
    $rota = 'home';
}

//se a rota nao existe
if(!in_array($rota, $rotas_permitidas)){
    $rota = '404';
}

//preparacao da pagina

$script = null;
switch ($rota) {
    case '404':
        $script = '404.php';
        break;
    case 'login':
        $script = 'login.php';
        break;
    case 'login_submit':
        $script = 'login_submit.php';
        break;
    case 'home':
        $script = 'home.php';
        break;
    
}

// carregamento do script permanentes
require_once __DIR__ . '/../inc/config.php';
require_once __DIR__ . '/../inc/database.php';

// //teste
// $database = new database();
// $usuarios = $database->query('SELECT * FROM users');
// echo '<pre>';
// print_r($usuarios);
// echo '<pre>';
// die();


//apresentao da pagina
require_once __DIR__ . '/../inc/header.php';
require_once __DIR__ . '/../scripts/' . $script;
require_once __DIR__ . '/../inc/footer.php';