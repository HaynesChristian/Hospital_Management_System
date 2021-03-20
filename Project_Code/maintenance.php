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
    $maintenanceDate = date("Y-m-d");
    $statusOfItem = $_POST['statusOfItem'];
    $depreciationRate = $_POST['depreciationRate'];
    
    $sql = "SELECT * FROM item_master where Item_Code = $itemCode";
    
    if ($result = mysqli_query($conn, $sql))
    {
      // Fetch one and one row
      while ($row = mysqli_fetch_assoc($result)) 
      {
          
          $value = $row["Value"];
         
      }
    }
    $amount = ($value*$depreciationRate)/100;
    $afterDepreciationAmount = $value - $amount;
    

$insert = "INSERT INTO maintenance_of_item value(Maintenance_Id,'$itemCode','$maintenanceDate','$statusOfItem',"
        . "'$depreciationRate','$afterDepreciationAmount')";
if(mysqli_query($conn, $insert))
{
     header("Location: department-maintenance.php?admin_name=$login_name");
}
 else 
{
     echo "<script>alert('Maintenance Details Not Save');window.location.href = 'department-maintenance.php?admin_name=$login_name';</script>";
}
}