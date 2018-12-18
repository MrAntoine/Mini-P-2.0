<?php
$sql = "SELECT * FROM user WHERE id=?";
$query = $pdo->prepare($sql);
$query->execute(array(($_SESSION['id'])));

$line = $query->fetch();


// Afficher le pseudo + avatar
$id =$_SESSION['id'];
include('vues/affiche_avatar.php');

?>


<div class="wrapper">
  <div class="FormCGTDATA form2" id="cgt__DATA">
    <h1>Changez vos informations !</h1>
    <form method="post" action="index.php?action=changeinfos">
        <label for="email">Pseudo actuel :</label>
        <input type="text" id="nom" name="pseudo" value="<?php echo $line['login'];?>">
        <br>
        <label for="email">Email actuel :</label>
        <input type="email" id="email"  name="mail-address" value="<?php echo $line['email'];?>">
        <br>
        <label for="password">Votre nouveau mot de passe</label>
        <input type="password" id="password" name="password">
        <br>

        <label for="passwordcf">Confirmez votre nouveau mot de passe</label>
        <input type="password" name="passwordcf">
        <input type="submit" name="send" value="Confirmer">
    </form>



  </div>

    <?php

    echo " <div class='FormCGTDATA form2' id='cgt__PDP'>";
    echo "<h1>Changez votre PDP!</h1>";
      echo "<form method='post' action='index.php?action=upload' enctype='multipart/form-data'> ";
      echo " <label for='actual__img'>Photo de profil actuelle</label>";
          echo "<img src='uploads/" . $line['avatar'] . "' alt='Photo de profil' class='myProfile__img' id='actual__img'>";
        echo "<br><br>";
        echo "<label for='fileToUpload''>Changez de photo de profil</label>";
          echo "<input type='file' name='fileToUpload'>";

        echo "<br><br>";

          echo "<input type='submit' name='submit_avatar'></form>";


  echo "</div>";

    ?>
</div>
</div>
