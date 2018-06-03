<?php
/**
 * Created by PhpStorm.
 * User: Johan_2
 * Date: 03.06.2018
 * Time: 13:23
 */

// tampon de flux stocké en mémoire
ob_start();
$titre="Free Sport - Supprimer un article";
?>

    <!-- Contenu -->
    <h2>Supprimer un article</h2>
    <p>L'article a été supprimé</p>
    <a href="index.php?action=vue_articles">OK</a>

<?php
$contenu = ob_get_clean();
require "gabarit.php";