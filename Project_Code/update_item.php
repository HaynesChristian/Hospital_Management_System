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
    $itemType = $_POST['itemType'];    
    $supplierName = $_POST['supplierName'];
    
    
$sql="Update item Set Item_Name='$itemName', Item_Type='$itemType', Supplier_Name='$supplierName' "
        . "where Item_Code='$itemCode'";
        

if(mysqli_query($conn,$sql))
{
     header("Location: department-item.php?admin_name=$login_name");
}
else
{
  echo "<script>alert('Item Details Not Updated');window.location.href = 'department-item.php?admin_name=$login_name';</script>";
}
mysqli_close($conn);
//header("Location:display.php");
}
?>