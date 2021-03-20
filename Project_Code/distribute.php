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
    $itemCode = $_POST['itemCode'];
    $distributeDate = date("Y-m-d");
    $distributeQty = $_POST['distributeQty'];
    $itemReceiver = $_POST['itemReceiver'];
    $itemReceiverType = $_POST['itemReceiverType'];
    

$insert = "INSERT INTO distribution_of_item value(Distribution_Id,'$itemCode','$distributeDate','$distributeQty',"
        . "'$itemReceiver','$itemReceiverType')";
if(mysqli_query($conn, $insert))
{
     header("Location: department-distribution.php?admin_name=$login_name");
}
 else 
{
     echo "<script>alert('Distribution Details Not Save');window.location.href = 'department-distribution.php?admin_name=$login_name';</script>";
}
}