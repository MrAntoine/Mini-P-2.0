<?php
/**
 * Created by PhpStorm.
 * User: Antoine
 * Date: 29/11/2018
 * Time: 20:27
 */


$_SESSION["id"] = 1;
$_SESSION["login"] = "gilles";


if(!isset($_SESSION["id"])) {
    // On n est pas connecté, il faut retourner à la pgae de login
    header("Location:index.php?action=login");
}

    $sql = "DELETE  FROM lien WHERE etat='ami' AND ((idUtilisateur1=? AND idUtilisateur2=?) OR ((idUtilisateur1=? AND idUtilisateur2=?)))";
    $query = $pdo->prepare($sql);
    $query->execute(array($_POST['idAmi'], $_SESSION['id'], $_SESSION['id'],$_POST['idAmi']));
header("Location:index.php?action=friends");
?>
