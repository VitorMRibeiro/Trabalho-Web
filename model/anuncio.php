<?php
class anuncio
{
    private $mysqli;

    public function get_anuncios($from, $limit, $categoria = ""){
        $return = [];
        if($categoria == ""){
            // retornar anuncios de todas as categorias.
            $result = $this->mysqli->query("SELECT * FROM anuncios WHERE id >= " . $from . " LIMIT " . $limit);
            if($result){
                while( $row = $result->fetch_assoc()){
                    array_push($return, $row);
                }
            }
        }
        else{
            // retornar anuncios da categoria especificada.
            $result = $this->mysqli->query("SELECT * FROM anuncios WHERE categoria = '$categoria' AND id >= " . $from . " LIMIT " . $limit);
            if($result){
                while( $row = $result->fetch_assoc()){
                    array_push($return, $row);
                }
            }
        }
        return $return;  
    }

    public function get_anuncios_usuario($login){
        $return = [];
        $result = $this->mysqli->query("SELECT * FROM anuncios WHERE usuario_login = '$login'");
        if($result){
            while( $row = $result->fetch_assoc()){
                array_push($return, $row);
            }
        }
        return $return;
    }

    public function get_anuncio($id){
        $result = $this->mysqli->query("SELECT * FROM anuncios WHERE id =" . $id);
        return $result->fetch_assoc();
    }

    public function salvar_anuncio($usuario_login, $nome, $categoria, $descricao){
        // insere na tabela anuncios
        if(!$this->mysqli->query("INSERT INTO anuncios (nome, categoria, descricao, usuario_login) VALUES ('$nome', '$categoria', '$descricao', '$usuario_login')")){ 
            echo "Falha ao adicionar anuncio: (" . $this->mysqli->errno . ") " . $this->mysqli->error;
            return false;
        }
        
        $id = (($this->mysqli->query("SELECT MAX(id) FROM anuncios"))->fetch_row())[0];

        return $id;
    }

    public function salvar_comentario($usuario_login, $anuncio_id, $texto){
        if(!$this->mysqli->query("INSERT INTO comentarios VALUES ('$usuario_login', " . $anuncio_id . ", '$texto')")){
            return false;
        }
        return true;
    }

    public function get_comentarios($anuncio_id){
        $return = [];
        $result = $this->mysqli->query("SELECT usuarios.nome, comentarios.texto FROM `comentarios` JOIN anuncios ON comentarios.anuncio_id = anuncios.id JOIN usuarios ON comentarios.usuario_login = usuarios.login WHERE anuncios.id =" . $anuncio_id);
        while( $row = $result->fetch_assoc()){
            array_push($return, $row);
        }
        return $return;
    }

    function __construct(){
        $this->mysqli = new mysqli("localhost", "root", "", "test");
        if ($this->mysqli->connect_errno) {
            echo "Falha ao comunicar com MySQL: (" . $this->mysqli->connect_errno . ") " . $this->mysqli->connect_error;
        }
        $this->mysqli->query("CREATE TABLE IF NOT EXISTS anuncios (id INTEGER AUTO_INCREMENT PRIMARY KEY, nome VARCHAR(20), categoria VARCHAR(20), descricao VARCHAR(200), usuario_login VARCHAR(20))");
        $this->mysqli->query("CREATE TABLE IF NOT EXISTS comentarios (usuario_login VARCHAR(20), anuncio_id INTEGER, texto VARCHAR(300))");
    }
}
?>

