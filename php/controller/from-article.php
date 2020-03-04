<?php

if (count($_REQUEST)>0)
{
 $tableau= [
"titre" => $_REQUEST["titre"],
"contenu"=> $_REQUEST["contenu"],
"image"=> $_REQUEST["image"],
"datePublication"=>$_REQUEST["datePublication"],
"categorie"=>$_REQUEST["categorie"],

    ];

echo "merci";

$requeteSQL= 
<<<CODESQL

    INSERT INTO articles
    (titre, contenu,image, datepublication, categorie)
    VALUES
    (:titre,:contenu,:image,:datePublication,:categorie );

CODESQL;

require_once "php/model/envoyer-sql.php";


echo "votre article est publié";
}
?>




