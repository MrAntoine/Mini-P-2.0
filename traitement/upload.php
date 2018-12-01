<?php
/**
 * Created by PhpStorm.
 * User: Antoine
 * Date: 01/12/2018
 * Time: 10:57
 */


FakeConnexion();

if(!isset($_SESSION["id"])) {
    // On n est pas connecté, il faut retourner à la pgae de login
    header("Location:index.php?action=login");
}

if(isset($_POST['image_post']) AND !empty($_POST['image_post']['name'])){

    $tailleMax = 2097152;
    $extensionValides = array('jpg','jpeg','png','gif');

    if($_POST['image_post']['size'] <= $tailleMax){
        $extensionUpload = strtolower(substr(strrchr($_POST['image_post']['name'], '.'), 1));
        if(in_array($extensionUpload, $extensionValides)){
            $chemin = "/uploads/".$_SESSION['id'].".".$extensionUpload;
            $resultat = move_uploaded_file($_FILES['image_post']['tmp_name'], $chemin);
            if($resultat){

                $sql = "UPDATE user set avatar= :image WHERE id= :id";
                $query = $pdo->prepare($sql);
                $query->execute(array(
                    'image' => $_SESSION['id'].".".$extensionUpload,
                    'id' => $_SESSION['id']
                ));

            }else {
                $msg = "Une erreur est survenue lors de l'importation du fichier";
            }
        }else {
            $smg= "Votre image doit-être au format jpg, jpeg, png ou gif";
        }
    }else {
        $msg = "Votre image ne doit pas dépasser ".$tailleMax." octets";
    }

}

































/*
$target_dir = "../uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["submitupload"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif") {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file " . basename($_FILES["fileToUpload"]["name"]) . " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
*/

/*
  // Initialize message variable
  $msg = "";
  // If upload button is clicked ...
  if (isset($_POST['submitupload'])) {
      // Get image name
      $image = $_FILES['fileToUpload'];

      // image file directory
      $target = "../uploads/".basename($image);

      $sql = "INSERT INTO user (avatar) VALUES ('$image')";
      // execute query
      $sql->execute();

      if (move_uploaded_file($_FILES['fileToUpload'], $target)) {
          $msg = "Image uploaded successfully";
      }else{
          $msg = "Failed to upload image";
      }
  }
  //$result = mysqli_query($db, "SELECT * FROM images");
*/





?>