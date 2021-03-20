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
    $IssueQuantityId = $_POST['IssueQuantityId'];
    $itemCode = $_POST['itemCode'];
    $itemtype = $_POST['itemtype'];
    $description = $_POST['description'];
    $issueDate = $_POST['issueDate'];
    $issueQuantity = $_POST['issueQuantity'];
    $uom = $_POST['uom'];
    $rate = $_POST['rate'];
    $value = $issueQuantity*$rate;
    
    $sql = "SELECT * FROM item_master where Item_Code = $itemCode";
    if ($result = mysqli_query($conn, $sql))
    {
      // Fetch one and one row
      while ($row = mysqli_fetch_assoc($result)) 
      { 
          $availableStock = $row["Available_Stock"];
          $itemrate = $row["Rate"];
          $stock = $availableStock-$issueQuantity;
          $itemValue = $stock*$itemrate;
      }
      
    }
    
$sql="Update issue_stock Set Item_Code='$itemCode', Item_Type='$itemtype', "
        . "Item_Description='$description', Issue_Date='$issueDate', Issue_Quantity='$issueQuantity', "
        . "Uom='$uom', Rate='$rate', Value='$value' "
        . "where Issue_Quantity_Id='$IssueQuantityId'";
        
$update = "Update item_master Set Available_Stock='$stock', Value='$itemValue'"
        . "where Item_Code='$itemCode'";

if(mysqli_query($conn,$sql) && mysqli_query($conn, $update))
{
     header("Location: department-issueStock.php?admin_name=$login_name");
}
else
{
    echo "<script>alert('Stock Details Not Updated');window.location.href = 'department-issueStock.php?admin_name=$login_name';</script>";
}
mysqli_close($conn);
//header("Location:display.php");
}
?>