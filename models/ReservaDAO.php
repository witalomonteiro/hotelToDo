<?php

$path = '/xampp/htdocs/Lab/hotelToDo';
require_once $path . '/models/Database.php';

class ReservaDAO {

    private $conexao;

    public function __construct() {
        $db = new Database();
        $this->conexao = $db->conectarPDO();
    }
    public function create(Reserva $reserva) {
        $sqlCreate = "INSERT INTO 
            reserva (idTipoApto, idUser, entrada, saida, status) 
            VALUES (:idTipoApto, :idUser, :entrada, :saida, :status)
        ";
        $create = $this->conexao->prepare($sqlCreate);
        $create->bindValue(':idTipoApto', $reserva->getIdApto());
        $create->bindValue(':idUser', $reserva->getIdUser());
        $create->bindValue(':entrada', $reserva->getEntrada());
        $create->bindValue(':saida', $reserva->getSaida());
        $create->bindValue(':status', $reserva->getStatus());
        $create->execute();
        return true;
    }
    public function readId(int $id) {
        $sqlReadId = "SELECT * FROM apto WHERE idApto = :id";
        $readId = $this->conexao->prepare($sqlReadId);
        $readId->bindValue(':id', $id);
        $readId->execute();
        $apto = $readId->fetch(PDO::FETCH_OBJ);
        return $apto;
    }
    public function readNumber(string $numero) {
        $sqlReadName = "SELECT * FROM apto WHERE UPPER(numero) LIKE :numero";
        $readNumber = $this->conexao->prepare($sqlReadName);
        $readNumber->bindValue(':numero', "$numero%");
        $readNumber->execute();
        $aptos = $readNumber->fetchAll(PDO::FETCH_OBJ);
        return $aptos;
    }
    public function list() {
        $sqlList = "SELECT * FROM apto";
        $list = $this->conexao->prepare($sqlList);
        $list->execute();
        $aptos = $list->fetchAll(PDO::FETCH_OBJ);
        return $aptos;
        
    }    
    public function delete(int $id) {
        $sqlDelete = "DELETE FROM apto WHERE idApto = :id";
        $delete = $this->conexao->prepare($sqlDelete);
        $delete->bindValue(':id', $id);
        $delete->execute();
        return true;
    }
    public function update(int $id, Apto $apto) {
        $sqlUpdate = "UPDATE apto 
            SET idTipoApto = :idTipoApto, numero = :numero, status = :status
            WHERE idApto = :id
        ";
        $update = $this->conexao->prepare($sqlUpdate);
        $update->bindValue(':idTipoApto', $apto->getIdTipoApto());
        $update->bindValue(':numero', $apto->getNumero());
        $update->bindValue(':status', $apto->getStatus());
        $update->bindValue(':id', $id);
        $update->execute();
        return true;
    }
}

?>