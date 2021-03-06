<?php

$path = '/xampp/htdocs/Lab/hotelToDo';
require_once $path . '/controllers/perfilUserController.php';
require_once $path . '/hellpers/hellper.php'; 

echo var_dump($_SESSION); 
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/normalize.css">
    <title>Consultar Perfil</title>
</head>
<body>
<nav>
    <ul>
        <li><a href="http://localhost/Lab/hotelToDo/views/main.php" class="main-button">Main</a></li>
        <li><a href="http://localhost/Lab/hotelToDo/views/createPerfilUser.php">Cadastrar Perfil</a></li>
    </ul>
</nav>
<form method="post">
    <fieldset>
        <legend>Consultar Perfil</legend>
        <input type="hidden" value="<?php if (isset($_POST['selectUpdate']) || isset($_POST['selectDelete'])) {  echo $perfilUser->idPerfilUser; } ?>" name="id">
        <label for="nome">Nome <input type="text" value="<?php if (isset($_POST['selectUpdate'])) {  echo $perfilUser->nome; } ?>" name="nome"></label>
        <?php if (isset($_POST['selectUpdate'])) { ?>
            <label for="status">Ativo <input type="checkbox" name="status" value="1"></label>
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
                    <th>Perfil</th>
                    <th>Status</th>
                </tr>
                <?php if (isset($perfisUsers)) { ?>
                    <?php foreach($perfisUsers as $perfilUser) { ?>
                        <tr>
                            <td><?php echo $perfilUser->idPerfilUser; ?></td>
                            <td><?php echo $perfilUser->nome; ?></td>
                            <td><?php echo translateStatus($perfilUser->status); ?></td>

                            <?php if (isset($_POST['selectDelete']) && $_POST['selectDelete'] == $perfilUser->idPerfilUser) { ?>
                                <td><button type="submit" value="delete" name="delete">Delete</button></td>
                                <td><button type="submit" value="" name="">X</button></td>
                            <?php } else { ?>
                                <td><button type="submit" value="<?php echo $perfilUser->idPerfilUser; ?>" name="selectUpdate" >Modificar</button></td>
                                <td><button type="submit" value="<?php echo $perfilUser->idPerfilUser; ?>" name="selectDelete" >Excluir</button></td>
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