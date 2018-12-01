<?php
/**
 * Created by PhpStorm.
 * User: Antoine
 * Date: 20/11/2018
 * Time: 21:52
 */

FakeConnexion();


if(!isset($_SESSION["id"])) {
    // On n est pas connecté, il faut retourner à la pgae de login
    header("Location:exempleMur.html?action=login");
}
// On veut affchier notre mur ou celui d'un de nos amis et pas faire n'importe quoi
$ok = false;

if (!isset($_GET["id"]) || ($_GET["id"]) == ($_SESSION["id"])) {
    $id = $_SESSION["id"];
    $ok = true; // On a le droit d afficher notre mur
} else {
    $id = $_GET["id"];

// Verifions si on est amis avec cette personne
    $sql = "SELECT * FROM lien WHERE etat='ami' AND ((idUtilisateur1=? AND idUtilisateur2=?) OR ((idUtilisateur1=? AND idUtilisateur2=?)))";

    $query = $pdo->prepare($sql);

    $query->execute(array($_GET['id'], $_POST['id_mur_ami'], $_SESSION['id'], $_POST['id_mur_ami']));

    $line = $query->fetch();

    if ($line == false) {
        $ok = false;
    } else {
        $ok = true;
    }
}


if($ok == true) {
    $sql = "DELETE  FROM lien WHERE etat='ami' AND ((idUtilisateur1=? AND idUtilisateur2=?) OR ((idUtilisateur1=? AND idUtilisateur2=?)))";

    $query = $pdo->prepare($sql);

    $query->execute(array($_SESSION['id'], $_POST['id_mur_ami'], $_POST['id_mur_ami'], $_SESSION['id']));

    $id = $_POST['id_mur_ami'];

    header("Location:index.php?action=mur&id=" . $id . "");
}
?>
