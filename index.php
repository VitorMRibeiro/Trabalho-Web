<?php $uri = explode('?', $_SERVER['REQUEST_URI'])[0];
require_once "./model/anuncio.php";
require_once "./model/usuario.php";
$logged = false;

$db_usuario = new usuario();
// verifica se o cookie enviado corresponde a um usuário cadastrado.
if($usuario = $db_usuario->get_usuario_by_cookie(isset($_COOKIE['login']) ? $_COOKIE['login'] : "")){
    $logged = true;
}

// roteamento.
switch ($uri) {
    // Home page
    case '/':
        require_once './view/home.php';
        break;
    case '/sobre':
        require_once './view/sobre.php';
        break;
    case '/cadastro':
        require_once './view/cadastro.php';
        break;
    case '/login':
        require_once './view/login.php';
        break;
    case '/conta':
        require_once './view/minhaConta.php';
        break;
    case '/novo':
        require_once './view/novoAnuncio.php';
        break;
    case '/anuncio':
        require_once './view/pagina-anuncio.php';
        break;
    default:
        header('HTTP/1.0 404 Not Found');
        require_once './view/404.php';
        break;
}

?>