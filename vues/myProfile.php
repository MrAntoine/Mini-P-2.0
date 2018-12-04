<?php
  $sql = "SELECT email FROM user WHERE id=".$_SESSION['id'];
  $query = $pdo->prepare($sql);
  $query->execute();

  $line = $query->fetch();
?>



<div class="wrapper">
  <div class="FormCGTDATA form2" id="cgt__DATA">
    <h1>Changez vos informations !</h1>
    <form method="post" action="">
        <!-- <label for="nom">Nom actuel :
          <?php echo $_SESSION['login'];?>
        </label> -->
        <input type="text" id="nom" required name="name" value="<?php echo $_SESSION['login'];?>">
 <!-- placeholder="Votre nouveau nom"  -->
        <br>
        <!-- <label for="email">Email actuel :
          <?php echo $line['email'] ?>
        </label> -->
        <input type="email" id="email" required name="mail-address" value="<?php echo $line['email'];?>">
        <br>
        <label for="password">Votre nouveau mot de passe</label>
        <input type="password" id="password" required name="password">
        <br>

        <label for="passwordcf">Confirmez votre nouveau mot de passe</label>
        <input type="password" required name="passwordcf">
        <input type="submit" name="send" value="Confirmer">
    </form>



  </div>

  <div class="FormCGTDATA form2" id="cgt__PDP">
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

        <input type="submit" name="send" value="Confirmer">
    </form>


  </div>
</div>
</div>
