<?php

$path = '/xampp/htdocs/Lab/hotelToDo';
require_once $path . '/models/Database.php';

class produtoDAO {

    private $conexao;

    public function __construct() {
        $db = new Database();
        $this->conexao = $db->conectarPDO();
    }
    
    public function create(Produto $produto) {
        $sqlCreate = "INSERT INTO produto (nome, valor, status) VALUES (:nome, :valor, :status)";
        $create = $this->conexao->prepare($sqlCreate);
        $create->bindValue(':nome', $produto->getNome());
        $create->bindValue(':valor', $produto->getValor());
        $create->bindValue(':status', $produto->getStatus());
        $create->execute();
        return true;
    }
    public function readId(int $id) {
        $sqlReadId = "SELECT * FROM produto WHERE idProduto = :id";
        $readId = $this->conexao->prepare($sqlReadId);
        $readId->bindValue(':id', $id);
        $readId->execute();
        $produto= $readId->fetch(PDO::FETCH_OBJ);
        return $produto;
    }
    public function readName(string $nome) {
        $sqlReadName = "SELECT * FROM produto WHERE UPPER(nome) LIKE :nome";
        $readName = $this->conexao->prepare($sqlReadName);
        $readName->bindValue(':nome', "%$nome%");
        $readName->execute();
        $produtos = $readName->fetchAll(PDO::FETCH_OBJ);
        return $produtos;
    }
    public function list() {
        $sqlList = "SELECT * FROM produto";
        $list = $this->conexao->prepare($sqlList);
        $list->execute();
        $produtos = $list->fetchAll(PDO::FETCH_OBJ);
        return $produtos;
        
    }    
    public function delete(int $id) {
        $sqlDelete = "DELETE FROM produto WHERE idProduto = :id";
        $delete = $this->conexao->prepare($sqlDelete);
        $delete->bindValue(':id', $id);
        $delete->execute();
        return true;
    }
    public function update(int $id, Produto $produto) {
        $sqlUpdate = "UPDATE produto SET nome = :nome, valor = :valor, status = :status WHERE idProduto = :id";
        $update = $this->conexao->prepare($sqlUpdate);
        $update->bindValue(':nome', $produto->getNome());
        $update->bindValue(':valor', $produto->getValor());
        $update->bindValue(':status', $produto->getStatus());
        $update->bindValue(':id', $id);
        $update->execute();
    }
}
?>