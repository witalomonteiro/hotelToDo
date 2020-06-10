<?php

session_start();

$path = '/xampp/htdocs/Lab/hotelToDo';
require $path . '/models/HospedagemDAO.php';
require $path . '/models/TipoAptoDAO.php';
require $path . '/models/Hospedagem.php';
require $path . '/models/ReservaDAO.php';
require $path . '/models/AptoDAO.php';
require $path . '/models/Apto.php';
require $path . '/models/ServicoDAO.php';
require $path . '/models/ProdutoDAO.php';

$hospedagemDAO = new HospedagemDAO();
$tipoAptoDAO = new TipoAptoDAO();
$hospedagem = new Hospedagem();
$reservaDAO = new ReservaDAO();
$aptoDAO = new AptoDAO();
$servicoDAO = new ServicoDAO();
$produtoDAO = new ProdutoDAO();

// LISTS
$tiposAptos = $tipoAptoDAO->list();
$aptos = $aptoDAO->list();

if (isset($_POST['produto'])) {
    $consumos = $produtoDAO->list();
} elseif (isset($_POST['servico'])) {
    $consumos = $servicoDAO->list(); 
}

// READS BY ID
if (isset($_GET['idReserva'])) { 
    $reserva = $reservaDAO->readById($_GET['idReserva']); 
}
if (isset($_GET['idHospedagem'])) {
    $hospedagem = $hospedagemDAO->readById($_GET['idHospedagem']); 
}

// CREATE
if (isset($_POST['create'])) {
    if ($_POST['nome'] != '' && $_POST['entrada'] != '' && $_POST['saida'] != '' && $_POST['tipoApto'] != '' && $_POST['apto'] != '') {
        $hospedagem->setIdReserva($reserva->idReserva);
        $hospedagem->setIdApto($_POST['apto']);
        $hospedagem->setStatus(1);
        $hospedagemDAO->create($hospedagem);
        header('Location: http://localhost/Lab/hotelToDo/views/readHospedagem.php');
    }
}

// READ
if (isset($_POST['read'])) {
    if (isset($_POST['nome']) && $_POST['nome'] != "") {
        $hospedagens = $hospedagemDAO->readByHospede($_POST['nome']);
    } elseif (isset($_POST['numero']) && $_POST['numero'] != "") {
        $hospedagens = $hospedagemDAO->readByApto($_POST['numero']);
    } else {
        $hospedagens = $hospedagemDAO->list();
    }
}

?>