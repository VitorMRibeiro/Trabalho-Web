<?php require_once "./view/header.php"; ?>
<?php 
    $categorias = array('imoveis', 'moveis', 'eletrodomesticos', 'outros');
    $db_anuncio = new anuncio();
    // consulta anuncio no banco de dados por categoria.
    $anuncios = $db_anuncio->get_anuncios(isset($_GET['categoria']) ? $_GET['categoria'] : "");
?>

    <div class="filtro">
        <h2>filtro</h2>
        <div class="categorias">
            <a href="/">todas</a>
            <?php foreach($categorias as $categoria){ ?>
                <a href="/?categoria=<?php echo $categoria ?>"><?php echo $categoria ?></a>
            <?php } ?>
        </div>
    </div>
    <main>
        <h2>Anuncios</h2>
        <div class="anuncios">
            <?php foreach($anuncios as $anuncio){  ?>
                <div class="anuncio">
                    <img src="imagens/<?php echo $anuncio['id']; ?>.jpg" alt="imagem anuncio" width="300px" height="300px">
                    <a href="/anuncio?id=<?php echo $anuncio['id']; ?>"><h2 class="anuncio-titulo"><?php echo $anuncio['nome']; ?></h2></a>
                    <p class="anuncio-detalhes"><?php echo $anuncio['descricao']; ?></p>
                </div>
            <?php } ?>
        </div>
    </main>

<?php require_once "./view/footer.php"; ?>
    