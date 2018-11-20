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
  </head>
  <body>



    <a href="#" class="avatar">
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
                  <li><a href="../index.php">Accueil</a></li>
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
        <div class="friend margin anim">
            <div class="img_article"></div>
            <a href="myProfile.php" class="nomPersonne">
              <p>NOM DE LA PERSONNE</p>
            </a>


            <input type="submit" name="delFriend" value="Refuser l'ami">
            <input type="submit" name="acceptFriend" value="Accepter l'ami">
        </div>

        <div class="friend margin anim">
            <div class="img_article"></div>
            <a href="myProfile.php" class="nomPersonne">
              <p>NOM DE LA PERSONNE</p>
            </a>

            <input type="submit" name="delFriend" value="Supprimer l'ami">

        </div>
        <div class="friend margin anim">
            <div class="img_article"></div>
            <a href="myProfile.php" class="nomPersonne">
              <p>NOM DE LA PERSONNE</p>
            </a>

            <input type="submit" name="delFriend" value="Supprimer l'ami">

        </div>
        <div class="friend margin anim">
            <div class="img_article"></div>
            <a href="myProfile.php" class="nomPersonne">
              <p>NOM DE LA PERSONNE</p>
            </a>

            <input type="submit" name="delFriend" value="Supprimer l'ami">

        </div>
        <div class="friend margin anim">
            <div class="img_article"></div>
            <a href="myProfile.php" class="nomPersonne">
              <p>NOM DE LA PERSONNE</p>
            </a>

            <input type="submit" name="delFriend" value="Supprimer l'ami">

        </div>


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
