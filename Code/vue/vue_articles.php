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
?>
<style>
    .flotte {
        float:left;
    }
</style>

    <!-- Contenu -->
    <h2>Nos articles</h2>

    <!-- Filtre NON FONCTIONNEL -->
    <!--<form class="form" method="post" action="index.php?action=vue_articles">
        <div class="w3-padding-64 w3-large w3-text-grey" style="font-weight:bold">
            <a onclick="myAccFunc1()" href="javascript:void(0)" class="w3-button w3-block w3-white w3-left-align" id="myBtn1">
                Type d'article <i class="fa fa-caret-down"></i>
            </a>
            <div id="demoAcc1" class="w3-bar-block w3-hide w3-padding-large w3-medium">
                <a href="#" class="w3-bar-item w3-button">Tout</a>
                <a href="#" class="w3-bar-item w3-button">T-shirt</a>
                <a href="#" class="w3-bar-item w3-button">Veste</a>
                <a href="#" class="w3-bar-item w3-button">Training</a>
            </div>
        </div>
        <div class="w3-padding-64 w3-large w3-text-grey" style="font-weight:bold">
            <a onclick="myAccFunc2()" href="javascript:void(0)" class="w3-button w3-block w3-white w3-left-align" id="myBtn2">
                Taille <i class="fa fa-caret-down"></i>
            </a>
            <div id="demoAcc2" class="w3-bar-block w3-hide w3-padding-large w3-medium">
                <a href="#" class="w3-bar-item w3-button">Tout</a>
                <a href="#" class="w3-bar-item w3-button">S</a>
                <a href="#" class="w3-bar-item w3-button">M</a>
                <a href="#" class="w3-bar-item w3-button">L</a>
                <a href="#" class="w3-bar-item w3-button">XL</a>
            </div>
        </div>
        <div class="w3-padding-64 w3-large w3-text-grey" style="font-weight:bold">
            <a onclick="myAccFunc3()" href="javascript:void(0)" class="w3-button w3-block w3-white w3-left-align" id="myBtn3">
                Genre <i class="fa fa-caret-down"></i>
            </a>
            <div id="demoAcc3" class="w3-bar-block w3-hide w3-padding-large w3-medium">
                <a href="#" class="w3-bar-item w3-button">Tout</a>
                <a href="#" class="w3-bar-item w3-button">Homme</a>
                <a href="#" class="w3-bar-item w3-button">Femme</a>
            </div>
        </div>
        <input class="btn" type="submit" value="Appliquer">
    </form> -->

    <!-- Affichage des appartements -->
<?php foreach ($afficherArticles as $resultat) :?>

    <div class="form" id = "afficherArticles" style="border: 1px solid black; border-radius: 5px; padding: 15px; border-collapse: separate; margin: 5px">
        <img src="images/upload/<?=$resultat['image'];?>" class="flotte" width="50%" height="50%">
        <p style="line-height:50px; margin-left: 52%;">
            <strong>Nom : </strong><?=$resultat['nom'];?><br/>
            <strong>Prix : </strong><?=$resultat['prix'];?> CHF<br/>
            <strong>Date de disponibilité : </strong><?=$resultat['disponibilite'];?><br/>
            <strong>Type : </strong><?=$resultat['nomType'];?><br/>
            <strong>Taille : </strong><?=$resultat['nomTaille'];?><br/>
            <strong>Genre : </strong><?=$resultat['nomGenre'];?><br/>

            <!-- Affichage des options pour le responsable des ventes -->
            <?php if (@$_SESSION['typeUser'] == 'responsable' || @$_SESSION['typeUser'] == 'admin') { ?>
                <a href="index.php?action=vue_modifier_article&id=<?=$resultat['idArticle']?>"><img src="images/modif.png"></a>
                <a href="index.php?action=vue_supprimer_article_confirmer&id=<?=$resultat['idArticle']?>"><img src="images/delete.jpg"></a>
            <?php } ?>

            <!-- Affichage des options pour les utilisateurs -->
            <?php if (@$_SESSION['typeUser'] == 'membre') { ?>
                <a href="index.php?action=panier&id=<?=$resultat['idArticle']?>" style="color: black"><img src="images/panier.jpg"> Ajouter au panier</a>
            <?php } ?>
        </p>
    </div>

<?php endforeach;?>

<?php
$contenu = ob_get_clean();
require "gabarit.php";