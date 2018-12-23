<?php
/**
 * Created by PhpStorm.
 * User: Antoine
 * Date: 28/11/2018
 * Time: 22:28
 */


FakeConnexion();

if(isset($_SESSION["id"])) {


    $sql = "SELECT * FROM aime WHERE (idUtilisateur=? AND idEcrit=?)";
    $query = $pdo->prepare($sql);

    $sql2 = "INSERT INTO aime VALUES(NULL,?,?) ";
    $query2 = $pdo->prepare($sql2);

    $sql3 = "DELETE FROM aime WHERE (idEcrit=? AND idUtilisateur=?)";
    $query3 = $pdo->prepare($sql3);

    $query->execute(array($_SESSION['id'], $_POST['idPost']));
    $line = $query->fetch();


    if ($line == false) {
        //style css
        $query2->execute(array($_POST['idPost'], $_SESSION['id']));
        //header("Location:index.php?action=mur&id=" . $_POST['idPost'] . "");
        header('Location: ' . $_SERVER['HTTP_REFERER'] );
    } else {
        // style css
        $query3->execute(array($_POST['idPost'], $_SESSION['id']));
        //header("Location:index.php?action=mur&id=" . $_POST['idPost'] . "");
        header('Location: ' . $_SERVER['HTTP_REFERER'] );
    }

}
?>