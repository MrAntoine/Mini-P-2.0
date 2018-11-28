<<<<<<< HEAD
<?php
if (isset($_SESSION['id'])) {
  echo '<div><a href="#" class="avatar">
        <img src="img/fleurs-bleuesv2.jpg" alt="logo" >
        <p>Bonjour ' .
        $_SESSION['login']
        .'!</p><br/><a href=\'index.php?action=deconnexion\'>Deconnexion</a></div>';
  }
  else {
      echo "<a href='index.php?action=login'>Login</a>";
  }
?>
=======
<!--<a href="#" class="avatar">
  <img src="img/fleurs-bleuesv2.jpg" alt="logo" >
</a>-->
>>>>>>> 349b77df388d92d3b8e4f2939b9b127a26b32887
  <a href="#" class="logoNav"><img src="img/logoSite.png" class="lol"></a>
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
              <a href="#nav" class="header-toogle-open"><img src="img/menu.png" width="30" alt="Ouvrir Menu"></a>
              <a href="#" class="header-toogle-close"><img src="img/menu-close.png" width="30" alt="Fermer Menu"></a>
        </div>

        <div class="menu">
              <ul>
                <li><a href="vues/myProfile.php">Mon Profil</a></li>
                <li><a href="index.php?action=mur">Mon Mur</a></li>
                <li><a href="index.php?action=friends">Mes Amis</a></li>
              </ul>
        </div>
        <div class="scroll-line"></div>
  </nav>
