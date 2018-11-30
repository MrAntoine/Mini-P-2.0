<?php
/**
 * Created by PhpStorm.
 * User: Antoine
 * Date: 29/11/2018
 * Time: 23:52
 */


$_SESSION["id"] = 1;
$_SESSION["login"] = "gilles";

if(!isset($_SESSION["id"])) {
    // On n est pas connecté, il faut retourner à la pgae de login
    header("Location:exempleMur.html?action=login");
}



?>
