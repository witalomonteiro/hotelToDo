<?php

$path = '/xampp/htdocs/Lab/hotelToDo';
require_once $path . '/models/Database.php';

class TipoAptoDAO {

    private $conexao;

    public function __construct() {
        $db = new Database();
        $this->conexao = $db->conectarPDO();
    }
    public function create(TipoApto $tipoApto) {
        $sqlCreate = "INSERT INTO tipoApto (nome, valor, status) VALUES (:nome, :valor, :status)";
        $create = $this->conexao->prepare($sqlCreate);
        $create->bindValue(':nome', $tipoApto->getNome());
        $create->bindValue(':valor', $tipoApto->getValor());
        $create->bindValue(':status', $tipoApto->getStatus());
        $create->execute();
        return true;
    }
    public function readId(int $id) {
        $sqlReadId = "SELECT * FROM tipoApto WHERE idTipoApto = :id";
        $readId = $this->conexao->prepare($sqlReadId);
        $readId->bindValue(':id', $id);
        $readId->execute();
        $tipoApto = $readId->fetch(PDO::FETCH_OBJ);
        return $tipoApto;
    }
    public function readName(string $nome) {
        $sqlReadName = "SELECT * FROM tipoApto WHERE UPPER(nome) LIKE :nome";
        $readName = $this->conexao->prepare($sqlReadName);
        $readName->bindValue(':nome', "%$nome%");
        $readName->execute();
        $tiposAptos = $readName->fetchAll(PDO::FETCH_OBJ);
        return $tiposAptos;
    }
    public function list() {
        $sqlList = "SELECT * FROM tipoApto";
        $list = $this->conexao->prepare($sqlList);
        $list->execute();
        $tiposAptos = $list->fetchAll(PDO::FETCH_OBJ);
        return $tiposAptos;
        
    }    
    public function delete(int $id) {
        $sqlDelete = "DELETE FROM tipoApto WHERE idTipoApto = :id";
        $delete = $this->conexao->prepare($sqlDelete);
        $delete->bindValue(':id', $id);
        $delete->execute();
        return true;
    }
    public function update(int $id, TipoApto $tipoApto) {
        $sqlUpdate = "UPDATE tipoApto SET nome = :nome, valor = :valor, status = :status WHERE idTipoApto = :id";
        $update = $this->conexao->prepare($sqlUpdate);
        $update->bindValue(':nome', $tipoApto->getNome());
        $update->bindValue(':valor', $tipoApto->getValor());
        $update->bindValue(':status', $tipoApto->getStatus());
        $update->bindValue(':id', $id);
        $update->execute();
    }
}

?>