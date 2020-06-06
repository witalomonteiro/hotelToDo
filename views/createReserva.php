<?php

$path = '/xampp/htdocs/Lab/hotelToDo';
require_once $path . '/controllers/reservaController.php';

?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/normalize.css">
    <title> Reservas </title>
</head>
<body>
    <nav>
        <ul>
            <li><a href="http://localhost/Lab/hotelToDo/views/main.php" class="main-button">Main</a></li>
            <li><a href="http://localhost/Lab/hotelToDo/views/readUser.php">Read</a></li>
        </ul>
    </nav>
    <form method="post">
        <fieldset>
            <legend> Nova Reserva </legend>
            <label for="nome"> Nome <input type="text" name="nome"></label>
            <label for="entrada"> Entrada <input type="date" name="entrada"></label>
            <label for="saida"> Saída <input type="date" name="saida"></label>
            <label for="tipoApto"> Tipo Apto
                <select name="tipoApto">
                    <option value=""></option>
                    <?php foreach ($tiposAptos as $tipoApto) { ?>
                        <option value="<?php echo $tipoApto->idTipoApto; ?>">
                            <?php echo $tipoApto->nome; ?>
                        </option>
                    <?php } ?>
                </select>
            </label>
            <button type="submit" name="create"> Reservar </button>
        </fieldset>
    </form>
</body>
</html>