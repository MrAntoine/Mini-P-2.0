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
    header("Location:index.php?action=login");
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

// les deux ids à tester sont : $_GET["id"] et $_SESSION["id"]
// A completer. Il faut récupérer une ligne, si il y en a pas ca veut dire que lon est pas ami avec cette personne
// Etape 1  : preparation
    $query = $pdo->prepare($sql);

// Etape 2 : execution : 2 paramètres dans la requêtes !!
    $query->execute(array($_GET['id'], $_SESSION['id'], $_SESSION['id'], $_GET['id']));

// Etape 3 :

// un seul fetch
    $line = $query->fetch();

    if ($line == true) {
        $ok = false;
    } else {

        /*$sql2 = "SELECT * FROM user WHERE id IN ( SELECT user.id FROM user INNER JOIN lien ON idUtilisateur1=user.id AND etat='attente' AND idUtilisateur2=?)";
        */
        $sql2 = "SELECT * FROM user WHERE id IN ( SELECT user.id FROM user INNER JOIN lien ON idUtilisateur1=user.id AND etat='attente' AND idUtilisateur2=? UNION SELECT user.id FROM user INNER JOIN lien ON idUtilisateur2=user.id AND etat='attente' AND idUtilisateur1=?)";
        $query2 = $pdo->prepare($sql2);
        $query2->execute(array($_SESSION['id'],$_SESSION['id']));
        $line2 = $query2->fetch();

        if($line2 == true){
            echo "<p class='erreur_ami_attente'>Vous avez deja envoyer une demande d'amis ! </p>";
        }

    }

}

// Verifions si on est amis avec cette personne
$sql = "INSERT INTO lien VALUES(NULL,?,?,'attente') ";
//$sql2 = "SELECT login FROM user WHERE (id=?)";

// Etape 1  : preparation
$query = $pdo->prepare($sql);
//$query2 = $pdo->prepare($sql2);

// Etape 2 : execution : 2 paramètres dans la requêtes !!
$query->execute(array($_SESSION['id'],$_POST['id_futur_ami']));
$id =$_POST['id_futur_ami'];
header("Location:index.php?action=mur&id=".$id."");
echo "<p class='erreur_ami_demande_sent'>Une demande a été envoyé</p>";

?>
