<?php
$titre ='Rent A Snow - Panier';

// Tampon de flux stocké en mémoire
ob_start();
?>

<h2>Votre Panier</h2>

<?php
$contenu = ob_get_clean();
require 'gabarit.php';
?>
