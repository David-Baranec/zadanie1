<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Uploaded</title>
  <link rel="stylesheet" href="style.css">
  <link rel="icon" href="favicon.png">
</head>
<body>
<?php
$target_dir = "/home/xbaranecd/files/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
$timeStamp = gmdate("d.m.Y H:i:s ");
$newname = $target_dir . basename($_POST['outputfile']). "." . basename($_POST['extension']);
if($target_file!=$newname){
  $target_file=$newname;
}
// Check if file already exists
if (file_exists($target_file)) {
  //echo "Sorry, file already exists.";
  $target_file = $target_dir . $timeStamp . basename($_FILES["fileToUpload"]["name"]);
  //$uploadOk = 1;
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 2000000) {
  echo "Sorry, your file is too large.";
  $uploadOk = 0;
}
/*
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
}*/

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    echo "The file ". htmlspecialchars( basename($_POST['outputfile']). "." . basename($_POST['extension'])). " has been uploaded.";
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}
//echo ' <a href="index.php">Home Page</a>';
?>
<p><a href="index.php">Home Page</a></p>
</body>
</html>

