<?php
$con_servername = "localhost";
$con_username = "root";
$con_password = "";
$database = "hospital_management_system";

$connection = mysqli_connect($con_servername, $con_username, $con_password, $database);

if($_POST)
{
    $login_name = $_POST["admin_name"];
    
    $treatment_outpatient_id = $_POST["treatment_outpatient_id"];
    $patient_id = $_POST["patient_id"];
    $patient_name = $_POST["patient_name"];
    $treatment_date = $_POST["treatment_date"];
    $treatment_time = $_POST["treatment_time"];
    $treatment_details = trim($_POST["treatment_details"]);
    $treatment_next_date = $_POST["treatment_next_date"];
    $treatment_next_time = $_POST["treatment_next_time"];
    
    
    $add_treatment = "UPDATE treatment_outpatient SET "
            . "Treatment_Date = '$treatment_date' , Treatment_Time = '$treatment_time' , "
            . "Treatment_Remarks = '$treatment_details' , "
            . "Next_time = '$treatment_next_time' , Next_date = '$treatment_next_date' "
            . "WHERE Treatment_Outpatient_id = $treatment_outpatient_id";
    if(mysqli_query($connection, $add_treatment))
    {
        header("Location: Outpatient_Treatment.php?patient_id=$patient_id&patient_name=$patient_name&admin_name=$login_name");
    }
    else
    {
       echo "<script>alert('Patient Treatment Details Not Updated');"
        . "window.location.href = 'Outpatient_Treatment.php?patient_id=$patient_id&patient_name=$patient_name&admin_name=$login_name';</script>";
    }
}

