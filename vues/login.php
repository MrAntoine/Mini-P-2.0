<!--<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>Login de notre FB !</title>
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
<div class="wrapper">

<div class="Form form1">
        <img src="img/logoSite.png" class="logo-form">
        <h1>Identifiez-vous !</h1>
        <form method="post" action="index.php?action=connexion">
            <input type="email" required name="mail-address" placeholder="Entrez votre adresse mail">
            <input type="password" required name="password" placeholder="Enter your password">

            <input type="submit" name="send" value="Entrez sur FoxBook !">
        </form>
    </div>
    <br>-->

<div class="wrapper">

  <div class="Formlogin">
    <img src="img/logoSite.png" class="logo-formlogin">
    <h1>Identifiez-vous !</h1>
    <form action="index.php?action=connexion" method="POST">
      <input type="text" placeholder="Login" name="login" required>
      <input type="password" placeholder="Password" name="mdp" required>
      <input type="submit" value="Se connecter">
    </form>

  </div>

<br/>
  <div class="Formlogin">
    <h1>Créez votre compte !</h1>
    <form method="post" action="index.php?action=register" name="creation">
      <input type="text" required name="login" placeholder="Entrez votre nom">
      <input type="email" required name="email" placeholder="Entrez votre adresse e-mail">
      <input type="password" required name="mdp" placeholder="Entrez votre mot de passe">
      <input type="submit" name="send" value="Entrez sur FoxBook !">
    </form>
  </div>

</div>
<!--
    <div class="Form form2">
        <h1>Créez votre compte !</h1>
        <form method="post" action="/traitement/register.php">
            <input type="text" required name="login" placeholder="Entrez votre nom">
            <input type="email" required name="mail-address" placeholder="Entrez votre adresse e-mail">
            <input type="password" required name="password" placeholder="Entrez votre mot de passe">
            <input type="password" required name="passwordcf" placeholder="Vérifiez votre mot de passe">
            <input type="submit" name="send" value="Entrez sur FoxBook !">
        </form>
    </div>
</div>

</body>
</html>-->

<!--  <?php
echo "<br><br><br><br><br><br>";
echo "<form action=\"index.php?action=connexion\" method=\"POST\">
<input type=\"text\" placeholder=\"Login\" name=\"login\" required>
<input type=\"password\" placeholder=\"Password\" name=\"mdp\" required>

<input type=\"submit\" value=\"Se connecter\">
</form>";

echo "<br><br><br><br><br><br>";

?>-->
