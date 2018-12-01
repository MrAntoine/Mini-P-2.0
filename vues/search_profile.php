<?php
/**
 * Created by PhpStorm.
 * User: Antoine
 * Date: 29/11/2018
 * Time: 23:52
 */


$_SESSION["id"] = 1;
$_SESSION["login"] = "gilles";

if(!isset($_SESSION["id"])) {
    // On n est pas connecté, il faut retourner à la pgae de login
    header("Location:index.php?action=login");
}
$ok = false;

$sql = "SELECT * FROM user WHERE login LIKE Concat ('%',?,'%') ";

$query = $pdo->prepare($sql);

$query->execute(array($_POST['search_profile']));

echo "<div>Liste des utilisateurs : </div>";
while ($line = $query->fetch()) {
   $ok = true;
    echo "<a href='index.php?action=mur&id=" . $line['id'] . "'>" . $line['login'] . "</a><br/>";
}

if ($ok ==false){
    echo "Désolé mais aucun membre est inscrit avec ce pseudo. <br/> Si vous connaissez cette personne vous pouvez lui suggéré de créer un compte. ";
}




?>
