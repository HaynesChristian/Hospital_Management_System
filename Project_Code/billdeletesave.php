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
$dplates=$_POST['dplates'];
$dcharges=$_POST['dcharge'];
$extra=$_POST['extra'];
$total=$_POST['total'];
echo $dplates;
echo $act;
$sql="delete from patient_canteen_bill where Bill_Id=$act";
mysqli_query($conn,$sql);
echo  "Record Deleted Successfull";
mysqli_close($conn);
header("Location:billdisplay.php");
?>