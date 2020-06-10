<?php

$path = '/xampp/htdocs/Lab/hotelToDo';
require_once $path . '/models/Database.php';

class HospedagemDAO {

    private $conexao;

    public function __construct() {
        $db = new Database();
        $this->conexao = $db->conectarPDO();
    }
    public function create(Hospedagem $hospedagem) {
        $sqlCreate = "INSERT INTO 
            hospedagem (idReserva, idApto, status) 
            VALUES (:idReserva, :idApto, :status)
        ";
        $create = $this->conexao->prepare($sqlCreate);
        $create->bindValue(':idReserva', $hospedagem->getIdReserva());
        $create->bindValue(':idApto', $hospedagem->getIdApto());
        $create->bindValue(':status', $hospedagem->getStatus());
        $create->execute();
        return true;
    }
    public function list() {
        $sqlList = "
            SELECT DISTINCT hospedagem.idHospedagem, reserva.nome, apto.numero, hospedagem.status 
            FROM hospedagem, reserva, apto
            WHERE hospedagem.idReserva = reserva.idReserva AND hospedagem.idApto = apto.idApto
        ";
        $list = $this->conexao->prepare($sqlList);
        $list->execute();
        $hospedagens = $list->fetchAll(PDO::FETCH_OBJ);
        return $hospedagens; 
    } 
    public function readById(int $id) {
        $sql = "
            SELECT DISTINCT hospedagem.idHospedagem, reserva.nome, apto.numero, hospedagem.status 
            FROM hospedagem, reserva, apto
            WHERE idHospedagem = :id AND hospedagem.idReserva = reserva.idReserva AND hospedagem.idApto = apto.idApto
        ";
        $readById = $this->conexao->prepare($sql);
        $readById->bindValue(':id', $id);
        $readById->execute();
        $hospedagem = $readById->fetch(PDO::FETCH_OBJ);
        return $hospedagem;
    }
    public function readByHospede(string $nome) {
        $sql = "
            SELECT DISTINCT hospedagem.idHospedagem, reserva.nome, apto.numero, hospedagem.status 
            FROM hospedagem, reserva, apto
            WHERE UPPER(reserva.nome) LIKE :nome AND hospedagem.idReserva = reserva.idReserva AND hospedagem.idApto = apto.idApto
        ";
        $readByHospede = $this->conexao->prepare($sql);
        $readByHospede->bindValue(':nome', "%$nome%");
        $readByHospede->execute();
        $hospedagens = $readByHospede->fetchAll(PDO::FETCH_OBJ);
        return $hospedagens;
    }
    public function readByApto(int $numero) {
        $sql = "
            SELECT DISTINCT hospedagem.idHospedagem, reserva.nome, apto.numero, hospedagem.status 
            FROM hospedagem, reserva, apto
            WHERE apto.numero LIKE :numero AND hospedagem.idReserva = reserva.idReserva AND hospedagem.idApto = apto.idApto
        ";
        $readByApto = $this->conexao->prepare($sql);
        $readByApto->bindValue(':numero', "%$numero%");
        $readByApto->execute();
        $hospedagens = $readByApto->fetchAll(PDO::FETCH_OBJ);
        return $hospedagens;
    }
    /*

    
  
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
    */
}

?>