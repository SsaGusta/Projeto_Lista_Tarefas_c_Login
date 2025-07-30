<?php

//iniciar a sessão
session_start();

//definir uma constante de controle
define('CONTROL', true);

//verifica se existe um usuario logado
$usuario_logado = $_SESSION['usuario'] ?? null;

//verifica qual é a rota URL
if(empty($usuario_logado)){
    $rota = 'login';
} else {
    $rota = $_GET['rota'] ?? 'home';
}

//se o usuario ta logado, mas a rota é login, redireciona para home
if(!empty($usuario_logado) && $rota == 'login'){
    $rota = 'home';
}
//analisa rota
$rotas = [
    'login' => 'login.php',
    'home' => 'home.php',
    'page1' => 'page1.php',
    'page2' => 'page2.php',
    'page3' => 'page3.php',
    'logout' => 'logout.php',
];

if(!key_exists($rota, $rotas)){
    die('Acesso Negado!');
}

require_once $rotas[$rota];