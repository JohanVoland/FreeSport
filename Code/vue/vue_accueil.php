<?php

// tampon de flux stocké en mémoire
ob_start();
$titre="Free Sport - Accueil";
?>

    <!-- contenu -->
    <h1>Bienvenue dans le site web FreeSport, vous pourrez acheter divers vêtements de sports aux meilleurs prix.</h1>
    <img src="images/logo.PNG" style="margin-left: 25%">

<?php
$contenu = ob_get_clean();
require "gabarit.php";
