<?php
/**
 * Created by PhpStorm.
 * User: Johan_2
 * Date: 03.06.2018
 * Time: 14:05
 */

// tampon de flux stocké en mémoire
ob_start();
$titre="Free Sport - Modifier un article";
?>

    <!-- Contenu -->
<?php foreach ($afficherArticles as $resultat) :?>
    <form class="form" method="post" action="index.php?action=vue_modifier_article">
        <table class="table">
            <tr>
                <td>id de l'article :</td>
                <td><input type="number" name="idArticle" required readonly value="<?=$resultat['idArticle']?>"></td>
            </tr>
            <tr>
                <td>Nom :</td>
                <td><input type="text" name="nomArticle" required value="<?=$resultat['nom']?>"></td>

                <td>Prix :</td>
                <td><input type="number" name="prixArticle" required value="<?=$resultat['prix']?>"></td>
            </tr>
            <tr>
                <td>Date de disponibilité :</td>
                <td><input type="date" name="dateDispo" required value="<?=$resultat['disponibilite']?>"></td>

                <td>Nombre disponibles :</td>
                <td><input type="number" name="nbreDispo" required value="<?=$resultat['nombreDispo']?>"></td>
            </tr>
            <tr>
                <td>Images :</td>
                <td><input type="text" name="imageArticle" required value="<?=$resultat['image']?>"></td>

                <td>Type :</td>
                <td>
                    <select name="type">
                        <option value="1">T-shirt</option>
                        <option value="2">Veste</option>
                        <option value="3">Chaussure</option>
                        <option value="4">Training</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Taille :</td>
                <td>
                    <select name="taille">
                        <option value="1">S</option>
                        <option value="2">M</option>
                        <option value="3">L</option>
                        <option value="4">XL</option>
                    </select>
                </td>

                <td>Genre :</td>
                <td>
                    <select name="sexe">
                        <option value="1">Homme</option>
                        <option value="2">Femme</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td><input class="btn" type="submit" value="modifier"/></td>
            </tr>
    </form>
<?php endforeach; ?>

<?php
$contenu = ob_get_clean();
require "gabarit.php";