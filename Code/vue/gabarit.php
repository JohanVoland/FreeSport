<!DOCTYPE HTML>
<html>
	<head>
		<title><?=$titre;?></title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->

        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <style>
            .w3-sidebar a {font-family: "Roboto", sans-serif}
            body,h1,h2,h3,h4,h5,h6,.w3-wide {font-family: "Montserrat", sans-serif;}
        </style>

        <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="assets/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
        <link href="assets/js/jquery.min.js" rel="stylesheet">
    </head>

    <body class="w3-content">
    <!-- Sidebar/menu -->
    <nav class="w3-sidebar w3-bar-block w3-white w3-collapse w3-top" style="z-index:3;width:250px" id="mySidebar">
        <div class="w3-container w3-display-container w3-padding-16">
            <i onclick="w3_close()" class="fa fa-remove w3-hide-large w3-button w3-display-topright"></i>
            <h3 class="w3-wide"><b><img src="images/logo.PNG"></b></h3>
        </div>

        <br/>
        <ul class="nav">
            <?php if (isset($_SESSION['login'])) :?>
                <li><a href="index.php?action=profil" class="w3-bar-item w3-button w3-padding">Bonjour <?php echo $_SESSION['pseudo']; ?></a></li>
                <?php if ($_SESSION['typeUser'] == "membre") : ?>
                    <li><a href="index.php?action=panier"><img src="images/panier.jpg"></a></li>
                <?php endif; ?>
            <?php else : ?>
                <li><a href="index.php?action=accueil" class="w3-bar-item w3-button w3-padding">Bonjour visiteur</a></li>
            <?php endif ?>

            <li><a href="index.php?action=accueil" class="w3-bar-item w3-button w3-padding">Aller à l'accueil</a></li>
            <li><a href="index.php?action=vue_inscription" class="w3-bar-item w3-button w3-padding">S'inscrire</a></li>

            <!-- Gestion du login/logout -->
            <?php if (isset($_SESSION['login'])) :?>
                <li><a href="index.php?action=vue_login" class="w3-bar-item w3-button w3-padding">Logout</a></li>
            <?php else : ?>
                <li><a href="index.php?action=vue_login" class="w3-bar-item w3-button w3-padding">Login</a></li>
            <?php endif ?>

            <li><a href="index.php?action=vue_articles" class="w3-bar-item w3-button w3-padding">Articles</a></li>

            <!-- Afficher uniquement si on est le resp des ventes ou l'admin -->
            <?php if (@$_SESSION['typeUser'] == "responsable" || @$_SESSION['typeUser'] == "admin") : ?>
                <li><a href="index.php?action=vue_ajouter" class="w3-bar-item w3-button w3-padding">Ajouter article</a></li>
            <?php endif; ?>

            <!-- Afficher uniquement si on est l'administrateur -->
            <?php if (@$_SESSION['typeUser'] == "admin") : ?>
                <li><a href="index.php?action=vue_liste_users" class="w3-bar-item w3-button w3-padding">Liste des utilisateurs</a></li>
            <?php endif; ?>

            <!-- Afficher uniquement si on est le resp des ventes ou l'admin -->
            <?php if (@$_SESSION['typeUser'] == "responsable" || @$_SESSION['typeUser'] == "admin") : ?>
                <li><a href="index.php?action=vue_liste_commande" class="w3-bar-item w3-button w3-padding">Liste des commandes</a></li>
                <li><a href="index.php?action=vue_stock" class="w3-bar-item w3-button w3-padding">Stock</a></li>
            <?php endif; ?>
        </ul>
    </nav>

    <!-- Top menu on small screens -->
    <header class="w3-bar w3-top w3-hide-large w3-black w3-xlarge">
        <div class="w3-bar-item w3-padding-24 w3-wide"><img src="images/logo.PNG"></div>
        <a href="javascript:void(0)" class="w3-bar-item w3-button w3-padding-24 w3-right" onclick="w3_open()"><i class="fa fa-bars"></i></a>
    </header>

    <!-- Overlay effect when opening sidebar on small screens -->
    <div class="w3-overlay w3-hide-large" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

    <!-- Content -->
    <div id="content">
        <div class="inner">

            <?=$contenu ?>

        </div>
    </div>

    <!-- Footer -->
    <footer class="w3-padding-64 w3-light-grey w3-small" id="footer" style="margin-left: 24.5%">
        <div class="w3-row-padding">
            <div class="w3-col s6" style="padding-left: 5%">
                <h4>A propos</h4>
                <p><a href="index.php?action=vue_about">A propos de nous</a></p>
                <p><a href="index.php?action=vue_contact">Contact</a></p>
                <p><a href="index.php?action=vue_infoPaiement">Paiement</a></p>
            </div>

            <div class="w3-col s5 w3-justify">
                <h4>Magasin</h4>
                <p><i class="fa fa-fw fa-map-marker"></i> Free Sport</p>
                <p><i class="fa fa-fw fa-phone"></i> 0774170807</p>
                <p><i class="fa fa-fw fa-envelope"></i> FreeSportContact@gmail.com</p>
                <h4>We accept</h4>
                <p><i class="fa fa-fw fa-credit-card"></i> Credit Card</p>
                <br>
                <a href="https://fr-fr.facebook.com/"><i class="fa fa-facebook-official w3-hover-opacity w3-large"></i></a>
                <a href="https://www.instagram.com/?hl=fr"><i class="fa fa-instagram w3-hover-opacity w3-large"></i></a>
                <a href="https://www.snapchat.com/l/fr-fr/" ><i class="fa fa-snapchat w3-hover-opacity w3-large"></i></a>
                <a href="https://www.pinterest.fr/" ><i class="fa fa-pinterest-p w3-hover-opacity w3-large"></i></a>
                <a href="https://twitter.com/?lang=fr" ><i class="fa fa-twitter w3-hover-opacity w3-large"></i></a>
                <a href="https://www.linkedin.com/uas/login" ><i class="fa fa-linkedin w3-hover-opacity w3-large"></i></a>
            </div>
        </div>
    </footer>

    <script>
        // Accordion
        function myAccFunc1() {
            var x = document.getElementById("demoAcc1");
            if (x.className.indexOf("w3-show") == -1) {
                x.className += " w3-show";
            } else {
                x.className = x.className.replace(" w3-show", "");
            }
        }
        // Click on the "Jeans" link on page load to open the accordion for demo purposes
        document.getElementById("myBtn1").click();

        function myAccFunc2() {
            var x = document.getElementById("demoAcc2");
            if (x.className.indexOf("w3-show") == -1) {
                x.className += " w3-show";
            } else {
                x.className = x.className.replace(" w3-show", "");
            }
        }
        document.getElementById("myBtn2").click();

        function myAccFunc3() {
            var x = document.getElementById("demoAcc3");
            if (x.className.indexOf("w3-show") == -1) {
                x.className += " w3-show";
            } else {
                x.className = x.className.replace(" w3-show", "");
            }
        }
        document.getElementById("myBtn3").click();

        // Script to open and close sidebar
        function w3_open() {
            document.getElementById("mySidebar").style.display = "block";
            document.getElementById("myOverlay").style.display = "block";
        }

        function w3_close() {
            document.getElementById("mySidebar").style.display = "none";
            document.getElementById("myOverlay").style.display = "none";
        }
    </script>

    <!-- Scripts -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/skel.min.js"></script>
    <script src="assets/js/util.js"></script>
    <!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
    <script src="assets/js/main.js"></script>

    </body>
</html>
