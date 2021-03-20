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
    $MaintenanceId = $_POST['MaintenanceId'];
    $itemCode = $_POST['itemCode'];
    $maintenanceDate = $_POST['maintenanceDate'];
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
    
$sql="Update maintenance_of_item Set Item_Code='$itemCode', Maintenance_Date='$maintenanceDate', "
        . "Status_Of_Item='$statusOfItem', Depreciation_Rate='$depreciationRate', "
        . "After_Depreciation_Amount='$afterDepreciationAmount' "
        . "where Maintenance_Id='$MaintenanceId'";
        

if(mysqli_query($conn,$sql))
{
     header("Location: department-maintenance.php?admin_name=$login_name");
}
else
{
   echo "<script>alert('Maintenance Details Not Updated');window.location.href = 'department-maintenance.php?admin_name=$login_name';</script>";
}
mysqli_close($conn);
//header("Location:display.php");
}
?>