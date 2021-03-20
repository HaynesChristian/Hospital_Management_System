<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hospital_management_system";

$connection = mysqli_connect($servername,$username,$password,$dbname);

if($_POST)
{
    $login_name=$_POST["admin_name"];
	
    $employee_id = $_POST['employee_id'];	
    $attdate = $_POST['attdate'];
    $attendance_status = $_POST['attendance_status']; 
    
	$emp_atd = "UPDATE attendance_tran SET Att_status = '$attendance_status' WHERE Employee_Id = $employee_id AND Att_date = '$attdate'";	

    if(mysqli_query($connection, $emp_atd))
    {
        header("Location:attendance_update_list.php?admin_name=$login_name");
    }
    else
    {
        echo "<script>alert(Employee Attendance not marked');"
        . "window.location.href = 'attendance_update_list.php?admin_name=$login_name';</script>";
    }
}