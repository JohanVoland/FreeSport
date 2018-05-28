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
    articles();
    require "vue/vue_articles.php";
}