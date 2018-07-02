<?php
    require_once "../model/anuncio.php";
    require_once "../model/usuario.php";

    $OK = true;

    // salvar anuncio no banco de dados.
    $db_anuncio = new anuncio();
    $db_usuario = new usuario();
    $usuario = $db_usuario->get_usuario_by_cookie($_COOKIE['login']);

    if(!$id = $db_anuncio->salvar_anuncio($usuario['login'], $_POST['nome'], $_POST['categoria'], $_POST['descricao'])){
        $OK = false;
    }

    // salvar imagem do anuncio
    $target_dir = "../imagens/";
    $extensao = explode('.', basename($_FILES["imagemAnuncio"]["name"]))[1];
    $target_file = $target_dir . $id . "." . $extensao;
   
    move_uploaded_file($_FILES["imagemAnuncio"]["tmp_name"], $target_file);

    if($OK){
        header('HTTP/1.1 303 See Other'); // status de redirecionamento.
        header('location: http://localhost/conta');
    }
    else{
        ?> <br> <a href="/novo">voltar</a> <?php
    }

?>