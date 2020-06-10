<?php 

$path = '/xampp/htdocs/Lab/hotelToDo';
require_once $path . '/models/PerfilUser.php';
require_once $path . '/models/PerfilUserDAO.php';
require_once $path . '/models/TipoApto.php';
require_once $path . '/models/TipoAptoDAO.php';
require_once $path . '/models/Apto.php';
require_once $path . '/models/AptoDAO.php';
require_once $path . '/models/Reserva.php';
require_once $path . '/models/ReservaDAO.php';

function translateStatus(int $status) {
    if ($status == 1) {
        $translation = "Ativo";
    } else {
        $translation = "Inativo";
    }
    return $translation;
}
function translateStatusReserva(int $statusReserva) {
    switch ($statusReserva) {
        case 1: 
            $translate = "Ativa";
        break;
        case 0: 
            $translate = "Cancelada";
        break;
        case 2: 
            $translate = "Checkin";
        break;
    }
    return $translate;
}
function translatePerfilUser(int $perfil) {
    $perfilUser = new PerfilUser();
    $perfilUserDAO = new PerfilUserDAO();
    $perfilUser = $perfilUserDAO->readById($perfil);
    return $perfilUser->nome;
}
function translateTipoApto(int $tipo) {
    $tipoApto = new TipoApto();
    $tipoAptoDAO = new TipoAptoDAO();
    $tipoApto = $tipoAptoDAO->readById($tipo);
    return $tipoApto->nome;
}
function validadeIdUser(int $idUser) {
    $perfilUser = new PerfilUser();

    switch ($idUser) {
        case 1:
            return true;
            break;
        
        default:
            # code...
            break;
    }
}
function translateDateForDataBase(string $data) {
    $dateObject = DateTime::createFromFormat('d/m/Y', $data);
    return $dateObject->format('Y-m-d');
}
function translateDateForView(string $data) {
    $dateObject = DateTime::createFromFormat('Y-m-d', $data);
    return $dateObject->format('d/m/Y');
}
function translateApto(int $idApto) {
    $apto = new Apto();
    $aptoDAO = new AptoDAO();
    $apto = $aptoDAO->readById($idApto);
    return $apto->numero;
}
function translateStatusHospedagem(int $statusHospedagem) {
    switch ($statusHospedagem) {
        case 1: 
            $translate = "Ativa";
        break;
        case 0: 
            $translate = "Cancelada";
        break;
        case 2: 
            $translate = "Checkout";
        break;
    }
    return $translate;
}
function translateReservaHospede(string $idReserva) {
    $reserva = new Reserva();
    $reservaDAO = new ReservaDAO();
    $reserva = $reservaDAO->readById($idReserva);
    return $reserva->nome;
}

?>