<?php

$sql = "SELECT * FROM user WHERE login=? AND mdp=PASSWORD(?)";

$query=$pdo->prepare($sql);
$query->execute(array($_POST['login'], $_POST['mdp']));
$line = $query->fetch();

if($line==false){
    echo "Le couple login mdp est faux !";
    header("Location: index.php?action=login");
} else {
    $_SESSION['id'] = $line['id'];
    $_SESSION['login'] = $line['login'];
    header("Location: index.php");

}

// Si $line est faux le couple login mdp est mauvais, on retourne au formulaire

// sinon on crée les variables de session $_SESSION['id'] et $_SESSION['login'] et on va à la page d'accueil

?>
