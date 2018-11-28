<?php

/**
 * Created by PhpStorm.
 * User: Antoine
 * Date: 20/11/2018
 * Time: 21:52
 */


$_SESSION["id"] = 1;
$_SESSION["login"] = "gilles";


if(!isset($_SESSION["id"])) {
    // On n est pas connecté, il faut retourner à la pgae de login
    header("Location:exempleMur.html?action=login");
}


// Verifions si on est amis avec cette personne
$sql = "SELECT * FROM ecrit WHERE (idAuteur=?)";
$sql2 = "SELECT login FROM user WHERE (id=?)";

// Etape 1  : preparation
$query = $pdo->prepare($sql);
$query2 = $pdo->prepare($sql2);
// Etape 2 : execution : 2 paramètres dans la requêtes !!
$query->execute(array($_SESSION['id']));

// Etape 3 :
while($line = $query->fetch()) {

    // Requete pour trouver le nom de l'ami
    $query2->execute(array($line["idAuteur"]));
    $line2= $query2->fetch();

    //Affichage

    echo "<div class='article margin anim'>";
          echo"<div class='img_article'></div>";
          echo"<a href='#' class='nomPersonne'>";
            echo "<p><a href='index.php?action=mur&id". $line["idAuteur"] ."'>".$line2["login"]."</a></p>";
          echo"</a>";
          echo"<div class='date_article'>".$line['dateEcrit']."</div>";
          echo"<div class='article-corps anim'>";
    echo"<p>".$line['titre']."</p>";
    echo"<p>".$line['contenu']."</p>";
          echo"<div class='texte-article'>";
          echo"</div>";
          echo"</div>";
          echo"</div>";


}
?>





















