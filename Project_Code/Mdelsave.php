<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hospital_management_system";

$conn = mysqli_connect($servername,$username,$password,$dbname);
if($_POST)
{
    $login_name = $_POST['admin_name'];
    $id = $_POST['id'];
    
    $sql="DELETE FROM Medicine WHERE Medicine_Id=$id";
    if(mysqli_query($conn,$sql))
    {
        header("Location:medical_expiry_report.php?admin_name=$login_name");
    }
    else 
    {
       echo "<script>alert('Medicine Details Not Deleted');"
        . "window.location.href = 'medical_expiry_report.php?admin_name=$login_name';</script>";          
    }    
}