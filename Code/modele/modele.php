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

    // Récupération des filtres
    $type = @$_POST['filtreType'];
    $taille = @$_POST['filtreTaille'];

    // Si aucun filtre n'a été appliqué
    if ($type == "#" && $taille == "#") {
        $requete = "SELECT article.idArticle, article.nom, article.prix, article.disponibilite, article.nombreDispo, article.image, type.nom AS nomType, taille.nom AS nomTaille, sexe.nom AS nomSexe
                FROM article INNER JOIN type ON article.idType = type.idType
                INNER JOIN taille ON article.idTaille = taille.idTaille
                INNER JOIN sexe ON article.idSexe = sexe.idSexe";
    }
    // Si tous les filtre ont été appliqués
    else if ($type !== "#" && $taille !== "#")
    {
        $requete = "SELECT article.idArticle, article.nom, article.prix, article.disponibilite, article.nombreDispo, article.image, type.nom AS nomType, taille.nom AS nomTaille, sexe.nom AS nomSexe
                FROM article INNER JOIN type ON article.idType = type.idType
                INNER JOIN taille ON article.idTaille = taille.idTaille
                INNER JOIN sexe ON article.idSexe = sexe.idSexe WHERE article.idType = '".$type."' AND article.idTaille = '".$taille."'";
    }
    // Si 1 filtre a été appliqué
    else if ($type !== "#" || $taille !== "#")
    {
        $requete = "SELECT article.idArticle, article.nom, article.prix, article.disponibilite, article.nombreDispo, article.image, type.nom AS nomType, taille.nom AS nomTaille, sexe.nom AS nomSexe
                FROM article INNER JOIN type ON article.idType = type.idType
                INNER JOIN taille ON article.idTaille = taille.idTaille
                INNER JOIN sexe ON article.idSexe = sexe.idSexe WHERE article.idType = '".$type."' OR article.idTaille = '".$taille."'";
    }

    // Création de la requête
    /*$requete = "SELECT article.idArticle, article.nom, article.prix, article.disponibilite, article.nombreDispo, article.image, type.nom AS nomType, taille.nom AS nomTaille, sexe.nom AS nomSexe
                FROM article INNER JOIN type ON article.idType = type.idType 
                INNER JOIN taille ON article.idTaille = taille.idTaille 
                INNER JOIN sexe ON article.idSexe = sexe.idSexe";*/

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

// Ajouter un membre (inscription)
function ajoutMembre()
{
    // Connexion à la BD et au serveur
    $connexion = getBD();
    extract($_POST);
    // test si la valeur est déjà existante
    try
    {

        $reqIns="INSERT INTO utilisateur(pseudo,nom,prenom,password,email,rue,npa,idCategorie,ville) VALUES ('".$pseudo."','".$nom."','".$prenom."','".$password."','".$email."','".$rue."','".$npa."','1','".$ville."')";
        $connexion->exec($reqIns);

    }
    catch (Exception $e)
    {
        echo $e->getMessage();
    }
}

// Supprimer un article
function supprimerArticleBD()
{
    // Connexion à la BDD
    $connexion = getBD();

    // Récupération de l'ID de l'article
    $id = $_POST['idArticle'];

    // Création de la requête
    $requete = "DELETE * FROM article WHERE idArticle = $id";

    // Execution de la requête
    $connexion->exec($requete);
}

// Modifier un article
function modifierArticleBD()
{
    // Connexion à la BDD
    $connexion = getBD();

    // Récupération des champs
    $id = $_POST['idArticle'];
    $nom = $_POST['nomArticle'];
    $prix = $_POST['prixArticle'];
    $dispo = $_POST['dateDispo'];
    $nbreDispo = $_POST['nbreDispo'];
    $image = $_POST['imageArticle'];
    $type = $_POST['type'];
    $taille = $_POST['taille'];
    $sexe = $_POST['sexe'];

    // Création de la requête
    $requete = "UPDATE article SET idArticle = '".$id."', nom = '".$nom."', prix = '".$prix."', disponibilite = '".$dispo."', nombreDispo = '".$nbreDispo."', image = '".$image."', idType = '".$type."', idTaille = '".$taille."', idSexe = '".$sexe."' WHERE idArticle = '".$id."'";

    // Application de la requete
    $connexion->query($requete);
}

// Prendre tous les utilisateurs
function afficherUsersBD()
{
    // Connexion à la BD
    $connexion = getBD();

    // Création de la requête
    $requete = "SELECT utilisateur.pseudo, utilisateur.nom, utilisateur.prenom, utilisateur.email, utilisateur.rue, utilisateur.npa, utilisateur.ville, categorie.nom AS nomCategorie
                FROM utilisateur INNER JOIN categorie ON utilisateur.idCategorie = categorie.idCategorie";

    // Application de la requête
    $afficherUsers = $connexion->exec($requete);

    return $afficherUsers;
}

// Sélectionner un seul article
function getArticle()
{
    // Connexion à la BD
    $connexion = getBD();

    // Récupération de l'ID
    $id = $_GET['id'];

    // Création de la requête
    $requete = "SELECT article.idArticle, article.nom, article.prix, article.disponibilite, article.nombreDispo, article.image, type.nom AS nomType, taille.nom AS nomTaille, sexe.nom AS nomSexe 
                FROM article INNER JOIN type ON article.idType = type.idType 
                INNER JOIN taille ON article.idTaille = taille.idTaille 
                INNER JOIN sexe ON article.idSexe = sexe.idSexe WHERE idArticle = '".$id."'";

    // Application de la reuquête
    $getArticle = $connexion->query($requete);

    return $getArticle;
}