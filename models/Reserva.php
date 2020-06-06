<?php

class Reserva {

    private $idReserva;
    private $idTipoApto;
    private $nome;
    private $entrada;
    private $saida;
    private $status;

    public function setId(int $idReserva) {
        $this->idReserva = $idReserva;
    }
    public function getId(): int {
        return $this->idReserva;
    }
    public function setIdTipoApto(int $idTipoApto) {
        $this->idTipoApto = $idTipoApto;
    }
    public function getIdTipoApto(): int {
        return $this->idTipoApto;
    }
    public function setNome(string $nome) {
        $this->nome = $nome;
    }
    public function getNome(): string {
        return $this->nome;
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