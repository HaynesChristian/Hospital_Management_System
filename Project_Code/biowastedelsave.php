<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hospital_management_system";

$conn = mysqli_connect($servername,$username,$password,$dbname);
{
    $login_name = $_POST['admin_name'];
    $biowaste_id = $_POST['biowaste_id'];
    
    $sql = "DELETE FROM biowaste_dispach WHERE Biowaste_dispach_id = $biowaste_id";
    
    if(mysqli_query($conn,$sql))
    {
        header("Location: biowaste_report.php?admin_name=$login_name");
    }
    else 
    {
       echo "<script>alert('Biowaste Dispatch Details Not Deleted');"
        . "window.location.href = 'biowaste_report.php?admin_name=$login_name';</script>";          
    }
    
}