<?php

$path = '/xampp/htdocs/Lab/hotelToDo';
require_once $path . '/controllers/hospedagemController.php';
require_once $path . '/hellpers/hellper.php'; 

?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/normalize.css">
    <title>Consultar Hospedagem</title>
</head>
<body>
    <nav>
        <ul>
            <li><a href="http://localhost/Lab/hotelToDo/views/main.php" class="main-button">Main</a></li>
            <li><a href="http://localhost/Lab/hotelToDo/views/readReserva.php">Realizar Reserva</a></li>
        </ul>
    </nav>
    <form method="post">
        <fieldset>
            <legend>Consultar Hospedagem</legend>
            <label for="nome">Hospede<input type="text" name="nome"></label>
            <label for="numero">Apto<input type="number" name="numero"></label>
            <button type="submit" valor="read" name="read">Buscar</button>
        </fieldset>
        <?php if (isset($_POST['read'])) { ?>
            <fieldset>
                <legend>Resultados</legend>
                <table>
                    <tr>
                        <th>Id</th>
                        <th>Hospede</th>
                        <th>Apto</th>
                        <th>Status</th>
                    </tr>
                    <?php if (isset($hospedagens)) { ?>
                        <?php foreach($hospedagens as $hospedagem) { ?>
                            <tr>
                                <td>
                                    <a href="<?php echo "http://localhost/Lab/hotelToDo/views/detailsHospedagem.php?idHospedagem=".$hospedagem->idHospedagem; ?>">
                                        <?php echo $hospedagem->idHospedagem; ?>
                                    </a> 
                                </td>
                                <td><?php echo $hospedagem->nome; ?></td>
                                <td><?php echo $hospedagem->numero; ?></td>
                                <td><?php echo translateStatusHospedagem($hospedagem->status); ?></td>
                            </tr>
                        <?php } ?>
                    <?php } ?>
                </table>
            </fieldset>  
        <?php } ?>
    </form>
</body>
</html>