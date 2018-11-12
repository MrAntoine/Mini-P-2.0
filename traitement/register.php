<?php

include("config/bd.php"); // On se connecte à la base

$sql = "INSERT INTO user VALUES(NULL,?,PASSWORD(?),?,NULL,NULL)";

$query = $pdo->prepare($sql);
$query->execute(array($_POST['pseudo'],$_POST['mdp'],$_POST['email']));



?>