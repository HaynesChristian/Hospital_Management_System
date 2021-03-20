<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hospital_management_system";

$conn = mysqli_connect($servername,$username,$password,$dbname);
if($_POST)
{
	$login_name=$_POST["admin_name"];
    $Id = $_POST['Id'];
    $Year = $_POST['Year'];
    $CLB = $_POST['CLB'];
    $SLB = $_POST['SLB'];
    $PLB = $_POST['PLB'];

	$emp_name = "SELECT Emp_Id FROM leave_form WHERE Emp_Id = $Id AND Leave_from LIKE '$Year%'";
	//echo "SELECT Emp_Id FROM leave_form WHERE Emp_Id = $Id AND Leave_from LIKE '$Year%'";
	$result_emp = mysqli_query($conn, $emp_name);
	if(mysqli_num_rows($result_emp) > 0)
	{
        echo "<script>alert('Leave Balance cannot be updated because already leaves were taken');"
        . "window.location.href = 'leave_balance.php?admin_name=$login_name';</script>";		
	}	
    else
	{
		$sql="Update leave_master set CL_Balance=$CLB,SL_Balance=$SLB,PL_Balance=$PLB where Employee=$Id";
		if(mysqli_query($conn,$sql))
		{
			header("Location:leave_balance.php?admin_name=$login_name");
		}
		else
		{
			echo "<script>alert(Leave Balance not Updated');"
			. "window.location.href = 'leave_balance.php?admin_name=$login_name';</script>";
		}
	}
}