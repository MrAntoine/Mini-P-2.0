<?php
/**
 * Created by PhpStorm.
 * User: Antoine
 * Date: 20/11/2018
 * Time: 21:52
 */
FakeConnexion();

if(isset($_SESSION["id"])) {
    // On n est pas connecté, il faut retourner à la pgae de login
    header("Location:index.php?action=login");


    $date = date('Y-m-d h:i:s', time());

    $sql = "INSERT INTO ecrit VALUES(NULL,NULL,?,?,?,?,?)";
    $query = $pdo->prepare($sql);
    $query2->execute(array($_POST['commentMSG'], $date, "", $_SESSION['id'], $_POST['idAmi']));

    header("location:index.php?action=mur&id=" . $_POST['idAmi']);

}
?>






