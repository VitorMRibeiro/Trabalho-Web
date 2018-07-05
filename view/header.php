<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./css/style.css">
    <title>Document</title>
</head>
<body>
    <header>
        <form action="" method="GET">
            <input type="text" placeholder="buscar" name="busca">
            <input type="submit">
        </form>
        <nav>
            <a href="/">Home</a>
            <a href="/sobre">sobre</a>
            <?php if($logged) {?>
                <a href="/conta">minha conta</a>
            <?php }else{ ?>
                <a href="/login">login</a>
            <?php } ?>
            <a href="/cadastro">cadastrar-se</a>
        </nav>
        <p><?php if($logged) echo "Bem-vindo " . $usuario['nome']; ?></p>
    </header>
