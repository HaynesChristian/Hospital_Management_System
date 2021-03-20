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

$act=$_POST['save'];
$batch=$_POST['batch'];
$ldate=$_POST['ldate'];
$ndate=$_POST['ndate'];

echo $batch;
echo $act;
$sql="delete from inventory_cleaning where Inventory_CLeaning_Id=$act";
mysqli_query($conn,$sql);
echo  "Record Deleted Successfull";
mysqli_close($conn);
header("Location:inventorydisplay.php");
?>