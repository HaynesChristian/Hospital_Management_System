<?php
$con_servername = "localhost";
$con_username = "root";
$con_password = "";
$database = "hospital_management_system";

$connection = mysqli_connect($con_servername, $con_username, $con_password, $database);

if($_POST)
{
    $login_name = $_POST["admin_name"];
    
    $patient_id = $_POST["patient_id"];
    $patient_name = $_POST["patient_name"];
    $treatment_date = $_POST["treatment_date"];
    $treatment_time = $_POST["treatment_time"];
    $treatment_details = $_POST["treatment_details"];
    $treatment_next_date = $_POST["treatment_next_date"];
    $treatment_next_time = $_POST["treatment_next_time"];
    
    echo $patient_id;
    $view_patient = "SELECT Treatment_id FROM treatment WHERE Patient_id = $patient_id";
    $result_patient = mysqli_query($connection, $view_patient);
    if(mysqli_num_rows($result_patient) > 0)
    {
        while ($row_patient = mysqli_fetch_assoc($result_patient))
        {
            $treatment_id = $row_patient["Treatment_id"];
        }
    }
    
    $add_treatment = "INSERT INTO treatment_outpatient "
            . "(Treatment_id,Treatment_Date,Treatment_Time,Treatment_Remarks,Next_time,Next_date) "
            . "VALUES ($treatment_id, '$treatment_date', '$treatment_time', '$treatment_details', "
            . "'$treatment_next_time', '$treatment_next_date')";
    if(mysqli_query($connection, $add_treatment))
    {
        header("Location: Outpatient_Treatment.php?patient_id=$patient_id&admin_name=$login_name");
    }
    else
    {
       echo "<script>alert('Patient Treatment Details Not Updated');"
        . "window.location.href = 'Outpatient_Treatment.php?patient_id=$patient_id&admin_name=$login_name';</script>";
    }
}

