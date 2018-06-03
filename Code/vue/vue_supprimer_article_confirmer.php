<?php
/**
 * Created by PhpStorm.
 * User: Johan_2
 * Date: 03.06.2018
 * Time: 13:32
 */

// tampon de flux stocké en mémoire
ob_start();
$titre="Free Sport - Supprimer un article";
?>

    <!-- Contenu -->
    <h2>Supprimer un article - confirmation</h2>
    <p>Voulez-vous supprimer cet article ?</p>

    <a href="index.php?action=vue_supprimer_article&id=<?=$_POST['idArticle']?>" class="btn btn-default">OUI</a>
    <br/><br/>
    <a href="index.php?action=vue_articles" class="btn btn-default">NON</a>

<?php
$contenu = ob_get_clean();
require "gabarit.php";