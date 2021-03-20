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
    $Treatment_Investigation_Sheet_id = $_POST["Treatment_Investigation_Sheet_id"];

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
    
    $insert_inv_sheet = "UPDATE treatment_investigation_sheet SET "
            . "Treatment_id = $treatment_id , Investigation_Sheet_date = '$ivs_date' , "
            . "Investigation_Sheet_time = '$ivs_time' , Investigation_Sheet_HB = $ivs_hb , "
            . "Investigation_Sheet_PCV = $ivs_pcv , Investigation_Sheet_TC = $ivs_tc , "
            . "Investigation_Sheet_DC = $ivs_dc , Investigation_Sheet_ESR = $ivs_esr , Investigation_Sheet_MP = $ivs_mp , "
            . "Investigation_Sheet_Platelets = $ivs_platelets , Investigation_Sheet_PTT = $ivs_ptt , "
            . "Investigation_Sheet_Aib = '$ivs_aib' , Investigation_Sheet_Sug = '$ivs_sug' , "
            . "Investigation_Sheet_Micro = '$ivs_micro' , Investigation_Sheet_RBS = '$ivs_rbs' , "
            . "Investigation_Sheet_INR = $ivs_inr , Investigation_Sheet_NA = $ivs_na , Investigation_Sheet_K = $ivs_k , "
            . "Investigation_Sheet_CL = $ivs_cl , Investigation_Sheet_HCO = $ivs_hco , Investigation_Sheet_Urea = $ivs_urea , "
            . "Investigation_Sheet_Creatinine = $ivs_creatinine , Investigation_Sheet_Osmolality = $ivs_osmolality , "
            . "Investigation_Sheet_Proteins = $ivs_proteins , Investigation_Sheet_Albumin = $ivs_albumin , "
            . "Investigation_Sheet_Globulin = $ivs_globulin , Investigation_Sheet_Total = $ivs_total , "
            . "Investigation_Sheet_Bilirubin = $ivs_bilirubin , Investigation_Sheet_SGPT = $ivs_sgpt , "
            . "Investigation_Sheet_Amylase = $ivs_amylase , Investigation_Sheet_Lipase = $ivs_lipase , "
            . "Investigation_Sheet_CPK = $ivs_cpk , Investigation_Sheet_Troponin = $ivs_troponin , "
            . "Investigation_Sheet_HIV = '$ivs_hiv' , Investigation_Sheet_HbsAg = '$ivs_hbsag' , "
            . "Investigation_Sheet_HCV = '$ivs_hcv' , Investigation_Sheet_Bloodgroup = '$ivs_bloodgroup' "
            . "WHERE Treatment_Investigation_Sheet_id = $Treatment_Investigation_Sheet_id";
    if(mysqli_query($connection, $insert_inv_sheet))
    {
        header("Location: ../Inpatient_Treatment.php?patient_id=$patient_id&admin_name=$login_name");
    }
    else
    {
        echo "<script>alert('Investigation Sheet Details Not Updated');"
        . "window.location.href = '../Inpatient_Treatment.php?patient_id=$patient_id&admin_name=$login_name';</script>";
    }    
    
    
    
}
