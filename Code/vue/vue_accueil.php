<?php

// tampon de flux stocké en mémoire
ob_start();
$titre="Free Sport - Accueil";
?>

<!-- contenu -->

    <!-- !PAGE CONTENT! -->
    <div class="w3-main" style="margin-left:250px">
        <p>C'est la page d'accueil. :-)</p>
    </div>

<?php
$contenu = ob_get_clean();
require "gabarit.php";
