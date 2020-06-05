<?php

class PerfilUser {

    private $idPerfilUser;
    private $nome;
    private $status;

    public function setId(int $idPerfilUser) {
        $this->idPerfilUser = $idPerfilUser;
    }
    public function getId(): int {
        return $this->idPerfilUser;
    }
    public function setNome(string $nome) {
        $this->nome = $nome;
    }
    public function getNome(): string {
        return $this->nome;
    }
    public function setStatus(int $status) {
        $this->status = $status;
    }
    public function getStatus(): int {
        return $this->status;
    }
}

?>