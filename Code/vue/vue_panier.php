<?php
$titre ='Free Sport - Panier';

// Tampon de flux stocké en mémoire
ob_start();

//compter elements dans panier
$panier_count = 0;
if (isset($_SESSION["list"]))
{
    $panier_count = sizeof($_SESSION["list"]);
}
?>

<h2>Votre Panier</h2>

<?php
//afficher le contenu de la session
if (isset($_SESSION["list"])) { ?>
    <table class="table textcolor">
        <tr>
            <td>IDArticle</td>
            <td>Nom</td>
            <td>Prix (CHF)</td>
            <td>Disponibilité</td>
            <td>Nombre Dispo</td>
            <td>Type</td>
            <td>Taille</td>
            <td>Genre</td>
        </tr>

        <?php
        //echo $panier_count;
        $nbLigne = $panier_count / 8;

        foreach ($_SESSION["list"] as $value){
            //for ($i=1; $i<$nbLigne; $i++) //ligne
            //{
            /*echo "<tr>";
            //for ($j=1; $j<9; $j++){ //colonne
            echo "<td>".$value."</td>";
            //}
            echo "</tr>";*/

            //}
            echo "<td>",print_r($value);
            echo "</td>";
        }
        ?>
    </table>
<?php }else { ?>
    Aucun articles
<?php } ?>

<?php
$contenu = ob_get_clean();
require 'gabarit.php';
?>
