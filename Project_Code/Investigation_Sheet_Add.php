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

    $ivs_date = $_POST["ivs_date"];
    $ivs_time = $_POST["ivs_time"];
    
	if($_POST["ivs_hb"] == "")
	{
		$ivs_hb = 0;
	}
	else
	{
		$ivs_hb = $_POST["ivs_hb"]; 
	}	
    
	if($_POST["ivs_pcv"] == "")
	{
		$ivs_pcv = 0;
	}
	else
	{
		$ivs_pcv = $_POST["ivs_pcv"]; 
	}	
    
	if($_POST["ivs_tc"] == "")
	{
		$ivs_tc = 0;
	}
	else
	{
		$ivs_tc = $_POST["ivs_tc"]; 
	}	
    
	if($_POST["ivs_dc"] == "")
	{
		$ivs_dc = 0;
	}
	else
	{
		$ivs_dc = $_POST["ivs_dc"]; 
	}	
    
	if($_POST["ivs_esr"] == "")
	{
		$ivs_esr = 0;
	}
	else
	{
		$ivs_esr = $_POST["ivs_esr"]; 
	}	
    
	if($_POST["ivs_mp"] == "")
	{
		$ivs_mp = 0;
	}
	else
	{
		$ivs_mp = $_POST["ivs_mp"]; 
	}	
    
	if($_POST["ivs_platelets"] == "")
	{
		$ivs_platelets = 0;
	}
	else
	{
		$ivs_platelets = $_POST["ivs_platelets"]; 
	}	
    
	if($_POST["ivs_ptt"] == "")
	{
		$ivs_ptt = 0;
	}
	else
	{
		$ivs_ptt = $_POST["ivs_ptt"]; 
	}
	
    $ivs_aib = $_POST["ivs_aib"];
    $ivs_sug = $_POST["ivs_sug"];
    $ivs_micro = $_POST["ivs_micro"];
    $ivs_rbs = $_POST["ivs_rbs"];
    
	if($_POST["ivs_inr"] == "")
	{
		$ivs_inr  = 0;
	}
	else
	{
		$ivs_inr = $_POST["ivs_inr"]; 
	}	
    
	if($_POST["ivs_na"] == "")
	{
		$ivs_na  = 0;
	}
	else
	{
		$ivs_na = $_POST["ivs_na"]; 
	}	
    
	if($_POST["ivs_k"] == "")
	{
		$ivs_k = 0;
	}
	else
	{
		$ivs_k = $_POST["ivs_k"]; 
	}	
    
	if($_POST["ivs_cl"] == "")
	{
		$ivs_cl = 0;
	}
	else
	{
		$ivs_cl = $_POST["ivs_cl"]; 
	}	
    
	if($_POST["ivs_hco"] == "")
	{
		$ivs_hco = 0;
	}
	else
	{
		$ivs_hco = $_POST["ivs_hco"]; 
	}	
    
	if($_POST["ivs_urea"] == "")
	{
		$ivs_urea = 0;
	}
	else
	{
		$ivs_urea = $_POST["ivs_urea"]; 
	}	
    
	if($_POST["ivs_creatinine"] == "")
	{
		$ivs_creatinine = 0;
	}
	else
	{
		$ivs_creatinine = $_POST["ivs_creatinine"]; 
	}	
    
	if($_POST["ivs_osmolality"] == "")
	{
		$ivs_osmolality = 0;
	}
	else
	{
		$ivs_osmolality = $_POST["ivs_osmolality"]; 
	}	
    
	if($_POST["ivs_proteins"] == "")
	{
		$ivs_proteins = 0;
	}
	else
	{
		$ivs_proteins = $_POST["ivs_proteins"]; 
	}	
    
	if($_POST["ivs_albumin"] == "")
	{
		$ivs_albumin = 0;
	}
	else
	{
		$ivs_albumin = $_POST["ivs_albumin"]; 
	}	
    
	if($_POST["ivs_globulin"] == "")
	{
		$ivs_globulin = 0;
	}
	else
	{
		$ivs_globulin = $_POST["ivs_globulin"]; 
	}	
    
	if($_POST["ivs_total"] == "")
	{
		$ivs_total = 0;
	}
	else
	{
		$ivs_total = $_POST["ivs_total"]; 
	}	
    
	if($_POST["ivs_bilirubin"] == "")
	{
		$ivs_bilirubin = 0;
	}
	else
	{
		$ivs_bilirubin = $_POST["ivs_bilirubin"]; 
	}	
    
	if($_POST["ivs_sgpt"] == "")
	{
		$ivs_sgpt = 0;
	}
	else
	{
		$ivs_sgpt = $_POST["ivs_sgpt"]; 
	}	
    
	if($_POST["ivs_amylase"] == "")
	{
		$ivs_amylase = 0;
	}
	else
	{
		$ivs_amylase = $_POST["ivs_amylase"]; 
	}	
    
	if($_POST["ivs_lipase"] == "")
	{
		$ivs_lipase = 0;
	}
	else
	{
		$ivs_lipase = $_POST["ivs_lipase"]; 
	}	
    
	if($_POST["ivs_cpk"] == "")
	{
		$ivs_cpk  = 0;
	}
	else
	{
		$ivs_cpk = $_POST["ivs_cpk"];
	}	
    
	if($_POST["ivs_troponin"] == "")
	{
		$ivs_troponin = 0;
	}
	else
	{
		$ivs_troponin = $_POST["ivs_troponin"]; 
	}	
    $ivs_hiv = $_POST["ivs_hiv"];
    $ivs_hbsag = $_POST["ivs_hbsag"];
    $ivs_hcv = $_POST["ivs_hcv"];
    $ivs_bloodgroup = $_POST["ivs_bloodgroup"];
    
    $insert_inv_sheet = "INSERT INTO treatment_investigation_sheet "
            . "(Treatment_id,Investigation_Sheet_date,Investigation_Sheet_time,"
            . "Investigation_Sheet_HB,Investigation_Sheet_PCV,Investigation_Sheet_TC,"
            . "Investigation_Sheet_DC,Investigation_Sheet_ESR,Investigation_Sheet_MP,"
            . "Investigation_Sheet_Platelets,Investigation_Sheet_PTT,Investigation_Sheet_Aib,"
            . "Investigation_Sheet_Sug,Investigation_Sheet_Micro,Investigation_Sheet_RBS,"
            . "Investigation_Sheet_INR,Investigation_Sheet_NA,Investigation_Sheet_K,"
            . "Investigation_Sheet_CL,Investigation_Sheet_HCO,Investigation_Sheet_Urea,"
            . "Investigation_Sheet_Creatinine,Investigation_Sheet_Osmolality,"
            . "Investigation_Sheet_Proteins,Investigation_Sheet_Albumin,Investigation_Sheet_Globulin,"
            . "Investigation_Sheet_Total,Investigation_Sheet_Bilirubin,Investigation_Sheet_SGPT,"
            . "Investigation_Sheet_Amylase,Investigation_Sheet_Lipase,Investigation_Sheet_CPK,"
            . "Investigation_Sheet_Troponin,Investigation_Sheet_HIV,Investigation_Sheet_HbsAg,"
            . "Investigation_Sheet_HCV,Investigation_Sheet_Bloodgroup) VALUES "
            . "($treatment_id,'$ivs_date','$ivs_time',$ivs_hb,$ivs_pcv,$ivs_tc,$ivs_dc,$ivs_esr,$ivs_mp,"
            . "$ivs_platelets,$ivs_ptt,'$ivs_aib','$ivs_sug','$ivs_micro','$ivs_rbs',$ivs_inr,$ivs_na,$ivs_k,"
            . "$ivs_cl,$ivs_hco,$ivs_urea,$ivs_creatinine,$ivs_osmolality,$ivs_proteins,$ivs_albumin,"
            . "$ivs_globulin,$ivs_total,$ivs_bilirubin,$ivs_sgpt,$ivs_amylase,$ivs_lipase,$ivs_cpk,"
            . "$ivs_troponin,'$ivs_hiv','$ivs_hbsag','$ivs_hcv','$ivs_bloodgroup')";
    if(mysqli_query($connection, $insert_inv_sheet))
    {
        header("Location: Inpatient_Treatment.php?patient_id=$patient_id&admin_name=$login_name");
    }
    else
    {
        echo "<script>alert('Investigation Sheet Details not added');"
        . "window.location.href = 'Inpatient_Treatment.php?patient_id=$patient_id&admin_name=$login_name';</script>";
    }    
    
    
    
}
