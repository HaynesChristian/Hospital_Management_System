<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hospital_management_system";

$conn = mysqli_connect($servername,$username,$password,$dbname);
if($_POST)
{
$act=$_POST['eid'];
$mcode=$_POST['mcode'];
$working=$_POST['working'];
$attendance=$_POST['attendance'];
$leaves=$_POST['leaves'];






$sql="Update attendance set Month_code='$mcode', Working_Days=$working, "
        . "Present_Days=$attendance,Leave_Days=$leaves  where Emp_Id=$act";
if(mysqli_query($conn,$sql))
  {
          echo  "Record Update Successfull";
       }
 else 
     {
    echo "Record not Updated";    
}
mysqli_close($conn);
//header("Location:attendance_balance.php");
}