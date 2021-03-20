<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hospital_management_system";

$conn = mysqli_connect($servername,$username,$password,$dbname);
if($_POST)
{
    $login_name = $_POST['admin_name'];
    $medicine_name = $_POST['medicine_name'];
    $mdate = $_POST['mdate'];
    $edate = $_POST['edate'];
    $medicine_batchno = $_POST['medicine_batchno'];
    $medicine_quantity = $_POST['medicine_quantity'];
    $medicine_price = $_POST['medicine_price'];
    $total_price = $medicine_price * $medicine_quantity;
 
    $sql = "insert into Medicine (Medicine_Name, manufacture_Date, Expiry_Date, Batch_no, "
            . "Quantity, Price, Total_Price) "
            . "VALUES ('$medicine_name','$mdate','$edate','$medicine_batchno',"
            . "$medicine_quantity,$medicine_price,$total_price)";
    if(mysqli_query($conn,$sql))
    {
        header("Location:medical_expiry_report.php?admin_name=$login_name");
    }
    else 
    {
       echo "<script>alert('Medicine Details Not Inserted');"
        . "window.location.href = 'medical_expiry_report.php?admin_name=$login_name';</script>";          
    }    
}