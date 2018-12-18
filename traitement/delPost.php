<?php
/**
 * Created by PhpStorm.
 * User: Antoine
 * Date: 27/11/2018
 * Time: 14:53
 */
FakeConnexion();

if(isset($_SESSION["id"])) {


// Verifions si on est amis avec cette personne
    $sql = "SELECT idAuteur FROM ecrit WHERE id=?";
    $query = $pdo->prepare($sql);
    $query->execute(array($_POST['idPost']));
    $line = $query->fetch();

    /*if($line == $_SESSION['id']){*/
    if ($_SESSION["id"] == $line["idAuteur"] || $_SESSION["id"] == $_POST['idAmi']) {

        $sql2 = "DELETE FROM ecrit WHERE id=?";
        $query2 = $pdo->prepare($sql2);
        $query2->execute(array($_POST['idPost']));

        /*header("Location:index.php?action=mur");*/
        header("location:index.php?action=mur&id=" . $_POST['idMur']);

    } else {
        echo "Vous n'avez pas écrit cette publication";
    }

}
?>
