<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hospital_management_system";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
if($_POST)
{
    
    $itemCode = $_POST['itemCode'];
    $deductionDate = date("Y-m-d");
    $date = date_default_timezone_set('Asia/Kolkata');
    $deductionTime = date("h:i:sa");
    $deductionQuantity = $_POST['deductionQuantity'];
    $sql = "SELECT * FROM purchase_order where Item_Code = $itemCode";
    
    if ($result = mysqli_query($conn, $sql))
    {
      // Fetch one and one row
      while ($row = mysqli_fetch_assoc($result)) 
      {
          
          $unitPrice = $row["Unit_Price"];
         
      }
    }
    $totalAmount = $deductionQuantity*$unitPrice;
    
}
$insert = "INSERT INTO item_deduction value(Item_Deduction_Id,'$deductionQuantity',"
        . "'$unitPrice','$totalAmount')";
$insert1 = "INSERT INTO deduction_key value(Item_Deduction_Id,'$itemCode',"
        . "'$deductionDate','$deductionTime')";
if(mysqli_query($conn, $insert) && mysqli_query($conn, $insert1))
{
     //header("Location: department-distribution.php");
}
 else 
{
     //echo "<script>alert('Distribution Details Not Save');window.location.href = 'department-distribution.php';</script>";
}