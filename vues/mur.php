<?php
/**
 * Created by PhpStorm.
 * User: Antoine
 * Date: 20/11/2018
 * Time: 14:24
 */


FakeConnexion();

if(!isset($_SESSION["id"])) {
    // On n est pas connecté, il faut retourner à la pgae de login
    header("Location:index.php?action=login");
}

include ('traitement/check_if_friend.php');


/*
// On veut affchier notre mur ou celui d'un de nos amis et pas faire n'importe quoi
$ok = false;

if (!isset($_GET["id"]) || ($_GET["id"]) == ($_SESSION["id"])) {
    $id = $_SESSION["id"];
    $ok = true; // On a le droit d afficher notre mur
} else {
    $id = $_GET["id"];
    CheckAmis ($_SESSION["id"],$_GET["id"]);
}
*/


if ($ok == false) {


    $sql3 = "SELECT * FROM user WHERE id IN ( SELECT user.id FROM user INNER JOIN lien ON idUtilisateur1=? AND etat='attente' AND idUtilisateur2=? UNION SELECT user.id FROM user INNER JOIN lien ON idUtilisateur2=? AND etat='attente' AND idUtilisateur1=?)";
    $query3 = $pdo->prepare($sql3);
    $query3->execute(array($_SESSION['id'], $id, $id, $_SESSION['id']));
    $line3 = $query3->fetch();
    if ($line3 == false) {
        echo "<p class='erreur_pas_ami'>Vous n êtes pas encore ami, vous ne pouvez voir son mur !!</p>";
        echo "<form method='POST' action='index.php?action=addFriend' >";
        echo "<input type='hidden' name='id_futur_ami' value='$id'>";
        echo "<input type='submit' name='addFriend' value='Demander en ami'></form>";
    } else {
        echo "<p class='erreur_ami_attente'>Une demande d'amis est déjà en attente !</p>";
    }
    // Afficher le pseudo + avatar
    include('vues/affiche_avatar.php');


} else {

    $sql ="SELECT * FROM ecrit WHERE idAmi=? order by dateEcrit DESC";

    $sql2 = "SELECT * FROM user WHERE (id=?)";

    $query = $pdo->prepare($sql);

    $query2 = $pdo->prepare($sql2);

    $query->execute(array($id));


    // Afficher le pseudo + avatar
    include('vues/affiche_avatar.php');

    // Creation de post
    creerPost($_SESSION['id']);

    // parcours des publications
    while ($line = $query->fetch()) {

        $query2->execute(array($line["idAuteur"]));
        $line2 = $query2->fetch();

        echo "<div class='article margin anim'>";
        echo "<div class='img_article'><img src='uploads/" . $line2['avatar'] . "' alt='Photo de profil'></div>";
        echo "<p class='nomPersonne'>Posté par <a href='index.php?action=mur&id=" . $line["idAuteur"] . "'>" . $line2["login"] . "</a></p>";
        echo "</a>";
        echo "<div class='date_article'>" . $line["dateEcrit"] . "</div>";
        echo "<div class='article-corps anim'>";
        echo "<p>" . $line["titre"] . "</p>";
        if($line['image'] == true) {
            echo "<div class='img_publication'><img src='uploads/" . $line['image'] . "' alt='Image Publication'></div>";
        }
        echo "<br><p>" . $line["contenu"] . "</p>";

        echo "<form method='POST' action='index.php?action=delPost'>";
        echo "<input type='hidden' name='idPost' value='" . $line['id'] . "'>";
        echo "<input type='hidden' name='idMur' value='" . $id . "'>";
        if ($_SESSION["id"] == $line["idAuteur"] || $_SESSION["id"] == $id) {
            echo "<input type='submit' name='writeMsg' value='Supprimer' class='postMsg' ></form>";
        }


        // Vérifié si un like est deja mis..
        $likeSql = "SELECT * FROM aime WHERE (idUtilisateur=? AND idEcrit=?)";
        $likeQuery = $pdo->prepare($likeSql);
        $likeQuery->execute(array($_SESSION['id'], $line['id']));
        $likeLine = $likeQuery->fetch();
        if ($likeLine == false) {
            $style = "style='background-color:grey'";
        } else {
            $style = "style='background-color:red'";// style css
        }
        echo "<form method='POST' action='index.php?action=like'>";
        echo "<input type='hidden' name='idPost' value='" . $line['id'] . "'>";
        echo "<input type='submit' name='like' value='Like' class='postMsg'" . $style . " ></form>";
        echo "</div>";

        echo "<div class='texte-article'>";
        echo "</div>";
        echo "</div>";

    }
    echo "</div>";

}

?>


<script>
    function AfficheComment() {
        alert ("coucou");
    }
</script>