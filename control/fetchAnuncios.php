<?php 
    header('Content-Type: text/plain');
    require_once "../model/anuncio.php";
    $db_anuncio = new anuncio();
    // consulta anuncio no banco de dados por categoria.
    $anuncios = $db_anuncio->get_anuncios($_GET['from'], $_GET['limit'], $_GET['categoria']);
?>


<?php if( count($anuncios) > 0 ){ ?>
[
    {
        "id" : "<?php echo ($anuncios[0])['id']?>",
        "imgsrc" : "http://localhost/imagens/<?php echo ($anuncios[0])['id']; ?>.jpg",
        "titulo" : "<?php echo ($anuncios[0])['nome']?>",
        "link" : "http://localhost/anuncio?id=<?php echo ($anuncios[0])['id']; ?>",
        "detalhes" : "<?php echo ($anuncios[0])['descricao']; ?>"
    }
    <?php for($i = 1; $i < count($anuncios); $i++){  ?>
        ,{
            "id" : "<?php echo ($anuncios[$i])['id']?>",
            "imgsrc" : "http://localhost/imagens/<?php echo ($anuncios[$i])['id']; ?>.jpg",
            "titulo" : "<?php echo ($anuncios[$i])['nome']?>",
            "link" : "http://localhost/anuncio?id=<?php echo ($anuncios[$i])['id']; ?>",
            "detalhes" : "<?php echo ($anuncios[$i])['descricao']; ?>"
        }
    <?php }  ?>
]

<?php } else { ?>
    []
<?php } ?>
