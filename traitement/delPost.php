<?php
/**
 * Created by PhpStorm.
 * User: Antoine
 * Date: 27/11/2018
 * Time: 14:53
 */
$_SESSION["id"] = 1;
$_SESSION["login"] = "gilles";

if(!isset($_SESSION["id"])) {
    // On n est pas connecté, il faut retourner à la pgae de login
    header("Location:index.php?action=login");
}

// Verifions si on est amis avec cette personne
$sql2 = "DELETE FROM ecrit WHERE id=?";

$query2 = $pdo->prepare($sql2);
$query2->execute(array($_POST['idPost']));

header("Location:index.php?action=mur");

?>