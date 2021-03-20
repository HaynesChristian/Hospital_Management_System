<?php
$con_servername = "localhost";
$con_username = "root";
$con_password = "";
$database = "hospital_management_system";

$connection = mysqli_connect($con_servername, $con_username, $con_password, $database);

if($_POST)
{
    $login_name = $_POST["admin_name"];
    
    $appointment_id = $_POST["appointment_id"];
    $VisitorName = $_POST["VisitorName"];
    $VisitorType = $_POST["VisitorType"];
    $DoctorName = $_POST["DoctorName"];
	if($_POST["VisitorEmail"] == "")
	{
		$VisitorEmail = "no email provided";
	}
	else
	{
		$VisitorEmail = $_POST["VisitorEmail"];
	}
    $VisitorDate = $_POST["VisitorDate"];
    $VisitorTime = $_POST["VisitorTime"];
    $VisitorDesc = trim($_POST["VisitorDesc"]);
    $Visitorstatus = $_POST["Visitorstatus"];
    
    /*$time_avble = 0;
    $check_time = "SELECT * FROM doctor_appointment_list";
    $result_check_time = mysqli_query($connection, $check_time);
    if(mysqli_num_rows($result_check_time) > 0)
    {
        while($row_check_time = mysqli_fetch_assoc($result_check_time))
        {
            /*echo str_replace("0:00", "0", $row_check_time["Doctor_Appointment_time"])." == ".$VisitorTime." ". 
                    $row_check_time["Doctor_Appointment_date"]." == ".$VisitorDate." ". 
                    $row_check_time["Doctor_name"]." == ".$DoctorName."<br>";
            
            if(str_replace("0:00", "0", $row_check_time["Doctor_Appointment_time"]) == $VisitorTime && 
                    $row_check_time["Doctor_Appointment_date"] == $VisitorDate && 
                    $row_check_time["Doctor_name"] == $DoctorName && 
                    $row_check_time["Visitor_Name"] != $VisitorName)
            {
                $time_avble = 1;
                break;
            }
        }
    }
    if($time_avble == 1)
    {
        echo "<script>alert('Appointment on $VisitorTime already booked of Dr. $DoctorName on $VisitorDate');"
                . "window.location.href = 'Appointment_list.php?admin_name=$login_name';</script>";
    }*/
    $insert_appointment = "UPDATE doctor_appointment_list "
            . "SET Doctor_name = '$DoctorName' ,Doctor_Appointment_date = '$VisitorDate' ,Doctor_Appointment_time = '$VisitorTime', "
            . "Visitor_Name='$VisitorName' ,Visitor_Type='$VisitorType' ,Visitor_Email='$VisitorEmail', "
            . "Appointment_Description = '$VisitorDesc' ,Doctor_Appointment_status = '$Visitorstatus' "
            . "WHERE Doctor_Appointment_id=$appointment_id";

    if(mysqli_query($connection, $insert_appointment))
    {
        header("Location: Appointment_list.php?admin_name=$login_name");
    }
    else
    {
        echo "<script>alert(Appointment not updated');"
        . "window.location.href = 'Appointment_list.php'?admin_name=$login_name;</script>";
    }
}
