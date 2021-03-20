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
    $attendance_status = array();
    $atno=0;
    foreach ($employee_id as $key => $value1) 
    {
        if($value1 == "")
        {break;}
        array_push($attendance_status, $_POST["attendance_status$atno"]);
		$atno++;
    }	
    
    /*$sql = "insert into attendance_tran (Employee_Id,Month_code,Att_date,Att_status) "
            . "VALUES ($empid,'$smonth','$attdate','$status')";*/
	$qry_st = 0;
	foreach ($employee_id as $key => $value)
	{
		$emp_atd = "INSERT INTO attendance_tran (Employee_Id,Att_date,Att_status) "
		."VALUES ($employee_id[$key],'$attdate','$attendance_status[$key]')";
        if(mysqli_query($connection, $emp_atd))
        {
            $qry_st = 0;
            echo "<br>$qry_st<br>";
        }
        else
        {
            $qry_st = 1;
            echo "<br>$qry_st<br>";
            break;
        }		
	}	
    if($qry_st == 0)
    {
        header("Location:index.php?admin_name=$login_name");
    }
    else
    {
        echo "<script>alert(Employee Attendance not marked');"
        . "window.location.href = 'index.php?admin_name=$login_name';</script>";
    }
}