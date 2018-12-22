<?php
/**
 * Created by PhpStorm.
 * User: Antoine
 * Date: 22/12/2018
 * Time: 13:46
 */


FakeConnexion();

if (isset($_SESSION["id"])) {


    if ($_POST["password"] == $_POST["passwordcf"]) {
        $mdp = $_POST["password"];
    }

    $sql2 = "UPDATE user SET mdp=PASSWORD(?) WHERE id=?";

    $query2 = $pdo->prepare($sql2);
    $query2->execute(array($mdp, $_SESSION["id"]));

    header("Location:index.php?action=myProfile");

}
?>
