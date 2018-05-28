<?php

// ---------------------------------------------
// getBD()
// Fonction : connexion avec le serveur : instancie et renvoie l'objet PDO
// Sortie : $connexion

function getBD()
{
    // connexion au server de BD MySQL et à la BD
    $connexion = new PDO('mysql:host=localhost; dbname=freesport', 'root', '');

    // permet d'avoir plus de détails sur les erreurs retournées
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $connexion;
}

// Ajout d'un article dans la tbl articles
function ajouterArticleBD()
{
    // Connexion à la BD
    $connexion = getBD();

    // Récupération des valeurs
    $nom = $_POST['nomArticle'];
    $prix = $_POST['prixArticle'];
    $dateDispo = $_POST['dateDispo'];
    $nbreDispo = $_POST['nbreDispo'];
    $image = $_POST['imageArticle'];
    $type = $_POST['type'];
    $taille = $_POST['taille'];
    $sexe = $_POST['sexe'];

    // Définition de la requête
    $requete = "INSERT INTO article (nom, prix, disponibilite, nombreDispo, image, idType, idTaille, idSexe) VALUES ('$nom', '$prix', '$dateDispo', '$nbreDispo', '$image', '$type', '$taille', '$sexe')";

    // Application de la requête
    $connexion->exec($requete);
}

// Afficher les articles
function articles()
{
    // Connexion à la BD
    $connexion = getBD();

    // Définition de la requête
    $requete = "SELECT * FROM article ORDER BY idArticle";

    // Application de la requête
    $connexion->query($requete);
}