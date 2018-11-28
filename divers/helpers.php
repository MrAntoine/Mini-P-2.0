<?php
/**
 * Created by PhpStorm.
 * User: Antoine
 * Date: 28/11/2018
 * Time: 10:28
 */


function getUser($id) {
    global $pdo;
    $sql = "select * from user where id=?";
    $query = $pdo->prepare($sql);
    $query->execute(array($id));
    $user = $query->fetch();

    return $user;
}