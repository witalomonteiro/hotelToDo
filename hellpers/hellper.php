<?php 

$path = '/xampp/htdocs/Lab/hotelToDo';
require_once $path . '/models/PerfilUser.php';
require_once $path . '/models/PerfilUserDAO.php';
require_once $path . '/models/TipoApto.php';
require_once $path . '/models/TipoAptoDAO.php';


function translate(int $status) {
    if ($status == 1) {
        $translation = "Ativo";
    } else {
        $translation = "Inativo";
    }
    return $translation;
}

function translatePerfil(int $perfil) {
    $perfilUser = new PerfilUser();
    $perfilUserDAO = new PerfilUserDAO();
    $perfilUser = $perfilUserDAO->readId($perfil);
    return $perfilUser;
}

function translateTipo(int $tipo) {
    $tipoApto = new TipoApto();
    $tipoAptoDAO = new TipoAptoDAO();
    $tipoApto = $tipoAptoDAO->readId($tipo);
    return $tipoApto;
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

?>