<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hospital_management_system";

$conn = mysqli_connect($servername,$username,$password,$dbname);
if($_POST)
{
    $login_name=$_POST["admin_name"];
    $month = $_POST['month'];
    $count = $_POST['count'];
    $cdate = $_POST['cdate'];
    
    
    $sql = "insert into room_cleaning (Cleaning_Month,Cliening_Count,Last_Cleaning_Date)"
            
            . " VALUES ('$month',$count,'$cdate')";
    if(mysqli_query($conn,$sql))
    {
            header("Location:room_cleaning.php?admin_name=$login_name");
        }
        else
        {
            echo "<script>alert(Cleaning not Inserted');"
            . "window.location.href = 'room_cleaning.php?admin_name=$login_name';</script>";
        }
    }