<?php
session_start();

$path = '/xampp/htdocs/Lab/hotelToDo';
require_once $path . '/models/PerfilUser.php';
require_once $path . '/models/PerfilUserDAO.php';

$perfilUser = new perfilUser();
$perfilUserDAO = new perfilUserDAO();

// CREATE
if (isset($_POST['create'])) {
    if ($_POST['nome'] != '') {
        if (!isset($_POST['status'])) { $_POST['status'] = 0; }
        $perfilUser->setNome($_POST['nome']);
        $perfilUser->setStatus($_POST['status']);
        $perfilUserDAO->create($perfilUser);
        header('Location: http://localhost/Lab/hotelToDo/views/readPerfilUser.php');
    }  
}

// READ
if (isset($_POST['read'])) {
    $perfisUsers = $perfilUserDAO->readByName($_POST['nome']);
} else {
    $perfisUsers = $perfilUserDAO->list();
}

// UPDATE
if (isset($_POST['selectUpdate'])) {
    $perfilUser = $perfilUserDAO->readById($_POST['selectUpdate']);
}
if (isset($_POST['update'])) {
    if ($_POST['nome'] != '') {
        if (!isset($_POST['status'])) { $_POST['status'] = 0; }
        $perfilUser = new perfilUser();
        $perfilUser->setId($_POST['id']);
        $perfilUser->setNome($_POST['nome']);
        $perfilUser->setStatus($_POST['status']);
        $perfilUserDAO->update($perfilUser->getId(), $perfilUser);
        header('Location: http://localhost/Lab/hotelToDo/views/readPerfilUser.php');
    }
}

// DELETE
if (isset($_POST['selectDelete'])) {
    $perfilUser = $perfilUserDAO->readById($_POST['selectDelete']);
}
if (isset($_POST['delete'])) {
    $perfilUserDAO->delete($_POST['id']);
    header('Location: http://localhost/Lab/hotelToDo/views/readPerfilUser.php');
}



?>