<?php
/**
 * Created by PhpStorm.
 * User: Johan.VOLAND
 * Date: 18.06.2018
 * Time: 08:27
 */

// tampon de flux stocké en mémoire
ob_start();
$titre="Free Sport - Contact";
?>

    <h2>Contact</h2>
    <p>Numéro de téléphone : 077 417 08 07</p>

    <p><a href="mailto:FreeSportContact@gmail.com">Email</a></p>

<?php
$contenu = ob_get_clean();
require "gabarit.php";