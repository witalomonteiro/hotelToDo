<?php
session_start();

$path = '/xampp/htdocs/Lab/hotelToDo';
require_once $path . '/models/TipoAptoDAO.php';  
require_once $path . '/models/Apto.php';   
require_once $path . '/models/AptoDAO.php';   

$tipoAptoDAO= new TipoAptoDAO();
$apto = new Apto();
$aptoDAO = new AptoDAO();

// READ - Tipo Apto
$tiposAptos = $tipoAptoDAO->list();
    
// CREATE   
if (isset($_POST['create'])) {
    if ($_POST['numero'] != '') {
        if (!isset($_POST['status'])) { $_POST['status'] = 0; }

        $apto->setIdTipoApto($_POST['idTipoApto']);
        $apto->setNumero($_POST['numero']);
        $apto->setStatus($_POST['status']);
        $aptoDAO->create($apto);

        header('Location: http://localhost/Lab/hotelToDo/views/readApto.php');
    }

}

// READ
if (isset($_POST['read'])) {
    $aptos = $aptoDAO->readByNumber($_POST['numero']);
} else {
    $aptos = $aptoDAO->list();
}

// UPDATE
if (isset($_POST['select'])) {
    $apto = $aptoDAO->readById($_POST['select']);
}
if (isset($_POST['update'])) {
    if ($_POST['numero'] != '') {
        if (!isset($_POST['status'])) { $_POST['status'] = 0; }
        
        $apto = new Apto();
        $apto->setIdApto($_POST['id']);
        $apto->setIdTipoApto($_POST['idTipoApto']);
        $apto->setNumero($_POST['numero']);
        $apto->setStatus($_POST['status']);
        $aptoDAO->update($apto->getIdApto(), $apto);

        header('Location: http://localhost/Lab/hotelToDo/views/readApto.php');
    }
}

// DELETE
if (isset($_POST['confirm'])) {
    $apto = $aptoDAO->readId($_POST['confirm']);
}
if (isset($_POST['delete'])) {
    $aptoDAO->delete($_POST['id']);
    header('Location: http://localhost/Lab/hotelToDo/views/readApto.php');
}

?>