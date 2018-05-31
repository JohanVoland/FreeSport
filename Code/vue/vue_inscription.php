<?php
$titre ='Rent A Snow - Login/Logout';

// Tampon de flux stocké en mémoire
ob_start();
?>

<div class="w3-main" style="margin-left:250px">
    <p>C'est la page d'inscription. :-)</p>
</div>

<?php
$contenu = ob_get_clean();
require 'gabarit.php';
?>
