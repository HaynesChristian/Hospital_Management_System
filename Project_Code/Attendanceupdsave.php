<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hospital_management_system";

$conn = mysqli_connect($servername,$username,$password,$dbname);

if ($_POST)
{
    $login_name=$_POST["admin_name"];
    $act = $_POST['empid'];
    $smonth = $_POST['smonth'];
    $attdate = $_POST['attdate'];
    $status = $_POST['status'];
    
    $sql="Update attendance_tran set Month_code='$smonth',Att_date='$attdate',Att_status='$status' where Att_date=$act ";
if(mysqli_query($conn,$sql))
    {
            header("Location:regular_attendance_update.php?admin_name=$login_name");
        }
        else
        {
            echo "<script>alert(Attendance not Updated');"
            . "window.location.href = 'regular_attendance_update.php?admin_name=$login_name';</script>";
        }
    }