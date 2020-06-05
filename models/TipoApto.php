<?php

class TipoApto {

    private $idTipoApto;
    private $nome;
    private $valor;
    private $status;

    public function setId(int $idTipoApto) {
        $this->idTipoApto = $idTipoApto;
    }
    public function getId(): int {
        return $this->idTipoApto;
    }
    public function setNome(string $nome) {
        $this->nome = $nome;
    }
    public function getNome(): string {
        return $this->nome;
    }
    public function setValor(float $valor) {
        $this->valor = $valor;
    }
    public function getValor(): float {
        return $this->valor;
    }
    public function setStatus(int $status) {
        $this->status = $status;
    }
    public function getStatus(): int {
        return $this->status;
    }
}

?>