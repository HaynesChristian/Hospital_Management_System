<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hospital_management_system";

$conn = mysqli_connect($servername,$username,$password,$dbname);

if($_POST)
{
    $login_name = $_POST['admin_name'];
    $agency_name = $_POST['agency_name'];
    $dispatch_date = $_POST['dispatch_date'];
    $red_quantity = $_POST['red_quantity'];
    $yellow_quantity = $_POST['yellow_quantity'];
    $white_quantity = $_POST['white_quantity'];
    $blue_quantity = $_POST['blue_quantity'];
    
    $Total_Quantity = $red_quantity + $yellow_quantity + $white_quantity + $blue_quantity;
    
    $sql = "insert into biowaste_dispach (Biowaste_dispach_agency_name,Biowaste_dispach_date,"
            . "Red_Quantity,Yellow_Quantity,White_Quantity,Blue_Quantity,Total_Quantity) "
            . "VALUES ('$agency_name','$dispatch_date',$red_quantity,"
            . "$yellow_quantity,$white_quantity,$blue_quantity,$Total_Quantity)";
    
    if(mysqli_query($conn,$sql))
    {
        header("Location: biowaste_report.php?admin_name=$login_name");
    }
    else 
    {
       echo "<script>alert('Biowaste Dispatch Details Not Inserted');"
        . "window.location.href = 'biowaste_report.php?admin_name=$login_name';</script>";          
    }
    
}
               
