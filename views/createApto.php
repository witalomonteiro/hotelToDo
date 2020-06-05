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
    <title>Create Apto</title>
</head>
<body>
<nav>
    <ul>
        <li><a href="http://localhost/Lab/hotelToDo/views/main.php" class="main-button">Main</a></li>
        <li><a href="http://localhost/Lab/hotelToDo/views/readApto.php">Read</a></li>
    </ul>
</nav>
<form action="" method="post">
    <fieldset>
        <legend>Novo User</legend>
        <label for="numero">Numero <input type="text" name="numero" size="25"></label>
        <label for="perfilUser"> Perfil
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
        <label for="status">Ativo <input type="checkbox" name="status" value="1"></label></br>

        <button type="submit" value="create" name="create" >Create</button>
    </fieldset>
</form>
</body>
</html>