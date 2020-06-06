<?php

$path = '/xampp/htdocs/Lab/hotelToDo';
require_once $path . '/controllers/userController.php';
require_once $path . '/hellpers/hellper.php'; 

echo var_dump($_SESSION); 
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
        <li><a href="http://localhost/Lab/hotelToDo/views/createUser.php">Create</a></li>
    </ul>
</nav>
<form method="post">
    <fieldset>
        <legend>Read Users</legend>
        <input type="hidden" name="id" value="<?php if (isset($_POST['select']) || isset($_POST['confirm'])) {  echo $user->idUser; } ?>">
        <label for="nome">Nome <input type="text" name="nome" size="25" value="<?php if (isset($_POST['select'])) {  echo $user->nome; } ?>"></label><br />
        <?php if (isset($_POST['select'])) { ?>
            <label for="email">Email <input type="email" name="email" size="25" value="<?php if (isset($_POST['select'])) {  echo $user->email; } ?>"></label><br />
            <label for="senha">Senha <input type="password" name="senha" size="25" value="<?php if (isset($_POST['select'])) {  echo $user->senha; } ?>"></label><br />
            <label for="perfilUser">Perfil 
                <select name="idPerfilUser">
                    <option value=""></option>
                    <?php if (isset($perfisUsers)) { ?>
                        <?php foreach($perfisUsers as $perfilUser) { ?>
                            <?php if ($perfilUser->status == 1 && $perfilUser->idPerfilUser == $user->idPerfilUser) { ?>
                                    <option value="<?php echo $perfilUser->idPerfilUser; ?>" selected><?php echo $perfilUser->nome; ?></option>
                                <?php } else { ?>
                                    <option value="<?php echo $perfilUser->idPerfilUser; ?>"><?php echo $perfilUser->nome; ?></option>
                            <?php } ?>
                        <?php } ?>
                    <?php } ?>
                </select>
            </label>
            <label for="status">Ativo
                <input type="checkbox" name="status" value="1">
            </label>
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
                <th>Nome</th>
                <th>Email</th>
                <th>Senha</th>
                <th>Perfil</th>
                <th>Status</th>
            </tr>
            <?php if (isset($users)) { ?>
                <?php foreach($users as $user) { ?>
                    <tr>
                        <td><?php echo $user->idUser; ?></td>
                        <td><?php echo $user->nome; ?></td>
                        <td><?php echo $user->email; ?></td>
                        <td><?php echo $user->senha; ?></td>
                        <td><?php echo translatePerfilUser($user->idPerfilUser); ?></td>
                        <td><?php echo translateStatus($user->status); ?></td>

                        <?php if (isset($_POST['confirm'])) { ?>
                            <td><button type="submit" value="delete" name="delete">Delete</button></td>
                            <td><button type="submit" value="" name="">X</button></td>
                        <?php } else { ?>
                            <td><button type="submit" value="<?php echo $user->idUser; ?>" name="select" >Editar</button></td>
                            <td><button type="submit" value="<?php echo $user->idUser; ?>" name="confirm" >Excluir</button></td>
                        <?php } ?>
                    </tr>
                <?php } ?>
            <?php } ?>
        </table>
    </fieldset>
</form>
</body>
</html>