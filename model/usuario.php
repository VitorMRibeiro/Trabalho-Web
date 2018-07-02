<?php
class usuario
{
    private $mysqli;

    public function get_usuario($login){
        $result = $this->mysqli->query("SELECT * FROM usuarios WHERE login = '$login'");
        if($result){
            return $result->fetch_assoc();
        }
    }

    public function get_usuario_by_cookie($cookie){
        $result = $this->mysqli->query("SELECT * FROM usuarios WHERE cookie = '$cookie'");
        if($result){
            return $result->fetch_assoc();
        }
    }

    public function savar_usuario($login, $senha, $nome, $email, $cookie){
        if($this->mysqli->query("INSERT INTO usuarios VALUES ('$login', '$senha', '$nome', '$email', '$cookie')")){
            return true;
        }
        else{
            echo "Falha ao cadastrar usuário: (" . $this->mysqli->errno . ") " . $this->mysqli->error;
            return false;
        }
        
    }

    function __construct(){
        $this->mysqli = new mysqli("localhost", "root", "", "test");
        if ($this->mysqli->connect_errno) {
            echo "Falha ao comunicar com MySQL: (" . $this->mysqli->connect_errno . ") " . $this->mysqli->connect_error;
        }
    
        $this->mysqli->query("CREATE TABLE IF NOT EXISTS usuarios (login VARCHAR(20) PRIMARY KEY, senha VARCHAR(20), nome VARCHAR(20), email VARCHAR(40), cookie VARCHAR(20))");
    }
}
?>