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

$sql = "UPDATE lien SET etat='ami' WHERE etat='attente' AND (idUtilisateur1=? AND idUtilisateur2=?)";

$query = $pdo->prepare($sql);
$query->execute(array($_POST['idAmi'], $_SESSION['id']));
header("Location:index.php?action=friends");

?>
