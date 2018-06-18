<?php

require  'controleur/controleur.php';
session_start();

try
{
    if (isset($_GET['action']))
    {
        $action = $_GET['action'];

        switch ($action)
        {
            case 'accueil' :
                accueil();
                break;
            case 'vue_login' :
                login();
                break;
            case 'vue_inscription' :
                inscription();
                break;
            case 'enregistrer' :
                ajout_membre();
                break;
            case 'profil' :
                profil();
                break;
            case 'panier' :
                panier();
                break;
            case 'vue_ajouter_panier' :
                ajoutPanier();
                break;
            case 'vue_ajouter' :    // Avant d'avoir inscrit des données
                ajouter();
                break;
            case 'ajout' :          // Après avoir inscrit des données
                ajout();
                break;
            case 'vue_articles' :
                afficherArticles();
                break;
            case 'vue_supprimer_article' :
                supprimerArticle();
                break;
            case 'vue_supprimer_article_confirmer' :
                supprimerArticleConfirmer();
                break;
            case 'vue_modifier_article' :
                modifierArticle();
                break;
            case 'vue_liste_users' :
                afficherUsers();
                break;
            case 'vue_liste_commande' :
                afficherCommande();
                break;
            case 'vue_stock' :
                stock();
                break;
            case 'vue_about' :
                about();
                break;
            case 'vue_contact' :
                contact();
                break;
            case 'vue_infoPaiement' :
                infoPaiement();
                break;
            default :
                throw new Exception("action non valide");
        }
    }
    else
        accueil();

}
catch (Exception $e)
{
    erreur($e->getMessage());
}
