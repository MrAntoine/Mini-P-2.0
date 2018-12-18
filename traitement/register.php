<?php

if(isset($_POST["login"]) && isset($_POST['email']) && isset($_POST['mdp'])) {
    $sql = "INSERT INTO user(login,mdp,email,avatar) VALUES(?,PASSWORD(?),?,?)";

        $avatar = "default-avatar.jpg";


    $query = $pdo->prepare($sql);
    $query->execute(array($_POST['login'], $_POST['mdp'], $_POST['email'], $avatar));
    /*$query ->execute(array(
        'login'=> $_POST['login'],
        'mdp' => $_POST['mdp'],
        'email' => $_POST['email'],
    ));*/
    //$line = $query->fetch();

    //session_start();
    $id = $pdo->lastInsertId();
    $_SESSION['id'] = $id;
    $_SESSION['login'] = $_POST['login'];
    header("Location: index.php?action=mur");
}

?>