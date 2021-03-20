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
    
    $surgery_name = $_POST["surgery_name"];
    $doctor_name = $_POST["doctor_name"];
    $surgery_risks = $_POST["surgery_risks"];
    $surgery_benefit = $_POST["surgery_benefit"];
    $surgery_alt = $_POST["surgery_alt"];
    $surgeon_name = $_POST["surgeon_name"];
    
    $add_surgery_consent = "INSERT INTO treatment_surgery "
            . "(Treatment_id , Doctor_name , Surgery_name , Surgeon_name , "
            . "Surgery_Risks , Surgery_Benefits , Surgery_Alternatives) VALUES "
            . "($treatment_id , '$doctor_name' , '$surgery_name' , '$surgeon_name' , "
            . "'$surgery_risks' , '$surgery_benefit' , '$surgery_alt')";
    
    if(mysqli_query($connection, $add_surgery_consent))
    {
        header("Location: Inpatient_Treatment.php?patient_id=$patient_id&admin_name=$login_name");
    }
    else
    {
        echo "<script>alert('Surgery Consent details Not Inserted');"
        . "window.location.href = 'Inpatient_Treatment.php?patient_id=$patient_id&admin_name=$login_name';</script>";
    }
}

