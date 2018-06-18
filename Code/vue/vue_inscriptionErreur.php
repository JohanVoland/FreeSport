<?php
/**
 * Created by PhpStorm.
 * User: Johan.VOLAND
 * Date: 18.06.2018
 * Time: 14:56
 */

// tampon de flux stocké en mémoire
ob_start();
$titre="Free Sport - Erreur d'inscription";
?>

    <h2>Erreur d'inscription</h2>
    <p>Le mot de passe n'est pas correct.</p>
    <a href="index.php?action=vue_inscription" class="btn btn-default">OK</a>

<?php
$contenu = ob_get_clean();
require "gabarit.php";