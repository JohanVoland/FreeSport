<?php
$titre ='Free Sport - Liste des commandes';

// Tampon de flux stocké en mémoire
ob_start();
?>

<h2>Liste des commandes</h2>

<?php
$contenu = ob_get_clean();
require 'gabarit.php';
?>