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
    $treatment_surgery_id = $_POST["Treatment_Surgery_id"];
    
    $surgery_name = $_POST["surgery_name"];
    $doctor_name = $_POST["doctor_name"];
    $surgery_risks = $_POST["surgery_risks"];
    $surgery_benefit = $_POST["surgery_benefit"];
    $surgery_alt = $_POST["surgery_alt"];
    $surgeon_name = $_POST["surgeon_name"];
    
    $add_surgery_consent = "UPDATE treatment_surgery SET "
            . "Treatment_id = $treatment_id , Doctor_name = '$doctor_name' , Surgery_name = '$surgery_name' , "
            . "Surgeon_name = '$surgeon_name' , Surgery_Risks = '$surgery_risks' , "
            . "Surgery_Benefits = '$surgery_benefit' , Surgery_Alternatives = '$surgery_alt' "
            . "WHERE Treatment_Surgery_id = $treatment_surgery_id";
    
    if(mysqli_query($connection, $add_surgery_consent))
    {
        header("Location: ../Inpatient_Treatment.php?patient_id=$patient_id&admin_name=$login_name");
    }
    else
    {
        echo "<script>alert('Surgery Consent details Not Updated');"
        . "window.location.href = '../Inpatient_Treatment.php?patient_id=$patient_id&admin_name=$login_name';</script>";
    }
}