<?php
     session_start();
     include_once('conexao.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro Funcionário</title>
</head>
<body>
    <div>
        <h1><?php 
        if (isset($_SESSION['msg'])) {
            echo($_SESSION['msg'] . "<br>");
            unset($_SESSION['msg']);
        }
        ?></h1>
        <a href='lista.php'>Listar Placas</a><br>
        <a href='index_placa.php'>Cadastrar Placas</a><br>
        <a href='login.html'>Sair</a>

        <form action="cadastro_func.php" method="post">
            <h1>Cadastro Funcionários</h1>
            <label for="usuario">Usuário: </label>
            <input type="text" name="usuario" id="usuario">
            <br>
            <label for="senha">Senha: </label>
            <input type="password" name="senha" id="senha">
            <br><br>
            <input type="submit" value="enviar">
        </form>
    </div>
</body>
</html>