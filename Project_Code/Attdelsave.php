<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hospital_management_system";

$conn = mysqli_connect($servername,$username,$password,$dbname);
   
    $id = $_POST['id'];
    $code = $_POST['code'];
    $adate = $_POST['adate'];
    $status = $_POST['status'];
    
$sql="DELETE FROM attendance_tran WHERE Employee_Id=$id";
mysqli_query($conn,$sql);
echo  "Record Delete Successfull";
mysqli_close($conn);
header("Location:attendance_delete.php");
?>