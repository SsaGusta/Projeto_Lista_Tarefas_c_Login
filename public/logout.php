<?php
defined('CONTROL') or die('Acesso Negado!');

//faz o logout
session_destroy();

//volta para a página de login
header('Location: index.php?rota=login');