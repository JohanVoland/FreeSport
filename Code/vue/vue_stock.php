<?php
$titre ='Free Sport - Stock';

// Tampon de flux stocké en mémoire
ob_start();
?>

    <h2>Stock</h2>
<?php foreach ($afficherStock as $resultat) :?>

    <div class="form" id = "afficherArticles" style="border: 1px solid black; border-radius: 5px; padding: 15px; border-collapse: separate; margin: 5px">
        <strong>Nom : </strong><?=$resultat['nom'];?><br/>
        <strong>Prix : </strong><?=$resultat['prix'];?><br/>
        <strong>Date de disponibilité : </strong><?=$resultat['disponibilite'];?><br/>
        <strong>Nombre disponibles : </strong><?=$resultat['nombreDispo'];?><br/>
        <strong>Type : </strong><?=$resultat['nomType'];?><br/>
        <strong>Taille : </strong><?=$resultat['nomTaille'];?><br/>
        <strong>Genre : </strong><?=$resultat['nomGenre'];?><br/>
    </div>

<?php endforeach;?>

<?php
$contenu = ob_get_clean();
require 'gabarit.php';
?>