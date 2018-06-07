<?php
$titre ='Free Sport - Stock';

// Tampon de flux stocké en mémoire
ob_start();
?>

<h2>Stock</h2>

<?php
$contenu = ob_get_clean();
require 'gabarit.php';
?>