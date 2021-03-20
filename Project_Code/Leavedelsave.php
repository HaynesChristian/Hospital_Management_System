<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hospital_management_system";

$conn = mysqli_connect($servername,$username,$password,$dbname);

if($_POST)
{
	$login_name=$_POST["admin_name"];
    $act = $_POST['Id'];
    $Year = $_POST['Year'];
    $CLB = $_POST['CLB'];
    $SLB = $_POST['SLB'];
    $PLB = $_POST['PLB'];

	$sql="DELETE FROM leave_master WHERE Employee=$act";
	if(mysqli_query($conn,$sql))
    {
		header("Location:leave_balance.php?admin_name=$login_name");
    }
    else
    {
        echo "<script>alert(Leave Balance not Deleted');"
        . "window.location.href = 'leave_balance.php?admin_name=$login_name';</script>";
    }
}   