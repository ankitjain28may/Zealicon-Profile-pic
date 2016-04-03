<html>
<head>
	<title>Image Edit</title>

</head>
<body>

<?php
if(isset($_POST["submit"])) {
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image

    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }

// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" ) {
    echo "Sorry, only JPG, JPEG, PNG files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
$picname='uploads/'.basename( $_FILES["fileToUpload"]["name"]);
if($imageFileType=="jpg" || $imageFileType=="jpeg")
{
$myimage= imagecreatefromjpeg($picname);
}
elseif ($imageFileType == "png") 
{
$myimage= imagecreatefrompng($picname);
}
$myimagez= imagecreatefrompng('dal.png');
echo $width1=imagesx($myimage);
echo $height1=imagesy($myimage);
echo $width2=imagesx($myimagez).'<br>';
echo $height2=imagesy($myimagez);
$x=$width1-$width2;

@imagecopy($myimage, $myimagez, $x, 0,0,0, $width2, $height1);
$filename = ".jpeg";
$path ='uploads/'.basename( $_FILES["fileToUpload"]["name"]);
imagejpeg($myimage,$path);
?>
<img src="<?php echo $path;?>">
<?php
}
else
{
?>



<form action="index.php" method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload Image" name="submit">
</form>
<?php
}
?>




</body>


</html>