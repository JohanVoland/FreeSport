<?php
/**
 * Created by PhpStorm.
 * User: Johan_2
 * Date: 03.06.2018
 * Time: 14:51
 */

// tampon de flux stocké en mémoire
ob_start();
$titre="Free Sport - Liste des utilisateurs";
?>

    <!-- Contenu -->
    <h2>Liste des utilisateurs</h2>

    <!-- Affichage des appartements -->
<?php foreach ($afficherUsers as $resultat) :?>
    <div class="form" id = "afficherUsers" style="border: 1px solid black; border-radius: 5px; padding: 15px; border-collapse: separate; margin: 5px">
        <strong>Pseudo : </strong><?=$resultat['pseudo'];?><br/>
        <strong>Nom : </strong><?=$resultat['nom'];?><br/>
        <strong>Prénom : </strong><?=$resultat['prenom'];?><br/>
        <strong>Email : </strong><?=$resultat['email'];?><br/>
        <strong>Adresse : </strong><?=$resultat['rue'];?><?=$resultat['npa'];?><?=$resultat['ville'];?><br/>
        <strong>Catégorie : </strong><?=$resultat['nomCategorie'];?>
    </div>
<?php endforeach;?>

<?php
$contenu = ob_get_clean();
require "gabarit.php";