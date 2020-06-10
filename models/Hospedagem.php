<?php

$path = '/xampp/htdocs/Lab/hotelToDo';
require_once $path . '/models/Database.php';

class Hospedagem {

    private $idHospedagem;
    private $idReserva;
    private $idApto;
    private $status;

    private $hospedes = [];
    private $produtos= [];
    private $servicos = [];

    private $totalDiarias;
    private $totalServicos;
    private $totalProdutos;
    private $totalGeral;
    
    public function setIdHospedagem(int $idHospedagem) {
        $this->idApto = $idHospedagem;
    }
    public function getIdHospedagem(): int {
        return $this->idHospedagem;
    }
    public function setIdApto(int $idApto) {
        $this->idApto = $idApto;
    }
    public function getIdApto(): int {
        return $this->idApto;
    }
    public function setIdReserva(int $idReserva) {
        $this->idReserva = $idReserva;
    }
    public function getIdReserva(): int {
        return $this->idReserva;
    }
    public function setStatus(int $status) {
        $this->status = $status;
    }
    public function getStatus(): int {
        return $this->status;
    }

}

?>