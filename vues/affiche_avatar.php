<?php

echo "<a href='index.php?action=mur&id=" . $id . "' class='avatar'>";
echo "<img src='img/fleurs-bleuesv2.jpg' alt='logo' >";

$user = getUser($id);

echo " <p>" . $user["login"] . "</p>";
echo "</a>";


?>