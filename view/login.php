<?php require_once"./view/header.php"; ?>

<h1>Login</h1>

<form action="./control/login.php" method="POST">
    <input type="text" name="login" placeholder="login">
    <input type="password" name="senha" placeholder="senha">
    <input type="submit" value="entrar">
</form>

<a href="/cadastro">cadastre-se</a>

<?php require_once"./view/footer.php"; ?>
