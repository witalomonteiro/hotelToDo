<?php
session_start();

$path = '/xampp/htdocs/Lab/hotelToDo';
require_once $path . '/models/TipoApto.php';
require_once $path . '/models/TipoAptoDAO.php';

$tipoApto = new TipoApto();
$tipoAptoDAO = new TipoAptoDAO();

// CREATE
if (isset($_POST['create'])) {
    if ($_POST['nome'] != '') {
        if ($_POST['valor'] == "") { $_POST['valor'] = 0; }
        if ($_POST['status'] == "") { $_POST['status'] = 0; }
        $tipoApto->setNome($_POST['nome']);
        $tipoApto->setValor($_POST['valor']);
        $tipoApto->setStatus($_POST['status']);
        $tipoAptoDAO->create($tipoApto);
        header('Location: http://localhost/Lab/hotelToDo/views/readTipoApto.php');
    } 
}

// READ
if (isset($_POST['read'])) {
    $tiposAptos = $tipoAptoDAO->readByName($_POST['nome']);
} else {
    $tiposAptos = $tipoAptoDAO->list();
}

// UPDATE
if (isset($_POST['selectUpdate'])) {
    $tipoApto = $tipoAptoDAO->readById($_POST['selectUpdate']);
}
if (isset($_POST['update'])) {
    if ($_POST['nome'] != '') {
        if ($_POST['valor'] == "") { $_POST['valor'] = 0; }
        if ($_POST['status'] == "") { $_POST['status'] = 0; }
        $tipoApto = new TipoApto();
        $tipoApto->setId($_POST['id']);
        $tipoApto->setNome($_POST['nome']);
        $tipoApto->setValor($_POST['valor']);
        $tipoApto->setStatus($_POST['status']);
        $tipoAptoDAO->update($tipoApto->getId(), $tipoApto);
        header('Location: http://localhost/Lab/hotelToDo/views/readTipoApto.php');
    }
}

// DELETE
if (isset($_POST['selectDelete'])) {
    $tipoApto = $tipoAptoDAO->readById($_POST['selectDelete']);
}
if (isset($_POST['delete'])) {
    $tipoAptoDAO->delete($_POST['id']);
    header('Location: http://localhost/Lab/hotelToDo/views/readTipoApto.php');
}



?>