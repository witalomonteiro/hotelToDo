<?php

$path = '/xampp/htdocs/Lab/hotelToDo';
require_once $path . '/controllers/login.php';

echo var_dump($_SESSION);

?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <form method="post">
        <fieldset>
            <legend>Login</legend>
            <label for="email">Login
                <input type="text" name="email">
            </label>
            <label for="senha">Password
                <input type="password" name="senha">
            </label>
            <button type="submit" name="entrar">Entrar</button>
        </fieldset>
    </form>
</body>
</html>