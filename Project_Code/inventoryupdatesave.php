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

$act=$_POST['save'];
$batch=$_POST['batch'];
$ldate=$_POST['ldate'];
$ndate=$_POST['ndate'];

echo $month;
echo $act;
$sql="Update inventory_cleaning set Inventory_Batch_Id='$batch',Last_Cleaning_Date='$ldate',Next_Cleaning_Date='$ndate'"
        . "where Inventory_CLeaning_Id=$act";
mysqli_query($conn,$sql);
echo  "Record Update Successfull";
mysqli_close($conn);
header("Location:inventorydisplay.php");
?>