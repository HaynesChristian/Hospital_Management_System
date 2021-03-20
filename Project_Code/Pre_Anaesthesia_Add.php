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
        
    $pre_opr_diag = trim($_POST["pre_opr_diag"]);
    $proc_plan = trim($_POST["proc_plan"]);
    $Physical_status = $_POST["Physical_status"];
    $inv_ecg = $_POST["inv_ecg"];
    $inv_echo = $_POST["inv_echo"];
    $inv_cxr = $_POST["inv_cxr"];
    $inv_lft = $_POST["inv_lft"];
    $inv_biohz = $_POST["inv_biohz"];
    $inv_urea = $_POST["inv_urea"];
    $inv_creatinine = $_POST["inv_creatinine"];
    $inv_electro = $_POST["inv_electro"];
    $inv_plasma = $_POST["inv_plasma"];
    $inv_radiology = $_POST["inv_radiology"];
    $inv_hb = $_POST["inv_hb"];
    $inv_pt = $_POST["inv_pt"];
    $inv_ptt = $_POST["inv_ptt"];
    $inv_bg = $_POST["inv_bg"];
    $inv_others = $_POST["inv_others"];
    
    $cardio = $_POST["cardio_history"];
    $cardio_history = "";
    foreach ($cardio as $value) 
    {
        $cardio_history = $cardio_history.",".$value;
    }    
    $resp = $_POST["resp_history"];
    $resp_history = "";
    foreach ($resp as $value) 
    {
        $resp_history = $resp_history.",".$value;
    }    
    $gi = $_POST["gi_history"];
    $gi_history = "";
    foreach ($gi as $value) 
    {
        $gi_history = $gi_history.",".$value;
    }    
    $renal = $_POST["renal_history"];
    $renal_history = "";
    foreach ($renal as $value) 
    {
        $renal_history = $renal_history.",".$value;
    }    
    $neuro = $_POST["neuro_history"];
    $neuro_history = "";
    foreach ($neuro as $value) 
    {
        $neuro_history = $neuro_history.",".$value;
    }    
    $other = $_POST["other_history"];
    $other_history = "";
    foreach ($other as $value) 
    {
        $other_history = $other_history.",".$value;
    }    
    $airway = $_POST["airway_history"];
    $airway_history = "";
    foreach ($airway as $value) 
    {
        $airway_history = $airway_history.",".$value;
    }    
    
    $cardio_comments = trim($_POST["cardio_comments"]);
    
	if($_POST["ce_pulse"] == "")
	{
		$ce_pulse = 0;
	}
	else
	{
		$ce_pulse = $_POST["ce_pulse"];
	}
    
	$ce_bp = $_POST["ce_bp"];	
    
	if($_POST["ce_heart"] == "")
	{
		$ce_heart = 0;
	}
	else
	{
		$ce_heart = $_POST["ce_heart"];
	}	
    
	if($_POST["ce_periph"] == "")
	{
		$ce_periph = 0;
	}
	else
	{
		$ce_periph = $_POST["ce_periph"];
	}	
    
    $resp_comments = trim($_POST["resp_comments"]);
    $ce_nose = $_POST["ce_nose"];
    $ce_chest = $_POST["ce_chest"];
    
    $gi_comments = trim($_POST["gi_comments"]);
    $ce_iceterus = $_POST["ce_iceterus"];
    $ce_liver = $_POST["ce_liver"];
    $ce_spleen = $_POST["ce_spleen"];
    $ce_ascites = $_POST["ce_ascites"];
    $ce_nutrition = $_POST["ce_nutrition"];
    
    $renal_comments = trim($_POST["renal_comments"]);
    $ce_shunts = $_POST["ce_shunts"];
    
    $neuro_comments = trim($_POST["neuro_comments"]);
    $ce_gc = $_POST["ce_gc"];
    $ce_sensorimotor = $_POST["ce_sensorimotor"];
    $ce_deficits = $_POST["ce_deficits"];
    $ce_lspine = $_POST["ce_lspine"];
    
    $other_comments = trim($_POST["other_comments"]);
    $ce_pallor = $_POST["ce_pallor"];
    $ce_cyamposis = $_POST["ce_cyamposis"];
    $ce_lmp = $_POST["ce_lmp"];
    $ce_prematurity = $_POST["ce_prematurity"];
    
    $airway_comments = trim($_POST["airway_comments"]);
    $ce_demotaton = $_POST["ce_demotaton"];
    $ce_mclass = $_POST["ce_mclass"];
    $ce_jawmovts = $_POST["ce_jawmovts"];
    $ce_cspine = $_POST["ce_cspine"];
    
    $medications = trim($_POST["medications"]);
    $pre_anes_instr = trim($_POST["pre_anes_instr"]);
    $risks_explained = $_POST["risks_explained"];
    $consultant_obt = $_POST["consultant_obt"];
    $anes_remarks = trim($_POST["anes_remarks"]);
	
	$bedno = $_POST["bedno"];
	$add_bedno = "UPDATE patient_admission SET Bed_no = $bedno WHERE Treatment_id = $treatment_id";
    
    $pre_anae_add = "UPDATE treatment_surgery SET "
            . "Pre_operative_diagnosis = '$pre_opr_diag' , "
            . "Procedure_planned = '$proc_plan' , "
            . "Pre_Anae_Physical_status =  '$Physical_status', "
            . "Cardiovasculary_history = '$cardio_history' , Respiratory_history = '$resp_history' , "
            . "GI_history = '$gi_history' , Renal_Endocrine_history = '$renal_history' , "
            . "Neuro_history = '$neuro_history' , Other_history = '$other_history' , Airway_history = '$airway_history' , "
            . "Cardiovasculary_comments = '$cardio_comments' , Respiratory_comments = '$resp_comments' , "
            . "GI_comments = '$gi_comments' , Renal_Endocrine_comments = '$renal_comments' , "
            . "Neuro_comments = '$renal_comments' , Other_comments = '$other_comments' , Airway_comments = '$airway_comments' , "
            . "CE_Pulse = $ce_pulse , CE_BP = '$ce_bp' , CE_Heart = $ce_heart , CE_Periph = $ce_periph , "
            . "CE_Nose = '$ce_nose' , CE_Chest = '$ce_chest' , CE_Iceterus = '$ce_iceterus' , "
            . "CE_Liver = '$ce_liver' , CE_Spleen = '$ce_spleen' , CE_Ascites = '$ce_ascites' , "
            . "CE_Nutrition = '$ce_nutrition' , CE_Shunts = '$ce_shunts' , CE_GC = '$ce_gc' , "
            . "CE_Sensorimotor = '$ce_sensorimotor' , CE_Deficits = '$ce_deficits' , CE_LSpine = '$ce_lspine' , "
            . "CE_Pallor = '$ce_pallor' , CE_Cyamopsis = '$ce_cyamposis' , CE_LMP = '$ce_lmp' , "
            . "CE_Prematurity = '$ce_prematurity' , CE_Demotaton = '$ce_demotaton' , "
            . "CE_Mclass = '$ce_mclass' , CE_Jawmovts = '$ce_jawmovts' , CE_CSpine = '$ce_cspine' ,"
            . "Medications = '$medications' , Pre_Anes_instructions = '$pre_anes_instr' , "
            . "Anesthesia_Remarks = '$anes_remarks' , Risks_explained = '$risks_explained' , Consultant_obtained = '$consultant_obt' , "
            . "Inv_ECG = '$inv_ecg' , Inv_Echo = '$inv_echo' , Inv_CXR = '$inv_cxr' , Inv_LFT = '$inv_lft' , "
            . "Inv_Biohazards = '$inv_biohz' , Inv_Urea = '$inv_urea' , Inv_Creatinine = '$inv_creatinine' , "
            . "Inv_Electrolytes = '$inv_electro' , Inv_Plasma = '$inv_plasma' , Inv_Radiology = '$inv_radiology' , "
            . "Inv_Hb = '$inv_hb' , Inv_PT = '$inv_pt' , Inv_PTT = '$inv_ptt' , "
            . "Inv_Bloodgroup = '$inv_bg' , Inv_Others = '$inv_others' "
            . "WHERE Treatment_Surgery_id = $Treatment_Surgery_id";
						
    
    if(mysqli_query($connection, $pre_anae_add) && mysqli_query($connection, $add_bedno))
    {
        header("Location: Inpatient_Treatment.php?patient_id=$patient_id&admin_name=$login_name");
    }
    else
    {
        echo "<script>alert('Pre Anaesthesia details Not Inserted');"
        . "window.location.href = 'Inpatient_Treatment.php?patient_id=$patient_id&admin_name=$login_name';</script>";        
    }
}

