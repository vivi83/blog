<section id="section-contact">
    <h2>Formulaire </h2>
    <form action="#section-contact" method="POST" class="admin">
<input type="text" name="titre" required placeholder="titre">
<textarea name="contenu" cols="60" rows="8"required placeholder="contenu"></textarea>
<select name="image" >
    <option value="assets/img/cameleon.jpg">Cameleon</option>
    <option value="assets/img/colorrun.jpg">Color Run</option>
    <option value="assets/img/pikachu.jpg">Pikachu</option>
    <option value="assets/img/yoda.jpg">Yoda</option>
</select>
<input type="texte" name="datePublication" value="<?php echo date("Y-m-d H:i:s")?>" >
<input type="text" name="categorie" required placeholder="categorie">
    <button type="submit">Envoyer votre message</button>

    <div class="confirmation">

<?php require_once "php/controller/from-article.php"?>


</div>
</form>

</section>