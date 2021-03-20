<?php
$con_servername = "localhost";
$con_username = "root";
$con_password = "";
$database = "hospital_management_system";

$connection = mysqli_connect($con_servername, $con_username, $con_password, $database);

if($_POST)
{
    $login_name = $_POST["admin_name"];
    $treatment_id = $_POST["treatment_id"];
    $patient_id = $_POST["patient_id"];
	$surgery_date = $_POST["surgery_date"];
    $Treatment_Surgery_id = $_POST["Treatment_Surgery_id"];
        
    $asst_surgeon = $_POST["asst_surgeon"];
    $scrub_nurse = $_POST["scrub_nurse"];
    $incision = trim($_POST["incision"]);
    $imp_opd_steps = trim($_POST["imp_opd_steps"]);
    
    $opdnotes_pg1_add = "UPDATE treatment_surgery SET "
            . "Asst_Surgeon_Name = '$asst_surgeon' , "
            . "Scrub_Nurse_Name = '$scrub_nurse' , Surgery_date = '$surgery_date' , "
            . "Incision = '$incision' , "
            . "Important_opd_steps = '$imp_opd_steps' WHERE "
            . "Treatment_Surgery_id = $Treatment_Surgery_id";
    if(mysqli_query($connection, $opdnotes_pg1_add))
    {
        header("Location: patient_document_format/Operative_notes(Page2).php?patient_id=$patient_id&treatment_id=$treatment_id&Treatment_Surgery_id=$Treatment_Surgery_id&admin_name=$login_name");
    }
    else
    {
        echo "<script>alert('Operative Notes details Not Inserted');"
        . "window.location.href = 'patient.php'?admin_name=$login_name;</script>";        
    }
}

