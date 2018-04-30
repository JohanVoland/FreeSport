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