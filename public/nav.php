<?php
defined('CONTROL') or die('Acesso Negado!');
?>

<hr>

<!-- Cria uma linha na pagina -->
    <hr>

    <!-- Mostra o nome do usuario logado -->
    <span>Usuário: <strong><?= $_SESSION['usuario'] ?></strong></span>
    <span>

    <!-- Link para sair do sistema -->
        <!-- <a href="?rota=logout">Sair</a>
    </span> -->

<hr>

<nav>
    <a href="?rota=home">Home</a>
    <a href="?rota=page1">Pagina 1</a>
    <a href="?rota=page2">Pagina 2</a>
    <a href="?rota=page3">Pagina 3</a>
    <a href="?rota=logout">Sair</a>
</nav>