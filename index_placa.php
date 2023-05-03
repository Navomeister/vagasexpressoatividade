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
    <title>Document</title>
</head>
<body>
    <div>
        <h1><?php 
        if (isset($_SESSION['msg'])) {
            echo($_SESSION['msg'] . "<br>");
            unset($_SESSION['msg']);
        }
        ?></h1>
            <a href='lista.php'>Listar Placas</a>
        <form action="cadastra.php" method="post">
            <h1>Cadastro Placas</h1>
            <label for="placa">Número da Placa:</label>
            <input type="text" name="placa" id="placa" length="8">
            <br>
            <input type="submit" value="enviar">
        </form>
    </div>
</body>
</html>