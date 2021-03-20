<?php
$con_servername = "localhost";
$con_username = "root";
$con_password = "";
$database = "hospital_management_system";

$connection = mysqli_connect($con_servername, $con_username, $con_password, $database);

if($_POST)
{
    $login_name = $_POST["admin_name"];
    
    $patient_id = $_POST['patient_id'];
	$patient_srno = $_POST['patient_srno'];
    $patient_name = $_POST['patient_name'];
    $patient_gender = $_POST['patient_gender'];
    $patient_contact = $_POST['patient_contact'];
    $patient_age = $_POST['patient_age'];
    $patient_adrs = trim($_POST['patient_adrs']);
	if($_POST['patient_height'] == "")
	{
		$patient_height = "0";
	}
	else
	{
		$patient_height = $_POST['patient_height'];
	}    
	if($_POST['patient_weight'] == "")
	{
		$patient_weight = "0";
	}
	else
	{
		$patient_weight = $_POST['patient_weight'];
	}
	if($_POST['patient_email'] == "")
	{
		$patient_email = "no email provided";
	}
	else
	{
		$patient_email = $_POST['patient_email'];
	}
    $patient_type = $_POST['patient_type'];
    $patient_relative_name = $_POST['patient_relative_name'];
    $patient_relative_rel = $_POST['patient_relative_rel'];
    $patient_relative_no = $_POST["patient_relative_no"];
    
    $update_patient = "UPDATE patient SET Patient_SrNo = $patient_srno, Patient_Name = '$patient_name', Patient_Gender = '$patient_gender', "
            . "Patient_Address='$patient_adrs', Patient_MobileNo='$patient_contact', "
            . "Patient_Age=$patient_age, Patient_Height=$patient_height, Patient_Weight=$patient_weight, "
            . "Patient_Email_id='$patient_email', Patient_Relative_name='$patient_relative_name', "
            . "Patient_Relative_Relation='$patient_relative_rel', "
            . "Patient_Relative_Contact='$patient_relative_no', Patient_Type='$patient_type' "
            . "WHERE Patient_id = $patient_id";
    
    if(mysqli_query($connection, $update_patient))
    {
        header("Location: patient.php?admin_name=$login_name");
    }
    else
    {
        echo "<script>alert('Patient Details Not Updated');window.location.href = 'patient.php?admin_name=$login_name';</script>";
    }
}

