<?php
/**
 * Created by PhpStorm.
 * User: Antoine
 * Date: 20/11/2018
 * Time: 14:24
 */

/*
$_SESSION["id"] = 1;
$_SESSION["login"] = "gilles";
*/

if(!isset($_SESSION["id"])) {
    // On n est pas connecté, il faut retourner à la pgae de login
    header("Location:exempleMur.html?action=login");
}

// On veut affchier notre mur ou celui d'un de nos amis et pas faire n'importe quoi
$ok = false;

if(!isset($_GET["id"]) || ($_GET["id"])==($_SESSION["id"])){
        $id = $_SESSION["id"];
        $ok = true; // On a le droit d afficher notre mur
    } else {
    $id = $_GET["id"];
    // Verifions si on est amis avec cette personne
    $sql = "SELECT * FROM lien WHERE etat='ami'
                AND ((idUtilisateur1=? AND idUtilisateur2=?) OR ((idUtilisateur1=? AND idUtilisateur2=?)))";

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
       $ok=true;
    }

}
    if($ok==false) {
        echo "Vous n êtes pas encore ami, vous ne pouvez voir son mur !!";
    } else {
        // A completer
        // Requête de sélection des éléments dun mur
        // SELECT * FROM ecrit WHERE idAmi=? order by dateEcrit DESC
        $sql ="SELECT * FROM ecrit WHERE idAmi=? order by dateEcrit DESC";
        // le paramètre  est le $id

        // Etape 1  : preparation
        $query = $pdo->prepare($sql);
        // Etape 2 : execution : 2 paramètres dans la requêtes !!
        $query->execute(array($id));

        // Etape 3 :
        while($line = $query->fetch()) {
            echo "<div class='article margin anim'>";
            echo "<div class='img_article'></div>";
            echo "<a href='#' class='nomPersonne'>";
            echo " <p> " . $line["idAuteur"] . "</p>";
            echo "</a>";
            echo "<div class='date_article'>". $line["dateEcrit"] ."</div>";
            echo "<div class='article-corps anim'>";
            echo"<p>". $line["titre"] ."</p>";
            echo"<br><p>". $line["contenu"] ."</p>";
            echo"<div class='texte-article'>";
            echo"</div>";
          echo"</div>";
        echo"</div>";
        }

    }

?>
