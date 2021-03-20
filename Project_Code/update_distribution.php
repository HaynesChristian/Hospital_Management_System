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
    $DistributionId = $_POST['DistributionId'];
    $itemCode = $_POST['itemCode'];
    $distributionDate = $_POST['distributionDate'];
    $distributionQuantity = $_POST['distributionQuantity'];
    $itemReceiver = $_POST['itemReceiver'];
    $itemReceiverType = $_POST['itemReceiverType'];
    
    
$sql="Update distribution_of_item Set Item_Code='$itemCode', Distribution_Date='$distributionDate', "
        . "Distribution_Quantity='$distributionQuantity', Item_Receiver='$itemReceiver', "
        . "Item_Receiver_Type='$itemReceiverType' "
        . "where Distribution_Id='$DistributionId'";
        

if(mysqli_query($conn,$sql))
{
     header("Location: department-distribution.php?admin_name=$login_name");
}
else
{
   echo "<script>alert('Distribution Details Not Updated');window.location.href = 'department-distribution.php?admin_name=$login_name';</script>";
}
mysqli_close($conn);
//header("Location:display.php");
}
?>