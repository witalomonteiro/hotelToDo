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
    <title>Detalhes da Hospedagem</title>
</head>
<body>
<body>
    <nav>
        <ul>
            <li><a href="http://localhost/Lab/hotelToDo/views/main.php" class="main-button">Main</a></li>
            <li><a href="http://localhost/Lab/hotelToDo/views/readHospedagem.php">Consultar Hospedagem</a></li>
        </ul>
    </nav>
    <form method="post">
        <fieldset>
            <legend>Detalhes da Hospedagem

            </legend>
            <label for="id">Id
                <span><?php echo $hospedagem->idHospedagem; ?></span>
            </label>
            <label for="hospede">Hospede
                <span><?php echo $hospedagem->nome; ?></span>
            </label>
            <label for="apto">Apto
                <span><?php echo $hospedagem->numero; ?></span>
            </label>
            <label for="status">Status
                <span><?php echo translateStatusHospedagem($hospedagem->status); ?></span>
            </label>
            <button type="submit" value="produto" name="produto">Produto</button>
            <button type="submit" value="servico" name="servico">Serviço</button>
            <button>Checkout</button>
        </fieldset>
        <fieldset>
            <legend>Novo Consumo</legend>
            <?php if (isset($consumos)) { ?>
                <label for="consumo">Consumo
                    <select id="consumo" name="idProduto">
                        <option value=""></option>
                        <?php foreach ($consumos as $consumo) { ?>
                            <option value="<?php echo $consumo->idProduto; ?>">
                                <?php echo $consumo->nome; ?>
                            </option>
                        <?php } ?>
                    </select>
                </label>
            <?php } ?>
        </fieldset>
    </form>
</body>
</html>