<?php
$con_servername = "localhost";
$con_username = "root";
$con_password = "";
$database = "hospital_management_system";

$connection = mysqli_connect($con_servername, $con_username, $con_password, $database);

if($_POST)
{
    $login_name = $_POST["admin_name"];
    
    $operation_schedule_id = $_POST["operation_schedule_id"];
    $OperationDate = $_POST["OperationDate"];
    $OperationTime = $_POST["OperationTime"];
    $Operation_doctor = $_POST["Operation_doctor"];
    $Operation_patient = $_POST["Operation_patient"];
    $OperationDuration = $_POST["OperationDuration"];
    $operation_status = $_POST["operation_status"];
    
/*    $time_avble = 0;
    $check_time = "SELECT * FROM operation_schedule";
    $result_check_time = mysqli_query($connection, $check_time);
    if(mysqli_num_rows($result_check_time) > 0)
    {
        while($row_check_time = mysqli_fetch_assoc($result_check_time))
        {
            /*echo str_replace("0:00", "0", $row_check_time["Doctor_Appointment_time"])." == ".$VisitorTime." ". 
                    $row_check_time["Doctor_Appointment_date"]." == ".$VisitorDate." ". 
                    $row_check_time["Doctor_name"]." == ".$DoctorName."<br>";
            
            if(str_replace("0:00", "0", $row_check_time["Operation_Schedule_time"]) == $OperationTime && 
                    $row_check_time["Operation_Schedule_date"] == $OperationDate && 
                    $row_check_time["Patient_name"] != $Operation_patient)
            {
                $time_avble = 1;
                break;
            }
        }
    }

    if($time_avble == 1)
    {
        echo "<script>alert('Operation Schedule on $OperationTime already booked on $OperationDate');"
                . "window.location.href = 'index.php?admin_name=$login_name';</script>";
    }*/    
    $update_appointment = "UPDATE operation_schedule "
            . "SET Operation_Schedule_date = '$OperationDate' , Operation_Schedule_time = '$OperationTime' , "
            . "Operation_Schedule_duration = $OperationDuration , Operation_Status='$operation_status' , "
            . "Doctor_name='$Operation_doctor' , Patient_name='$Operation_patient' "
            . "WHERE Operation_Schedule_id = $operation_schedule_id";

    if(mysqli_query($connection, $update_appointment))
    {
        header("Location: Operation_Schedule_list.php?admin_name=$login_name");
    }
    else
    {
        echo "<script>alert(Operation schedule not updated');"
            . "window.location.href = 'Operation_Schedule_list.php?admin_name=$login_name';</script>";
    }
}
