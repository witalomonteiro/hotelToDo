<?php

$path = '/xampp/htdocs/Lab/hotelToDo';
require_once $path . '/controllers/tipoAptoController.php';

?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/normalize.css">
    <title>Cadastrar Tipo</title>
</head>
<body>
<nav>
    <ul>
        <li><a href="http://localhost/Lab/hotelToDo/views/main.php" class="main-button">Main</a></li>
        <li><a href="http://localhost/Lab/hotelToDo/views/readTipoApto.php">Consultar Tipo</a></li>
    </ul>
</nav>
<form action="" method="post">
    <fieldset>
        <legend>Novo Tipo</legend>
        <label for="nome">Nome<input type="text" name="nome"></label>
        <label for="nome">Valor<input type="number" name="valor"></label>
        <label for="status">Ativo<input type="checkbox" name="status" value="1"></label>
        <button type="submit" value="create" name="create">Cadastrar</button>
    </fieldset>
</form>
</body>
</html>