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
    $itemCode = $_POST['itemName'];
    $supplierId = $_POST['supplierName'];
    $currentDate =  date("Y-m-d");
    $purchaseDate = $currentDate;
    $purchaseQty = $_POST['purchaseQty'];
    $description = $_POST['description'];
    $unitPrice = $_POST['unitPrice'];
    $totalAmount = $unitPrice*$purchaseQty;
    $itemtype = $_POST['itemtype'];
    

$insert = "INSERT INTO purchase_order value(purchase_id,'$itemCode','$supplierId','$purchaseDate',"
        . "'$purchaseQty','$description','$unitPrice','$totalAmount','$itemtype')";
if(mysqli_query($conn, $insert))
{
    header("Location: department-purchaseOrder.php?admin_name=$login_name");
}
 else 
{
   echo "<script>alert('Purchase Order Not Created');window.location.href = 'department-purchaseOrder.php?admin_name=$login_name';</script>";
}
}