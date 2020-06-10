<?php

$path = '/xampp/htdocs/Lab/hotelToDo';
require_once $path . '/controllers/reservaController.php';
require_once $path . '/hellpers/hellper.php'; 

echo var_dump($_SESSION); 
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/normalize.css">
    <title>Consultar Reserva</title>
</head>
<body>
    <nav>
        <ul>
            <li><a href="http://localhost/Lab/hotelToDo/views/main.php" class="main-button">Main</a></li>
            <li><a href="http://localhost/Lab/hotelToDo/views/createReserva.php">Cadastrar Reserva</a></li>
        </ul>
    </nav>
    <form method="post">
        <fieldset>
            <legend>Consultar Reserva</legend>
            <input type="hidden" value="<?php if (isset($_POST['selectCancel']) || isset($_POST['selectCheckin'])) {  echo $reserva->idReserva; } ?>" name="id">
            <label for="nome">Nome
                <input type="text" name="nome">
            </label>
            <label for="entrada">Entrada
                <input type="date" name="entrada">
            </label>
            <button type="submit" name="read">Buscar</button>
        </fieldset>
        <fieldset>
            <legend>Resultados</legend>
            <table>
                <tr>
                    <th>Id</th>
                    <th>Nome</th>
                    <th>Entrada</th>
                    <th>Saida</th>
                    <th>Tipo Apto</th>
                    <th>Status</th>
                </tr>
                <?php if (isset($reservas)) { ?>
                    <?php foreach ($reservas as $reserva) { ?>
                        <tr>
                            <td><?php echo $reserva->idReserva; ?></td>
                            <td><?php echo $reserva->nome; ?></td>
                            <td><?php echo translateDateForView($reserva->entrada); ?></td>
                            <td><?php echo translateDateForView($reserva->saida); ?></td>
                            <td><?php echo translateTipoApto($reserva->idTipoApto); ?></td>
                            <td><?php echo translateStatusReserva($reserva->status); ?></td>
                            <?php if (isset($_POST['selectCancel']) && $_POST['selectCancel'] == $reserva->idReserva) { ?>
                                <td><button type="submit" value="cancel" name="cancel">Confirmar</button></td>
                                <td><button type="submit" value="" name="">X</button></td>
                            <?php } elseif (isset($_POST['selectCheckin']) && $_POST['selectCheckin'] == $reserva->idReserva) { ?>
                                <td><button type="submit" value="checkin" name="checkin">Confirmar</button></td>
                                <td><button type="submit" value="" name="">X</button></td>
                            <?php } elseif ($reserva->status == 1) { ?>
                                <td><button type="submit" value="<?php echo $reserva->idReserva; ?>" name="selectCheckin">Checkin</button></td>
                                <td><button type="submit" value="<?php echo $reserva->idReserva; ?>" name="selectCancel">Cancelar</button></td>
                            <?php } ?>
                        </tr>
                    <?php } ?>
                <?php } ?>
            </table>
        </fieldset>
    </form>
</body>
</html>