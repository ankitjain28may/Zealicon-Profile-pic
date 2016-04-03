<html>
<head>
    <title>Zealicon | Get Your Zeal Image</title>

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
 $height1=imagesy($myimage);
 $width2=imagesx($myimagez);
 $height2=imagesy($myimagez);


$newwidth=206;
$newheight=272;
$tmp=imagecreatetruecolor($newwidth,$newheight);



imagecopyresampled($tmp,$myimage,0,0,0,0,$newwidth,$newheight,
 $width1,$height1);


//$filename = "uploads/". $_FILES['fileToUpload']['name'];
//$filename1 = "uploads/small". $_FILES['fileToUpload']['name'];

//imagejpeg($tmp,$filename,100);
//imagejpeg($tmp1,$filename1,100);

//imagedestroy($myimage);
//imagedestroy($tmp);
//imagedestroy($tmp1);



$x=$width1-$width2;

@imagecopy($tmp, $myimagez, 0,0,0,0, $width1, $height1);
$filename = ".jpeg";
$path ='uploads/'.basename( $_FILES["fileToUpload"]["name"]);
imagejpeg($tmp,$path);
?>
<img src="<?php echo $path;?>">
<?php
}
else
{
?>


<h1>Upload Your Profile Image to get your Zeal Image</h1>
<form action="index.php" method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload"><br>
    <input type="submit" value="Upload Image" name="submit"><br>
</form>
<?php
}
?>




</body>


</html>