<?php require_once "./view/header.php"; ?>

<?php 
    $categorias = array('imoveis', 'moveis', 'eletrodomesticos', 'outros');
?>
    <div class="filtro">
        <h2>filtro</h2>
        <div class="categorias">
            <button class="btn-todas">todas</button>
            <?php foreach($categorias as $categoria){ ?>
                <button class="btn-<?php echo $categoria ?>"><?php echo $categoria ?></button>
            <?php } ?>
        </div>
    </div>
    <main>
        <h2>Anuncios</h2>
        <div class="anuncios">
        </div>
        <button class="btn-anterior">anterio</button>
        <button class="btn-proximo">proximo</button>
        <script src="./scripts/fetchAnuncios.js" async></script>
    </main>
<?php require_once "./view/footer.php"; ?>
    