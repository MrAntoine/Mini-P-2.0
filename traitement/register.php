<?php

if(isset($_POST["login"]) && isset($_POST['mail-address']) && isset($_POST['password']) && isset($_POST['passwordcf'])) {
    $sql = "INSERT INTO utilisateur VALUES(?,?,?,PASSWORD(?),PASSWORD(?))";

    $query = $pdo->prepare($sql);
    $query->execute(array($_POST['login'], $_POST['password']));
/*
    $_SESSION['id'] = $line['id'];
    $_SESSION['login'] = $line['login'];
    header("Location: mur.php");*/
}


?>