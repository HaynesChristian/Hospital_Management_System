<?php
$con_servername = "localhost";
$con_username = "root";
$con_password = "";
$database = "hospital_management_system";

$connection = mysqli_connect($con_servername, $con_username, $con_password, $database);

if($_POST)
{
    $login_name=$_POST["admin_name"];
    
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
    $VisitorDesc = $_POST["VisitorDesc"];
    $appointment_status = "booked";
    
    $time_avble = 0;
    $check_time = "SELECT * FROM doctor_appointment_list";
    $result_check_time = mysqli_query($connection, $check_time);
    if(mysqli_num_rows($result_check_time) > 0)
    {
        while($row_check_time = mysqli_fetch_assoc($result_check_time))
        {
            /*echo str_replace("0:00", "0", $row_check_time["Doctor_Appointment_time"])." == ".$VisitorTime." ". 
                    $row_check_time["Doctor_Appointment_date"]." == ".$VisitorDate." ". 
                    $row_check_time["Doctor_name"]." == ".$DoctorName."<br>";*/
            
            if(str_replace("0:00", "0", $row_check_time["Doctor_Appointment_time"]) == $VisitorTime && 
                    $row_check_time["Doctor_Appointment_date"] == $VisitorDate && 
                    $row_check_time["Doctor_name"] == $DoctorName)
            {
                $time_avble = 1;
                break;
            }
        }
    }
    if($time_avble == 1)
    {
        echo "<script>alert('Appointment on $VisitorTime already booked of Dr. $DoctorName on $VisitorDate');"
                . "window.location.href = 'index.php?admin_name=$login_name';</script>";
    }
    else
    {
        $insert_appointment = "INSERT INTO doctor_appointment_list "
                . "(Doctor_name,Doctor_Appointment_date,Doctor_Appointment_time,"
                . "Visitor_Name,Visitor_Type,Visitor_Email,"
                . "Appointment_Description,Doctor_Appointment_status) "
                . "VALUES ('$DoctorName','$VisitorDate','$VisitorTime','$VisitorName',"
                . "'$VisitorType','$VisitorEmail','$VisitorDesc','$appointment_status')";

        if(mysqli_query($connection, $insert_appointment))
        {
            header("Location: index.php?admin_name=$login_name");
        }
        else
        {
            echo "<script>alert(Appointment not listed');"
            . "window.location.href = 'index.php?admin_name=$login_name';</script>";
        }

    }
}
