<?php require_once"./view/header.php"; ?>

<h1>Cadastro</h1>

<form action="./control/cadastro.php" method="POST">
    <input type="text" name="nome" placeholder="nome">
    <input type="text" name="email" placeholder="e-mail">    
    <input type="text" name="login" placeholder="login">
    <input type="text" name="senha" placeholder="senha">
    <input type="submit" value="cadastrar">
</form>

<?php require_once"./view/footer.php"; ?>
