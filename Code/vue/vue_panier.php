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
            <th>IDArticle</th>
            <th>Nom</th>
            <th>Prix (CHF)</th>
            <th>Disponibilité</th>
            <th>Nombre Dispo</th>
            <th>nomType</th>
            <th>nomTaille</th>
            <th>nomGenre</th>
        </tr>

        <?php
        echo $panier_count;
        $nbLigne = $panier_count / 8;

        foreach ($_SESSION["list"] as $value){
            //for ($i=1; $i<$nbLigne; $i++) //ligne
            //{
            echo "<tr>";
            //for ($j=1; $j<9; $j++){ //colonne
            echo "<td>".$value."</td>";
            //}
            echo "</tr>";

            //}
            print_r($value);
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
