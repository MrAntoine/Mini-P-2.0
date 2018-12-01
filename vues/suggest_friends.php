<?php
/**
 * Created by PhpStorm.
 * User: Antoine
 * Date: 29/11/2018
 * Time: 18:42
 */


$_SESSION["id"] = 1;
$_SESSION["login"] = "gilles";

if (!isset($_SESSION["id"])) {
// On n est pas connecté, il faut retourner à la pgae de login
    header("Location:index.php?action=login");
}

$sql = "SELECT * FROM user WHERE id <> ? AND id NOT IN ( SELECT user.id FROM user INNER JOIN lien ON idUtilisateur1=user.id AND etat IS NOT NULL AND idUtilisateur2=? UNION SELECT user.id FROM user INNER JOIN lien ON idUtilisateur2=user.id AND etat IS NOT NULL AND idUtilisateur1=?) LIMIT 2";

$query = $pdo->prepare($sql);

$query->execute(array($_SESSION['id'], $_SESSION['id'], $_SESSION['id']));

echo "<div class=\"sideFriends\">Suggestion d'amis :";


while ($line = $query->fetch()) {

    echo "<br/><a href='index.php?action=mur&id=" . $line['id'] . "'>" . $line['login'] . "</a>";
    echo "<form method='POST' action='index.php?action=addFriend' >";
    echo "<input type='hidden' name='id_futur_ami' value='".$line['id']."'>";
    echo "<input type='submit' name='addFriend' value='Demander en ami'></form><br/>";
}
echo "</div>";

?>

