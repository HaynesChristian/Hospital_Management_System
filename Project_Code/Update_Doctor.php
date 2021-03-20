<?php
$con_servername = "localhost";
$con_username = "root";
$con_password = "";
$database = "hospital_management_system";

$connection = mysqli_connect($con_servername, $con_username, $con_password, $database);

if($_POST)
{
    $login_name = $_POST["admin_name"];
    
    $Doctor_id = $_POST['Doctor_id'];
    $doctor_name = $_POST['doctor_name'];
    $doctor_contact = $_POST['doctor_contact'];
    $doctor_address = trim($_POST['doctor_address']);
    $doctor_email = $_POST['doctor_email'];
    $doctor_speciality = $_POST['doctor_speciality'];
    $doctor_PanNo = $_POST['doctor_PanNo'];    
    $doctor_qualification = $_POST['doctor_qualification'];
    $doctor_type = $_POST['doctor_type'];
    $default_photo = $_POST['default_doctor_photo'];
    $doctor_photo = basename($_FILES["doctor_photo"]["name"]);
    
    if($doctor_photo != "")
    {
        /*echo $_POST["doctor_photo_update"]."<br/>";
        echo $_FILES["doctor_photo_update"]["name"]."<br/>";*/
        echo "doctor_photo not blank";
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
    }
    else
    {
        $target_file = $default_photo;
    }
    
    /*echo "UPDATE doctor SET "
            . "Doctor_Name = '$doctor_name', "
            . "Doctor_ContactNo = '$doctor_contact', "
            . "Doctor_Address = '$doctor_address', "
            . "Doctor_Email_id = '$doctor_email', "
            . "Doctor_Qualification = '$doctor_qualification', "
            . "Doctor_Speciality = '$doctor_speciality' , "
            . "Doctor_Photo = '$target_file' "
            . "WHERE Doctor_id = $Doctor_id";*/
    
    $update_doctor = "UPDATE doctor SET "
            . "Doctor_Name = '$doctor_name', "
            . "Doctor_ContactNo = '$doctor_contact', "
            . "Doctor_Address = '$doctor_address', "
            . "Doctor_Email_id = '$doctor_email', "
            . "Doctor_Qualification = '$doctor_qualification', "
            . "Doctor_Speciality = '$doctor_speciality' , "
            . "Doctor_Pan_no = '$doctor_PanNo' , "
            . "Doctor_Photo = '$target_file' "
            . "WHERE Doctor_id = $Doctor_id";
    
    $qry_status = 0 ;
    if($doctor_type == 'Outdoor')
    {
        $Doctor_visitCharge = $_POST['Doctor_visitCharge'];
        $doctor_outdoor = "UPDATE Doctor_Outdoor SET Doctor_Visit_Charge = $Doctor_visitCharge "
                . "WHERE Doctor_id = $Doctor_id";
        if(mysqli_query($connection, $doctor_outdoor))
        {
            $qry_status = 0;
        }
        else
        {
            $qry_status = 1;
        }
        echo $qry_status." outdoor";
    }
    else
    {
        $Doctor_designation = $_POST['Doctor_designation'];
        $Doctor_salary = $_POST['Doctor_salary'];
        $doctor_indoor = "UPDATE Doctor_Indoor SET "
                . "Doctor_designation = '$Doctor_designation' , "
                . "Doctor_Salary = '$Doctor_salary' "
                . "WHERE Doctor_id = $Doctor_id";
        if(mysqli_query($connection, $doctor_indoor))
        {
            $qry_status = 0;
        }
        else
        {
            $qry_status = 1;
        }
        
        echo "<br/>query status - $qry_status$<br/>";
    }
    
    if(mysqli_query($connection, $update_doctor) && $qry_status == 0)
    {
        header("Location: doctor.php?admin_name=$login_name");
    }
    else
    {
        echo "<script>alert('Doctor Details Not Updated');window.location.href = 'doctor.php?admin_name=$login_name';</script>";
    }
}
