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
    $itemCode = $_POST['ItemName'];
    $itemType = $_POST['itemType'];
    $itemDesc = $_POST['itemDesc'];
    $currentDate =  date("Y-m-d");
    $issueQty = $_POST['issueQty'];
    $uom = $_POST['uom'];
    $rate = $_POST['rate'];
    $value = $issueQty*$rate;
 
    $sql = "SELECT * FROM item_master where Item_Code = $itemCode";
    if ($result = mysqli_query($conn, $sql))
    {
      // Fetch one and one row
      while ($row = mysqli_fetch_assoc($result)) 
      { 
          $availableStock = $row["Available_Stock"];
          $itemrate = $row["Rate"];
          $stock = $availableStock-$issueQty;
          $itemValue = $stock*$itemrate;
      }
      
    }

$insert = "INSERT INTO issue_stock value(Issue_Quantity_Id,'$itemCode', "
        . "'$itemType','$itemDesc','$currentDate','$issueQty','$uom',"
        . "'$rate','$value')";
$update = "Update item_master Set Available_Stock='$stock', Value='$itemValue'"
        . "where Item_Code='$itemCode'";
if(mysqli_query($conn, $insert) && mysqli_query($conn, $update))
{
      header("Location: department-issueStock.php?admin_name=$login_name");
}
 else 
{
    echo "<script>alert('Stock Details Not Save');window.location.href = 'department-issueStock.php?admin_name=$login_name';</script>";
}
}