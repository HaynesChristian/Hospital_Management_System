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

    $Temp = $_POST["Temp"];
    $Pulse = $_POST["Pulse"];
    $BP = $_POST["BP"];
    $painscore = $_POST["painscore"];
    $RR = $_POST["RR"];
    
    $gen_exam = $_POST["gen_exam"];
    $ge="";
    foreach ($gen_exam as $value) 
    {
        $ge = $ge." ,".$value;
    }
    echo $ge;
    $physical_gen_exam = trim($_POST["physical_gen_exam"]);
    $SE_Respiratory = trim($_POST["SE_Respiratory"]);
    $SE_Cardiovascular = trim($_POST["SE_Cardiovascular"]);
    $SE_Neuromuscular = trim($_POST["SE_Neuromuscular"]);
    $SE_Abdomen_Alimentry = trim($_POST["SE_Abdomen_Alimentry"]);
    $SE_Spine = trim($_POST["SE_Spine"]);
    $SE_Local = trim($_POST["SE_Local"]);
    
    $insert_pe_se = "UPDATE illness_complaint SET "
            . "Illness_body_temperature = $Temp , Illness_pulserate = $Pulse , "
            . "Illness_BP = '$BP' , Illness_PainScore = $painscore , "
            . "Illness_RR = $RR , Gen_examination = '$ge' , "
            . "Physical_Gen_examination = '$physical_gen_exam' , "
            . "SE_Respiratory = '$SE_Respiratory' , "
            . "SE_Cardiovascular = '$SE_Cardiovascular' , "
            . "SE_Neuromuscular = '$SE_Neuromuscular' , "
            . "SE_Abdomen_Alimentary = '$SE_Abdomen_Alimentry' , "
            . "SE_Spine = '$SE_Spine' , "
            . "SE_Local = '$SE_Local' WHERE Treatment_id = $treatment_id";
    if(mysqli_query($connection, $insert_pe_se))
    {
        header("Location: ../Inpatient_Treatment.php?patient_id=$patient_id&admin_name=$login_name");
    }
    else
    {
        echo "<script>alert('physical examination details Not Inserted');"
        . "window.location.href = '../Inpatient_Treatment.php?patient_id=$patient_id&admin_name=$login_name';</script>";
    }
}

