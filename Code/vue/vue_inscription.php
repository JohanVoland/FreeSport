<?php
$titre ='Rent A Snow - Inscription';

// Tampon de flux stocké en mémoire
ob_start();
?>

    <h2>Inscription</h2>

    <form class="form" method="POST" action="index.php?action=enregistrer">
        <table class="table">
            <tr>
                <td>Nom : </td>
                <td><input type="text" name="nom" value="<?= @$_POST['nom']; ?>" required></td>

                <td>Prenom : </td>
                <td><input type="text" name="prenom" value="<?= @$_POST['prenom']; ?>" required></td>
            </tr>
            <tr>
                <td>Nom d'utilisateur : </td>
                <td><input type="text" name="pseudo" value="<?= @$_POST['pseudo']; ?>" required></td>

                <td>Email : </td>
                <td><input type="email" name="email" value="<?= @$_POST['email']; ?>" required></td>
            </tr>
            <tr>
                <td>Mot de passe : </td>
                <td>
                    <?php if (isset($_POST['erreur'])) : ?>
                        <input type="password" class="inputError" name="password" value="<?= @$_POST['password'];?>" required>
                    <?php else : ?>
                        <input type="password" name="password" value="<?= @$_POST['password']; ?>" required>
                    <?php endif ?>
                </td>

                <td>Valider le mot de passe : </td>
                <td>
                    <?php if (isset($_POST['erreur'])) : ?>
                        <input type="password" class="inputError" name="password" value="<?= @$_POST['password'];?>" required>
                    <?php else : ?>
                        <input type="password" name="password" value="<?= @$_POST['password']; ?>" required>
                    <?php endif ?>
                </td>
            </tr>
            <tr>
                <td>Rue : </td>
                <td><input type="text" name="rue" value="<?= @$_POST['rue']; ?>" required></td>

                <td>NPA : </td>
                <td><input type="text" name="npa" value="<?= @$_POST['npa']; ?>" required></td>
            </tr>
            <tr>
                <td>Ville : </td>
                <td><input type="text" name="ville" value="<?= @$_POST['ville']; ?>" required></td>
                <td></td><td></td>
            </tr>
            <tr>
                <td><input class="btn" type="submit" value="Confirmer"/></td>
                <td></td>
            </tr>
        </table>
    </form>

<?php
$contenu = ob_get_clean();
require 'gabarit.php';
?>
