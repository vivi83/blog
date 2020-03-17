<section id="section-contact">
    <h2>Formulaire création article </h2>
    <form action="#section-contact" method="POST" class="admin" id="create">
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
<input type="hidden" name="identificationFormulaire" value="create"> 
    <button type="submit">Publier l'article</button>

    <div class="confirmation">

<?php 
$identificationFormulaire=$_REQUEST["identificationFormulaire"] ?? "";
if ($identificationFormulaire == "create")
{
require "php/controller/form-article.php";
}
?>
</div>
</form>
</section>

<section class="updateSection cache">
   <button class="closePopup"> Fermer la Popup </button>
   <h2> Formulaire pour modifier l'article </h2>
   <form  method="POST" class="admin" id="update" action="">
<div class="infoUpdate">
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
<!--Pour connaitre la ligne -->
    <input type="text" name="id" required placeholder="entrez id">
</div>

<input type="hidden" name="identificationFormulaire" value="update"> 
    <button type="submit">Modifier l'article</button>

    <div class="confirmation">

<?php 
$identificationFormulaire=$_REQUEST["identificationFormulaire"] ?? "";
if ($identificationFormulaire == "update")
{
require "php/controller/form-article.php";
}
?>

</div>
</form>
</section>

<section class="cache">
<h2>Formulaire supprimer </h2>
    <form id="delete" method="POST" action="">
<input type="text" name="id" required placeholder="entrez id">

<input type="hidden" name="identificationFormulaire" value="delete"> 
    <button type="submit">Supprimer article</button>

<div class="confirmation">

<?php
$identificationFormulaire=$_REQUEST["identificationFormulaire"] ??"";
if ($identificationFormulaire=="delete")
{
    require "php/controller/form-article.php";
}
?>
</div>
</form>
</section>

<section> 
    <h2>Liste des articles </h2>
<table>
    <thead>
        <tr>
            <td> Id </td>
            <td> Titre </td>
            <td> Contenu </td> 
            <td> Image </td>
            <td> Categorie </td>
            <td> Modifier </td>
            <td> Supprimer </td>
        </tr>
    </thead>
    <tbody>
        <?php
$requeteSQL =
<<<CODESQL

SELECT * FROM `articles`
ORDER BY datePublication DESC
CODESQL;

$tableau= [];
require "php/model/envoyer-sql.php";

$tabLigne=$pdoStatement->fetchAll();

foreach($tabLigne as $tabAsso)
{
    extract($tabAsso);

    echo
<<<CODEHTML
<tr>
    <td>$id</td>
    <td>$titre</td>
    <td>$contenu</td>
    <td>$image</td>
    <td>$categorie</td>
    <td>
    <button data-id="$id" class="update">modifier</button>
    <div class="infoUpdate cache">
    <input type="text" name="titre" required placeholder="titre" value="$titre">
    <textarea name="contenu" cols="60" rows="8"required placeholder="contenu">$contenu</textarea>
    <select name="image" value="$image" >
        <option value="assets/img/cameleon.jpg">Cameleon</option>
        <option value="assets/img/colorrun.jpg">Color Run</option>
        <option value="assets/img/pikachu.jpg">Pikachu</option>
        <option value="assets/img/yoda.jpg">Yoda</option>
    </select>
    <input type="texte" name="datePublication" value="<?php echo date("Y-m-d H:i:s")?>" value="$datePublication>
    <input type="text" name="categorie" required placeholder="categorie" value="$categorie">
<!--Pour connaitre la ligne -->
    <input type="text" name="id" required placeholder="entrez l'id" value="$id">
</div>
    
    </td>
    <td><button data-id="$id" class="delete">supprimer</button></td>
    </tr>

CODEHTML;
}
        ?>
    </tbody>

</table>
</section>

<script>
    var boutonClose = document.querySelector("button.closePopup");
boutonClose.addEventListener("click", function(){
    var baliseSectionUpdate = document.querySelector("section.updateSection");
    baliseSectionUpdate.classList.add("cache");
});

var listeBoutonUpdate = document.querySelectorAll("button.update");
listeBoutonUpdate.forEach(function(bouton){
    bouton.addEventListener("click", function(event){
        console.log("click sur un bouton");
        var baliseBouton=event.target;
        var baliseTd =baliseBouton.parentNode;
        var baliseUpdate= baliseTd.querySelector(".infoUpdate");

        var baliseUpdateForm= document.querySelector("form#update div.infoUpdate");
    baliseUpdateForm.innerHTML= baliseUpdate.innerHTML;

    var baliseSection = document.querySelector(".updateSection");
    baliseSection.classList.remove("cache");
   
    });

});

    var listeBoutonDelete = document.querySelectorAll("button.delete");
    listeBoutonDelete.forEach(function(bouton) {
    
        bouton.addEventListener("click", function(event){
            console.log("Tu as cliqué")
        var idBouton=event.target.getAttribute("data-id");
        console.log(idBouton);
        var champId= document.querySelector("form#delete input[name=id]");
        champId.value= idBouton;
        var confirmation = window.confirm("Vous êtes sur?");
        if(confirmation)
        {
            var formDelete = document.querySelector("form#delete");
            formDelete.submit();
            
        }
        console.log("supprimer")
    });
    });
</script>