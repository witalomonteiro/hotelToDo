<?php

class Database {

    private $conexao;

    function conectarMysqli() {

        $server = 'localhost';
        $user = 'monteiro';
        $password = 'monteiro';
        $database = 'hotelTodo';

        $this->conexao = mysqli_connect($server, $user, $password, $database);

        if (mysqli_errno($this->conexao)) {
            echo "Erro Conexão: ";
            echo mysqli_connect_error();
            die();
        } else {
            //echo "Conectado ao database $database";
            return $this->conexao;
        }
    }

    function conectarPDO() {

        $server = 'localhost';
        $user = 'monteiro';
        $password = 'monteiro';
        $database = 'hotelTodo';

        try{
            $this->conexao = new PDO("mysql:host=$server;dbname=$database", $user, $password);
            //echo "Conectado ao database $database";
        } catch (PDOException $erro) {
            echo "ERRO: $erro";
        }
        return $this->conexao;
    }
    
}
?>