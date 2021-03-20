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
    
    $staff_member = $_POST["staff_member"];
    $patient_relative_name = $_POST["patient_relative_name"];
    $patient_relative_rel = $_POST["patient_relative_rel"];
    
    $update_gc1 = "UPDATE patient_admission SET Assigned_Staff_memberName = '$staff_member' "
            . "WHERE Treatment_id = $treatment_id";
    $update_gc2 = "UPDATE patient SET Patient_Relative_name = '$patient_relative_name' , "
            . "Patient_Relative_Relation = '$patient_relative_rel'"
            . "WHERE Patient_id = $patient_id";    
    if(mysqli_query($connection, $update_gc1) && mysqli_query($connection, $update_gc2))
    {
        header("Location: ../Inpatient_Treatment.php?patient_id=$patient_id&admin_name=$login_name");
    }
    else
    {
        echo "<script>alert('General Consent Not Updated');"
        . "window.location.href = '../Inpatient_Treatment.php?patient_id=$patient_id&admin_name=$login_name';</script>";
    }
}
