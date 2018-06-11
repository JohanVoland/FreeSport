<?php
/**
 * Created by PhpStorm.
 * User: Johan.VOLAND
 * Date: 11.06.2018
 * Time: 15:00
 */

$titre ='Free Sport - Login/Logout';
// Tampon de flux stocké en mémoire
ob_start();
?>

    <p>Vous êtes déconnectés</p>
    <a href="index.php?action=accueil">OK</a>

<?php
$contenu = ob_get_clean();
require 'gabarit.php';
?>