<?php

$path = '/xampp/htdocs/Lab/hotelToDo';
require_once $path . '/models/Database.php';

class LoginDAO {

    private $conexao;

    public function __construct() {
        $db = new Database();
        $this->conexao = $db->conectarPDO();
    }
    
    public function validarCredenciais(string $email, string $senha) {
        $sqlValidar = "SELECT * FROM user WHERE email = :email AND senha = :senha";
        $validar = $this->conexao->prepare($sqlValidar);
        $validar->bindValue(':email', $email);
        $validar->bindValue(':senha', $senha);
        $validar->execute();
        $user = $validar->fetch(PDO::FETCH_OBJ);
        return $user;
    }
}

?>