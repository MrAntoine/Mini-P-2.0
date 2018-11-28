<?php
/**
 * Created by PhpStorm.
 * User: Antoine
 * Date: 28/11/2018
 * Time: 22:28
 */



$_SESSION["id"] = 1;
$_SESSION["login"] = "gilles";

if(!isset($_SESSION["id"])) {
    // On n est pas connecté, il faut retourner à la pgae de login
    header("Location:index.php?action=login");
}

$sql = "SELECT * FROM like WHERE (idUtilisateur=? AND idEcrit=?)";
$query = $pdo->prepare($sql);

$sql2 = "INSERT INTO like VALUES(NULL,?,?) ";
$query2 = $pdo->prepare($sql2);

$sql3 = "DELETE FROM like WHERE (idEcrit=? AND idUtilisateur=?)";
$query3 = $pdo->prepare($sql3);

$query->execute(array($_SESSION['id'],$_POST['idPost']));
$line = $query->fetch();



if($line == false){
    //style css
    $query2->execute(array($_POST['idPost'],$_SESSION['id']));

} else {
    // style css
    $query3->execute(array($_POST['idPost'],$_SESSION['id']));

}


?>