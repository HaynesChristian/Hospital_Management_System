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
    $Qty = $_POST['Qty'];
    $unitPrice = $_POST['unitPrice'];
    $demolitionAmount = $Qty*$unitPrice;
    $demolitionDate = date("Y-m-d");
    $demolitionReason = $_POST['demolitionReason'];
    $description = $_POST['description'];
   

$insert = "INSERT INTO demolition_item value(Demolition_Item_Id,'$itemCode','$Qty','$unitPrice','$demolitionAmount', "
        . "'$demolitionDate','$demolitionReason','$description')";
if(mysqli_query($conn, $insert))
{
     header("Location: department-demolition.php?admin_name=$login_name");
}
 else 
{
     echo "<script>alert('Demolition Details Not Save');window.location.href = 'department-demolition.php?admin_name=$login_name';</script>";
}
}