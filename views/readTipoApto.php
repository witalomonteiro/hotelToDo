<?php

$path = '/xampp/htdocs/Lab/hotelToDo';
require_once $path . '/controllers/tipoAptoController.php';
require_once $path . '/hellpers/hellper.php';

echo var_dump($_SESSION); 
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/normalize.css">
    <title>Consultar Tipos</title>
</head>
<body>
<nav>
    <ul>
        <li><a href="http://localhost/Lab/hotelToDo/views/main.php" class="main-button">Main</a></li>
        <li><a href="http://localhost/Lab/hotelToDo/views/createTipoApto.php">Cadastrar Tipo</a></li>
    </ul>
</nav>
<form method="post">
    <fieldset>
        <legend>Consultar Tipo</legend>
        <input type="hidden" value="<?php if (isset($_POST['selectUpdate']) || isset($_POST['selectDelete'])) {  echo $tipoApto->idTipoApto; } ?>" name="id">
        <label for="nome">Nome
            <input type="text" value="<?php if (isset($_POST['selectUpdate'])) {  echo $tipoApto->nome; } ?>" name="nome">
        </label>
        <?php if (isset($_POST['selectUpdate'])) { ?>
            <label for="nome">Valor
                <input type="text" name="valor" value="<?php if (isset($_POST['selectUpdate'])) {  echo $tipoApto->valor; } ?>">
            </label>
            <label for="status">Ativo
                <input type="checkbox" name="status" value="1">
            </label>
            <button type="submit" value="update" name="update">Update</button>
            <button type="submit" value="" name="">X</button>
        <?php } else { ?>
            <button type="submit" value="read" name="read">Read</button>
        <?php } ?>
    </fieldset>
    <?php if (!isset($_POST['selectUpdate'])) { ?>
        <fieldset>
            <legend>Resultados</legend>
            <table>
                <tr>
                    <th>Id</th>
                    <th>Tipo Apto</th>
                    <th>Valor</th>
                    <th>Status</th>
                </tr>
                <?php if (isset($tiposAptos)) { ?>
                    <?php foreach($tiposAptos as $tipoApto) { ?>
                        <tr>
                            <td><?php echo $tipoApto->idTipoApto; ?></td>
                            <td><?php echo $tipoApto->nome; ?></td>
                            <td><?php echo $tipoApto->valor; ?></td>
                            <td><?php echo translateStatus($tipoApto->status); ?></td>

                            <?php if (isset($_POST['selectDelete']) && $_POST['selectDelete'] == $tipoApto->idTipoApto) { ?>
                                <td><button type="submit" value="delete" name="delete">Delete</button></td>
                                <td><button type="submit" value="" name="">X</button></td>
                            <?php } else { ?>
                                <td><button type="submit" value="<?php echo $tipoApto->idTipoApto; ?>" name="selectUpdate" >Editar</button></td>
                                <td><button type="submit" value="<?php echo $tipoApto->idTipoApto; ?>" name="selectDelete" >Excluir</button></td>
                            <?php } ?>
                        </tr>
                    <?php } ?>
                <?php } ?>
            </table>
        </fieldset>
    <?php } ?>
</form>
</body>
</html>