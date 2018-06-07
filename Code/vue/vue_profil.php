<?php
$titre ='Free Sport - Profil';

// Tampon de flux stocké en mémoire
ob_start(); //$resultat
?>


    <h2>Votre Profil</h2>

    <div class="span12" id = "afficherUsers">
        Nom d'utilisateur : <?php echo $_SESSION['pseudo']; ?><br/>
        Nom et Prenom : <?php echo $_SESSION['login']; ?><br/>
        Email : <?php echo $_SESSION['email']; ?><br/>
        Adresse : <?php echo $_SESSION['rue']; ?><br/>
        <?php echo $_SESSION['adresse']; ?><br/><br/>
    </div>

    <a href="index.php?action=panier">Accéder au panier</a>

<?php
$contenu = ob_get_clean();
require 'gabarit.php';
?>
