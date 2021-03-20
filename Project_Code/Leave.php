<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hospital_management_system";

$conn = mysqli_connect($servername,$username,$password,$dbname);

if($_POST)
{
	$login_name=$_POST["admin_name"];
    $Id = $_POST['empid'];
    $Year = $_POST['Year'];
    $CLB = $_POST['CLB'];
    $SLB = $_POST['SLB'];
    $PLB = $_POST['PLB'];
	
	$emp_name = "SELECT Employee, Year FROM leave_master WHERE Employee = $Id AND Year = $Year";
	$result_emp = mysqli_query($conn, $emp_name);
	if(mysqli_num_rows($result_emp) > 0)
	{
        echo "<script>alert('Leave Balance already registered');"
        . "window.location.href = 'leave_balance.php?admin_name=$login_name';</script>";		
	}	
    else
	{
		$sql = "insert into leave_master (Employee,Year,CL_Balance,SL_Balance,PL_Balance) "
				. "VALUES ($Id,$Year,$CLB,$SLB,$PLB)";
		if(mysqli_query($conn,$sql))
		{
			header("Location:leave_balance.php?admin_name=$login_name");
		}
		else
		{
			echo "<script>alert('Leave Balance not registerd');"
			. "window.location.href = 'leave_balance.php?admin_name=$login_name';</script>";
		}
	}
}