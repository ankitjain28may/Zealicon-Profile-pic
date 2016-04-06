<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Z'16 | Get Zeal</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="croppie.css" />
    <script type="text/javascript" src="js/script.js"></script>

</head>

<body <?php 
 if(!empty($_POST['bmw']))
 {
    echo 'onload="displayMessage();"'; } ?> >
    <div class="banner">
        <div class="navbar">
            <a href="http://zealicon.in/" class="header"><img src="assets/zeal_logo.png"></a>
            <a href="http://getzeal.esy.es/" class="link">Zeal<strong>Avatar</strong></a>
        </div>
    </div>
    <div class="content">
        <div class="col" id="text">
            <h1 id="greeting">Get The<br> Zeal</h1>
            <p id="supplement">Upload your profile pic to get your exclusive <strong> &nbsp;Zealfie .</strong><br>
            </p>
            <sub># Feel The Zeal</sub>
        </div>

        <?php

        if(!empty($_POST['bmw']))
        {


            @$data= $_POST['hidden1'];
            $data =substr($data, 22);
            $data = base64_decode($data);
            @$myimage = imagecreatefromstring($data);
            $path='uploads/abc.jpg';
            imagejpeg($myimage,$path);

            $myimage= imagecreatefromjpeg('uploads/abc.jpg');
            $myimagez= imagecreatefrompng('dall.png');
            $width1=imagesx($myimage);
            $height1=imagesy($myimage);
            $width2=imagesx($myimagez);
            $height2=imagesy($myimagez);


            $newwidth=200;
            $newheight=300;
            $tmp=imagecreatetruecolor($newwidth,$newheight);
            $image=imagecreatetruecolor($newwidth,$newheight);
            $transparency=imagecolortransparent($myimagez);

             imagealphablending($tmp, false);
            $color = imagecolorallocatealpha($tmp, 0, 0, 0, 127);
            imagefill($tmp, 0, 0, $color);
            imagesavealpha($tmp, true);


            imagecopyresampled($image,$myimage,0,0,0,0,$newwidth,$newheight,$width1,$height1);
            imagecopyresampled($tmp,$myimagez,0,0,0,0,$newwidth,$newheight,$width2,$height2);


            @imagecopy($image, $tmp, 0,0,0,0, $newwidth, $newheight);
            $filename = ".jpg";
            $path ='uploads/abc'.$filename;
            imagejpeg($image,$path);

            imagedestroy($tmp);
            imagedestroy($image);
            imagedestroy($myimagez);

        ?>

        <div class="col" id="io">
            <div id="image">
                <img src="uploads/abc.jpg">
            </div>
            <div class="buttons">
                <a href="index.php" id="apply" class="btn upload-result upload">Choose Another File
                <a class="btn" href="uploads/abc.jpg" id="download" download="uploads/abc.jpg">Download</a>
            </div>
        </div>

        <?php
        }
        else
        {
    ?>

        <div class="col" id="io">
            <div id="upload-demo">
                
            </div>
            <div class="buttons">
                <input type="file" id="upload" value="Choose a file" accept="image/*" />
                <button id="apply-btn" class="btn upload-result">Apply</button>
            </div>
            <div class="crop">
                
            </div>
        </div>
        <?php
    }
    ?>
    <form name="myform" action="" method="POST">
        <input type="hidden" name="hidden1" id="hidden1"/>
        <input type="submit" style="display:none;" name="bmw" id="bmw">
</form>

    </div>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="bower_components/jquery/dist/jquery.min.js"><\/script>')</script>
<script src="https://code.jquery.com/jquery-2.1.4.js"></script>

        <script src="croppie.js"></script>
            <script src="fun.js"></script>
       
       <script>
            Demo.init();
</script>

</body>
</html>




<!-- <div class="col" id="text">
    <h1></h1>
    <p></p>
    <br>
        <sub># Feel The Zeal</sub>
    
</div> -->