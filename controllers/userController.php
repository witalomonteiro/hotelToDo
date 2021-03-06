<?php
session_start();

$path = '/xampp/htdocs/Lab/hotelToDo';
require_once $path . '/models/PerfilUserDAO.php';  
require_once $path . '/models/User.php';   
require_once $path . '/models/UserDAO.php';   

$perfilUserDAO = new PerfilUserDAO();
$user = new User();
$userDAO = new UserDAO();

// READ - Perfil User
$perfisUsers = $perfilUserDAO->list();

// CREATE
if (isset($_POST['create'])) {
    if ($_POST['nome'] != '') {
        if (!isset($_POST['status'])) { $_POST['status'] = 0; }

        $user->setIdPerfilUser($_POST['idPerfilUser']);
        $user->setNome($_POST['nome']);
        $user->setEmail($_POST['email']);
        $user->setSenha($_POST['senha']);
        $user->setStatus($_POST['status']);
        $userDAO->create($user);

        header('Location: http://localhost/Lab/hotelToDo/views/readUser.php');
    }

}

// READ
if (isset($_POST['read'])) {
    $users = $userDAO->readByName($_POST['nome']);
} else {
    $users = $userDAO->list();
}

// UPDATE
if (isset($_POST['selectUpdate'])) {
    $user = $userDAO->readById($_POST['selectUpdate']);
}
if (isset($_POST['update'])) {
    if ($_POST['nome'] != '') {
        if (!isset($_POST['status'])) { $_POST['status'] = 0; }
        
        $user = new User();
        $user->setIdUser($_POST['id']);
        $user->setIdPerfilUser($_POST['idPerfilUser']);
        $user->setNome($_POST['nome']);
        $user->setEmail($_POST['email']);
        $user->setSenha($_POST['senha']);
        $user->setStatus($_POST['status']);
        $userDAO->update($user->getIdUser(), $user);

        header('Location: http://localhost/Lab/hotelToDo/views/readUser.php');
    }
}

// DELETE
if (isset($_POST['selectDelete'])) {
    $user = $userDAO->readById($_POST['selectDelete']);
}
if (isset($_POST['delete'])) {
    $userDAO->delete($_POST['id']);
    header('Location: http://localhost/Lab/hotelToDo/views/readUser.php');
}


?>