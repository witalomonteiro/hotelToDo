<?php

    $path = '/xampp/htdocs/Lab/hotelToDo';
    require_once $path . '/controllers/servicoController.php';
    require_once $path . '/hellpers/hellper.php'; 

?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/normalize.css">
    <title> Read Servicos </title>
</head>
<body>
    <nav>
        <ul>
            <li>
                <a href="http://localhost/Lab/hotelToDo/views/main.php" class="main-button"> Main </a>
            </li>
            <li>
                <a href="http://localhost/Lab/hotelToDo/views/createServico.php"> Create </a>
            </li>
        </ul>
    </nav>
<form method="post">
    <fieldset>
        <legend> Read servico </legend>
        <input type="hidden" value="<?php if (isset($_POST['select']) || isset($_POST['confirm'])) {  echo $servico->idServico; } ?>" name="id">
        <label for="nome"> Nome <input type="text" value="<?php if (isset($_POST['select'])) {  echo $servico->nome; } ?>" name="nome"></label>
        <?php if (isset($_POST['select'])) { ?>
            <label for="nome"> Valor <input type="text" value="<?php if (isset($_POST['select'])) {  echo $servico->valor; } ?>" name="valor"></label>
            <label for="status"> Ativo <input type="checkbox" value="1" name="status"></label>
            <button type="submit" value="update" name="update"> Update </button>
            <button type="submit" value="" name=""> X </button>
        <?php } else { ?>
            <button type="submit" value="read" name="read"> Read </button>
        <?php } ?>
    </fieldset>
    <fieldset>
        <legend> Results </legend>
        <table>
            <tr>
                <th> Id </th>
                <th> Serviço </th>
                <th> Valor </th>
                <th> Status </th>
            </tr>
            <?php if (isset($servicos)) { ?>
                <?php foreach($servicos as $servico) { ?>
                    <tr>
                        <td>
                            <?php echo $servico->idServico; ?>
                        </td>
                        <td>
                            <?php echo $servico->nome; ?>
                        <td>
                            <?php echo $servico->valor; ?>
                        </td>
                        <td>
                            <?php echo translate($servico->status); ?>
                        </td>

                        <?php if (isset($_POST['confirm'])) { ?>
                            <td>
                                <button type="submit" value="delete" name="delete"> Delete </button>
                            </td>
                            <td>
                                <button type="submit" value="" name=""> X </button>
                            </td>
                        <?php } else { ?>
                            <td>
                                <button type="submit" value="<?php echo $servico->idServico; ?>" name="select" > Editar </button>
                            </td>
                            <td>
                                <button type="submit" value="<?php echo $servico->idServico; ?>" name="confirm" > Excluir </button>
                            </td>
                        <?php } ?>
                    </tr>
                <?php } ?>
            <?php } ?>
        </table>
    </fieldset>
</form>
</body>
</html>