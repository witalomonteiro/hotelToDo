<?php

$path = '/xampp/htdocs/Lab/hotelToDo';
require_once $path . '/controllers/aptoController.php';
require_once $path . '/hellpers/hellper.php'; 

?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/normalize.css">
    <title>Read Aptos</title>
</head>
<body>
<nav>
    <ul>
        <li><a href="http://localhost/Lab/hotelToDo/views/main.php" class="main-button">Main</a></li>
        <li><a href="http://localhost/Lab/hotelToDo/views/createApto.php">Create</a></li>
    </ul>
</nav>
<form method="post">
    <fieldset>
        <legend>Read Aptos</legend>
        <input type="hidden" name="id" value="<?php if (isset($_POST['select']) || isset($_POST['confirm'])) {  echo $apto->idApto; } ?>">
        <label for="numero">Numero <input type="text" name="numero" size="25" value="<?php if (isset($_POST['select'])) {  echo $apto->numero; } ?>"></label>
        <?php if (isset($_POST['select'])) { ?>
            <label for="tipoApto">Tipo  
                <select name="idTipoApto">
                    <option value=""></option>
                    <?php if (isset($tiposAptos)) { ?>
                        <?php foreach($tiposAptos as $tipoApto) { ?>
                            <?php if ($tipoApto->status == 1 && $tipoApto->idTipoApto == $apto->idTipoApto) { ?>
                                    <option value="<?php echo $tipoApto->idTipoApto; ?>" selected><?php echo $tipoApto->nome; ?></option>
                                <?php } else { ?>
                                    <option value="<?php echo $tipoApto->idTipoApto; ?>"><?php echo $tipoApto->nome; ?></option>
                            <?php } ?>
                        <?php } ?>
                    <?php } ?>
                </select>
            </label>
            <label for="status">Ativo <input type="checkbox" name="status" value="1"></label>
            <button type="submit" value="update" name="update">Update</button>
            <button type="submit" value="" name="">X</button>
        <?php } else { ?>
            <button type="submit" value="read" name="read">Read</button>
        <?php } ?>
    </fieldset>
    <fieldset>
        <legend>Resultados</legend>
        <table>
            <tr>
                <th>Id</th>
                <th>Numero</th>
                <th>Tipo</th>
                <th>Status</th>
            </tr>
            <?php if (isset($aptos)) { ?>
                <?php foreach($aptos as $apto) { ?>
                    <tr>
                        <td><?php echo $apto->idApto; ?></td>
                        <td><?php echo $apto->numero; ?></td>
                        <td><?php $tipo = translateTipo($apto->idTipoApto); echo $tipo->nome; ?></td>
                        <td><?php echo translate($apto->status); ?></td>

                        <?php if (isset($_POST['confirm'])) { ?>
                            <td><button type="submit" value="delete" name="delete">Delete</button></td>
                            <td><button type="submit" value="" name="">X</button></td>
                        <?php } else { ?>
                            <td><button type="submit" value="<?php echo $apto->idApto; ?>" name="select" >Editar</button></td>
                            <td><button type="submit" value="<?php echo $apto->idApto; ?>" name="confirm" >Excluir</button></td>
                        <?php } ?>
                    </tr>
                <?php } ?>
            <?php } ?>
        </table>
    </fieldset>
</form>
</body>
</html>