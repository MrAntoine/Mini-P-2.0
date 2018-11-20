<?php

$sql = "SELECT * FROM user WHERE login=? AND mdp=PASSWORD(?)";

// Etape 1  : preparation
$query = $pdo->prepare($sql); 
// Etape 2 : execution : 2 paramètres dans la requêtes !!
$query->execute(array($_POST['pseudo'], $_POST['mdp']));

// Etape 3 : ici le login est unique, donc on sait que l'on peut avoir zero ou une  seule ligne.



// un seul fetch
$line = $query->fetch();

// Si $line est faux le couple login mdp est mauvais, on retourne au formulaire
if($line == false){
	include"vues/login.php";
	echo "Erreur dans les données fournies";
} else {
	$_SESSION['id'] = $line['id']; 
	$_SESSION['login']= $line['login'];
	header("Location: exempleMur.html");
}
// sinon on crée les variables de session $_SESSION['id'] et $_SESSION['login'] et on va à la page d'accueil