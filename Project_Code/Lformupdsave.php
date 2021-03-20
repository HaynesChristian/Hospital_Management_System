<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hospital_management_system";

$conn = mysqli_connect($servername,$username,$password,$dbname);
if ($_POST)
{
    $login_name=$_POST["admin_name"];
    $id = $_POST['id'];
	$leave_id = $_POST['leave_id'];
    $type = $_POST['type'];
    $lfrom = $_POST['lfrom'];
    $lto = $_POST['lto'];
    $newtotal = $_POST['total'];
	$previous_total = $_POST['previous_total'];	
	$total = $previous_total - $newtotal;
	
	$sql = "Update leave_form SET Type_of_leave='$type',Leave_from='$lfrom',Leave_to='$lto',Total=$newtotal WHERE Leave_id = $leave_id";
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
?>
<?php
/*if ($_POST)
{
    $login_name=$_POST["admin_name"];
    $act = $_POST['id'];
    $lmonth = $_POST['lmonth'];
    $type = $_POST['type'];
    $lfrom = $_POST['lfrom'];
    $lto = $_POST['lto'];
    $total = $_POST['total'];
   
    $convert_date = strtotime($lfrom);
    $day = date('j',$convert_date);
    echo $day."<br>";
    $convert_date1 = strtotime($lto);
    $day1 = date('j',$convert_date1);
    echo $day1."<br>";
    $diff = ($day1 - $day) +1;
    echo $diff;

$sql="Update leave_form set Emp_Id=$act,Month_code='$lmonth',Type_of_leave='$type',Leave_from='$lfrom',Leave_to='$lto',Total=$total where Emp_Id=$act";
if (mysqli_query($conn,$sql))
{
    echo  "Record Update Successfull";
}
else
{
    echo 'not updated';
}
$sql1 = "update leave_master set CL_Balance= CL_Balance - $diff where '$type' = 'CL' and Employee = $act";
    if(mysqli_query($conn,$sql1))
    {
        echo "CL Updated"."<br>";
    }
    else 
    {
        echo "CL not Updated"."<br>";          
    }
    $sql2 = "update leave_master set SL_Balance= SL_Balance - $diff where '$type' = 'SL' and Employee = $act";
    if(mysqli_query($conn,$sql2))
    {
        echo "SL Updated"."<br>";
    }
    else 
    {
        echo "SL not Updated"."<br>";          
    }
    $sql3 = "update leave_master set PL_Balance= PL_Balance - $diff where '$type' = 'PL' and Employee = $act";
    if(mysqli_query($conn,$sql3))
    {
        echo "PL Updated"."<br>";
    }
    else 
    {
        echo "PL not Updated"."<br>";          
    }
header("Location:leave_transaction.php?admin_name=$login_name'");
}*/
?>