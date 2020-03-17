<?php

function filtrer($name = "id")
{
    $resultat = $_REQUEST[$name] ?? "";
    return $resultat;
}

$identificationFormulaire = filtrer("identificationFormulaire");

if ($identificationFormulaire == "update") {
    $tableau = [
        "id" => filtrer("id"),
        "titre" => filtrer("titre"),
        "contenu" => filtrer("contenu"),
        "image" => filtrer("image"),
        "datePublication" => filtrer("datePublication"),
        "categorie" => filtrer("categorie"),

    ];
    extract($tableau);

    if (
        $id != ""
        && $titre != ""
        && $contenu != ""
        && $image != ""
        && $datePublication != ""
        && $categorie != ""
    ) {

        $requeteSQL   =
            <<<CODESQL
UPDATE articles 
SET 
    titre =:titre,
    contenu =:contenu,
    image =:image,
    datePublication =:datePublication,
    categorie =:categorie
WHERE 
id=:id;

CODESQL;

        require_once "php/model/envoyer-sql.php";

        echo "Votre article a été modifié";
    }
}

if ($identificationFormulaire == "delete") {
    $tableau = [
        "id" => filtrer("id"),
    ];

    extract($tableau);
    $id = intval($id);

    if ($id > 0) {
        $requeteSQL =

            <<<CODESQL
        DELETE FROM articles
        WHERE id = :id
        
        CODESQL;

        require "php/model/envoyer-sql.php";

        echo "votre article est supprime";
    }
}


if ($identificationFormulaire == "create") {
    $tableau = [
        "titre" => filtrer("titre"),
        "contenu" => filtrer("contenu"),
        "image" => filtrer("image"),
        "datePublication" => filtrer("datePublication"),
        "categorie" => filtrer("categorie"),

    ];

    extract($tableau);

    if (
        $titre != ""
        && $contenu != ""
        && $image != ""
        && $datePublication != ""
        && $categorie != ""
    ) {

        $requeteSQL   =
            <<<CODESQL

INSERT INTO articles
( titre, contenu, image, datePublication, categorie)
VALUES
( :titre, :contenu, :image, :datePublication, :categorie) 

CODESQL;

        require_once "php/model/envoyer-sql.php";

        echo "VOTRE ARTICLE EST PUBLIE";
    } else {

        echo "VEUILLEZ REMPLIR LES CHAMPS OBLIGATOIRES";
    }
}
