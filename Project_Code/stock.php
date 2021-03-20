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
     $itemname = $_POST['ItemName'];
    $itemType = $_POST['itemType'];
    $itemDesc = $_POST['itemDesc'];
    $availableStock = $_POST['availableStock'];
    $uom = $_POST['uom'];
    $rate = $_POST['rate'];
    $value = $rate*$availableStock;
    $warrantyPeriod = date("Y-m-d");
    $manufacturerDate = $_POST['manufacturerDate'];
    $expiryDate = $_POST['expiryDate'];
    $itemBatchId = $_POST['itemBatchId'];
    

$insert = "INSERT INTO item_master value(Item_Code,'$itemname','$itemType','$itemDesc','$availableStock', "
        . "'$uom','$rate','$value','$warrantyPeriod', '$manufacturerDate', '$expiryDate', '$itemBatchId')";
if(mysqli_query($conn, $insert))
{
      header("Location: department-stock.php?admin_name=$login_name");
}
 else 
{
   echo "<script>alert('Item Details Not Save');window.location.href = 'department-stock.php?admin_name=$login_name';</script>";
}
}