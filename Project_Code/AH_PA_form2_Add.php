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
    
    $er_status = 0;
    
    $illness_name = $_POST["illness_name"];
    $illness_duration = $_POST["illness_duration"];
    $illness_medication = $_POST["illness_medication"];
    $illness_medication_duration = $_POST["illness_medication_duration"];
    
    foreach ($illness_name as $key => $value)
    {
        
        if($value != "")
        {
            echo "<table border='1'>";
            echo "<tr>";
            echo "<td>($key)</td>";
            echo "<td>$value</td>";
            echo "<td>$illness_duration[$key]</td>";
            echo "<td>$illness_medication[$key]</td>";
            echo "<td>$illness_medication_duration[$key]</td>";
            echo "</tr>";
            echo "</table>";
            $insert_illness = "INSERT INTO patient_illness_pasthistory "
                    . "(Patient_id , PastHistory_Illness_Name , "
                    . "PastHistory_Illness_Duration , PastHistory_Illness_Medication , "
                    . "PastHistory_Illness_Medication_duration) VALUES "
                    . "($patient_id, '$value' , '$illness_duration[$key]' , '$illness_medication[$key]' , "
                    . "'$illness_medication_duration[$key]')";
            if(mysqli_query($connection, $insert_illness))
            {
                continue;
            }
            else
            {
                echo "<script>alert('Illness details Not Inserted');</script>";
                $er_status = 1;
                break;                
            }
        }
    }
    
	if($_POST["fam_history"])
	{
		$fam_history = $_POST["fam_history"];
		$fh = "";
		foreach ($fam_history as $value) 
		{
			$fh = $fh.",".$value;
		}
		$fhpasthistory = "UPDATE patient_pasthistory SET "
				. "Patient_FamilyHistory = '$fh' WHERE Patient_id = $patient_id";
		if(mysqli_query($connection, $fhpasthistory))
		{
			echo "<br>past history inserted<br>";
		}
		else
		{
			echo "<script>alert('past history details Not Inserted');</script>";
			$er_status = 1;
		}
	}
	
    $Past_Hospitalisation = $_POST["Past_Hospitalisation"];
    $lmpdate = $_POST["lmpdate"];
    $abortion_type = $_POST["abortion_type"];
    if($abortion_type == "")
    {
        $abortion_type = "none";
    }
    $Obstetric_lastdate = $_POST["Obstetric_lastdate"];
    $other_female_prb = $_POST["other_female_prb"];
    $fh = "";
    foreach ($fam_history as $value) 
    {
        $fh = $fh.",".$value;
    }
    $pasthistory = "UPDATE patient_pasthistory SET "
            . "Patient_Past_Hospitalisation = '$Past_Hospitalisation' , "
            . "LMP_date = '$lmpdate' , Obstetric_Lastdate = '$Obstetric_lastdate' , "
            . "Abortion_Type = '$abortion_type' , Other_female_problems = '$other_female_prb' "
            . "WHERE Patient_id = $patient_id";
    if(mysqli_query($connection, $pasthistory))
    {
        echo "<br>past history inserted<br>";
    }
    else
    {
        echo "<script>alert('past history details Not Inserted');</script>";
        $er_status = 1;
    }
    
    $informant_name = $_POST["informant_name"];
    $informant_rel = $_POST["informant_rel"];    
    $Diet = $_POST["Diet"];
    $Appetite = $_POST["Appetite"];
    $Sleep = $_POST["Sleep"];
    $Mictrition = $_POST["Mictrition"];
    $BowelHabits = $_POST["BowelHabits"];    
    
    $insert_ph = "UPDATE illness_complaint SET "
            . "Informant_Name = '$informant_name' , "
            . "Informant_Relation = '$informant_rel' , "
            . "PH_Diet = '$Diet' , PH_Appetite = '$Appetite' , "
            . "PH_Sleep = '$Sleep' , PH_Micturition = '$Mictrition' , "
            . "PH_Bowel_Habits = '$BowelHabits' WHERE Treatment_id = $treatment_id";
    if(mysqli_query($connection, $insert_ph))
    {
        echo "<br>Personal History Inserted<br>";
    }
    else
    {
        echo "<script>alert('Personal history details Not Inserted');</script>";
        $er_status = 1;
    }
    
    
    $addiction = $_POST["addiction"];
    foreach ($addiction as $v) 
    {
        if($v == "Smoking")
        {
            $Smoking = "yes";
        }
        else
        {
            $Smoking = "no";
        }
        
        if($v == "Alcohol")
        {
            $Alcohol = "yes";
        }
        else
        {
            $Alcohol = "no";
        }
        
        if($v == "Drugs")
        {
            $Drugs = "yes";
        }
        else
        {
            $Drugs = "no";
        }
                
        if($v == "Tobacco")
        {
            $Tobacco = "yes";
        }
        else
        {
            $Tobacco = "no";
        }
    }
    $Smoking_since = $_POST["Smoking_since"];
    $Smoking_perday = $_POST["Smoking_perday"];
    
    $Alcohol_since = $_POST["Alcohol_since"];
    $Alcohol_freq = $_POST["Alcohol_freq"];
    
    $Drugs_since = $_POST["Drugs_since"];
    $Drugs_freq = $_POST["Drugs_freq"];
    
    $Tobacco_since = $_POST["Tobacco_since"];
    $Tobacco_freq = $_POST["Tobacco_freq"];
    $other_addiction = $_POST["other_addiction"];
    $other_addiction_freq = $_POST["other_addiction_freq"];
    
    if($Smoking != "yes" && $Alcohol != "yes" && $Drugs != "yes" && $Tobacco != "yes" && $other_addiction == "")
    {
		$other_addiction = "None";
		$insert_addiction = "INSERT INTO patient_addiction (Patient_id ,Other_habit) VALUES "
				. "($patient_id , '$other_addiction')";					
		if(mysqli_query($connection, $insert_addiction))
		{
			echo "<br>Addiction Details Inserted<br>";
		}
		else
		{
			echo "<script>alert('Addiction details Not Inserted');</script>";
			$er_status = 1;
		}		
	}
    else
    {
        $insert_addiction = "INSERT INTO patient_addiction (Patient_id , Smoking_since , "
                . "Smoking_perday , Alcohol_since , Alcohol_freq , Drugs_since , "
                . "Drugs_freq , Tobacco_since , Tobacco_freq , Other_habit , Other_habit_freq) VALUES "
                . "($patient_id , '$Smoking_since' , '$Smoking_perday' , '$Alcohol_since' , '$Alcohol_freq' , "
                . "'$Drugs_since' , '$Drugs_freq' , '$Tobacco_since' , '$Tobacco_freq' , '$other_addiction' , "
                . "'$other_addiction_freq')";
        if(mysqli_query($connection, $insert_addiction))
        {
            echo "<br>Addiction Details Inserted<br>";
        }
        else
        {
            echo "<script>alert('Addiction details Not Inserted');</script>";
            $er_status = 1;
        }
    }
    
    if($er_status == 0)
    {
        header("Location: patient_document_format/Admission_history_and_Physical_Assessment_form3.php?patient_id=$patient_id&treatment_id=$treatment_id&admin_name=$login_name");
    }
    else
    {
        echo "<script>alert('Details not added');"
        . "window.location.href = 'patient_document_format/Admission_history_and_Physical_Assessment_form3.php?patient_id=$patient_id&treatment_id=$treatment_id&admin_name=$login_name';"
        . "</script>";
    }
}

