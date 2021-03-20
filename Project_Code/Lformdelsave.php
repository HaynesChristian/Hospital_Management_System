<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hospital_management_system";

$conn = mysqli_connect($servername,$username,$password,$dbname);
if($_POST)
{
    $login_name=$_POST["admin_name"];
    $id = $_POST['id'];
	$leave_id = $_POST['leave_id'];
    $type = $_POST['type'];
    $lfrom = $_POST['lfrom'];
    $lto = $_POST['lto'];
    $total = $_POST['total'];	
	
	
	$sql = "DELETE FROM leave_form WHERE Leave_id = $leave_id";
	if(mysqli_query($conn,$sql))
	{
		if($type == "CL")
		{
			$sql1 = "update leave_master set CL_Balance= CL_Balance + $total where '$type' = 'CL' and Employee = $id";
			if(mysqli_query($conn,$sql1))
			{
				header("Location:leave_transaction.php?admin_name=$login_name");
			}
			else 
			{
				echo "<script>alert('CL not Updated');"
				. "window.location.href = 'leave_transaction.php?admin_name=$login_name';</script>";          
			}			
		}
		
		if($type == "SL")
		{
			$sql2 = "update leave_master set SL_Balance= SL_Balance + $total where '$type' = 'SL' and Employee = $id";
			if(mysqli_query($conn,$sql2))
			{
				header("Location:leave_transaction.php?admin_name=$login_name");
			}
			else 
			{
				echo "<script>alert('SL not Updated');"
				. "window.location.href = 'leave_transaction.php?admin_name=$login_name';</script>";          
			}			
		}

		if($type == "PL")
		{
			$sql3 = "update leave_master set PL_Balance= PL_Balance + $total where '$type' = 'PL' and Employee = $id";
			if(mysqli_query($conn,$sql3))
			{
				header("Location:leave_transaction.php?admin_name=$login_name");
			}
			else 
			{
				echo "<script>alert('PL not Updated');"
				. "window.location.href = 'leave_transaction.php?admin_name=$login_name';</script>";				
			}			
		}	
	}
	else 
	{
		echo "<script>alert('Employee Leave not updated');"
		. "window.location.href = 'leave_transaction.php?admin_name=$login_name';</script>";
	}
}    