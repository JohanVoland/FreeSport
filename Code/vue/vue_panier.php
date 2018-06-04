<?php
$titre ='Rent A Snow - Panier';

// Tampon de flux stocké en mémoire
ob_start();
?>

<p>C'est la page panier. :-)</p>

<?php
$contenu = ob_get_clean();
require 'gabarit.php';
?>
