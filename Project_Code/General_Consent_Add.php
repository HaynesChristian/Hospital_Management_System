<?php
$con_servername = "localhost";
$con_username = "root";
$con_password = "";
$database = "hospital_management_system";

$connection = mysqli_connect($con_servername, $con_username, $con_password, $database);

if($_POST)
{
    $login_name = $_POST["admin_name"];
    $admission_date = $_POST["admission_date"];
    $admission_time = $_POST["admission_time"];
    $staff_member = $_POST["staff_member"];
    $treatment_id = $_POST["treatment_id"];
    $patient_id = $_POST["patient_id"];
	$patient_name = $_POST['patient_name'];
                
    /* Insert treatment id where it is used as foreign key - Code starts*/
    if(mysqli_query($connection, "INSERT INTO illness_complaint (Treatment_id) VALUES ($treatment_id)"))
    {
        echo "<br/>Treatment_id inserted into illness_complaint<br/>";
    }
    else
    {
        echo "<script>alert('Treatment_id not inserted into illness_complaint');</script>";
    }

    if(mysqli_query($connection, "INSERT INTO illness_suggestion (Treatment_id) VALUES ($treatment_id)"))
    {
        echo "<br/>Treatment_id inserted into illness_suggestion<br/>";
    }
    else
    {
        echo "<script>alert('Treatment_id not inserted into illness_suggestion');</script>";
    }

    if(mysqli_query($connection, "INSERT INTO patient_bill (Treatment_id) VALUES ($treatment_id)"))
    {
        echo "<br/>Treatment_id inserted into patient_bill<br/>";
    }
    else
    {
        echo "<script>alert('Treatment_id not inserted into patient_bill');</script>";
    }            
    /* Insert treatment id where it is used as foreign key - Code ends*/

    /* Insert patient id where it is used as foreign key - Code starts*/
    if(mysqli_query($connection, "INSERT INTO patient_pasthistory (Patient_id) VALUES ($patient_id)"))
    {
        echo "<br/>Patient_id inserted into patient_pasthistory<br/>";
    }
    else
    {
        echo "<script>alert('Patient_id inserted not into patient_pasthistory');</script>";
    }            
    /* Insert patient id where it is used as foreign key - Code ends*/
    
    /*Allot Room code starts*/
	$room_id = 0;
    $room_select = "SELECT * FROM room_master WHERE room_status = 'Available' LIMIT 1";
    $result_room = mysqli_query($connection, $room_select);
    if(mysqli_num_rows($result_room)>0)
    {
        while($row_room= mysqli_fetch_assoc($result_room))
        {
            $room_id = $row_room["room_id"];
            $update_room_status = "UPDATE room_master SET room_status = 'UnAvailable', Room_Allocated_to = '$patient_name' WHERE "
                    . "room_id = $room_id";
            if(mysqli_query($connection, $update_room_status))
            {
                echo "Room master updated<br/>";
            }
            else
            {
                echo "<script>alert('Room status not updated');</script>";
            }

			$insert_gc = "INSERT INTO patient_admission "
					. "(Treatment_id, Patient_Admission_date, Patient_Admission_time, Room_no, Assigned_Staff_memberName) "
					. "VALUES ($treatment_id, '$admission_date', '$admission_time', $room_id , '$staff_member')";
			
			if(mysqli_query($connection, $insert_gc))
			{
				header("Location: patient_document_format/Admission_history_and_Physical_Assessment_form1.php?patient_id=$patient_id&patient_name=$patient_name&treatment_id=$treatment_id&admin_name=$login_name");
			}
			else
			{
				echo "<script>alert('General Consent Not Inserted');window.location.href = 'patient.php'?admin_name=$login_name;</script>";
			}			
        }
    }
	else
	{
		echo "<script>alert('No Room Available');window.location.href = 'patient.php'?admin_name=$login_name;</script>";	
	}
    /*Allot Room code ends*/
                
//    echo "INSERT INTO patient_admission "
//            . "(Treatment_id, Patient_Admission_date, Patient_Admission_time, Assigned_Staff_memberName) "
//            . "VALUES ($treatment_id, '$admission_date', '$admission_time', '$staff_member')";
    

}
