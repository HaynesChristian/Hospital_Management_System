<?php
$con_servername = "localhost";
$con_username = "root";
$con_password = "";
$database = "hospital_management_system";

$connection = mysqli_connect($con_servername, $con_username, $con_password, $database);

if($_POST)
{
    $login_name = $_POST["admin_name"];
    
    $patient_name = $_POST['patient_name'];
	$patient_srno = $_POST['patient_srno'];
    $patient_gender = $_POST['patient_gender'];
    $patient_contact = $_POST['patient_contact'];
    $patient_age = $_POST['patient_age'];
    $patient_adrs = trim($_POST['patient_adrs']);
	if($_POST['patient_height'] == "")
	{
		$patient_height = "0";
	}
	else
	{
		$patient_height = $_POST['patient_height'];
	}    
	if($_POST['patient_weight'] == "")
	{
		$patient_weight = "0";
	}
	else
	{
		$patient_weight = $_POST['patient_weight'];
	}
	if($_POST['patient_email'] == "")
	{
		$patient_email = "no email provided";
	}
	else
	{
		$patient_email = $_POST['patient_email'];
	}	
    $patient_type = $_POST['patient_type'];
    $patient_relative_name = $_POST['patient_relative_name'];
    $patient_relative_rel = $_POST['patient_relative_rel'];
    $patient_relative_no = $_POST["patient_relative_no"];
    
    $patient_exist = 0;
    $view_patient = "SELECT * FROM patient";
    $result_patient = mysqli_query($connection, $view_patient);
    if(mysqli_num_rows($result_patient) > 0)
    {
        while ($row_patient = mysqli_fetch_assoc($result_patient)) 
        {
            if($row_patient["Patient_Name"] == $patient_name && $row_patient["Patient_MobileNo"] == $patient_contact)
            {
                $patient_exist = 1;
            }
        }
    }
    
    if($patient_exist == 1)
    {
        echo "<script>alert('Patient already exist');"
        . "window.location.href='patient.php?admin_name=$login_name'</script>";        
    }
    else
    {
        $add_patient = "INSERT INTO patient "
                . "(Patient_SrNo,Patient_Name,Patient_Gender,Patient_Address,Patient_MobileNo,"
                . "Patient_Age,Patient_Height,Patient_Weight,Patient_Email_id,"
                . "Patient_Relative_name,Patient_Relative_Relation,Patient_Relative_Contact,Patient_Type)"
                . "VALUES ($patient_srno,'$patient_name','$patient_gender','$patient_adrs','$patient_contact',"
                . "$patient_age,$patient_height,$patient_weight,'$patient_email',"
                . "'$patient_relative_name','$patient_relative_rel','$patient_relative_no','$patient_type')";
        if(mysqli_query($connection, $add_patient))
        {
            /* Code starts for creating Treatment id */
            $view_patient = "SELECT Patient_id FROM patient WHERE Patient_MobileNo = $patient_contact";
            $result_patient = mysqli_query($connection, $view_patient);
            if(mysqli_num_rows($result_patient) > 0)
            {
                while ($row_patient = mysqli_fetch_assoc($result_patient))
                {
                    $patient_id = $row_patient["Patient_id"];        
                }
            }

            if(mysqli_query($connection, "INSERT INTO treatment (Patient_id) VALUES ($patient_id)"))
            {
                header("Location: patient.php?admin_name=$login_name");
            }
            else
            {
                echo "<script>alert('Treatment id not created');window.location.href = 'patient.php?admin_name=$login_name';</script>";
            }
            /* Code ends for creating Treatment id */

            if($patient_type == "inpatient")
            {
                $patient_treatment_id = "SELECT Treatment_id FROM treatment WHERE Patient_id = $patient_id";
                $result_patient = mysqli_query($connection, $patient_treatment_id);
                if(mysqli_num_rows($result_patient) > 0)
                {
                    while ($row_patient = mysqli_fetch_assoc($result_patient))
                    {
                        $treatment_id = $row_patient["Treatment_id"];        
                    }
                }

                /* Insert treatment id where it is used as foreign key - Code starts*/
                if(mysqli_query($connection, "INSERT INTO illness_complaint (Treatment_id) VALUES ($treatment_id)"))
                {
                    echo "Treatment_id inserted into illness_complaint";
                }
                else
                {
                    echo "<script>alert('Treatment_id not inserted into illness_complaint');</script>";
                }

                if(mysqli_query($connection, "INSERT INTO illness_suggestion (Treatment_id) VALUES ($treatment_id)"))
                {
                    echo "Treatment_id inserted into illness_suggestion";
                }
                else
                {
                    echo "<script>alert('Treatment_id not inserted into illness_suggestion');</script>";
                }

                if(mysqli_query($connection, "INSERT INTO patient_bill (Treatment_id) VALUES ($treatment_id)"))
                {
                    echo "Treatment_id inserted into illness_suggestion";
                }
                else
                {
                    echo "<script>alert('Treatment_id not inserted into patient_bill');</script>";
                }            
                /* Insert treatment id where it is used as foreign key - Code ends*/

                /* Insert patient id where it is used as foreign key - Code starts*/
                if(mysqli_query($connection, "INSERT INTO patient_pasthistory (Patient_id) VALUES ($patient_id)"))
                {
                    echo "Patient_id inserted into patient_pasthistory";
                }
                else
                {
                    echo "<script>alert('Patient_id inserted into patient_pasthistory');</script>";
                }            
                /* Insert patient id where it is used as foreign key - Code ends*/            

                header("Location: patient_document_format/General_Consent.php?patient_id=$patient_id&patient_name=$patient_name&patient_relative_name=$patient_relative_name&patient_relative_rel=$patient_relative_rel&treatment_id=$treatment_id&admin_name=$login_name");
            }
        }
        else
        {
            echo "<script>alert('Patient Details Not Inserted');window.location.href = 'patient.php'?admin_name=$login_name;</script>";
        }        
    }
}

