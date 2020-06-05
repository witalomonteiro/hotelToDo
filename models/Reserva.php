<?php

class Reserva {

    private $idReserva;
    private $idApto;
    private $idUser;
    private $entrada;
    private $saida;
    private $status;

    public function setId(int $idReserva) {
        $this->idReserva = $idReserva;
    }
    public function getId(): int {
        return $this->idReserva;
    }
    public function setIdApto(int $idApto) {
        $this->idApto = $idApto;
    }
    public function getIdApto(): int {
        return $this->idApto;
    }

    public function setIdUser(int $idUser) {
        $this->idUser = $idUser;
    }
    public function getIdUser(): int {
        return $this->idUser;
    }

    public function setEntrada(string $entrada) {
        $this->entrada = $entrada;
    }
    public function getEntrada(): string {
        return $this->entrada;
    }
    public function setSaida(string $saida) {
        $this->saida = $saida;
    }
    public function getSaida(): string {
        return $this->saida;
    }
    public function setStatus(int $status) {
        $this->status = $status;
    }
    public function getStatus(): int {
        return $this->status;
    }
}

?>