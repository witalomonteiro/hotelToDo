<?php

$path = '/xampp/htdocs/Lab/hotelToDo';
require_once $path . '/controllers/produtoController.php';
require_once $path . '/hellpers/hellper.php';
 
echo var_dump($_SESSION); 
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/normalize.css">
    <title>Consultar Produto</title>
</head>
<body>
<nav>
    <ul>
        <li><a href="http://localhost/Lab/hotelToDo/views/main.php" class="main-button">Main</a></li>
        <li><a href="http://localhost/Lab/hotelToDo/views/createProduto.php">Cadastrar Produto</a></li>
    </ul>
</nav>
<form method="post">
    <fieldset>
        <legend>Consultar Produto</legend>
        <input type="hidden" value="<?php if (isset($_POST['selectUpdate']) || isset($_POST['selectDelete'])) {  echo $produto->idProduto; } ?>" name="id">
        <label for="nome">Nome
            <input type="text" value="<?php if (isset($_POST['selectUpdate'])) {  echo $produto->nome; } ?>" name="nome">
        </label>
        <?php if (isset($_POST['selectUpdate'])) { ?>
            <label for="nome">Valor
                <input type="text" value="<?php if (isset($_POST['selectUpdate'])) {  echo $produto->valor; } ?>" name="valor">
            </label>
            <label for="status">Ativo
                <input type="checkbox" value="1" name="status">
            </label>
            <button type="submit" value="update" name="update">Confirmar</button>
            <button type="submit" value="" name="">X</button>
        <?php } else { ?>
            <button type="submit" value="read" name="read">Buscar</button>
        <?php } ?>
    </fieldset>
    <?php if (!isset($_POST['selectUpdate'])) { ?>
        <fieldset>
            <legend>Resultados</legend>
            <table>
                <tr>
                    <th>Id</th>
                    <th>Produto</th>
                    <th>Valor</th>
                    <th>Status</th>
                </tr>
                <?php if (isset($produtos)) { ?>
                    <?php foreach($produtos as $produto) { ?>
                        <tr>
                            <td><?php echo $produto->idProduto; ?></td>
                            <td><?php echo $produto->nome; ?></td>
                            <td><?php echo $produto->valor; ?></td>
                            <td><?php echo translateStatus($produto->status); ?></td>
                            <?php if (isset($_POST['selectDelete']) && $_POST['selectDelete'] == $produto->idProduto) { ?>
                                <td><button type="submit" value="delete" name="delete">Confirmar</button></td>
                                <td><button type="submit" value="" name="">X</button></td>
                            <?php } else { ?>
                                <td><button type="submit" value="<?php echo $produto->idProduto; ?>" name="selectUpdate">Modificar</button></td>
                                <td><button type="submit" value="<?php echo $produto->idProduto; ?>" name="selectDelete">Excluir</button></td>
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