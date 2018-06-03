<?php

require  'controleur/controleur.php';

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
            case 'vue_ajouter' :    // Avant d'avoir inscrit des données
                ajouter();
                break;
            case 'ajout' :  // Après avoir inscrit des données
                ajout();
                break;
            case 'vue_articles' :
                afficherArticles();
                break;
            case 'vue_supprimer_article' :
                supprimerArticle();
                break;
            case 'vue_modifier_article' :
                modifierArticle();
                break;
            case 'vue_liste_users' :
                afficherUsers();
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
