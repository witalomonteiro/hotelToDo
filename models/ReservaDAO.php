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
            reserva (idTipoApto, nome, entrada, saida, status) 
            VALUES (:idTipoApto, :nome, :entrada, :saida, :status)
        ";
        $create = $this->conexao->prepare($sqlCreate);
        $create->bindValue(':idTipoApto', $reserva->getIdTipoApto());
        $create->bindValue(':nome', $reserva->getNome());
        $create->bindValue(':entrada', $reserva->getEntrada());
        $create->bindValue(':saida', $reserva->getSaida());
        $create->bindValue(':status', $reserva->getStatus());
        $create->execute();
        return true;
    }

    public function list() {
        $sqlList = "SELECT * FROM reserva";
        $list = $this->conexao->prepare($sqlList);
        $list->execute();
        $reservas = $list->fetchAll(PDO::FETCH_OBJ);
        return $reservas;  
    }

    public function readByName(string $nome) {
        $sqlReadByName = "SELECT * FROM reserva WHERE UPPER(nome) LIKE :nome";
        $readByName = $this->conexao->prepare($sqlReadByName);
        $readByName->bindValue(':nome', "%$nome%");
        $readByName->execute();
        $reservas = $readByName->fetchAll(PDO::FETCH_OBJ);
        return $reservas;
    }

    public function readByDate(string $entrada) {
        $sqlReadByDate = "SELECT * FROM reserva WHERE entrada >= :entrada";
        $readByDate = $this->conexao->prepare($sqlReadByDate);
        $readByDate->bindValue(':entrada', $entrada);
        $readByDate->execute();
        $reservas = $readByDate->fetchAll(PDO::FETCH_OBJ);
        return $reservas;
    }

    public function readById(int $id) {
        $sqlReadById = "SELECT * FROM reserva WHERE idReserva = :id";
        $readById = $this->conexao->prepare($sqlReadById);
        $readById->bindValue(':id', $id);
        $readById->execute();
        $reserva = $readById->fetch(PDO::FETCH_OBJ);
        return $reserva;
    }

    public function updateStatus(int $id, Reserva $reserva) {
        $sqlUpdateStatus = "UPDATE reserva SET status = :status WHERE idReserva = :id";
        $updateStatus = $this->conexao->prepare($sqlUpdateStatus);
        $updateStatus->bindValue(':status', $reserva->getStatus());
        $updateStatus->bindValue(':id', $id);
        $updateStatus->execute();
        return true;
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