<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hospital_management_system";

$conn = mysqli_connect($servername,$username,$password,$dbname);
{
    $login_name = $_POST['admin_name'];
    $biowaste_id = $_POST['biowaste_id'];
    $agency_name = $_POST['agency_name'];
    $dispatch_date = $_POST['dispatch_date'];
    $red_quantity = $_POST['red_quantity'];
    $yellow_quantity = $_POST['yellow_quantity'];
    $white_quantity = $_POST['white_quantity'];
    $blue_quantity = $_POST['blue_quantity'];
    
    $Total_Quantity = $red_quantity + $yellow_quantity + $white_quantity + $blue_quantity;
    
    $sql = "UPDATE biowaste_dispach SET Biowaste_dispach_agency_name = '$agency_name' , "
            . "Biowaste_dispach_date = '$dispatch_date', "
            . "Red_Quantity = $red_quantity , Yellow_Quantity = $yellow_quantity , "
            . "White_Quantity = $white_quantity , Blue_Quantity = $blue_quantity , Total_Quantity = $Total_Quantity "
            . "WHERE Biowaste_dispach_id = $biowaste_id";
    
    if(mysqli_query($conn,$sql))
    {
        header("Location: biowaste_report.php?admin_name=$login_name");
    }
    else 
    {
       echo "<script>alert('Biowaste Dispatch Details Not Updated');"
        . "window.location.href = 'biowaste_report.php?admin_name=$login_name';</script>";          
    }
    
}