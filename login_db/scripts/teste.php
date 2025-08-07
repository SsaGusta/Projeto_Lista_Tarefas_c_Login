<?php
$banco = "php_login";
$usuario = "root";
$senha = "root";
$hostname = "localhost";
$conn = mysqli_connect($hostname, $usuario, $senha, $banco);

if (!$conn) {
    echo "Não foi possível conectar ao banco MySQL.<br>";
    exit;
} else {
    echo "Parabéns!! A conexão ao banco de dados ocorreu normalmente!<br>";
}

mysqli_close($conn);
?>
