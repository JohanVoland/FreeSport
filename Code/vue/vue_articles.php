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

    <!-- Filtre -->
    <form class="form" method="post" action="index.php?action=vue_articles">
        Type d'article :
        <select name="filtreType">
            <option value="#">Tout</option>
            <option value="T-shirt">T-shirt</option>
            <option value="Veste">Veste</option>
            <option value="Chaussure">Chaussure</option>
            <option value="Training">Training</option>
        </select>
        Taille :
        <select name="filtreTaille">
            <option value="#">Tout</option>
            <option value="S">S</option>
            <option value="M">M</option>
            <option value="L">L</option>
            <option value="XL">XL</option>
        </select>
        Genre :
        <select name="filtreGenre">
            <option value="#">Tout</option>
            <option value="homme">Homme</option>
            <option value="femme">Femme</option>
        </select>
        <input class="btn" type="submit" value="Appliquer">
    </form>

    <!-- Affichage des appartements -->
<?php foreach ($afficherArticles as $resultat) :?>

    <!-- Sélection des articles selon les filtres -->

    <!-- Filtre du type -->
    <?php //if ($resultat['nomType'] == @$_POST['filtreType'] || @$_POST['filtreType'] == "#") { ?>
        <div class="span12" id = "afficherArticles" style="border: 1px solid black; border-radius: 5px; padding: 15px; border-collapse: separate; margin: 5px">
            <strong>Nom : </strong><?=$resultat['nom'];?><br/>
            <strong>Prix : </strong><?=$resultat['prix'];?><br/>
            <strong>Date de disponibilité : </strong><?=$resultat['disponibilite'];?><br/>
            <strong>Nombre disponibles : </strong><?=$resultat['nombreDispo'];?><br/>
            <strong>Image : </strong><?=$resultat['image'];?><br/>
            <strong>Type : </strong><?=$resultat['nomType'];?><br/>
            <strong>Taille : </strong><?=$resultat['nomTaille'];?><br/>
            <strong>Genre : </strong><?=$resultat['nomSexe'];?>
        </div>
    <?php //} ?>

    <!-- Filtre de la taille
    <?php //} else if ($resultat['nomTaille'] == @$_POST['filtreTaille'] || @$_POST['filtreTaille'] == "#") { ?>
        <div class="span12" id = "afficherArticles" style="border: 1px solid black; border-radius: 5px; padding: 15px; border-collapse: separate; margin: 5px">
            <strong>Nom : </strong><?=$resultat['nom'];?><br/>
            <strong>Prix : </strong><?=$resultat['prix'];?><br/>
            <strong>Date de disponibilité : </strong><?=$resultat['disponibilite'];?><br/>
            <strong>Nombre disponibles : </strong><?=$resultat['nombreDispo'];?><br/>
            <strong>Image : </strong><?=$resultat['image'];?><br/>
            <strong>Type : </strong><?=$resultat['nomType'];?><br/>
            <strong>Taille : </strong><?=$resultat['nomTaille'];?><br/>
            <strong>Genre : </strong><?=$resultat['nomSexe'];?>
        </div>
    <?php// } ?>

    <!-- Filtre du genre
    <?php //} else if ($resultat['nomSexe'] == @$_POST['filtreGenre'] || @$_POST['filtreGenre'] == "#") { ?>
        <div class="span12" id = "afficherArticles" style="border: 1px solid black; border-radius: 5px; padding: 15px; border-collapse: separate; margin: 5px">
            <strong>Nom : </strong><?=$resultat['nom'];?><br/>
            <strong>Prix : </strong><?=$resultat['prix'];?><br/>
            <strong>Date de disponibilité : </strong><?=$resultat['disponibilite'];?><br/>
            <strong>Nombre disponibles : </strong><?=$resultat['nombreDispo'];?><br/>
            <strong>Image : </strong><?=$resultat['image'];?><br/>
            <strong>Type : </strong><?=$resultat['nomType'];?><br/>
            <strong>Taille : </strong><?=$resultat['nomTaille'];?><br/>
            <strong>Genre : </strong><?=$resultat['nomSexe'];?>
        </div>
    <?php //} ?>

    <!-- Si on n'a appliqué aucun filtre, affiche tout
    <?php //} else if (@$_POST['filtreType'] == null && @$_POST['filtreTaille'] == null && @$_POST['filtreGenre'] == null) { ?>
        <div class="span12" id = "afficherArticles" style="border: 1px solid black; border-radius: 5px; padding: 15px; border-collapse: separate; margin: 5px">
            <strong>Nom : </strong><?=$resultat['nom'];?><br/>
            <strong>Prix : </strong><?=$resultat['prix'];?><br/>
            <strong>Date de disponibilité : </strong><?=$resultat['disponibilite'];?><br/>
            <strong>Nombre disponibles : </strong><?=$resultat['nombreDispo'];?><br/>
            <strong>Image : </strong><?=$resultat['image'];?><br/>
            <strong>Type : </strong><?=$resultat['nomType'];?><br/>
            <strong>Taille : </strong><?=$resultat['nomTaille'];?><br/>
            <strong>Genre : </strong><?=$resultat['nomSexe'];?>
        </div>-->
    <?php //} ?>

<?php endforeach;?>

<?php
$contenu = ob_get_clean();
require "gabarit.php";