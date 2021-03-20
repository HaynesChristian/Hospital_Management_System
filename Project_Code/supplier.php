<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hospital_management_system";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
if($_POST)
{
    $login_name = $_POST['admin_name'];
    $name = $_POST['name'];
    $mail = $_POST['mail'];
    $mobile = $_POST['mobile'];
    $address = $_POST['address'];
    $type = $_POST['type'];
    $gstno = $_POST['gstno'];
    $accountNo = $_POST['accountNo'];
    $ifscCode = $_POST['ifscCode'];
    $accountHolderName = $_POST['accountHolderName'];
    $addedDate = date("Y-m-d");
    
    
  

$insert = "INSERT INTO supplier_master value(supplier_id,'$name','$mail','$mobile','$address','$type','$gstno','$accountNo','$ifscCode','$accountHolderName','$addedDate')";
if(mysqli_query($conn, $insert))
{
      header("Location: department-supplier.php?admin_name=$login_name");
}
 else 
{
    echo "<script>alert('Supplier Details Not Save');window.location.href = 'department-supplier.php?admin_name=$login_name';</script>";
}
}