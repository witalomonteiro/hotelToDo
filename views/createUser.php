<?php 
$path = '/xampp/htdocs/Lab/hotelToDo';
require_once $path . '/controllers/UserController.php';
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/normalize.css">
    <title>Create Perfil User</title>
</head>
<body>
<nav>
    <ul>
        <li><a href="http://localhost/Lab/hotelToDo/views/main.php" class="main-button">Main</a></li>
        <li><a href="http://localhost/Lab/hotelToDo/views/readUser.php">Read</a></li>
    </ul>
</nav>
<form action="" method="post">
    <fieldset>
        <legend>Novo User</legend>
        <label for="nome">Nome <input type="text" name="nome" size="25"></label><br />
        <label for="email">Email <input type="email" name="email" size="25"></label><br />
        <label for="senha">Senha <input type="password" name="senha" size="25"></label><br />
        <label for="perfilUser"> Perfil
            <select name="idPerfilUser">
                <option value=""></option>
                <?php if (isset($perfisUsers)) { ?>
                    <?php foreach($perfisUsers as $perfilUser) { ?>
                        <?php if ($perfilUser->status == 1) { ?>
                            <option value="<?php echo $perfilUser->idPerfilUser; ?>"><?php echo $perfilUser->nome; ?></option>
                        <?php } ?>
                    <?php } ?>
                <?php } ?>
            </select>
        </label>
        <label for="status">Ativo<input type="checkbox" name="status" value="1"></label></br>

        <button type="submit" value="create" name="create" >Create</button>
    </fieldset>
</form>
</body>
</html>