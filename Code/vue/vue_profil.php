<?php
$titre ='Rent A Snow - Profil';

// Tampon de flux stocké en mémoire
ob_start();
?>

<div class="span12" id="divMain">
    <h1 style="text-align: center;">Votre Profil</h1>

    <div class="span3" id="profil_info">
        
    </div>
</div>

<?php
$contenu = ob_get_clean();
require 'gabarit.php';
?>
