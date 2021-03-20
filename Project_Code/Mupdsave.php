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
    $medicine_name = $_POST['medicine_name'];
    $mdate = $_POST['mdate'];
    $edate = $_POST['edate'];
    $medicine_batchno = $_POST['medicine_batchno'];
    $medicine_quantity = $_POST['medicine_quantity'];
    $medicine_price = $_POST['medicine_price'];
    $total_price = $medicine_price * $medicine_quantity;
    
    $sql="Update Medicine set Medicine_Name='$medicine_name',manufacture_Date='$mdate',"
            . "Expiry_Date='$edate',Batch_no = '$medicine_batchno',"
            . "Quantity=$medicine_quantity,Price=$medicine_price,Total_Price=$total_price "
            . "where Medicine_Id=$id";
    if(mysqli_query($conn,$sql))
    {
        header("Location:medical_expiry_report.php?admin_name=$login_name");
    }
    else 
    {
       echo "<script>alert('Medicine Details Not Updated');"
        . "window.location.href = 'medical_expiry_report.php?admin_name=$login_name';</script>";          
    }    
}