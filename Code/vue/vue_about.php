<?php
/**
 * Created by PhpStorm.
 * User: Johan.VOLAND
 * Date: 18.06.2018
 * Time: 08:21
 */

// tampon de flux stocké en mémoire
ob_start();
$titre="Free Sport - A propos de nous";
?>

    <h2>A propos de nous</h2>
    <p>Nous sommes un site de vente en ligne de vêtements de sport.</p>
    <p>N'hésitez pas nous contacter si vous avez la moindre question.</p>

<?php
$contenu = ob_get_clean();
require "gabarit.php";