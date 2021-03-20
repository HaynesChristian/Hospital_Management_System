<?php
$con_servername = "localhost";
$con_username = "root";
$con_password = "";
$database = "hospital_management_system";

$connection = mysqli_connect($con_servername, $con_username, $con_password, $database);

//Checking Connection
if(!$connection)
{
    die("Connection Failed");
}
else
{
   echo "Connection Successfull";
}

if($_POST)
{
    $Doctor_id = $_POST['Doctor_id'];
    $doctor_photo = basename($_FILES["doctor_photo"]["name"]);

    
    //Code for Uploading doctor photo starts
    $target_dir = "images_persons/";
    $target_file = $target_dir.basename($_FILES["doctor_photo"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    
    //Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["doctor_photo"]["tmp_name"]);
    if($check != false)
    {
        echo "File is an image - ".$check["mime"].".<br>";
        $uploadOk = 1;
    }
    else
    {
        echo "File is not an image.<br>";
        $uploadOk = 0;
    }
    
    //Check if file already exists
    if(file_exists($target_file))
    {
        echo "Sorry, file already exists.<br>";
        $uploadOk = 0;
    }
    
    //Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg")
    {
        echo "Sorry, only JPG, JPEG & PNG files are allowed.<br>";
        $uploadOk = 0;
    }
    
    //Check if $uploadOk is set to 0 by an error
    if($uploadOk == 0)
    {
        echo "Sorry, your file was not uploaded. <br>";
        //if everything is ok, try to upload file
    }
    else
    {
        if(move_uploaded_file($_FILES["doctor_photo"]["tmp_name"],$target_file))
        {
            echo "The File ".basename($_FILES["doctor_photo"]["name"])."has been uploaded<br>";
        }
        else
        {
            echo "Sorry, there was an error uploading your file. #".$_FILES["doctor_photo"]["error"]."<br>";
        }
    }
    //Code for Uploading doctor photo ends
    
    $update_doctorpic = "UPDATE doctor SET Doctor_Photo = '$target_file' WHERE Doctor_id = $Doctor_id";   
    
    
    if(mysqli_query($connection, $update_doctorpic))
    {
        header("Location: doctor.php");
    }
    else
    {
        echo "<script>alert('Doctor photo Not updated');window.location.href = 'doctor.php';</script>";
    }            
}
