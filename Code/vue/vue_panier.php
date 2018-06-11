<?php
$titre ='Free Sport - Panier';

// Tampon de flux stocké en mémoire
ob_start();
?>

<h2>Votre Panier</h2>

<table class="table textcolor">
    <?php if($afficherPanier == ''){ ?>
        <tr><td>Aucun articles</td></tr>
    <?php } ?>
    <?php foreach ($afficherPanier as $resultat) :?>
        <!-- Affichage des résultats de la BD -->
        <th>idUtiisateur</th>
        <th>idArticle</th>
        <th>quantité par défaut</th>
        <tr>
            <td><?=$resultat['commande_idUtilisateur'];?></td>
            <td><?=$resultat['article_idArticle'];?></td>
            <td><?=$resultat['quantite'];?></td>
        </tr>
    <?php endforeach;?>
</table>

<?php
$contenu = ob_get_clean();
require 'gabarit.php';
?>
