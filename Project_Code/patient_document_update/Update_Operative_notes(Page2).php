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
        
    $operative_findings = trim($_POST["operative_findings"]);
    $drain = $_POST["drain"];
    $sponge_count = $_POST["sponge_count"];
    $closure = $_POST["closure"];
    $intra_opr_events = trim($_POST["intra_opr_events"]);
    $imp_comp = $_POST["imp_comp"];
    $imp_type = $_POST["imp_type"];
    $blood_loss = $_POST["blood_loss"];
    $blood_products_given = $_POST["blood_products_given"];
    $nbm_till = $_POST["nbm_till"];
    $oxygen = $_POST["oxygen"];
    $tpr = $_POST["tpr"];
    $bp = $_POST["bp"];
    $rt_apsiration = $_POST["rt_apsiration"];
    $ag = $_POST["ag"];
    $patient_position = trim($_POST["patient_position"]);
    $iv_fluids = trim($_POST["iv_fluids"]);
    
    $opdnotes_pg2_add = "UPDATE treatment_surgery SET "
            . "Operative_findings = '$operative_findings' , "
            . "Drain = '$drain' , Sponge_Count = $sponge_count , Closure = '$closure' , "
            . "Intra_operative_events = '$intra_opr_events' , "
            . "Implants_company = '$imp_comp' , Implants_type = '$imp_type' , "
            . "Blood_loss = $blood_loss , Blood_products_given = $blood_products_given , "
            . "NBM_till = '$nbm_till' , TPR = $tpr , RT_Aspiration = $rt_apsiration , "
            . "Oxygen = $oxygen , BP = $bp , AG =$ag , "
            . "Patient_position = '$patient_position' , IV_fluids = '$iv_fluids' WHERE "
            . "Treatment_Surgery_id = $Treatment_Surgery_id";
    if(mysqli_query($connection, $opdnotes_pg2_add))
    {
        header("Location: ../Inpatient_Treatment.php?patient_id=$patient_id&admin_name=$login_name");
    }
    else
    {
        echo "<script>alert('Operative Notes details Not Updated');"
        . "window.location.href = '../Inpatient_Treatment.php?patient_id=$patient_id&admin_name=$login_name';</script>";        
    }
}

