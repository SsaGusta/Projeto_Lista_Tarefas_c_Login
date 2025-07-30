<?php
defined('CONTROL') or die('Acesso Negado!');

//verifica se o formulário foi enviado
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    //verifica se os campos foram enviados
    $usuario = $_POST['usuario'] ?? null;
    $senha = $_POST['senha'] ?? null;
    $erro = null;

    if(empty($usuario) || empty($senha)) {
        $erro = 'Usuário e senha são obrigatórios.';
    }
    //verifica se o usuário e senha estão corretos
    if(empty($erro)) {
        $usuarios = require_once __DIR__ . '/usuarios.php';

        foreach($usuarios as $user){
            if($user['usuario'] == $usuario && password_verify($senha, $user['senha'])){
               //Faz o login
                $_SESSION['usuario'] = $usuario;

                //voltar pra home
                header('Location: index.php?rota=home');
            }
        }        
        //Login invalido
        $erro = 'Usuário ou senha inválidos.';
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
</head>
<body>
    
    <form action="index.php?rota=login" method="post">
        <h3>Login</h3>

        <div>
        <label for="usuario">Usuário</label>
        <input type="email" name="usuario" id="usuario">
        </div>

        <div>
        <label for="senha">Senha</label>
        <input type="password" name="senha" id="senha">
        </div>

        <div>
        <button type="submit">Entrar</button>
        </div>

    </form>
    <?php if(!empty($erro)): ?>
        <p style="color: red;"><?= $erro; ?></p>
    <?php endif; ?>


</body>
</html>
