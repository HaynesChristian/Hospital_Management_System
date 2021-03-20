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
    $itemname = $_POST['itemName'];
    $type = $_POST['type'];
    $suppliername = $_POST['supplierName'];
    
  

$insert = "INSERT INTO item value(Item_Code,'$itemname','$type','$suppliername')";
if(mysqli_query($conn, $insert))
{
      header("Location: department-item.php?admin_name=$login_name");
}
 else 
{
    echo "<script>alert('New Item Not Save');window.location.href = 'department-item.php?admin_name=$login_name';</script>";
}
}