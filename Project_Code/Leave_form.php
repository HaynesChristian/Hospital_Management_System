<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hospital_management_system";

$conn = mysqli_connect($servername,$username,$password,$dbname);
if($_POST)
{
    $login_name=$_POST["admin_name"];
    $id = $_POST['empid'];
    $type = $_POST['type'];
    $lfrom = $_POST['lfrom'];
    $lto = $_POST['lto'];
    $total = $_POST['total'];
	$Leave_from_yr = $_POST['Leave_from_yr'];
	$Leave_to_yr = $_POST['Leave_to_yr'];

	$check_leave = "SELECT Leave_from, Leave_to FROM leave_form WHERE Emp_Id = $id";
	//echo "SELECT Leave_from, Leave_to FROM leave_form WHERE Emp_Id = $id <br/>";
	$result_check_leave = mysqli_query($conn, $check_leave);
	if(mysqli_num_rows($result_check_leave) > 0)
	{
		while($check_leave_row = mysqli_fetch_assoc($result_check_leave))
		{
			//echo "FROM ($lfrom) : ".$check_leave_row["Leave_from"]." TO ($lto) : ".$check_leave_row["Leave_to"]."<br/>";
			if($check_leave_row["Leave_from"] == $lto)
			{
				echo "<script>alert('Already had Leave on selected date');"
				. "window.location.href = 'leave_transaction.php?admin_name=$login_name';</script>"; 				
			}
			if($check_leave_row["Leave_to"] == $lto)
			{
				echo "<script>alert('Already had Leave on selected date');"
				. "window.location.href = 'leave_transaction.php?admin_name=$login_name';</script>";				
			}			
			if($check_leave_row["Leave_from"] == $lfrom)
			{
				echo "<script>alert('Already had Leave on selected date');"
				. "window.location.href = 'leave_transaction.php?admin_name=$login_name';</script>";				
			}
			if($check_leave_row["Leave_to"] == $lfrom)
			{
				echo "<script>alert('Already had Leave on selected date');"
				. "window.location.href = 'leave_transaction.php?admin_name=$login_name';</script>";				
			}
		}
	}
	
	$emp_name = "SELECT Employee, Year FROM leave_master WHERE Employee = $id AND Year = $Leave_from_yr";
	$result_emp = mysqli_query($conn, $emp_name);
	if(mysqli_num_rows($result_emp) > 0)
	{    
		$sql = "insert into leave_form (Emp_Id,Type_of_leave,Leave_from,Leave_to,Total) "
				. "VALUES ($id,'$type','$lfrom','$lto',$total)";
		if(mysqli_query($conn,$sql))
		{
			if($type == "CL")
			{
				$sql1 = "update leave_master set CL_Balance= CL_Balance - $total where '$type' = 'CL' and Employee = $id";
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
				$sql2 = "update leave_master set SL_Balance= SL_Balance - $total where '$type' = 'SL' and Employee = $id";
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
				$sql3 = "update leave_master set PL_Balance= PL_Balance - $total where '$type' = 'PL' and Employee = $id";
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
			echo "<script>alert('Employee Leave not added');"
			. "window.location.href = 'leave_transaction.php?admin_name=$login_name';</script>";          
		}
	}
	else
	{
		echo "<script>alert('Employee Leave Details not exists!! Please add first');"
		. "window.location.href = 'leave_balance.php?admin_name=$login_name';</script>";
	}
}    
    