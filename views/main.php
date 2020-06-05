<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="widPerfilUserth=device-widPerfilUserth, initial-scale=1.0">
    <link rel="stylesheet" href="css/normalize.css">
    <title>Main</title>
</head>
<body> 
<nav>
    <ul>
        <li>
            <a href="http://localhost/Lab/hotelToDo/views/readPerfilUser.php">
                <?php if ($_SESSION['idPerfilUser'] == 1) { echo "Perfil User"; } ?>
            </a>
        </li>
        <li>
            <a href="http://localhost/Lab/hotelToDo/views/readUser.php">
                <?php if (isset($_SESSION['idPerfilUser'])) { echo "User"; } ?>
            </a>
        </li>
        <li>
            <a href="http://localhost/Lab/hotelToDo/views/readTipoApto. php">
                <?php if ($_SESSION['idPerfilUser'] == 1 || $_SESSION['idPerfilUser'] == 2) { echo "Tipo Apto"; } ?>
            </a>
        </li>
        <li>
            <a href="http://localhost/Lab/hotelToDo/views/readApto.php">
                <?php if ($_SESSION['idPerfilUser'] == 1 || $_SESSION['idPerfilUser'] == 2) { echo "Apto"; } ?>
            </a>
        </li>    
        <li>
            <a href="http://localhost/Lab/hotelToDo/views/readProduto.php">
                <?php if (isset($_SESSION['idPerfilUser'])) { echo "Produto"; } ?>
            </a>
        </li>
        <li>
            <a href="http://localhost/Lab/hotelToDo/views/readServico.php">
                <?php if ($_SESSION['idPerfilUser'] == 1 || $_SESSION['idPerfilUser'] == 2) { echo "Serviço"; } ?>
            </a> 
        </li>
    </ul>
</nav>
</body>
</html>