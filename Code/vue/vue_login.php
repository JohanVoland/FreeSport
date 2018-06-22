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
            // les données dans le formulaire sont exactes, mets les données de l'utilisateur  dans des variables SESSION
            $ligne = $resultats->fetch();

            // Test le mot de passe
            if (password_verify($_POST['fPass'],$ligne['password'])){

                // Test des différentes catégories
                if ($ligne['idCategorie'] == 3) {
                    echo "Bonjour. Vous êtes connecté en tant qu'administrateur.";
                    // Création de la session
                    $_SESSION['login']=$ligne['pseudo'];
                    $_SESSION['typeUser'] = "admin";
                } else if ($ligne['idCategorie'] == 2) {
                    echo "Bonjour. Vous êtes connecté en tant que responsable des ventes.";
                    $_SESSION['login']=$ligne['pseudo'];
                    $_SESSION['typeUser'] = "responsable";
                } else if ($ligne['idCategorie'] == 1) {
                    echo "Bonjour " . $ligne['prenom'] . " " . $ligne['nom'] . ". Vous êtes bien connecté en tant que " . $ligne['pseudo'] . " ";
                    // Création de la session
                    $_SESSION['login'] = $ligne['prenom'] . " " . $ligne['nom'];
                    $_SESSION['pseudo'] = $ligne['pseudo'];
                    $_SESSION['email'] = $ligne['email'];
                    $_SESSION['rue'] = $ligne['rue'];
                    $_SESSION['adresse'] = $ligne['npa'] . " " . $ligne['ville'];
                    $_SESSION['IDUser'] = $ligne['idUtilisateur'];
                    $_SESSION['typeUser'] = "membre";
                } else {
                    // Si l'on n'appartient à aucune catégorie
                    echo "Erreur de login.";
                }
            }
            else {
                // Si le mot de passe est faux
                echo "Erreur de mot de passe.";
            }
        }
        else
        {
            // Si l'utilisateur déjà est connecté, détruit sa session
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