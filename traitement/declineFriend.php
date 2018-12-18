<?php
/**
 * Created by PhpStorm.
 * User: Antoine
 * Date: 29/11/2018
 * Time: 20:27
 */


FakeConnexion();


if(isset($_SESSION["id"])) {


    $sql = "DELETE  FROM lien WHERE etat='attente' AND (idUtilisateur1=? AND idUtilisateur2=?)";
    $query = $pdo->prepare($sql);
    $query->execute(array($_POST['idAmi'], $_SESSION['id']));
    header("Location:index.php?action=friends");
}
?>
