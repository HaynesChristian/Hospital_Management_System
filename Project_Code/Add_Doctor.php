<?php
$con_servername = "localhost";
$con_username = "root";
$con_password = "";
$database = "hospital_management_system";

$connection = mysqli_connect($con_servername, $con_username, $con_password, $database);
if($_POST)
{
    $login_name = $_POST["admin_name"];
    
    $doctor_name = $_POST['doctor_name'];
    $doctor_contact = $_POST['doctor_contact'];
    $doctor_address = trim($_POST['doctor_address']);
    $doctor_email = $_POST['doctor_email'];
    $doctor_speciality = $_POST['doctor_speciality'];
    $doctor_PanNo = $_POST['doctor_PanNo'];
    $doctor_qualification = $_POST['doctor_qualification'];
    $doctor_type = $_POST['doctor_type'];
    $doctor_photo = basename($_FILES["doctor_photo"]["name"]);

    
    $check_doc = 0;
    $view_doctor = "SELECT * FROM doctor";
    $result_doctor = mysqli_query($connection, $view_doctor);
    if(mysqli_num_rows($result_doctor) > 0)
    {
        while ($row_doctor = mysqli_fetch_assoc($result_doctor)) 
        {
            if($row_doctor["Doctor_Name"] == $doctor_name && $row_doctor["Doctor_ContactNo"] == $doctor_contact)
            {
                $check_doc = 1;
                break;
            }
        }
    }    
    
    if($check_doc == 1)
    {
        echo "<script>alert('Doctor already exist'); "
        . "window.location.href='doctor.php?admin_name=$login_name';</script>";        
    }
    else
    {
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

        $add_doctor = "INSERT INTO doctor"
                . "(Doctor_Name, Doctor_ContactNo, Doctor_Address, Doctor_Pan_no, "
                . "Doctor_Email_id, Doctor_Qualification, Doctor_Speciality, Doctor_Type, Doctor_Photo)"
                . " VALUES ('$doctor_name','$doctor_contact','$doctor_address','$doctor_PanNo','$doctor_email',"
                . "'$doctor_qualification','$doctor_speciality','$doctor_type', '$target_file')";
        $queryfired = 0;
        if(mysqli_query($connection, $add_doctor))
        {
            $queryfired = 0;
            echo "$queryfired<br>";
        }
        else
        {
            $queryfired = 1;
            echo "$queryfired<br>";
        }

        $docidqry = "SELECT Doctor_id FROM doctor where Doctor_Email_id = '$doctor_email'";
        $result_doctorlist = mysqli_query($connection, $docidqry);
        if(mysqli_num_rows($result_doctorlist) > 0)
        {
            while($dr_row= mysqli_fetch_assoc($result_doctorlist))
            {
                $Doctor_id = $dr_row["Doctor_id"];
            }        
        }

        //Doctor Type
        if($doctor_type == 'Outdoor')
        {
            $Doctor_visitCharge = $_POST['Doctor_visitCharge'];
            $doctor_outdoor = "INSERT INTO Doctor_Outdoor (Doctor_id,Doctor_Visit_Charge) "
                    . "VALUES ($Doctor_id,$Doctor_visitCharge)";
            if(mysqli_query($connection, $doctor_outdoor))
            {
                $queryfired = 0;
                echo "$queryfired<br>";
            }
            else
            {
                $queryfired = 1;
                echo "$queryfired<br>";
            }
        }
        else
        {
            $Doctor_designation = $_POST['Doctor_designation'];
            $Doctor_salary = $_POST['Doctor_salary'];
            $doctor_indoor = "INSERT INTO Doctor_Indoor "
                    . "(Doctor_id,Doctor_designation,Doctor_Salary)"
                    . "VALUES ($Doctor_id,'$Doctor_designation',$Doctor_salary)";
            if(mysqli_query($connection, $doctor_indoor))
            {
                $queryfired = 0;
                echo "$queryfired<br>";
            }
            else
            {
                $queryfired = 1;
                echo "$queryfired<br>";
            }        
        }

        // check if query is fired
        if($queryfired == 0)
        {
            header("Location: doctor.php?admin_name=$login_name");
        }
        else
        {
            echo "<script>alert('Doctor Details Not Inserted');window.location.href = 'doctor.php?admin_name=$login_name';</script>";
        }        
    }
}
