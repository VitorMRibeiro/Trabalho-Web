<?php
    require_once "../model/usuario.php";

    $db_usuario = new usuario();
    $cookie = bin2hex(random_bytes(10)); // gera uma string aleatória(ou quase isso).
    if($db_usuario->savar_usuario($_POST['login'], $_POST['senha'], $_POST['nome'], $_POST['email'], $cookie)){
        // usuário cadastrado, redirecionar para a home.
        header('HTTP/1.1 303 See Other'); // status de redirecionamento.
        header('location: http://localhost');
        header("Set-Cookie: login=" . $cookie . "; Path=/; Max-Age=172800"); // dois dias
    }
    else{
        // falha ao cadastrar usuário, ficar aqui e mostrar mensagem de erro.
        ?> <br> <a href="/cadastro">voltar</a> <?php
    }

?>