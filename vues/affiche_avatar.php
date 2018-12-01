<?php
$user = getUser($id);


echo "<a href='index.php?action=mur&id=" . $id . "' class='avatar'>";
echo "<img src='uploads/avatar".$user['avatar']."' alt='Photo de profil' >";
echo " <p>" . $user["login"] . "</p>";
echo "</a>";


?>