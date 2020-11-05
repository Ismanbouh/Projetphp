<?php



function upload(){


include("connection.php");



if(isset($_GET['ajouter']) && !empty($_GET['idvehicule']) && !empty($_GET['nomvehicule']) && !empty($_GET['marquevehicule']) && !empty($_GET['couleurvehicule']) && !empty($_GET['imagevehicule'])){
echo "je suis connecte";
$ajouter = $pdo->prepare('INSERT INTO vehicule (id_vehicule, nom_vehicule ,marque_vehicule, couleur_vehicule, photo_vehicule) VALUES (:id_vehicule, :nom_vehicule ,:marque_vehicule, :couleur_vehicule, :photo_vehicule) ');


$ajouter->bindParam(':id_vehicule', $_GET['idvehicule'],
PDO::PARAM_STR);
$ajouter->bindParam(':nom_vehicule', $_GET['nomvehicule'],
PDO::PARAM_STR);
$ajouter->bindParam(':marque_vehicule', $_GET['marquevehicule'],
PDO::PARAM_STR);

$ajouter->bindParam(':couleur_vehicule', $_GET['couleurvehicule'],
PDO::PARAM_STR);

$ajouter->bindParam(':photo_Vehicule', $_GET['photovehicule'],
PDO::PARAM_STR);


$estceok = $ajouter->execute();




// Check if image file is a actual image or fake image
if(isset($_GET["action"])) {
$check = getimagesize($_FILES["photo_Vehicule"]["tmp_name"]);
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
if ($_FILES["photo_Vehicule"]["size"] > 500000) {
echo "Sorry, your file is too large.";
$uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
$uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
if (move_uploaded_file($_FILES["photo_Vehicule"]["tmp_name"], $target_file)) {
echo "The file ". htmlspecialchars( basename( $_FILES["photo_Vehiculed"]["name"])). " has been uploaded.";
} else {
echo "Sorry, there was an error uploading your file.";
}
}

}

}
?>