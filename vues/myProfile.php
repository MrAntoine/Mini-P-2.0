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
























<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mon Super Facebook</title>
    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <script src="../js/jquery-3.3.1.js"></script>
    <script src="../js/bootstrap.min.js"></script>

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="../css/ie10.css" rel="stylesheet">


    <!-- Ma feuille de style à moi -->
    <link href="../css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://unpkg.com/scrollreveal/dist/scrollreveal.min.js"></script>
    <script src="../js/activeComment.js"></script>
  </head>
  <body>



    <a href="myProfile.php" class="avatar">
      <img src="../img/fleurs-bleuesv2.jpg" alt="logo" >
      <p>Bonjour TOI !</p>
    </a>
    <a href="#" class="logoNav"><img src="../img/logoSite.png" class="lol"></a>
    <div class="searchbox">
      <form method="post">
        <input type="text" name="" placeholder="Type to search">
        <input type="submit" name="" value="GO !" id="searchGo">
      </form>
    </div>
    <nav id="nav">
          <div class="menu-icon">
                <i class="fa fa-bars fa-2x"></i>
          </div>
          <div class="header-toogle">
                <a href="#nav" class="header-toogle-open"><img src="../img/menu.png" width="30" alt="Ouvrir Menu"></a>
                <a href="#" class="header-toogle-close"><img src="../img/menu-close.png" width="30" alt="Fermer Menu"></a>
          </div>

          <div class="menu">
                <ul>
                  <li><a href="../exempleMur.html">Accueil</a></li>
                  <li><a href="myProfile.php">Mon profil</a></li>
                  <li><a href="friends.php">Mes amis</a></li>
                </ul>
          </div>
          <div class="scroll-line"></div>
    </nav>



    <div class="buttonsRight">
        <a href="#MES AMIS">Mes amis</a>
        <a href="#MON PROFIL">Mon profil</a>
        <a href="#MON COMPTE">Mon compte</a>
        <a href="#DECONNEXION">Deconnexion</a>
    </div>

    <div class="wrapper">

        <div class="article margin">
          <input type="text"
                 cols="40"
                 rows="2"
                 style="width:100%; height:50px;"
                 name="Text1"
                 id="Text1"
                 value=""
                 maxlength="150"
                 class="margin"
                 placeholder="Ecrivez votre post !" />
                 <input type="submit" name="writeMsg" value="Poster !" class="postMsg" >
        </div><br/>

        <div class="article margin anim">
            <div class="img_article"></div>
            <a href="#" class="nomPersonne">
              <p>NOM DE LA PERSONNE</p>
            </a>
            <div class="date_article">24-08-1999</div>
            <div class="article-corps anim">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            <input type="submit" name="delMsg" value="Supprimer !" class="postMsg" >
            <input type="submit" name="commMsg" value="Commenter !" class="postMsg" onclick="comment();">
            <div class="texte-article" id="comm1">
              <input type="text"
              cols="40"
              rows="2"
              style="width:100%; height:50px;"
              name="Text1"
              id="Text1"
              value=""
              maxlength="150"
              class="margin comment"
              placeholder="Ecrivez votre post !" />
              <input type="submit" name="writeMsg" value="Poster !" class="postCmt" >
            </div>
          </div>
        </div>
        <br/>


      </div>
    </div>






    <!-- </div> -->







    <script type="text/javascript">
          window.sr = ScrollReveal();
          sr.reveal('.anim');
    </script>
    <script type="text/javascript">

    // Menu-toggle button

    $(document).ready(function() {
          $(".menu-icon").on("click", function() {
                $("nav ul").toggleClass("showing");
          });
    });

    // Scrolling Effect

    $(window).on("scroll", function() {
          if($(window).scrollTop()) {
                $('nav').addClass('black');
          }

          else {
                $('nav').removeClass('black');
          }
    })


    </script>
    <script type="text/javascript">
      $(window).scroll(function() {
        var wintop = $(window).scrollTop(), docheight =
        $(document).height(), winheight = $(window).height();
        var scrolled = (wintop/(docheight-winheight))*100;
        $('.scroll-line').css('width', (scrolled + '%'));
      });
    </script>


  </body>
</html>
