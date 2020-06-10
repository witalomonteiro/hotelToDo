<?php

session_start();

$path = '/xampp/htdocs/Lab/hotelToDo';
require_once $path . '/models/Produto.php';
require_once $path . '/models/ProdutoDAO.php';

$produto = new Produto();
$produtoDAO = new ProdutoDAO();

// CREATE
if (isset($_POST['create'])) {
    if ($_POST['nome'] != '') {
        if ($_POST['valor'] == "") { $_POST['valor'] = 0; }
        if ($_POST['status'] == "") { $_POST['status'] = 0; }
        $produto->setNome($_POST['nome']);
        $produto->setValor($_POST['valor']);
        $produto->setStatus($_POST['status']);
        $produtoDAO->create($produto);
        header('Location: http://localhost/Lab/hotelToDo/views/readProduto.php');
    }
}

// READ
if (isset($_POST['read'])) {
    $produtos = $produtoDAO->readName($_POST['nome']);
} else {
    $produtos = $produtoDAO->list();
}

// UPDATE
if (isset($_POST['selectUpdate'])) {
    $produto = $produtoDAO->readId($_POST['selectUpdate']);
}
if (isset($_POST['update'])) {
    if ($_POST['nome'] != '') {
        if ($_POST['valor'] == "") { $_POST['valor'] = 0; }
        if ($_POST['status'] == "") { $_POST['status'] = 0; }
        $produto = new produto();
        $produto->setId($_POST['id']);
        $produto->setNome($_POST['nome']);
        $produto->setValor($_POST['valor']);
        $produto->setStatus($_POST['status']);
        $produtoDAO->update($produto->getId(), $produto);
        header('Location: http://localhost/Lab/hotelToDo/views/readProduto.php');
    }
}

// DELETE
if (isset($_POST['selectDelete'])) {
    $produto = $produtoDAO->readId($_POST['selectDelete']);
}
if (isset($_POST['delete'])) {
    $produtoDAO->delete($_POST['id']);
    header('Location: http://localhost/Lab/hotelToDo/views/readProduto.php');
}

?>