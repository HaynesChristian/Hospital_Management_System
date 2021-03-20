<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hospital_management_system";

$conn = mysqli_connect($servername,$username,$password,$dbname);
if($_POST)
{
    $month = $_POST['month'];
    $count = $_POST['count'];
    $cdate = $_POST['cdate'];
    
    
    $sql = "insert into doctor_cabin_cleaning (Cleaning_Month,Cleaning_Count,Last_Cleaning_Date)"
            
            . " VALUES ('$month',$count,'$cdate')";
    if(mysqli_query($conn,$sql))
    {
            header("Location: dr_cabin_cleaning.php.php"
                    . "?admin_name=$login_name");
        }
        else
        {
            echo "<script>alert(Cleaning details not registerd');"
            . "window.location.href = 'dr_cabin_cleaning.php.php?admin_name=$login_name';</script>";
        }
    
    }
    header("Location:dr_cabin_cleaning.php");