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
    
    
    $sql = "insert into canteen_cleaning (Cleaning_Month,Cliening_Count,Last_Cleaning_Date)"
            
            . " VALUES ('$month',$count,'$cdate')";
    if(mysqli_query($conn,$sql))
    {
            header("Location: canteen_cleanig.php"
                    . "?admin_name=$login_name");
        }
        else
        {
            echo "<script>alert(Cleaning details not registerd');"
            . "window.location.href = 'canteen_cleanig.php?admin_name=$login_name';</script>";
        }
    
    }
    header("Location:canteen_cleanig.php");