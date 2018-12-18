<?php
/**
 * Created by PhpStorm.
 * User: Antoine
 * Date: 29/11/2018
 * Time: 23:52
 */


FakeConnexion();

if(!isset($_SESSION["id"])) {
    // On n est pas connecté, il faut retourner à la pgae de login
    header("Location:index.php?action=login");
}
$ok = false;

$sql = "SELECT * FROM user WHERE login LIKE Concat ('%',?,'%') ";

$query = $pdo->prepare($sql);

$query->execute(array($_POST['search_profile']));

if ($_POST['search_profile'] == "") {
    echo "<p class\"noUserText wrapper\">Désolé mais aucun membre n'est inscrit avec ce pseudo. <br/> Si vous connaissez cette personne vous pouvez lui suggérer de créer un compte.</p>";
} else {
    echo "<div class=\"userList wrapper\">Liste des utilisateurs : </div>";
    while ($line = $query->fetch()) {
        echo "<a href='index.php?action=mur&id=" . $line['id'] . "'>" . $line['login'] . "</a><br/>";
    }
}


?>
