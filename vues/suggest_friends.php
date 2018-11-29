<?php
/**
 * Created by PhpStorm.
 * User: Antoine
 * Date: 29/11/2018
 * Time: 18:42
 */


$_SESSION["id"] = 1;
$_SESSION["login"] = "gilles";

if(!isset($_SESSION["id"])) {
// On n est pas connecté, il faut retourner à la pgae de login
header("Location:index.php?action=login");
}

//$sql = "SELECT * FROM lien WHERE (etat IS NOT NULL)"; // ok
//$sql = "SELECT * FROM user INNER JOIN lien ON user.id=idUtilisateur2 AND etat IS NOT NULL AND idUtilisateur1=?"; //ok


//OK //$sql = "SELECT * FROM user WHERE id IN ( SELECT user.id FROM user INNER JOIN lien ON idUtilisateur1=user.id AND etat IS NOT NULL AND idUtilisateur2=? UNION SELECT user.id FROM user INNER JOIN lien ON idUtilisateur2=user.id AND etat IS NOT NULL AND idUtilisateur1=?)";

$sql = "SELECT * FROM user WHERE id NOT IN ( SELECT user.id FROM user INNER JOIN lien ON idUtilisateur1=user.id AND etat IS NOT NULL AND idUtilisateur2=? UNION SELECT user.id FROM user INNER JOIN lien ON idUtilisateur2=user.id AND etat IS NOT NULL AND idUtilisateur1=?)";

$query = $pdo->prepare($sql);

$query->execute(array($_SESSION['id'],$_SESSION['id']));
//$query->execute(array($_SESSION['id']));


// A FAIRE : Penser à limiter le nombre de boucle pour limiter le nomdre de suggestions
while($line = $query->fetch()) {
    echo "";
    echo "<a href='index.php?action=mur&id=".$line['id']."'>".$line['login']."</a><br/>";
}

?>