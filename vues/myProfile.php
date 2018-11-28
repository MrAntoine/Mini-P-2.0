<div class="wrapper">
  <div class="FormCGTDATA form2">
    <h1>Changez vos TRUCS !</h1>
    <form method="post" action="">
        <label for="nom">Nom actuel : REQUETE POUR LE NOM</label>
        <input type="text" id="nom" required name="name" placeholder="Votre nouveau nom">
        <br>
        <label for="email">Email actuel : REQUETE POUR L'EMAIL</label>
        <input type="email" id="email" required name="mail-address" placeholder="Votre nouvelle adresse e-mail">
        <br>
        <label for="password">Nouveau mot de passe</label>
        <input type="password" id="password" required name="password">
        <br>

        <label for="passwordcf">Confirmez le nouveau mot de passe</label>
        <input type="password" required name="passwordcf">
        <input type="submit" name="send" value="Send it !">
    </form>


  </div>

  <div class="FormCGTDATA form2">
    <h1>Changez votre PDP!</h1>
    <form method="post" action="">
      <label for="actual__img">Photo de profil actuelle</label>
        <img src="img/fleurs-bleuesv2.jpg" alt="logo" class="myProfile__img" id="actual__img">
        <br>
        <br>
        <label for="fileToUpload">Changez de photo de profil</label>
        <input type="file" name="fileToUpload" id="fileToUpload">

        <br>
        <br>

        <input type="submit" name="send" value="Send it !">
    </form>


  </div>
</div>
</div>
