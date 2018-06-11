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
            <option value="1">T-shirt</option>
            <option value="2">Veste</option>
            <option value="3">Chaussure</option>
            <option value="4">Training</option>
        </select>
        Taille :
        <select name="filtreTaille">
            <option value="#">Tout</option>
            <option value="1">S</option>
            <option value="2">M</option>
            <option value="3">L</option>
            <option value="4">XL</option>
        </select>
        <!--Genre :
        <select name="filtreGenre">
            <option value="#">Tout</option>
            <option value="1">Homme</option>
            <option value="2">Femme</option>
        </select>-->
        <input class="btn" type="submit" value="Appliquer">
    </form>

    <!-- Affichage des appartements -->
<?php foreach ($afficherArticles as $resultat) :?>

    <div class="form" id = "afficherArticles" style="border: 1px solid black; border-radius: 5px; padding: 15px; border-collapse: separate; margin: 5px">
        <strong>Nom : </strong><?=$resultat['nom'];?><br/>
        <strong>Prix : </strong><?=$resultat['prix'];?><br/>
        <strong>Date de disponibilité : </strong><?=$resultat['disponibilite'];?><br/>
        <strong>Nombre disponibles : </strong><?=$resultat['nombreDispo'];?><br/>
        <img src="images/upload/<?=$resultat['image'];?>" width="50%", height="50%"><br/>
        <strong>Type : </strong><?=$resultat['nomType'];?><br/>
        <strong>Taille : </strong><?=$resultat['nomTaille'];?><br/>
        <strong>Genre : </strong><?=$resultat['nomGenre'];?><br/>
        <a href="index.php?action=vue_modifier_article&id=<?=$resultat['idArticle']?>">modifier</a> <!-- <i class="general foundicon-edit icon"/> -->
        <a href="index.php?action=vue_supprimer_article_confirmer&id=<?=$resultat['idArticle']?>">supprimer</a> <!-- <i class="general foundicon-remove icon"/> -->
        <a href="index.php?action=vue_ajouter_panier&id=<?=$resultat['idArticle']?>">ajouter au panier</a> <!-- <i class="general foundicon-plus icon"/> -->
    </div>

<?php endforeach;?>

<?php
$contenu = ob_get_clean();
require "gabarit.php";