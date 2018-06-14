<?php
$titre ='Free Sport - Panier';

// Tampon de flux stocké en mémoire
ob_start();

?>

<h2>Votre Panier</h2>

<table class="table textcolor">
    <?php if($_SESSION['panier'] == ''){ ?>
        <tr><td>Aucun articles</td></tr>
    <?php } else { ?>
        <tr><td><?php echo $_SESSION['panier']; ?></td></tr>
    <?php } ?>
</table>

<?php
$contenu = ob_get_clean();
require 'gabarit.php';
?>
