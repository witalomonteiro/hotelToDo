<?php

$path = '/xampp/htdocs/Lab/hotelToDo';
require_once $path . '/models/Database.php';

class ServicoDAO {

    private $conexao;

    public function __construct() {
        $db = new Database();
        $this->conexao = $db->conectarPDO();
    }
    
    public function create(servico $servico) {
        $sqlCreate = "INSERT INTO servico (nome, valor, status) VALUES (:nome, :valor, :status)";
        $create = $this->conexao->prepare($sqlCreate);
        $create->bindValue(':nome', $servico->getNome());
        $create->bindValue(':valor', $servico->getValor());
        $create->bindValue(':status', $servico->getStatus());
        $create->execute();
        return true;
    }
    public function readId(int $id) {
        $sqlReadId = "SELECT * FROM servico WHERE idServico = :id";
        $readId = $this->conexao->prepare($sqlReadId);
        $readId->bindValue(':id', $id);
        $readId->execute();
        $servico = $readId->fetch(PDO::FETCH_OBJ);
        return $servico;
    }
    public function readName(string $nome) {
        $sqlReadName = "SELECT * FROM servico WHERE UPPER(nome) LIKE :nome";
        $readName = $this->conexao->prepare($sqlReadName);
        $readName->bindValue(':nome', "%$nome%");
        $readName->execute();
        $servicos = $readName->fetchAll(PDO::FETCH_OBJ);
        return $servicos;
    }
    public function list() {
        $sqlList = "SELECT * FROM servico";
        $list = $this->conexao->prepare($sqlList);
        $list->execute();
        $servicos = $list->fetchAll(PDO::FETCH_OBJ);
        return $servicos;
        
    }    
    public function delete(int $id) {
        $sqlDelete = "DELETE FROM servico WHERE idServico = :id";
        $delete = $this->conexao->prepare($sqlDelete);
        $delete->bindValue(':id', $id);
        $delete->execute();
        return true;
    }
    public function update(int $id, Servico $servico) {
        $sqlUpdate = "UPDATE servico SET nome = :nome, valor = :valor, status = :status WHERE idServico = :id";
        $update = $this->conexao->prepare($sqlUpdate);
        $update->bindValue(':nome', $servico->getNome());
        $update->bindValue(':valor', $servico->getValor());
        $update->bindValue(':status', $servico->getStatus());
        $update->bindValue(':id', $id);
        $update->execute();
    }
}
?>