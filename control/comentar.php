<?php
    require_once "../model/anuncio.php";
    require_once "../model/usuario.php";

    $db_usuario = new usuario();
    $db_anuncio = new anuncio();

    $usuario = $db_usuario->get_usuario_by_cookie($_COOKIE['login']);

    if($db_anuncio->salvar_comentario($usuario['login'], $_GET['id'], $_POST['texto'])){
        header('HTTP/1.1 303 See Other'); // status de redirecionamento.
        header("location: http://localhost/anuncio?id=" . $_GET['id']);
    }
    else{
        echo "falha ao enviar comentario"
        ?> <br> <a href="/anuncio?id=<?php echo $_GET['id']; ?>" >voltar</a> <?php
    }
?>