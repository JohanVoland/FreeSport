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
    $requete = "SELECT article.nom, article.prix, article.disponibilite, article.nombreDispo, article.image, type.nom AS nomType, taille.nom AS nomTaille, sexe.nom AS nomSexe 
                FROM article INNER JOIN type ON article.idType = type.idType 
                INNER JOIN taille ON article.idTaille = taille.idTaille 
                INNER JOIN sexe ON article.idSexe = sexe.idSexe WHERE ";

    // Application de la requête
    $afficherArticles = $connexion->query($requete);

    return $afficherArticles;
}

// -----------------------------------------------------
// Fonctions liées aux utilisateurs
// -----------------------------------------------------
// getLogin()
// Fonction : Récupérer les données du login de la BD
// Sortie : $resultats

function getLogin($post)
{
    // connexion à la BD snows
    $connexion = getBD();

    // Définition de la requête
    $requete = "SELECT * FROM utilisateur WHERE pseudo='".$post['pseudo']."' AND password='".$post['fPass']."';";

    // Exécution de la requête et renvoi des résultats
    $resultats = $connexion->query($requete);
    return $resultats;
}