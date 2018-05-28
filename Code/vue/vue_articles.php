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