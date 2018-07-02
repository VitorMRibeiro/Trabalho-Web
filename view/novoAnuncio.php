<?php require_once "header.php"; ?>

<h1>Novo anuncio</h1>

<form action="control/novoAnuncio.php" method="post" enctype="multipart/form-data">
    <input type="text" name="nome" placeholder="nome">
    <input type="text" name="descricao" placeholder="descricao">
    <p>Categoria</p>
    <input type="radio" name="categoria" value="imoveis"><span>imoveis</span>
    <input type="radio" name="categoria" value="moveis"><span>moveis</span>
    <input type="radio" name="categoria" value="eletrodomesticos"><span>eletrodomesticos</span>
    <input type="radio" name="categoria" value="outros"><span>outros</span>  
    <p>selecione uma imagem .jpg</p>
    <div><input type="file" name="imagemAnuncio"></div>
    <div><input type="submit" value="salvar"></div>
</form>

<a href="/conta">voltar</a>

<?php require_once "footer.php"; ?>
