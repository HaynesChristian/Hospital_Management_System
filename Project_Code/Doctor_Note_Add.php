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
    $note_date =$_POST["note_date"];
    $note_time =$_POST["note_time"];
    $note_details =trim($_POST["note_details"]);
    
    $doctor_note_add = "INSERT INTO treatment_doctor_note "
            . "(Treatment_id , Doctor_Note_date , Doctor_Note_time , Doctor_Note_details) "
            . "VALUES ($treatment_id , '$note_date' , '$note_time' , '$note_details')";
    
    if(mysqli_query($connection, $doctor_note_add))
    {
        header("Location: Inpatient_Treatment.php?patient_id=$patient_id&admin_name=$login_name");
    }
    else
    {
        echo "<script>alert('Doctor's Note not added');"
        . "window.location.href = 'Inpatient_Treatment.php?patient_id=$patient_id&admin_name=$login_name';</script>";        
    }
}