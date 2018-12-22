
<!--<a href="#" class="avatar">
  <img src="img/fleurs-bleuesv2.jpg" alt="logo" >
</a>-->
  <div class="white-4-respNav"></div>
  <a href="index.php?action=actus" title="fil d'actualité" class="logoNav"><img src="img/logoSite.png" class="lol"></a>

  <div class="header-toogle">
    <a href="#nav" class="header-toogle-open" id="menu-open" onclick="openNav(); changeButton(this.id);"><img src="img/menu.png" width="30" alt="Ouvrir Menu"></a>
    <a href="#" class="header-toogle-close" id="menu-close" onclick="closeNav(); changeButton(this.id);"><img src="img/menu-close.png" width="30" alt="Fermer Menu"></a>
  </div>
  <nav id="nav">
        <div class="menu-icon">
              <i class="fa fa-bars fa-2x"></i>
        </div>

        <div class="menu" id="menu">
              <ul>
                  <li class="searchbox">
                      <form method="POST" action="index.php?action=searchProfile">
                          <input type="text" name="search_profile" placeholder="Rechercher">
                          <input type="submit" name="" value="GO !" id="searchGo">
                      </form>
                  </li>
                <li><a href="index.php?action=myProfile">Mon Profil</a></li>
                <li><a href="index.php?action=mur">Mon Mur</a></li>
                <li><a href="index.php?action=friends">Mes Amis</a></li>
                  <?php
                  if (isset($_SESSION['id'])) {
                      echo "<li><a href='index.php?action=deconnexion'>Deconnexion</a></li>";
                  }else{
                      echo "<li><a href='index.php?action=login'>Connexion</a></li>";
                  }
                  ?>
              </ul>
        </div>
        <div class="scroll-line"></div>
  </nav>
