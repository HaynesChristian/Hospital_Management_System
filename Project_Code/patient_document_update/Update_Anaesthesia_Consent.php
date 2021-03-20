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
    $Treatment_Surgery_id = $_POST["Treatment_Surgery_id"];
        
    $anaesthesia = $_POST["anaesthesia_type"];
    $anaesthesia_type="";
    foreach ($anaesthesia as $value) 
    {
        $anaesthesia_type = $anaesthesia_type.",".$value;
    }
    $anaesthetist_name = $_POST["anaesthetist_name"];
    
    $anaesthesia_consent_add = "UPDATE treatment_surgery SET "
            . "Anaesthetist_Name = '$anaesthetist_name' , "
            . "Anaesthesia_Type = '$anaesthesia_type' WHERE "
            . "Treatment_Surgery_id = $Treatment_Surgery_id";
    if(mysqli_query($connection, $anaesthesia_consent_add))
    {
        header("Location: ../Inpatient_Treatment.php?patient_id=$patient_id&admin_name=$login_name");
    }
    else
    {
        echo "<script>alert('Anaesthesia Consent details Not Updated');"
        . "window.location.href = '../Inpatient_Treatment.php?patient_id=$patient_id&admin_name=$login_name';</script>";        
    }
}

