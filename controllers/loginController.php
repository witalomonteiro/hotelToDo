<?php

$path = '/xampp/htdocs/Lab/hotelToDo';
require_once $path . '/models/LoginDAO.php';
require_once $path . '/models/User.php';

session_start();

if (isset($_POST['entrar'])) {
    $login = new LoginDAO();
    if ($_POST['email'] != "" && $_POST['senha'] != "" ) {
        $user = new User();
        $user = $login->validarCredenciais($_POST['email'], $_POST['senha']);
        if ($user->status == 1) {
            $_SESSION['idUser'] = $user->idUser;
            $_SESSION['idPerfilUser'] = $user->idPerfilUser;
            header('Location: http://localhost/Lab/hotelToDo/views/main.php');
        }
    }
}

?>