<?php
/**
 * Created by PhpStorm.
 * User: Antoine
 * Date: 01/12/2018
 * Time: 17:44
 */

$_SESSION["id"] = 1;
$_SESSION["login"] = "gilles";

if (!isset($_SESSION["id"])) {
    header("Location:index.php?action=login");
}


// Afficher le pseudo + avatar
//include('vues/affiche_avatar.php');


// poster une publication
echo "<div class='wrapper'>";
echo " <div class='article margin'>";
echo "<form method='POST' action='index.php?action=addPost'>";
echo "<input type='text' name='titrepost' placeholder='Ecrivez votre titre' required>";
echo "<input type='text' cols='40' rows='2' style='width:100%; height:50px;' name='Text1' id='Text1' value='' maxlength='150' class='margin' placeholder='Ecrivez votre post' required/>";
echo "<input type='hidden' name='idAmi' value='".$_SESSION['id'].">";
echo "<input type='submit' name='writeMsgSubmit' value='Publier' class='postMsg' ></form>";
echo "</div><br/>";

echo "<form method='post' action='index.php?action=upload' enctype='multipart/form-data'> ";
echo "<input type='file' name='image_post'>";
echo "<input type='hidden' value=''>";
echo "<input type='submit' name='submit_image_post'></form>";



$sql = "SELECT * FROM user WHERE id IN ( SELECT user.id FROM user INNER JOIN lien ON idUtilisateur1=user.id AND etat='ami' AND idUtilisateur2=? UNION SELECT user.id FROM user INNER JOIN lien ON idUtilisateur2=user.id AND etat='ami' AND idUtilisateur1=?) OR ?";

$query = $pdo->prepare($sql);

$query->execute(array($_SESSION['id'], $_SESSION['id'], $_SESSION['id']));

$sql2 ="SELECT * FROM ecrit WHERE idAuteur=? order by dateEcrit DESC";

$query2 = $pdo->prepare($sql2);

while($line = $query->fetch()) {
    $query2->execute(array($line['id']));


    while ($line2 = $query2->fetch()) {


        echo "<div class='article margin anim'>";
        echo "<div class='img_article'></div>";
        echo "<p class='nomPersonne'>Posté par <a href='index.php?action=mur&id=" . $line2["idAuteur"] . "'>" . $line["login"] . "</a></p>";
        echo "</a>";
        echo "<div class='date_article'>" . $line2["dateEcrit"] . "</div>";
        echo "<div class='article-corps anim'>";
        echo "<p>" . $line2["titre"] . "</p>";
        echo "<br><p>" . $line2["contenu"] . "</p>";

        echo "<form method='POST' action='index.php?action=delPost'>";
        echo "<input type='hidden' name='idPost' value='" . $line2['id'] . "'>";
       // echo "<input type='hidden' name='idMur' value='" . $id . "'>";
        if ($_SESSION["id"] == $line2["idAuteur"]) {
            echo "<input type='submit' name='writeMsg' value='Supprimer' class='postMsg' ></form>";
        }

        /*
        echo "<form method='POST' action='javascript:AfficheComment();'>";
        echo "<input type='submit' name='comment' value='Commenter' class='postMsg' ></form>";
        */


        // Vérifié si un like est deja mis..
        $likeSql = "SELECT * FROM aime WHERE (idUtilisateur=? AND idEcrit=?)";
        $likeQuery = $pdo->prepare($likeSql);
        $likeQuery->execute(array($_SESSION['id'], $line2['id']));
        $likeLine = $likeQuery->fetch();
        print_r($likeLine);
        if ($likeLine == false) {
            //style css
            ?>
            <style> .likes {
                    background-color:;
                }</style> <?php
        } else {
            // style css
            ?>
            <style> .likes {
                    background-color: red;
                }</style> <?php
        }
        echo "<form method='POST' action='index.php?action=like'>";
        echo "<input type='hidden' name='idPost' value='" . $line2['id'] . "'>";
        echo "<input type='submit' name='like' value='Like' class='postMsg likes' ></form>";
        echo "</div>";

        echo "<div class='texte-article'>";
        echo "</div>";
        echo "</div>";

    }
}
    echo "</div>";



?>