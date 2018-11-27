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
$sql = "INSERT INTO lien VALUES(NULL,?,?,'attente') ";
//$sql2 = "SELECT login FROM user WHERE (id=?)";


// Etape 1  : preparation
$query = $pdo->prepare($sql);
//$query2 = $pdo->prepare($sql2);


// Etape 2 : execution : 2 paramètres dans la requêtes !!
$query->execute(array($_SESSION['id'],$_GET['id']));


// Etape 3 SQL :
if ($line = $query->fetch()){
    if($line == ""){

    }
}


/*while($line = $query->fetch()) {
    // Requete pour trouver le nom de l'ami
    $query2->execute(array($line["idUtilisateur2"]));
    $line2= $query2->fetch();
    //Affichage
    echo " <div class='friend margin anim'> ";
    echo "  <div class='img_article'></div>";
    echo "<a class='nomPersonne' href='index.php?action=mur&id". $line["idUtilisateur2"] ."'>".$line2["login"]."</a>";
    echo "</div>";
}
*/


?>
