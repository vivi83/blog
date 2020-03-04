<section >
<h2>Liste des articles</h2>
<div class="listeArticle">

<?php



$requeteSQL=
<<<CODESQL
select*from `articles`
order by datePublication DESC

CODESQL;

$tableau=[];
require_once "php/model/envoyer-sql.php";

$tabLigne=$pdoStatement->fetchAll();

foreach($tabLigne as $tabAsso)
{
extract($tabAsso);


echo
<<<CODEHTML
<article class="$categorie">
 <img src="$image" alt="">
 <h3> $titre</h3>
 <p> $contenu</p>
 </article>
CODEHTML;

}

?>




</div>


</section>