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
    $purchaseId = $_POST['PurchaseId'];
    $itemName = $_POST['itemName'];
    $supplierId = $_POST['supplierId'];
    $purchaseDate = $_POST['purchaseDate'];
    $purchaseQty = $_POST['purchaseQty'];
    $description = $_POST['description'];
    $unitPrice = $_POST['unitPrice'];
    $totalAmount = $purchaseQty*$unitPrice;
    
    $sql="DELETE FROM purchase_order WHERE Purchase_Id='$purchaseId'";

if(mysqli_query($conn,$sql))
{
     header("Location: department-purchaseOrder.php?admin_name=$login_name");
}
else
{
   echo "<script>alert('Purchase Details Not Deleted');window.location.href = 'department-purchaseOrder.php?admin_name=$login_name';</script>";
}
mysqli_close($conn);
//header("Location:display.php");
}
?>