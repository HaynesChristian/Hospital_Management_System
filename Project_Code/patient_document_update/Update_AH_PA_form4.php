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
    
    $Provision_Diagnosis = trim($_POST["Provision_Diagnosis"]);
    $Suggested_Investigation = trim($_POST["Suggested_Investigation"]);
    $CarePlan = trim($_POST["CarePlan"]);
    $Preventive_Diet = trim($_POST["Preventive_Diet"]);
    $Preventive_Drugs = trim($_POST["Preventive_Drugs"]);
    $RMO_Name = $_POST["RMO_Name"];
    $RMO_date = $_POST["RMO_date"];
    $RMO_time = $_POST["RMO_time"];
    $Consultant_Name = $_POST["Consultant_Name"];
    $Consultant_date = $_POST["Consultant_date"];
    $Consultant_time = $_POST["Consultant_time"];
    
    $insert_suggestion = "UPDATE illness_suggestion SET "
            . "Provisional_Diagnosis = '$Provision_Diagnosis' , "
            . "Suggested_Investigation = '$Suggested_Investigation' , "
            . "Plan_of_Care = '$CarePlan' , Preventive_Diet = '$Preventive_Diet' , "
            . "Preventive_Drugs = '$Preventive_Drugs' , "
            . "RMO_Name = '$RMO_Name' , RMO_Date = '$RMO_date' , RMO_Time = '$RMO_time' , "
            . "Consultant_Name = '$Consultant_Name' , Consultant_Date = '$Consultant_date' , "
            . "Consultant_Time = '$Consultant_time' WHERE Treatment_id = $treatment_id";
    
    if(mysqli_query($connection, $insert_suggestion))
    {
        header("Location: ../Inpatient_Treatment.php?patient_id=$patient_id&admin_name=$login_name");
    }
    else
    {
        echo "<script>alert('Illness Suggestion details Not Inserted');"
        . "window.location.href = '../Inpatient_Treatment.php?patient_id=$patient_id&admin_name=$login_name';</script>";
    }
    
}

