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
            case 'vue_ajouter' :
                ajouter();
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
