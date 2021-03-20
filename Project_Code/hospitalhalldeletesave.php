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
$month=$_POST['month'];
$cyear=$_POST['cyear'];
$count=$_POST['count'];
$cdate=$_POST['cdate'];
echo $month;
echo $act;
$sql="delete from hospitalhall_cleaning where Hospital_Cleaning_Id=$act";
mysqli_query($conn,$sql);
echo  "Record Deleted Successfull";
mysqli_close($conn);
header("Location:hospitalhalldisplay.php");
?>