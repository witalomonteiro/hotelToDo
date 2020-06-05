<?php

class Apto {

    private $idApto;
    private $idTipoApto;
    private $numero;
    private $status;

    public function setIdApto(int $idApto) {
        $this->idApto = $idApto;
    }
    public function getIdApto(): int {
        return $this->idApto;
    }
    public function setIdTipoApto(int $idTipoApto) {
        $this->idTipoApto = $idTipoApto;
    }
    public function getIdTipoApto(): int {
        return $this->idTipoApto;
    }
    public function setNumero(int $numero) {
        $this->numero = $numero;
    }
    public function getNumero(): int {
        return $this->numero;
    }
    public function setStatus(int $status) {
        $this->status = $status;
    }
    public function getStatus(): int{
        return $this->status;
    }


}

?>