<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hospithospital_management_systemal";

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
$sql="delete from room_cleaning where Room_Cleaning_Id=$act";
mysqli_query($conn,$sql);
echo  "Record Deleted Successfull";
mysqli_close($conn);
header("Location:roomcleaningdisplay.php");
?>