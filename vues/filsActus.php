<?php
/**
 * Created by PhpStorm.
 * User: Antoine
 * Date: 01/12/2018
 * Time: 17:44
 */

FakeConnexion();

if (isset($_SESSION["id"])) {


// Creation de post
    creerPost($_SESSION['id']);


    $sql = "SELECT * FROM user WHERE id IN ( SELECT user.id FROM user INNER JOIN lien ON idUtilisateur1=user.id AND etat='ami' AND idUtilisateur2=? UNION SELECT user.id FROM user INNER JOIN lien ON idUtilisateur2=user.id AND etat='ami' AND idUtilisateur1=?) OR ?";

    $query = $pdo->prepare($sql);

    $query->execute(array($_SESSION['id'], $_SESSION['id'], $_SESSION['id']));

    $sql2 = "SELECT * FROM ecrit WHERE idAuteur=? order by dateEcrit DESC";

    $query2 = $pdo->prepare($sql2);



    while ($line = $query->fetch()) {
        $query2->execute(array($line['id']));


        while ($line2 = $query2->fetch()) {


            echo "<div class='article margin anim'>";
            echo "<div class='img_article'><img src='uploads/" . $line['avatar'] . "' alt='Photo de profil'></div>";
            echo "<p class='nomPersonne'>Posté par <a href='index.php?action=mur&id=" . $line2["idAuteur"] . "'>" . $line["login"] . "</a></p>";
            echo "</a>";
            echo "<div class='date_article'>" . $line2["dateEcrit"] . "</div>";
            echo "<div class='article-corps anim'>";
            echo "<p>" . $line2["titre"] . "</p>";
            if ($line2['image'] == true) {
                echo "<div class='img_publication'><img src='uploads/" . $line2['image'] . "' alt='Image Publication'></div>";
            }
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
            if ($likeLine == false) {
                $style = "style='background-color:grey'";
            } else {
                $style = "style='background-color:red'";// style css
            }

            echo "<form method='POST' action='index.php?action=like'>";
            echo "<input type='hidden' name='idPost' value='" . $line2['id'] . "'>";
            echo "<input type='submit' name='like' value='Like' class='postMsg'" . $style . " ></form>";
            echo "</div>";

            echo "<div class='texte-article'>";
            echo "</div>";
            echo "</div>";

        }
    }
    echo "</div>";

}

$id = $line["id"];
// Afficher le pseudo + avatar
include('vues/affiche_avatar.php');


?>