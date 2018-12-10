<?php
echo '<div class="wrapper">
  <div class="FormCGTDATA form2" id="cgt__DATA">
    <h1>Changez vos informations !</h1>
    <form method="post" action="">

        <input type="text" id="nom" required name="name" value="'.$_SESSION['login'] .'">
        <br>
        <input type="email" id="email" required name="mail-address" value="'.$_SESSION['email'].'">
        <br>
        <label for="password">Votre nouveau mot de passe</label>
        <input type="password" id="password" required name="password">
        <br>

        <label for="passwordcf">Confirmez votre nouveau mot de passe</label>
        <input type="password" required name="passwordcf">
        <input type="submit" name="send" value="Confirmer">
    </form>



  </div>

    <div class=\'FormCGTDATA form2\' id=\'cgt__PDP\'>
    <h1>Changez votre PDP!</h1>
    <form method=\'post\' action=\'index.php?action=upload\' enctype=\'multipart/form-data\'>
    <label for=\'actual__img\'>Photo de profil actuelle</label>
          <img src=\'uploads/" . $line[\'avatar\'] . "\' alt=\'Photo de profil\' class=\'myProfile__img\' id=\'actual__img\'>
        <br><br>
        <label for=\'fileToUpload\'>Changez de photo de profil</label>
        <input type=\'file\' name=\'fileToUpload\'>

        <br><br>

          <input type=\'submit\' name=\'submit_avatar\'></form>
  </div>
</div>
</div>';

?>
