<?php

FakeConnexion();

if(isset($_SESSION["id"])) {

    $sql2 = "UPDATE user SET login=?, email=? WHERE id=?";

    $query2 = $pdo->prepare($sql2);
    $query2->execute(array($_POST['pseudo'], $_POST['mail-address'], $_SESSION["id"]));

    header("Location:index.php?action=myProfile");

}
?>
