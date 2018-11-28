<?php
// On veut affchier notre mur ou celui d'un de nos amis et pas faire n'importe quoi
$ok = false;

if (!isset($_GET["id"]) || ($_GET["id"]) == ($_SESSION["id"])) {
    $id = $_SESSION["id"];
    $ok = true; // On a le droit d afficher notre mur
} else {
    $id = $_GET["id"];



    //commencer la fonction ici


// Verifions si on est amis avec cette personne
    $sql = "SELECT * FROM lien WHERE etat='ami' AND ((idUtilisateur1=? AND idUtilisateur2=?) OR ((idUtilisateur1=? AND idUtilisateur2=?)))";

// les deux ids à tester sont : $_GET["id"] et $_SESSION["id"]
// A completer. Il faut récupérer une ligne, si il y en a pas ca veut dire que lon est pas ami avec cette personne
// Etape 1  : preparation
    $query = $pdo->prepare($sql);

// Etape 2 : execution : 2 paramètres dans la requêtes !!
    $query->execute(array($_GET['id'], $_SESSION['id'], $_SESSION['id'], $_GET['id']));

// Etape 3 :

// un seul fetch
    $line = $query->fetch();

    if ($line == false) {
        $ok = false;
    } else {
        $ok = true;
    }

}

?>