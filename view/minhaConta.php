<?php require_once "header.php"; ?>

<?php
    $db_anuncio = new anuncio();
    $db_usuario = new usuario();
    $usuario = $db_usuario->get_usuario_by_cookie($_COOKIE['login']);
    $anuncios = $db_anuncio->get_anuncios_usuario($usuario['login']);
?>

<form action="control/logout.php" method="GET">
    <input type="submit" value="sair">
</form>

<h2>Meus anuncios</h2>
<!-- Mostrar os anuncio cadastrados por este usuário. -->
<?php foreach($anuncios as $anuncio){  ?>
    <div class="anuncio">
    <img src="imagens/<?php echo $anuncio['id']; ?>.jpg" alt="imagem anuncio" width="300px" height="300px">
        <a href="/anuncio?id=<?php echo $anuncio['id']; ?>"><h2 class="anuncio-titulo"><?php echo $anuncio['nome']; ?></h2></a>
        <p class="anuncio-detalhes"><?php echo $anuncio['descricao']; ?></p>
        <button>remover</button>
    </div>
<?php } ?>

<a href="/novo">novo anuncio</a>

<?php require_once "footer.php"; ?>
