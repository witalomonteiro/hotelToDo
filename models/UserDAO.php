<?php

$path = '/xampp/htdocs/Lab/hotelToDo';
require_once $path . '/models/Database.php';

class UserDAO {

    private $conexao;

    public function __construct() {
        $db = new Database();
        $this->conexao = $db->conectarPDO();
    }
    public function create(User $user) {
        $sqlCreate = "INSERT INTO 
            user (idPerfilUser, nome, email, senha, status) 
            VALUES (:idPerfilUser, :nome, :email, :senha, :status)
        ";
        $create = $this->conexao->prepare($sqlCreate);
        $create->bindValue(':idPerfilUser', $user->getIdPerfilUser());
        $create->bindValue(':nome', $user->getNome());
        $create->bindValue(':email', $user->getEmail());
        $create->bindValue(':senha', $user->getSenha());
        $create->bindValue(':status', $user->getStatus());
        $create->execute();
        return true;
    }
    
    public function readById(int $id) {
        $sqlReadId = "SELECT * FROM user WHERE idUser = :id";
        $readId = $this->conexao->prepare($sqlReadId);
        $readId->bindValue(':id', $id);
        $readId->execute();
        $User = $readId->fetch(PDO::FETCH_OBJ);
        return $User;
    }
    public function readByName(string $nome) {
        $sqlReadName = "SELECT * FROM user WHERE UPPER(nome) LIKE :nome";
        $readName = $this->conexao->prepare($sqlReadName);
        $readName->bindValue(':nome', "%$nome%");
        $readName->execute();
        $users = $readName->fetchAll(PDO::FETCH_OBJ);
        return $users;
    }
    public function list() {
        $sqlList = "SELECT * FROM user";
        $list = $this->conexao->prepare($sqlList);
        $list->execute();
        $users = $list->fetchAll(PDO::FETCH_OBJ);
        return $users;
        
    }    
    public function delete(int $id) {
        $sqlDelete = "DELETE FROM user WHERE idUser = :id";
        $delete = $this->conexao->prepare($sqlDelete);
        $delete->bindValue(':id', $id);
        $delete->execute();
        return true;
    }
    public function update(int $id, User $user) {
        $sqlUpdate = "UPDATE user 
            SET idPerfilUser = :idPerfilUser, nome = :nome, email = :email, senha = :senha, status = :status
            WHERE idUser = :id
        ";
        $update = $this->conexao->prepare($sqlUpdate);
        $update->bindValue(':idPerfilUser', $user->getIdPerfilUser());
        $update->bindValue(':nome', $user->getNome());
        $update->bindValue(':email', $user->getEmail());
        $update->bindValue(':senha', $user->getSenha());
        $update->bindValue(':status', $user->getStatus());
        $update->bindValue(':id', $id);
        $update->execute();
        return true;
    }
}

?>