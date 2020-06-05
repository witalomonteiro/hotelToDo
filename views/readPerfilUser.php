<?php

$path = '/xampp/htdocs/Lab/hotelToDo';
require_once $path . '/controllers/perfilUserController.php';
require_once $path . '/hellpers/hellper.php'; 

?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/normalize.css">
    <title>Read Perfis Users</title>
</head>
<body>
<nav>
    <ul>
        <li><a href="http://localhost/Lab/hotelToDo/views/main.php" class="main-button">Main</a></li>
        <li><a href="http://localhost/Lab/hotelToDo/views/createPerfilUser.php">Create</a></li>
    </ul>
</nav>
<form method="post">
    <fieldset>
        <legend>Read Perfis Users</legend>
        <input type="hidden" value="<?php if (isset($_POST['select']) || isset($_POST['confirm'])) {  echo $perfilUser->idPerfilUser; } ?>" name="id">
        <label for="nome">Nome <input type="text" value="<?php if (isset($_POST['select'])) {  echo $perfilUser->nome; } ?>" name="nome"></label>
        <?php if (isset($_POST['select'])) { ?>
            <label for="status">Ativo <input type="checkbox" name="status" value="1"></label>
            <button type="submit" value="update" name="update">Update</button>
            <button type="submit" value="" name="">X</button>
        <?php } else { ?>
            <button type="submit" value="read" name="read">Read</button>
        <?php } ?>
    </fieldset>
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
                        <td><?php echo translate($perfilUser->status); ?></td>

                        <?php if (isset($_POST['confirm'])) { ?>
                            <td><button type="submit" value="delete" name="delete">Delete</button></td>
                            <td><button type="submit" value="" name="">X</button></td>
                        <?php } else { ?>
                            <td><button type="submit" value="<?php echo $perfilUser->idPerfilUser; ?>" name="select" >Editar</button></td>
                            <td><button type="submit" value="<?php echo $perfilUser->idPerfilUser; ?>" name="confirm" >Excluir</button></td>
                        <?php } ?>
                    </tr>
                <?php } ?>
            <?php } ?>
        </table>
    </fieldset>
</form>
</body>
</html>