<?php require_once "header.php"; ?>

<?php
    $db_anuncio = new anuncio();
    $anuncio = $db_anuncio->get_anuncio($_GET['id']);
    $comentarios = $db_anuncio->get_comentarios($_GET['id']);
?>

<div class="anuncio">
    <img src="imagens/<?php echo $anuncio['id']; ?>.jpg" alt="imagem anuncio" width="300px" height="300px">
    <h2 class="anuncio-titulo"><?php echo $anuncio['nome']; ?></h2>
    <p class="anuncio-detalhes"><?php echo $anuncio['descricao']; ?></p>
</div>

<div class="comentarios">
    <form action="./control/comentar.php?id=<?php echo $_GET['id']; ?>" method="POST">
        <input type="text" name="texto">
        <input type="submit" value="comentar">
    </form>
    <?php foreach($comentarios as $comentario){ ?>
        <div class="comentario">
            <span class="usuario"><b><?php echo $comentario['nome']; ?>:</b></span>
            <span class="texto"><?php echo $comentario['texto']; ?></span>
        </div>
    <?php } ?>
</div>

<?php require_once "footer.php"; ?>
