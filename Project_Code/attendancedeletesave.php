<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hospital_management_system";



$conn = mysqli_connect($servername,$username,$password,$dbname);

echo 'Connection Successful';
if($_POST)
{
    $login_name=$_POST["admin_name"];
	$act=$_POST['Attendance_calc_id'];

	$sql="Delete from attendance where Attendance_calc_id=$act";
	if(mysqli_query($conn,$sql))
    {
        header("Location:attendance_balance.php?admin_name=$login_name");
    }
    else
    {
        echo "<script>alert( Employee not Updated');"
        . "window.location.href = 'attendance_balance.php?admin_name=$login_name';</script>";
    }
}