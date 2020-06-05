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
    <form method="post">
        <fieldset>
            <legend> Nova Reserva </legend>
            <label for="entrada"> Entrada <input type="date"></label>
            <label for="saida"> Saída <input type="date"></label>
            <label for=""> Tipo Apto
                <select name="">
                    <option value=""></option>
                    <?php foreach ($tiposAptos as $tipoApto) { ?>
                        <option value="<?php echo $tipoApto->idTipoApto; ?>"><?php echo $tipoApto->nome; ?></option>
                    <?php } ?>
                </select>
            </label>
            <button type="submit" name="create"> Reservar </button>
        </fieldset>
    </form>
</body>
</html>