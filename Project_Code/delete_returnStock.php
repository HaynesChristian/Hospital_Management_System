<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hospital_management_system";

$conn = mysqli_connect($servername,$username,$password,$dbname);
if($conn)
{
    echo "connection successful<br>";
}
 else 
{
    echo "connection not successfu<br>";   
}
if($_POST)
{
    $login_name = $_POST['admin_name'];
    $ReturnQuantityId = $_POST['ReturnQuantityId'];
    $itemCode = $_POST['itemCode'];
    $itemtype = $_POST['itemtype'];
    $description = $_POST['description'];
    $returnDate = $_POST['returnDate'];
    $returnQuantity = $_POST['returnQuantity'];
    $uom = $_POST['uom'];
    $rate = $_POST['rate'];
    $value = $returnQuantity*$rate;
    
    $sql = "SELECT * FROM item_master where Item_Code = $itemCode";
    if ($result = mysqli_query($conn, $sql))
    {
      // Fetch one and one row
      while ($row = mysqli_fetch_assoc($result)) 
      { 
          $availableStock = $row["Available_Stock"];
          $itemrate = $row["Rate"];
          $stock = $availableStock+$returnQuantity;
          $itemValue = $stock*$itemrate;
      }
      
    }
    
$sql="DELETE FROM return_stock WHERE Return_Quantity_Id='$ReturnQuantityId'";

if(mysqli_query($conn,$sql) && mysqli_query($conn, $update))
{
     header("Location: department-returnStock.php?admin_name=$login_name");
}
else
{
    echo "<script>alert('Stock Details Not Deleted');window.location.href = 'department-returnStock.php?admin_name=$login_name';</script>";
}
mysqli_close($conn);
//header("Location:display.php");
}
?>