<?php
/**
 * Created by PhpStorm.
 * User: Antoine
 * Date: 27/11/2018
 * Time: 14:53
 */

FakeConnexion();

if(!isset($_SESSION["id"])) {
    // On n est pas connecté, il faut retourner à la pgae de login
    header("Location:index.php?action=login");
}

//var_dump($_FILES);
$imageUpload = false;
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUploadPost"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["writeMsgSubmit"])) {
    $check = getimagesize($_FILES["fileToUploadPost"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUploadPost"]["size"] > 50000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUploadPost"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUploadPost"]["name"]). " has been uploaded.";

        $imageUpload = true;


    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}


if ($imageUpload == true) {

    $image = $_FILES["fileToUploadPost"]["name"];

} else {
    $image = "";
}



    $date = date('Y-m-d H:i:s', time());

/*
CheckString ($_POST['Text1']);
CheckString ($_POST['titrepost']);
*/

if(isset($_POST['Text1'],$_POST['titrepost'],$_POST['writeMsgSubmit'])) {

    $sql2 = "INSERT INTO ecrit VALUES(NULL,?,?,?,?,?,?)";

    $query2 = $pdo->prepare($sql2);
    $query2->execute(array($_POST['titrepost'], $_POST['Text1'], $date, $image, $_SESSION['id'], $_POST['idAmi']));

    header("location:index.php?action=mur&id=" . $_POST['idAmi']);
}
?>