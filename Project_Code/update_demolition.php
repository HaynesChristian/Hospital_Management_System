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
    $DemolitionItemId = $_POST['DemolitionItemId'];
    $itemCode = $_POST['itemCode'];
    $QuantityOfDemolition = $_POST['QuantityOfDemolition'];
    $UnitPrice = $_POST['UnitPrice'];
    $TotalDemolitionAmount = $QuantityOfDemolition*$UnitPrice;
    $DateOfDemolition = $_POST['DateOfDemolition'];
    $ReasonOfDemolition = $_POST['ReasonOfDemolition'];
    $Description = $_POST['Description'];
    
$sql="Update demolition_item Set Item_Code='$itemCode', Quantity_Of_Demolition='$QuantityOfDemolition', "
        . "Unit_Price='$UnitPrice', Total_Demolition_Amount='$TotalDemolitionAmount', "
        . "Date_Of_Demolition='$DateOfDemolition', Reason_Of_Demolition='$ReasonOfDemolition', "
        . "Description='$Description' "
        . "where Demolition_Item_Id='$DemolitionItemId'";
        

if(mysqli_query($conn,$sql))
{
     header("Location: department-demolition.php?admin_name=$login_name");
}
else
{
   echo "<script>alert('Demolition Details Not Updated');window.location.href = 'department-demolition.php?admin_name=$login_name';</script>";
}
mysqli_close($conn);
//header("Location:display.php");
}
?>