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
    header("Location:index.php?action=login");
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
        echo"<input type='submit' name='addFriend' value='Envoyer une demande d" . "'" . "ami'>";

        /* Affichage du nom + avatar */
        echo "";


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



        // poster une publication

        echo " <div class='article margin'>";
        echo "<input type='text'";
        echo "cols='40'";
        echo " rows='2'";
        echo " style='width:100%; height:50px;'";
        echo " name='Text1'";
        echo " id='Text1'";
        echo "value=''";
        echo "maxlength='150'";
        echo "class='margin'";
        echo "placeholder='Ecrivez votre post !' />";

        echo "<input type='submit' name='writeMsg' value='Poster !' class='postMsg' >";
        echo "</div><br/>";


        // Etape 3 : Charger les publications
        while($line = $query->fetch()) {

            $query2->execute(array($line["idAuteur"]));
            $line2= $query2->fetch();

            echo "<div class='article margin anim'>";
            echo "<div class='img_article'></div>";
            echo "<p class='nomPersonne'>Posté par <a href='index.php?action=mur&id". $line["idAuteur"] ."'>".$line2["login"]."</a></p>";
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
