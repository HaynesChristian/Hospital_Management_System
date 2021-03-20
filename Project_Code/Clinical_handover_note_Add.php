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
    $handover_date = $_POST["handover_date"];
    $verbal_order = trim($_POST["verbal_order"]);
    
    $qry_st = 0;
    
    $clinical_treatment = "INSERT INTO treatment_clinical_handover "
            . "(Treatment_id , Handover_date , Verbal_order) "
            . "VALUES ($treatment_id , '$handover_date' , '$verbal_order')";

    mysqli_query($connection, $clinical_treatment);
    
    if($_POST["handover_night"])
    {
        $ill_desc_night = $_POST["ill_desc_night"];
        $action_night = $_POST["action_night"];
        $situation_night = $_POST["situation_night"];
        $awareness_night = $_POST["awareness_night"];
        $contingency_night = $_POST["contingency_night"];
        $planning_night = $_POST["planning_night"];
        $handover_night = $_POST["handover_night"];
        $overtaken_night = $_POST["overtaken_night"];
    
        $clinical_night = "UPDATE treatment_clinical_handover SET "
                . "Night_Illness_description = '$ill_desc_night' , Night_Action_list = '$action_night' , "
                . "Night_Situation = '$situation_night' , Night_Awareness = '$awareness_night' , "
                . "Night_Contingency = '$contingency_night' , Night_Planning = '$planning_night' , "
                . "Night_Handling_Overby = '$handover_night', Night_Handling_Takenby = '$overtaken_night'"
                . " WHERE Treatment_id = $treatment_id AND Handover_date = '$handover_date'";
        
        if(mysqli_query($connection, $clinical_night))
        {
            $qry_st = 0;
        }
        else
        {
            $qry_st = 1;
        }
    }
    
    if($_POST["handover_morning"])
    {
        $ill_desc_morning = $_POST["ill_desc_morning"];
        $action_morning = $_POST["action_morning"];
        $situation_morning = $_POST["situation_morning"];
        $awareness_morning = $_POST["awareness_morning"];
        $contingency_morning = $_POST["contingency_morning"];
        $planning_morning = $_POST["planning_morning"];
        $handover_morning = $_POST["handover_morning"];
        $overtaken_morning = $_POST["overtaken_morning"];
        
        $clinical_morning = "UPDATE treatment_clinical_handover SET "
                . "Morning_Illness_description = '$ill_desc_morning' , Morning_Action_list = '$action_morning' , "
                . "Morning_Situation = '$situation_morning', "
                . "Morning_Awareness = '$awareness_morning', Morning_Contingency = '$contingency_morning' , "
                . "Morning_Planning = '$planning_morning' , "
                . "Morning_Handling_Overby = '$handover_morning' , Morning_Handling_Takenby = '$overtaken_morning'"
                . " WHERE Treatment_id = $treatment_id AND Handover_date = '$handover_date'";
        if(mysqli_query($connection, $clinical_morning))
        {
            $qry_st = 0;
            echo $qry_st;
        }
        else
        {
            $qry_st = 1;
            echo $qry_st;
        }        
    }
    
    if($_POST["handover_eve"])
    {
        $ill_desc_eve = $_POST["ill_desc_eve"];
        $action_eve = $_POST["action_eve"];
        $situation_eve = $_POST["situation_eve"];
        $awareness_eve = $_POST["awareness_eve"];
        $contingency_eve = $_POST["contingency_eve"];
        $planning_eve = $_POST["planning_eve"];
        $handover_eve = $_POST["handover_eve"];
        $overtaken_eve = $_POST["overtaken_eve"]; 
        
        $clinical_eve = "UPDATE treatment_clinical_handover SET "
                . "Evening_Illness_description = '$ill_desc_eve' , Evening_Action_list  = '$action_eve' , "
                . "Evening_Situation = '$situation_eve' , "
                . "Evening_Awareness = '$awareness_eve' , Evening_Contingency = '$contingency_eve' , "
                . "Evening_Planning = '$planning_eve' , "
                . "Evening_Handling_Overby = '$handover_eve' , Evening_Handling_Takenby =  '$overtaken_eve' "
                . "WHERE Treatment_id = $treatment_id AND Handover_date = '$handover_date'";
        if(mysqli_query($connection, $clinical_eve))
        {
            $qry_st = 0;
        }
        else
        {
            $qry_st = 1;
        }        
    }
    
    $asmt_date = $_POST["asmt_date"];
    $asmt_time = $_POST["asmt_time"];
    $asmt_pulse = $_POST["asmt_pulse"];
    $asmt_spo = $_POST["asmt_spo"];
    $asmt_bd = $_POST["asmt_bp"];
    $asmt_temp = $_POST["asmt_temp"];
    $asmt_ivf = $_POST["asmt_ivf"];
    $asmt_urine = $_POST["asmt_urine"];
    $asmt_stool = $_POST["asmt_stool"];
    
    foreach ($asmt_date as $key => $val) 
    {
        $asmt_add = "INSERT INTO treatment_patient_assessment "
                . "(Treatment_id , Patient_Assessment_date , Patient_Assessment_time , "
                . "Patient_Assessment_pulse , Patient_Assessment_SPO , Patient_Assessment_BP , "
                . "Patient_Assessment_temp , Patient_Assessment_IVfluid , "
                . "Patient_Assessment_UrineOutput , Patient_Assessment_Stool) "
                . "VALUES ($treatment_id , '$val' , '$asmt_time[$key]' , $asmt_pulse[$key] , "
                . "$asmt_spo[$key] , $asmt_bd[$key] , $asmt_temp[$key] , "
                . "'$asmt_ivf[$key]' , $asmt_urine[$key] , '$asmt_stool[$key]')";
        if(mysqli_query($connection, $asmt_add))
        {
            continue;
        }
        else
        {
            break;
        }
        
    }
    
    if($qry_st == 0)
    {
        header("Location: Inpatient_Treatment.php?patient_id=$patient_id&admin_name=$login_name");
    }
    else
    {
        echo "<script>alert('Clinical Handover Details not added');"
        . "window.location.href=': Inpatient_Treatment.php?patient_id=$patient_id&admin_name=$login_name'</script>";        
    }    
    
    
    
}