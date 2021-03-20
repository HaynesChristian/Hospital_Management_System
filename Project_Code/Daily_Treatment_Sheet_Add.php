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
    
    $injection_detail = $_POST["injection_detail"];
    $injection_dose = $_POST["injection_dose"];
    $injection_route = $_POST["injection_route"];
    $tabcap_detail = $_POST["tabcap_detail"];
    $tabcap_dose = $_POST["tabcap_dose"];
    $tabcap_route = $_POST["tabcap_route"];
    
    $injection_time = array();
    $tabcap_time = array();
    $injno=0;
    foreach ($injection_detail as $key => $value1)
    {
        $injno++;
        if($value1 == "")
        {break;}
		$inj_time = $_POST["injection_time$injno"];
		$inject_t="";
		foreach ($inj_time as $value) 
		{
			$inject_t = $inject_t.",".$value;
		}	
        array_push($injection_time, $inject_t);
    }
	
    $tcno=0;
    foreach ($tabcap_detail as $key => $value2) 
    {
        $tcno++;
        if($value2 == "")
        {break;}
		$tc_time = $_POST["tabcap_time$tcno"];
		$tabcap_t="";
		foreach ($tc_time as $value) 
		{
			$tabcap_t = $tabcap_t.",".$value;
		}	
        array_push($tabcap_time, $tabcap_t);
    }
	
    $tmr_plan = trim($_POST["tmr_plan"]);
    $today_plan = trim($_POST["today_plan"]);
	$daily_date = $_POST["daily_date"];
	$cather = $_POST["cather"];

	if($_POST["adm_day"] == "")
	{
		$adm_day = 0;
	}
	else
	{
		$adm_day = $_POST["adm_day"];
	}    
	if($_POST["diet"] == "")
	{
		$diet = 0;
	}
	else
	{
		$diet = $_POST["diet"];
	}	
    
	if($_POST["cvc"] == "")
	{
		$cvc = 0;
	}
	else
	{
		$cvc = $_POST["cvc"];
	}	
    
	if($_POST["ryles_tube"] == "")
	{
		$ryles_tube = 0;
	}
	else
	{
		$ryles_tube = $_POST["ryles_tube"];
	}	
    
	/*if($_POST["tt_day"] == "")
	{
		$tt_day = 0;
	}
	else
	{
		$tt_day = $_POST["tt_day"];
	}*/	
    
	if($_POST["drain_day"] == "")
	{
		$drain_day = 0;
	}
	else
	{
		$drain_day = $_POST["drain_day"];
	}	

	if($_POST["opr_day"] == "")
	{
		$opr_day = 0;
	}
	else
	{
		$opr_day = $_POST["opr_day"];
	}
	
	$daily_treatment_add = "INSERT INTO treatment_patient_dailytreatment "
            . "(Treatment_id , Daily_Treatment_date , CVC , Cather , Ryles_Tube , "
            . "Diet , Drain_day , Day_after_admission , Day_after_operation , "
            . "Plan_for_today , Plan_for_tomorrow) VALUES "
            . "($treatment_id , '$daily_date' , $cvc , '$cather' , $ryles_tube , $diet , "
            . "$drain_day , $adm_day , $opr_day , '$today_plan' , '$tmr_plan')";
    if(mysqli_query($connection, $daily_treatment_add))
    {
        $dt_id = "SELECT Daily_Treatment_id FROM treatment_patient_dailytreatment "
                . "WHERE Treatment_id = $treatment_id "
                . "AND Daily_Treatment_date = '$daily_date'";
        $result_patient = mysqli_query($connection, $dt_id);
        if(mysqli_num_rows($result_patient) > 0)
        {
            while ($row_patient = mysqli_fetch_assoc($result_patient)) 
            {
                $daily_treatment_id = $row_patient["Daily_Treatment_id"];
            }
        }
        
        $qry_st = 0;
		$injc = 0;
		foreach ($injection_detail as $key => $value) 
		{
			if($value != "")
			{
				$injc++;
			}
		}
		$tabcapc = 0;
		foreach ($tabcap_detail as $key => $value) 
		{
			if($value != "")
			{
				$tabcapc++;
			}
		}		
		$maxc = max($injc,$tabcapc);
		//echo "inj_ar = $inj_ar and tabcap_ar = $tabcap_ar";
		
		if($injc > 0 || $tabcapc > 0)
		{
			//echo "injc = $injc and tabcapc = $tabcapc";
			for($i=0; $i<$maxc; $i++)
			{
				echo "injc = $injc and tabcapc = $tabcapc and i = $i<br/>";	
				$daily_medic_add = "INSERT INTO treatment_patient_dailymedications (Daily_Treatment_id) VALUES ($daily_treatment_id)";
				if(mysqli_query($connection, $daily_medic_add))
				{
					$dm_id = mysqli_insert_id($connection);
					if($injection_detail[$i] != "")
					{
						$update_inj = "UPDATE treatment_patient_dailymedications SET Injection_details = '$injection_detail[$i]' , "
						. "Injection_dose = $injection_dose[$i] , Injection_time = '$injection_time[$i]' , Injection_route = '$injection_route[$i]' WHERE "
						. "Daily_medication_id = $dm_id";
						if(mysqli_query($connection, $update_inj))
						{
							$qry_st = 0;
							echo "<br>update_inj - $qry_st<br>";
						}
						else
						{
							$qry_st = 1;
							echo "<br>update_inj - $qry_st<br>";
							break;
						}
					}
					if($tabcap_detail[$i] != "")
					{
						$update_tabcap = "UPDATE treatment_patient_dailymedications SET Tab_Cap_details = '$tabcap_detail[$i]' , "
						. "Tab_Cap_dose = $tabcap_dose[$i] , Tab_Cap_route = '$tabcap_route[$i]' , Tab_Cap_time = '$tabcap_time[$i]' WHERE Daily_medication_id = $dm_id";
						if(mysqli_query($connection, $update_tabcap))
						{
							$qry_st = 0;
							echo "<br>update_tabcap - $qry_st<br>";
						}
						else
						{
							$qry_st = 1;
							echo "<br>update_tabcap - $qry_st<br>";
							break;
						}
					}				
				}
			}	
		}
		else
		{$qry_st = 0;}
        if($qry_st == 0)
        {
            header("Location:Inpatient_Treatment.php?patient_id=$patient_id&admin_name=$login_name");
        }
        else
        {
            echo "<script>alert('Daily Medication not added');"
			. "window.location.href='Inpatient_Treatment.php?patient_id=$patient_id&admin_name=$login_name'</script>";
        }
    }
    else
    {
        echo "<script>alert('Daily Treatment not added');"
        . "window.location.href='Inpatient_Treatment.php?patient_id=$patient_id&admin_name=$login_name'</script>";
    }
}

        /*foreach ($injection_detail as $key => $value) 
        {
            echo "INSERT INTO treatment_patient_dailymedications "
                    . "(Daily_Treatment_id , Injection_details , Injection_dose , Injection_time , "
                    . "Injection_route , Tab_Cap_details , Tab_Cap_dose , Tab_Cap_route , Tab_Cap_time) "
                    . "VALUES ($daily_treatment_id , '$value' , $injection_dose[$key] , '$injection_time[$key]' , "
                    . "'$injection_route[$key]' , '$tabcap_detail[$key]' , $tabcap_dose[$key] , "
                    . "'$tabcap_route[$key]' , '$tabcap_time[$key]') <br>";			
            $daily_medic_add = "INSERT INTO treatment_patient_dailymedications "
                    . "(Daily_Treatment_id , Injection_details , Injection_dose , Injection_time , "
                    . "Injection_route , Tab_Cap_details , Tab_Cap_dose , Tab_Cap_route , Tab_Cap_time) "
                    . "VALUES ($daily_treatment_id , '$value' , $injection_dose[$key] , '$injection_time[$key]' , "
                    . "'$injection_route[$key]' , '$tabcap_detail[$key]' , $tabcap_dose[$key] , "
                    . "'$tabcap_route[$key]' , '$tabcap_time[$key]')";
            if(mysqli_query($connection, $daily_medic_add))
            {
                $qry_st = 0;
                echo "<br>$qry_st<br>";
            }
            else
            {
                $qry_st = 1;
                echo "<br>$qry_st<br>";
                break;
            }
            
        }*/