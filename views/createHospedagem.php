<?php

$path = '/xampp/htdocs/Lab/hotelToDo';
require_once $path . '/controllers/hospedagemController.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/normalize.css">
    <title>Nova Hospedagem</title>
</head>
<body>
    <nav>
        <ul>
            <li><a href="http://localhost/Lab/hotelToDo/views/main.php" class="main-button">Main</a></li>
            <li><a href="http://localhost/Lab/hotelToDo/views/readHospedagem.php">Consultar Hospedagem</a></li>
        </ul>
    </nav>
    <form method="post">
        <fieldset>
            <legend>Nova Hospedagem</legend>
            <input type="hidden" value="<?php echo $reserva->idReserva?>" name="id">
            <label for="nome"> Nome <input type="text" value="<?php echo $reserva->nome?>" name="nome"></label>
            <label for="entrada"> Entrada <input type="date" value="<?php echo $reserva->entrada?>" name="entrada"></label>
            <label for="saida"> Saída <input type="date" value="<?php echo $reserva->saida?>" name="saida"></label>
            <label for="tipoApto"> Tipo Apto
                <select name="tipoApto">
                    <?php foreach ($tiposAptos as $tipoApto) { ?>
                        <?php if ($tipoApto->idTipoApto == $reserva->idTipoApto) { ?>
                            <option value="<?php echo $tipoApto->idTipoApto ?>" selected>
                                <?php echo $tipoApto->nome; ?>
                            </option>
                        <?php } ?>
                    <?php } ?>
                </select>
            </label>
            <label for="apto">Apto
                <select name="apto">
                    <option value=""></option>
                    <?php foreach ($aptos as $apto) { ?>
                        <?php if ($apto->idTipoApto == $reserva->idTipoApto) { ?>
                            <option value="<?php echo $apto->idApto; ?>">
                                <?php echo $apto->numero; ?>
                            </option>
                        <?php } ?>
                    <?php } ?>
                </select>
            </label>
            <button type="submit" name="create">Hospedar</button>
        </fieldset>
    </form>
</body>
</html>