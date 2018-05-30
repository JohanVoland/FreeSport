<?php
/**
 * Created by PhpStorm.
 * User: Johan.VOLAND
 * Date: 28.05.2018
 * Time: 14:54
 */

// tampon de flux stocké en mémoire
ob_start();
$titre="Free Sport - Articles";

//pour les filtres si tu as besoin
/*<div class="w3-padding-64 w3-large w3-text-grey" style="font-weight:bold">
            <a href="#" class="w3-bar-item w3-button">Shirts</a>
            <a href="#" class="w3-bar-item w3-button">Dresses</a>
            <a onclick="myAccFunc()" href="javascript:void(0)" class="w3-button w3-block w3-white w3-left-align" id="myBtn">
                Jeans <i class="fa fa-caret-down"></i>
            </a>
            <div id="demoAcc" class="w3-bar-block w3-hide w3-padding-large w3-medium">
                <a href="#" class="w3-bar-item w3-button w3-light-grey"><i class="fa fa-caret-right w3-margin-right"></i>Skinny</a>
                <a href="#" class="w3-bar-item w3-button">Relaxed</a>
                <a href="#" class="w3-bar-item w3-button">Bootcut</a>
                <a href="#" class="w3-bar-item w3-button">Straight</a>
            </div>
            <a href="#" class="w3-bar-item w3-button">Jackets</a>
            <a href="#" class="w3-bar-item w3-button">Gymwear</a>
            <a href="#" class="w3-bar-item w3-button">Blazers</a>
            <a href="#" class="w3-bar-item w3-button">Shoes</a>
</div>*/
?>

<!-- Contenu -->
<h2>Nos articles</h2>
<table class="table textcolor">
    <tr>
        <?php
        // Affichage des entêtes du tableau

        for ($i=0; $i<articles()->columnCount(); $i++)
        {
            $entete = articles()->getColumnMeta($i);
            echo "<th>" . $entete['name'] . "</th>";
        }
        ?>
    </tr>
    <?php foreach (articles() as $resultat) :?>
        <!-- Affichage des résultats de la BD -->
        <tr>
            <td><?=$resultat['idArticle'];?></td>
            <td><?=$resultat['nom'];?></td>
            <td><?=$resultat['prix'];?></td>
        </tr>
        <?php endforeach;?>
</table>

<?php
$contenu = ob_get_clean();
require "gabarit.php";