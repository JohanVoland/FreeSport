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
    if (isset ($_POST['pseudo']) && isset ($_POST['fPass']))
    {
        $resultats = getLogin($_POST);
        require "vue/vue_login.php";
    }
    else
    {
        // détruit la session de la personne connectée après appuyé sur Logout
        if (isset($_SESSION['login'])) {
            session_destroy();
            require "vue/vue_accueil.php";
        }
        else
            require "vue/vue_login.php";
    }
}

function inscription()
{
    require "vue/vue_inscription.php";
}

function ajout_membre()
{
    ajoutMembre($_POST);  // Envoi vers le modèle des contenus issus du formulaire
    require 'vue/vue_inscription.php';
}

function profil()
{
    require 'vue/vue_profil.php';
}

// ----------------- Fonctions en lien avec le panier---------------------

function panier()
{
    $afficherPanier = afficherPanier();
    require 'vue/vue_panier.php';
}

function ajoutPanier()
{

    ajout_panier();

    require "vue/vue_accueil.php";
}

function afficherCommande()
{
    require "vue/vue_commande.php";
}

function stock()
{
    require "vue/vue_stock.php";
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
    // Ajout de l'article
    ajouterArticleBD();

    // Redirection vers les articles
    accueil();
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

// ------------- Afficher la liste des utilisateurs --------------------------------

function afficherUsers()
{
    $afficherUsers = afficherUsersBD();
    require "vue/vue_liste_users.php";
}