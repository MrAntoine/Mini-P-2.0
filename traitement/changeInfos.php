<?php

FakeConnexion();

if(isset($_SESSION["id"])) {


    $sql = "SELECT mdp FROM user WHERE id=?";
    $query = $pdo->prepare($sql);
    $query->execute(array($_SESSION["id"]));

    $ancienmdp = $query->fetch();


    if ($_POST["password"] == NULL) {
        $mdp = $ancienmdp;
    } else {
        if ($_POST["password"] == $_POST["passwordcf"]) {
            $mdp = $_POST["password"];
        }
    }

    $sql2 = "UPDATE user SET login=?, mdp=PASSWORD(?), email=? WHERE id=?";

    $query2 = $pdo->prepare($sql2);
    $query2->execute(array($_POST['pseudo'], $mdp, $_POST['mail-address'], $_SESSION["id"]));

    header("Location:index.php?action=myProfile");

}
?>
