<?php
$titre ='Free Sport - Profil';

// Tampon de flux stocké en mémoire
ob_start(); //$resultat
?>


    <h2>Votre Profil</h2>

    <br/>

    <table>
        <tr>
            <td>Nom d'utilisateur :</td>
            <td><?php echo $_SESSION['pseudo']; ?><br/><br/></td>
        </tr>
        <tr>
            <td>Nom et Prenom :</td>
            <td><?php echo $_SESSION['login']; ?><br/><br/></td>
        </tr>
        <tr>
            <td>Email :</td>
            <td><?php echo $_SESSION['email']; ?><br/><br/></td>
        </tr>
        <tr>
            <td>Adresse : </td>
            <td><?php echo $_SESSION['rue']; ?><br/> <?php echo $_SESSION['adresse']; ?><br/><br/></td>
        </tr>
    </table>

    <a href="index.php?action=panier">Accéder au panier</a>

<?php
$contenu = ob_get_clean();
require 'gabarit.php';
?>
