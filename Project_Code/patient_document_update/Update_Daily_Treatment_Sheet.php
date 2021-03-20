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
    $Daily_Treatment_id = $_POST["Daily_Treatment_id"];
    
    $admission_time = $_POST["admission_time"];
    $admission_date = $_POST["admission_date"];
	
	$view_patient = "SELECT * FROM patient WHERE Patient_id = $patient_id ";
	$result_patient = mysqli_query($connection, $view_patient);
	if(mysqli_num_rows($result_patient) > 0)
	{
		while ($row_patient = mysqli_fetch_assoc($result_patient)) 
		{
			$patient_name = $row_patient["Patient_Name"];
		}
	}	
	
    $room_no = $_POST["room_no"];
    $previous_room = $_POST["previous_room"];	
	if($previous_room != $room_no)
	{	
		$update_room_status = "UPDATE room_master SET room_status = 'UnAvailable', Room_Allocated_to = '$patient_name' WHERE room_id = $room_no";
		$update_preroom_status = "UPDATE room_master SET room_status = 'Available', Room_Allocated_to = 'None' WHERE room_id = $previous_room";
		$update_room_admsn = "UPDATE patient_admission SET Room_no = $room_no WHERE Treatment_id = $treatment_id AND "
				. "Patient_Admission_date = '$admission_date' AND Patient_Admission_time = '$admission_time'";
		if(mysqli_query($connection, $update_room_status) && mysqli_query($connection, $update_room_admsn) 
				&& mysqli_query($connection, $update_preroom_status))
		{
			echo "Room details updated";
		}
		else
		{
			echo "<script>alert('Room details not updated');</script>";
		}
	}	
    
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
		foreach ($inj_time as $value1) 
		{
			$inject_t = $inject_t.",".$value1;
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
		foreach ($tc_time as $value2) 
		{
			$tabcap_t = $tabcap_t.",".$value2;
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
    
    $daily_treatment_add = "UPDATE treatment_patient_dailytreatment SET "
            . "Daily_Treatment_date = '$daily_date' , CVC = $cvc , Cather = '$cather' , "
            . "Ryles_Tube = $ryles_tube , Diet = $diet , Drain_day = $drain_day , "
            . "Day_after_admission = $adm_day , Day_after_operation = $opr_day , "
            . "Plan_for_today = '$today_plan' , Plan_for_tomorrow = '$tmr_plan' "
            . "WHERE Daily_Treatment_id = $Daily_Treatment_id";
    if(mysqli_query($connection, $daily_treatment_add))
    {
        $qry_st = 0;
        $delete_daily_medic = "DELETE FROM treatment_patient_dailymedications "
                . "WHERE Daily_Treatment_id = $Daily_Treatment_id";
        if(mysqli_query($connection, $delete_daily_medic))
        {
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
					$daily_medic_add = "INSERT INTO treatment_patient_dailymedications (Daily_Treatment_id) VALUES ($Daily_Treatment_id)";
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
		}
		else
		{$qry_st = 0;}
        if($qry_st == 0)
        {
            header("Location:../Inpatient_Treatment.php?patient_id=$patient_id&admin_name=$login_name");
        }
        else
        {
            echo "<script>alert('Daily Medication not added');"
			. "window.location.href='../Inpatient_Treatment.php?patient_id=$patient_id&admin_name=$login_name'</script>";
        }
    }
    else
    {
        echo "<script>alert('Daily Treatment not added');"
        . "window.location.href='../Inpatient_Treatment.php?patient_id=$patient_id&admin_name=$login_name'</script>";
    }
}