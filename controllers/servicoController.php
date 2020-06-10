<?php
session_start();

$path = '/xampp/htdocs/Lab/hotelToDo';
require_once $path . '/models/Servico.php';
require_once $path . '/models/ServicoDAO.php';

$servico = new Servico();
$servicoDAO = new ServicoDAO();

// CREATE
if (isset($_POST['create'])) {
    if ($_POST['nome'] != '') {
        if ($_POST['valor'] == "") { $_POST['valor'] = 0; }
        if ($_POST['status'] == "") { $_POST['status'] = 0; }
        $servico->setNome($_POST['nome']);
        $servico->setValor($_POST['valor']);
        $servico->setStatus($_POST['status']);
        $servicoDAO->create($servico);
        header('Location: http://localhost/Lab/hotelToDo/views/readservico.php');
    }
    
}

// READ
if (isset($_POST['read'])) {
    $servicos = $servicoDAO->readName($_POST['nome']);
} else {
    $servicos = $servicoDAO->list();
}

// UPDATE
if (isset($_POST['selectUpdatde'])) {
    $servico = $servicoDAO->readId($_POST['selectUpdate']);
}
if (isset($_POST['update'])) {
    if ($_POST['nome'] != '') {
        if ($_POST['valor'] == "") { $_POST['valor'] = 0; }
        if ($_POST['status'] == "") { $_POST['status'] = 0; }
        $servico = new servico();
        $servico->setId($_POST['id']);
        $servico->setNome($_POST['nome']);
        $servico->setValor($_POST['valor']);
        $servico->setStatus($_POST['status']);
        $servicoDAO->update($servico->getId(), $servico);
        header('Location: http://localhost/Lab/hotelToDo/views/readServico.php');
    }
}

// DELETE
if (isset($_POST['selectDelete'])) {
    $servico = $servicoDAO->readId($_POST['selectDelete']);
}
if (isset($_POST['delete'])) {
    $servicoDAO->delete($_POST['id']);
    header('Location: http://localhost/Lab/hotelToDo/views/readServico.php');
}



?>