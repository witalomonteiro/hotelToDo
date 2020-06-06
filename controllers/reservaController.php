<?php
session_start();

$path = '/xampp/htdocs/Lab/hotelToDo';
require $path . '/models/Reserva.php';
require_once $path . '/models/ReservaDAO.php';
require_once $path . '/models/TipoAptoDAO.php';

$reserva = new Reserva();
$reservaDAO = new ReservaDAO();
$tipoAptoDAO = new TipoAptoDAO();

// LIST - Tipos Aptos
$tiposAptos = $tipoAptoDAO->list();

// CREATE
if (isset($_POST['create'])) {
    if ($_POST['nome'] != '' && $_POST['entrada'] != '' && $_POST['saida'] != ''&& $_POST['tipoApto'] != '') {
        $reserva->setNome($_POST['nome']);
        $reserva->setEntrada($_POST['entrada']);
        $reserva->setSaida($_POST['saida']);
        $reserva->setIdTipoApto($_POST['tipoApto']);
        $reserva->setStatus(1);
        $reservaDAO->create($reserva);

        header('Location: http://localhost/Lab/hotelToDo/views/createReserva.php');
    }
}

// READ
if (isset($_POST['read'])) {
    if ($_POST['nome'] != "") {
        $reservas = $reservaDAO->readByName($_POST['nome']);
    } elseif ($_POST['entrada'] != "") {
        $reservas = $reservaDAO->readByDate($_POST['entrada']);
    } else {
        $reservas = $reservaDAO->list();
    }
} else {
    $reservas = $reservaDAO->list();
}

// UPDATE
if (isset($_POST['cancelar'])) {
    $reserva = $reservaDAO->readById($_POST['cancelar']);
}
if (isset($_POST['confirmar'])) {
    $reserva->setStatus(0);
    $reservaDAO->updateStatus($_POST['id'], $reserva);
    header('Location: http://localhost/Lab/hotelToDo/views/readReserva.php');
}


?>