<?php
    header('HTTP/1.1 303 See Other'); // status de redirecionamento.
    header('location: http://localhost');
    // deletar o coockie de autenticação.  
    header("Set-Cookie: login=deleted; path=/; expires=Thu, 01 Jan 1970 00:00:00 GMT"); 
?>
