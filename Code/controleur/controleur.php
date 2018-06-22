<?php

require "modele/modele.php";

// Affichage de la page de l'accueil
function accueil()
{
    require "vue/vue_accueil.php";
}

function erreur($e)
{
    $_SESSION['erreur']=$e;
    require "vue/vue_erreur.php";
}

// ----------------- Fonctions en lien avec les utilisateurs ---------------------

//login
function login()
{
    // Si une session existe déjà
    if (isset($_SESSION['login']))
    {
        require "vue/vue_login.php";
    }
    else
    {
        // Si des données ont été inscrites
        if (isset($_POST['pseudo']) && isset($_POST['fPass']))
        {
            $resultats = getLogin($_POST);
            require "vue/vue_login.php";
        }
        else
        {
            require "vue/vue_login.php";
        }
    }
}

function inscription()
{
    // Si des données ont été inscrites
    if (isset($_POST['password']) && isset($_POST['passwordConfirm']))
    {
        // Test si les mots de passe sont corrects
        if ($_POST['password'] == $_POST['passwordConfirm']) {
            ajout_membre($_POST);
            require 'vue/vue_login.php';
        }
        else {
            require 'vue/vue_inscriptionErreur.php';
        }
    }
    else
    {
        require 'vue/vue_inscription.php';
    }
}

function ajout_membre()
{
    ajoutMembre($_POST);  // Envoi vers le modèle des contenus issus du formulaire
    require 'vue/vue_login.php';
}

function profil()
{
    require 'vue/vue_profil.php';
}

// ----------------- Fonctions en lien avec le panier---------------------

function panier()
{
    //stocker les ajouts dans la session
    if (isset($_GET['id']))
    {
        if (!isset($_SESSION["list"]))
        {
            $_SESSION["list"] = array();
        }

        $getArticle = getArticle();

        foreach ($getArticle as $resultat){
            $id = $resultat['idArticle'];
            $nom = $resultat['nom'];
            $prix = $resultat['prix'];
            $disponibilite = $resultat['disponibilite'];
            $nomnombreDispo = $resultat['nombreDispo'];
            $nomType = $resultat['nomType'];
            $nomTaille = $resultat['nomTaille'];
            $nomGenre = $resultat['nomGenre'];

            array_push($_SESSION["list"], $id, $nom, $prix, $disponibilite, $nomnombreDispo, $nomType, $nomTaille, $nomGenre);
        }
    }

    require 'vue/vue_articles.php';
}

// ----------------- Ajout d'articles --------------------------------------------

// Quand aucune donnée n'a été inscrite
function ajouter()
{
    require "vue/vue_ajouter.php";
}

// Après que des données est été ajoutées
function ajout()
{
    // Gestion de l'image
    // Définition des variables
    $image = basename($_FILES['imageArticle']['name']);
    $target = "images/upload/";
    $taille_max = 10000000;
    $tailleImage = filesize($_FILES['imageArticle']['tmp_name']);
    $extensions = array('.png', '.gif', '.jpg', '.jpeg');
    $extension = strrchr($_FILES['imageArticle']['name'], '.');

    // Début de vérifications de sécurité
    if (!in_array($extension, $extensions)) // Si c'est une mauvaise extension
    {
        $erreur = 'Vous devez uploader un fichier de type png, jpg, gif ou jpeg.';
    }
    if ($tailleImage>$taille_max) // Si la taille est trop grande
    {
        $erreur = 'L\'image est trop grosse.';
    }
    if (!isset($erreur)) // S'il n'y a pas d'erreur on l'upload
    {
        // On formate le nom du fichier ici
        $image = strtr($image,
            'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ',
            'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
        $image = preg_replace('/([^.a-z0-9]+)/i', '-', $image);
        move_uploaded_file($_FILES['imageArticle']['tmp_name'], $target . $image);
        $_POST['imageArticle'] = $image;

        // Ajout de l'article
        ajouterArticleBD();
    }
    else
    {
        $erreur;
    }

    // Redirection vers la confirmation
    require "vue/vue_ajouter_article_confirmation.php";
}

// --------------- Afficher les articles -----------------------------------------

function afficherArticles()
{
    if (isset($_POST['filtreType']) && isset($_POST['filtreTaille']))
    {
        $afficherArticles = articles();
        require "vue/vue_articles.php";
    }
    else
    {
        $_POST['filtreType'] = "#";
        $_POST['filtreTaille'] = "#";

        $afficherArticles = articles();
        require "vue/vue_articles.php";
    }
}

// -------------- Supprimer un article -------------------------------------------

function supprimerArticle()
{
    supprimerArticleBD();
    //require "vue/vue_supprimer_article.php";
    afficherArticles();
}

function supprimerArticleConfirmer()
{
    require "vue/vue_supprimer_article_confirmer.php";
}

// -------------- Modifier un article -------------------------------------------

function modifierArticle()
{
    if (isset($_GET['id']))
    {
        $getArticle = getArticle();
        require "vue/vue_modifier_article.php";
        exit();
    }
    else
    {
        // Modifie l'article
        modifierArticleBD();

        // Renvoi vers la page d'accueil
        afficherArticles();
    }
}

// ------------- Différentes listes -------------------------------------------

function afficherUsers()
{
    $afficherUsers = afficherUsersBD();
    require "vue/vue_liste_users.php";
}

function afficherCommande()
{
    require "vue/vue_commande.php";
}

function stock()
{
    $afficherStock = afficherStock();
    require "vue/vue_stock.php";
}

// ------------ Informations du footer ------------------------------------------

function about()
{
    require "vue/vue_about.php";
}

function contact()
{
    require "vue/vue_contact.php";
}

function infoPaiement()
{
    require "vue/vue_infoPaiement.php";
}