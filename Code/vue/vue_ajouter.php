<?php
/**
 * Created by PhpStorm.
 * User: Johan.VOLAND
 * Date: 28.05.2018
 * Time: 13:39
 */

// tampon de flux stocké en mémoire
ob_start();
$titre="Free Sport - Ajouter un article";
?>

    <!-- Contenu -->
    <h2>Ajouter un article</h2>
    <form class="form" method="POST" action="index.php?action=ajout" enctype="multipart/form-data">
        <table class="table">
            <tr>
                <td>Nom :</td>
                <td><input type="text" name="nomArticle" required placeholder="Inscrivez le nom de l'article"></td>

                <td>Prix :</td>
                <td><input type="number" name="prixArticle" required placeholder="Inscrivez le prix de l'article"></td>
            </tr>
            <tr>
                <td>Date de disponibilité :</td>
                <td><input type="date" name="dateDispo" required placeholder="Inscrivez la date de disponibilité"></td>

                <td>Nombre disponibles :</td>
                <td><input type="number" name="nbreDispo" required placeholder="Inscrivez le nombre d'articles disponibles"></td>
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
                    <select name="genre">
                        <option value="1">Homme</option>
                        <option value="2">Femme</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Type :</td>
                <td>
                    <select name="type">
                        <option value="1">T-shirt</option>
                        <option value="2">Veste</option>
                        <option value="3">Chaussure</option>
                        <option value="4">Training</option>
                    </select>
                </td>

                <td>Images :</td>
                <td><input type="file" name="imageArticle" required></td>
            </tr>
            <tr>
                <td><input class="btn" type="submit" value="ajouter" name="submit"/></td>
            </tr>
        </table>
    </form>

<?php
$contenu = ob_get_clean();
require "gabarit.php";