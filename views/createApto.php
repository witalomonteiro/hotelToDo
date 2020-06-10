<?php

$path = '/xampp/htdocs/Lab/hotelToDo';
require_once $path . '/controllers/aptoController.php';

?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/normalize.css">
    <title>Cadastrar Apto</title>
</head>
<body>
<nav>
    <ul>
        <li><a href="http://localhost/Lab/hotelToDo/views/main.php" class="main-button">Main</a></li>
        <li><a href="http://localhost/Lab/hotelToDo/views/readApto.php">Consultar Apto</a></li>
    </ul>
</nav>
<form method="post">
    <fieldset>
        <legend>Novo Apto</legend>
        <label for="numero">Numero<input type="text" name="numero"></label>
        <label for="perfilUser">Perfil
            <select name="idTipoApto">
                <option value=""></option>
                <?php if (isset($tiposAptos)) { ?>
                    <?php foreach($tiposAptos as $tipoApto) { ?>
                        <?php if ($tipoApto->status == 1) { ?>
                            <option value="<?php echo $tipoApto->idTipoApto; ?>"><?php echo $tipoApto->nome; ?></option>
                        <?php } ?>
                    <?php } ?>
                <?php } ?>
            </select>
        </label>
        <label for="status">Ativo<input type="checkbox" name="status" value="1"></label></br>
        <button type="submit" value="create" name="create" >Cadastrar</button>
    </fieldset>
</form>
</body>
</html>