<?php
$titre ='Free Sport - Login/Logout';

// Tampon de flux stocké en mémoire
ob_start();
?>
    <h2>Login / Logout</h2>

    <article>
        <?php
        if (isset($resultats))
        {
            // les données dans le formulaire sont exactes
            $ligne=$resultats->fetch();
            // Test pour savoir si on est admin
            if ($ligne['idCategorie']==3)
            {
                echo "Bonjour. Vous êtes connecté en tant qu'administrateur.";
                // Création de la session
                $_SESSION['login']=$ligne['pseudo'];
                $_SESSION['typeUser']="admin";
            } else if ($ligne['idCategorie']==2)
            {
                echo "Bonjour. Vous êtes connecté en tant que responsable des ventes.";
                $_SESSION['login']=$ligne['pseudo'];
                $_SESSION['typeUser']="responsable";
            }else if ($ligne['idCategorie']==1)
            {
                echo "Bonjour. Vous êtes bien connecté en tant que ".$ligne['prenom']." ".$ligne['nom'];
                // Création de la session
                $_SESSION['login']= $ligne['prenom']." ".$ligne['nom'];
                $_SESSION['pseudo']= $ligne['pseudo'];
                $_SESSION['password']= $ligne['password'];
                $_SESSION['email']= $ligne['email'];
                $_SESSION['rue']= $ligne['rue'];
                $_SESSION['adresse']= $ligne['npa']." ".$ligne['ville'];
                $_SESSION['typeUser']="membre";
            } else
                echo "Erreur de login/mot de passe";

        }
        else
        {
            if (isset($_SESSION['login']))
            {
                session_destroy();
                header ("location:index.php");
            }
            ?>

            <form class='form' method='POST' action="index.php?action=vue_login">
                <table class="table">
                    <tr>
                        <td>Login :</td>
                        <td>
                            <input type="text" placeholder="Entrez votre login" name="pseudo" value="<?=@$_POST['pseudo'] ?>"/>
                            <!-- code php pour éviter de retaper le contenu en cas d'erreur -->
                        </td>
                    </tr>
                    <tr>
                        <td>Mot de passe :</td>
                        <td>
                            <input type="password" placeholder="Entrez votre mot de passe" name="fPass" value="<?=@$_POST['fPass'] ?>"/>
                        </td>
                    </tr>
                    <tr>
                        <td><input type="submit" value="Login"></td>
                        <td><input type="reset" value="Effacer"></td>
                    </tr>
                </table>
            </form>

        <?php } ?>
    </article>
    <hr/>

<?php
$contenu = ob_get_clean();
require 'gabarit.php';
?>