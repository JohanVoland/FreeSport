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
<?php foreach ($getArticle as $resultat) :?>
    <div class="span12" id="divMain">
        <h2>Modifier un article</h2>
        <form class="form" method="POST" action="index.php?action=vue_modifier_article">
            <table class="table">
                <tr>
                    <td>ID :</td>
                    <td><input type="number" name="idArticle" value="<?=$resultat['idArticle']?>" readonly></td>
                </tr>
                <tr>
                    <td>Nom :</td>
                    <td><input type="text" name="nomArticle" value="<?=$resultat['nom']?>" required></td>

                    <td>Prix :</td>
                    <td><input type="number" name="prixArticle" required value="<?=$resultat['prix']?>"></td>
                </tr>
                <tr>
                    <td>Date de disponibilité :</td>
                    <td><input type="date" name="dateDispo" required value="<?=$resultat['disponibilite']?>" </td>

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
                        <select name="genre">
                            <option value="1">Homme</option>
                            <option value="2">Femme</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><input class="btn" type="submit" value="ajouter"/></td>
                </tr>
            </table>
        </form>
    </div>
<?php endforeach; ?>

<?php
$contenu = ob_get_clean();
require "gabarit.php";