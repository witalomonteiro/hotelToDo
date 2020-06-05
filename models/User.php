<?php

class User {

    private $idUser;
    private $idPerfilUser;
    private $nome;
    private $email;
    private $senha;
    private $status;

    public function setIdUser(int $idUser) {
        $this->idUser = $idUser;
    }
    public function getIdUser(): int {
        return $this->idUser;
    }
    public function setIdPerfilUser(int $idPerfilUser) {
        $this->idPerfilUser = $idPerfilUser;
    }
    public function getIdPerfilUser(): int {
        return $this->idPerfilUser;
    }
    public function setNome(string $nome) {
        $this->nome = $nome;
    }
    public function getNome(): string {
        return $this->nome;
    }
    public function setEmail(string $email) {
        $this->email = $email;
    }
    public function getEmail(): string {
        return $this->email;
    }
    public function setSenha(string $senha) {
        $this->senha = $senha;
    }
    public function getSenha(): string {
        return $this->senha;
    }
    public function setStatus(int $status) {
        $this->status = $status;
    }
    public function getStatus(): int{
        return $this->status;
    }


}

?>