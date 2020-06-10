<?php
$path = '/xampp/htdocs/Lab/hotelToDo';
require_once $path . '/controllers/servicoController.php';
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/normalize.css">
    <title>Cadastrar Serviço</title>
</head>
<body>
    <nav>
        <ul>
            <li><a href="http://localhost/Lab/hotelToDo/views/main.php" class="main-button">Main</a></li>
            <li><a href="http://localhost/Lab/hotelToDo/views/readServico.php">Consultar Serviço</a></li>
        </ul>
    </nav>
    <form action="" method="post">
        <fieldset>
            <legend>Novo Serviço</legend>
            <label for="nome">Nome<input type="text" name="nome"></label>
            <label for="valor">Valor<input type="text" name="valor"></label>
            <label for="status">Ativo<input type="checkbox" name="status" value="1"></label>
            <button type="submit" value="create" name="create">Cadastrar</button>
        </fieldset>
    </form>
</body>
</html>