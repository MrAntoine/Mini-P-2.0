<?php

include("config/config.php");
include("config/bd.php"); // commentaire
include("divers/balises.php");
include("divers/helpers.php");
include("config/actions.php");
session_start();
ob_start(); // Je démarre le buffer de sortie : les données à afficher sont stockées
date_default_timezone_set('Europe/Paris');

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>FoxBook</title>

    <!-- Bootstrap core CSS -->
    <link href="./css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="./css/ie10.css" rel="stylesheet">


    <!-- Ma feuille de style à moi -->
    <link href="./css/style.css" rel="stylesheet">

    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</head>

<body>

<?php
if (isset($_SESSION['info'])) {
    echo "<div class='alert alert-info alert-dismissible' role='alert'>
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
        <span aria-hidden='true'>&times;</span></button>
        <strong>Information : </strong> " . $_SESSION['info'] . "</div>";
    unset($_SESSION['info']);
}
?>


<header>
    <h3>FoxBook</h3>
    <?php
    if (isset($_SESSION['id'])) {
        echo "<li>Bonjour " . $_SESSION['login'] . " <a href='index.php?action=deconnexion'>Deconnexion</a></li>";
    } else {
        echo "<li><a href='index.php?action=login'>Login</a></li>";
    }
    ?>
</header>

<?php
  include('vues/nav.php');
 ?>

<!-- <nav>
    <ul>
        <li><a href="index.php?action=page2">Va voir la page 2</a></li>



        <li> <a href="index.php?action=enregistrement">Créer un compte</a> </li>
    </ul>
</nav> -->

<div class="container-fluid">
    <div class="row">
        <!--<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">-->
        <div class="col-md-12 main">
            <?php
            // Quelle est l'action à faire ?
            if (isset($_GET["action"])) {
                $action = $_GET["action"];
            } else {
                $action = "accueil";
            }

            // Est ce que cette action existe dans la liste des actions
            if (array_key_exists($action, $listeDesActions) == false) {
                include("vues/404.php"); // NON : page 404
            } else {
                include($listeDesActions[$action]); // Oui, on la charge
            }

            ob_end_flush(); // Je ferme le buffer, je vide la mémoire et affiche tout ce qui doit l'être
            ?>


        </div>
    </div>
</div>
<footer>FOXBOOK<br/>GAUTIER Théo | TRACCOEN Léa | VANDERBRECHT Antoine</footer>
</body>
</html>
