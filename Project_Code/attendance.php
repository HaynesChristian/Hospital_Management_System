<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hospital_management_system";

$conn = mysqli_connect($servername,$username,$password,$dbname);
if($_POST)
{
	$login_name=$_POST["admin_name"];
    $eid = $_POST['eid'];
    $mcode = $_POST['mcode'];
    $working = $_POST['working'];
    
    $displaydata1 = "select * from attendance_tran where Employee_Id = $eid AND Att_status='Present' AND Att_date LIKE '$mcode%'";
	//echo "select * from attendance_tran where Employee_Id = $eid AND Att_status='Present' AND Att_date LIKE '$mcode%' <br>";
	$result = mysqli_query($conn, $displaydata1);
	$attendance = 0;
    if(mysqli_num_rows($result)>0)
    {
        while ($row = mysqli_fetch_assoc($result))
        {
            $attendance++;
        }    
    }
        
	$displaydata2 = "select * from leave_form where Emp_Id = $eid and Leave_from LIKE 'a%$mcode' and Type_of_leave ='CL' or Type_of_leave ='SL' or Type_of_leave ='PL'";
	//echo "select * from leave_form where Emp_Id = $eid and Leave_from LIKE 'a%$mcode' and Type_of_leave ='CL' or Type_of_leave ='SL' or Type_of_leave ='PL' <br>";
	$result = mysqli_query($conn, $displaydata2);
	$leaves = 0;
    if(mysqli_num_rows($result)>0)
    {
        while ($row = mysqli_fetch_assoc($result))
        {
            $leaves =  $row['Total'];
        }    
    }
    
    /*echo $eid."<br>";
    echo $mcode."<br>";
    echo $working."<br>";
    echo $attendance."<br>";
    echo $leaves."<br>";*/
	
    $sql = "insert into attendance (Emp_Id,Month_code,Working_Days,Present_Days,Leave_Days) "
            . "VALUES ($eid,'$mcode',$working,$attendance,$leaves)";
    if(mysqli_query($conn,$sql))
    {
        header("Location:attendance_balance.php?admin_name=$login_name");
    }
    else
    {
        echo "<script>alert(Attendance Calculation not Inserted');"
        . "window.location.href = 'attendance_balance.php?admin_name=$login_name';</script>";
    }
}
