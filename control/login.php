<?php
require_once "../model/usuario.php";

$db_usuario = new usuario();

if($result = $db_usuario->get_usuario($_POST['login'])){
    //usuário encontrado
    if($_POST['senha'] == $result['senha']){
        // login efetuado, redirecionar para home.
        header('HTTP/1.1 303 See Other'); // status de redirecionamento.
        header('location: http://localhost');
        header("Set-Cookie: login=" . $result['cookie'] . "; Path=/; Max-Age=172800"); // dois dias     
    }
    else{
        echo "senha incorreta";
        ?> <br> <a href="/login">voltar</a> <?php        
    }
}
else{
    echo "login invalido";
    ?> <br> <a href="/login">voltar</a> <?php
}

?>
