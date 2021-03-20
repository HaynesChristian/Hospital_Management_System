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
    echo "connection not successful<br>";   
}
if($_POST)
{
    
    $login_name = $_POST['admin_name'];
   $itemCode = $_POST['itemCode'];
    $itemName = $_POST['itemName'];
    $itemtype = $_POST['itemtype'];
    $description = $_POST['description'];
    $stock = $_POST['stock'];
    $uom = $_POST['uom'];
    $rate = $_POST['rate'];
    $value = $stock*$rate;
    $warrantyPeriod = date("Y-m-d");
    $manufactureDate = $_POST['manufactureDate'];
    $expiryDate = $_POST['expiryDate'];
    $itemBatchId = $_POST['itemBatchId'];
 
    
$sql="Update item_master Set Item_Name='$itemName', Item_Type='$itemtype', "
        . "Item_Description='$description', Available_Stock=$stock, "
        . "Uom='$uom', Rate=$rate, Value=$value, Warranty_Period='$warrantyPeriod', "
        . "Manufacture_Date='$manufactureDate', Expiry_Date='$expiryDate', Item_Batch_Id='$itemBatchId' "
        . "where Item_Code='$itemCode'";
if(mysqli_query($conn,$sql))
{
     header("Location: department-stock.php?admin_name=$login_name");
}
else
{
   echo "<script>alert('Stock Details Not Updated');window.location.href = 'department-stock.php?admin_name=$login_name';</script>";
}
mysqli_close($conn);
//header("Location:display.php");
}?>