<?php
/**
 * Created by PhpStorm.
 * User: Johan.VOLAND
 * Date: 11.06.2018
 * Time: 09:26
 */

// tampon de flux stocké en mémoire
ob_start();
$titre="Free Sport - Ajouter un article - Confirmation";
?>

<?php if (isset($erreur)) { ?>
    <p><?=$erreur;?></p>
<?php } else { ?>
    <P>L'article c'est correctement ajouté.</P>
<?php } ?>
    <a href="index.php?action=vue_articles" class="btn btn-default">OK</a>
<?php
$contenu = ob_get_clean();
require "gabarit.php";