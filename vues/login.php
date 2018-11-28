<!DOCTYPE html>
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
        <form method="post" action="/traitement/connexion.php">
            <input type="email" required name="mail-address" placeholder="Entrez votre adresse mail">
            <input type="password" required name="password" placeholder="Enter your password">

            <input type="submit" name="send" value="Send it !">
        </form>
    </div>
    <br><p style="color:#fff">OU</p>




    <div class="Form form2">
        <h1>Créez votre compte !</h1>
        <form method="post" action="/traitement/register.php">
            <input type="text" required name="login" placeholder="Entrez votre nom">
            <input type="email" required name="mail-address" placeholder="Entrez votre adresse e-mail">
            <input type="password" required name="password" placeholder="Entrez votre mot de passe">
            <input type="password" required name="passwordcf" placeholder="Vérifiez votre mot de passe">
            <input type="submit" name="send" value="Send it !">
        </form>
    </div>
</div>


</body>
</html>
