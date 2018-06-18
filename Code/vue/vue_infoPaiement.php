<?php
/**
 * Created by PhpStorm.
 * User: Johan.VOLAND
 * Date: 18.06.2018
 * Time: 08:43
 */

// tampon de flux stocké en mémoire
ob_start();
$titre="Free Sport - Informations de paiement";
?>

    <h2>Informations de paiement</h2>
    <p>Vous pouvez payer via paypal. Veuilez créer un compte pour ajouter des articles dans le panier et procéder au paiement.</p>

<?php
$contenu = ob_get_clean();
require "gabarit.php";