<?php

$path = '/xampp/htdocs/Lab/hotelToDo';
require_once $path . '/models/Database.php';

class PerfilUserDAO {

    private $conexao;

    public function __construct() {
        $db = new Database();
        $this->conexao = $db->conectarPDO();
    }
    public function create(PerfilUser $perfilUser) {
        $sqlCreate = "INSERT INTO perfilUser (nome, status) VALUES (:nome, :status)";
        $create = $this->conexao->prepare($sqlCreate);
        $create->bindValue(':nome', $perfilUser->getNome());
        $create->bindValue(':status', $perfilUser->getStatus());
        $create->execute();
        return true;
    }
    public function readId(int $id) {
        $sqlReadId = "SELECT * FROM perfilUser WHERE idPerfilUser = :id";
        $readId = $this->conexao->prepare($sqlReadId);
        $readId->bindValue(':id', $id);
        $readId->execute();
        $perfilUser = $readId->fetch(PDO::FETCH_OBJ);
        return $perfilUser;
    }
    public function readName(string $nome) {
        $sqlReadName = "SELECT * FROM perfilUser WHERE UPPER(nome) LIKE :nome";
        $readName = $this->conexao->prepare($sqlReadName);
        $readName->bindValue(':nome', "%$nome%");
        $readName->execute();
        $perfisUsers = $readName->fetchAll(PDO::FETCH_OBJ);
        return $perfisUsers;
    }
    public function list() {
        $sqlList = "SELECT * FROM perfilUser";
        $list = $this->conexao->prepare($sqlList);
        $list->execute();
        $perfisUsers = $list->fetchAll(PDO::FETCH_OBJ);
        return $perfisUsers;
        
    }    
    public function delete(int $id) {
        $sqlDelete = "DELETE FROM perfilUser WHERE idPerfilUser = :id";
        $delete = $this->conexao->prepare($sqlDelete);
        $delete->bindValue(':id', $id);
        $delete->execute();
        return true;
    }
    public function update(int $id, PerfilUser $perfilUser) {
        $sqlUpdate = "UPDATE perfilUser SET nome = :nome, status = :status WHERE idPerfilUser = :id";
        $update = $this->conexao->prepare($sqlUpdate);
        $update->bindValue(':nome', $perfilUser->getNome());
        $update->bindValue(':status', $perfilUser->getStatus());
        $update->bindValue(':id', $id);
        $update->execute();
    }
}

?>