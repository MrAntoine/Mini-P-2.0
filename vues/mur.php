<?php
/**
 * Created by PhpStorm.
 * User: Antoine
 * Date: 20/11/2018
 * Time: 14:24
 */


$_SESSION["id"] = 1;
$_SESSION["login"] = "gilles";

if(!isset($_SESSION["id"])) {
    // On n est pas connecté, il faut retourner à la pgae de login
    header("Location:index.php?action=login");
}

/*
// On veut affchier notre mur ou celui d'un de nos amis et pas faire n'importe quoi
$ok = false;

if(!isset($_GET["id"]) || ($_GET["id"])==($_SESSION["id"])){
    $id = $_SESSION["id"];
    $ok = true; // On a le droit d afficher notre mur
} else {
    $id = $_GET["id"];
    // Verifions si on est amis avec cette personne
    $sql = "SELECT * FROM lien WHERE etat='ami' AND ((idUtilisateur1=? AND idUtilisateur2=?) OR ((idUtilisateur1=? AND idUtilisateur2=?)))";

    // les deux ids à tester sont : $_GET["id"] et $_SESSION["id"]
    // A completer. Il faut récupérer une ligne, si il y en a pas ca veut dire que lon est pas ami avec cette personne
    // Etape 1  : preparation
    $query = $pdo->prepare($sql);

    // Etape 2 : execution : 2 paramètres dans la requêtes !!
    $query->execute(array($_GET['id'], $_SESSION['id'], $_SESSION['id'], $_GET['id']));

    // Etape 3 :

    // un seul fetch
    $line = $query->fetch();

    if($line == false){
        $ok=false;
    }else {
        $ok= true;
    }

}
*/

include ('traitement/check_if_friend.php');

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
    // A completer
    // Requête de sélection des éléments dun mur
    // SELECT * FROM ecrit WHERE idAmi=? order by dateEcrit DESC
    $sql ="SELECT * FROM ecrit WHERE idAmi=? order by dateEcrit DESC";
    $sql2 = "SELECT login FROM user WHERE (id=?)";
    // le paramètre  est le $id

    // Etape 1  : preparation
    $query = $pdo->prepare($sql);
    $query2 = $pdo->prepare($sql2);
    // Etape 2 : execution : 2 paramètres dans la requêtes !!
    $query->execute(array($id));



    // Afficher le pseudo + avatar
    include('vues/affiche_avatar.php');


    // poster une publication
    echo "<div class='wrapper'>";
    echo " <div class='article margin'>";
    echo "<form method='POST' action='index.php?action=addPost'>";
    echo "<input type='text' name='titrepost' placeholder='Ecrivez votre titre'>";
    echo "<input type='text' cols='40' rows='2' style='width:100%; height:50px;' name='Text1' id='Text1' value='' maxlength='150' class='margin' placeholder='Ecrivez votre post'/>";
    echo "<input type='hidden' name='idAmi' value='$id'>";
    echo "<input type='submit' name='writeMsg' value='Publier' class='postMsg' ></form>";
    echo "</div><br/>";


    // Etape 3 : Charger les publications
    while($line = $query->fetch()) {

        $query2->execute(array($line["idAuteur"]));
        $line2= $query2->fetch();

        echo "<div class='article margin anim'>";
        echo "<div class='img_article'></div>";
        echo "<p class='nomPersonne'>Posté par <a href='index.php?action=mur&id=". $line["idAuteur"] ."'>".$line2["login"]."</a></p>";
        echo "</a>";
        echo "<div class='date_article'>". $line["dateEcrit"] ."</div>";
        echo "<div class='article-corps anim'>";
        echo"<p>". $line["titre"] ."</p>";
        echo"<br><p>". $line["contenu"] ."</p>";

        echo "<form method='POST' action='index.php?action=delPost'>";
        echo "<input type='hidden' name='idPost' value='".$line['id']."'>";
        echo "<input type='hidden' name='idMur' value='".$id."'>";
        if ($_SESSION["id"] ==  $line["idAuteur"] || $_SESSION["id"] == $id) {
            echo "<input type='submit' name='writeMsg' value='Supprimer' class='postMsg' ></form>";
        }
        /*
        echo "<form method='POST' action='javascript:AfficheComment();'>";
        echo "<input type='submit' name='comment' value='Commenter' class='postMsg' ></form>";
        */


        // Vérifié si un like est deja mis..
        $likeSql = "SELECT * FROM aime WHERE (idUtilisateur=? AND idEcrit=?)";
        $likeQuery = $pdo->prepare($likeSql);
        $likeQuery->execute(array($_SESSION['id'],$line['id']));
        $likeLine = $likeQuery->fetch();
print_r($likeLine);
        if($likeLine == false){
            //style css
            ?> <style> .likes{ background-color:; }</style> <?php
        } else {
            // style css
            ?> <style> .likes{ background-color:red; }</style> <?php
        }
        echo "<form method='POST' action='index.php?action=like'>";
        echo "<input type='hidden' name='idPost' value='".$line['id']."'>";
        echo "<input type='submit' name='like' value='Like' class='postMsg likes' ></form>";
        echo "</div>";

        echo"<div class='texte-article'>";
        echo"</div>";
        echo"</div>";

    }
    echo "</div>";

}

?>


<script>
    function AfficheComment() {
        alert ("coucou");
    }
</script>
