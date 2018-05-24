<?php

// tampon de flux stocké en mémoire
ob_start();
$titre="Free Sport - Accueil";
?>

<!-- contenu -->

    <!-- !PAGE CONTENT! -->
    <div class="w3-main" style="margin-left:250px">

        <!-- Push down content on small screens -->
        <div class="w3-hide-large" style="margin-top:83px"></div>

        <!-- Top header -->
        <header class="w3-container w3-xlarge">
            <p class="w3-left">Jeans</p>
            <p class="w3-right">
                <i class="fa fa-shopping-cart w3-margin-right"></i>
                <i class="fa fa-search"></i>
            </p>
        </header>

        <!-- Product grid -->
        <div class="w3-row w3-grayscale">
            <div class="w3-col l3 s6">
                <div class="w3-container">
                    <img src="../images/bas_femme1.jpg" style="width:100%">
                    <p>Bas pour femme<br><b>$24.99</b></p>
                </div>
                <div class="w3-container">
                    <img src="../images/bas_femme2.jpg" style="width:100%">
                    <p>Bas pour femme 2<br><b>$19.99</b></p>
                </div>
            </div>
        </div>
    </div>

<?php
$contenu = ob_get_clean();
require "gabarit.php";
