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
$sql="Update laboratory_cleaning set Cleaning_Month='$month', Cleaning_Year=$cyear, Cleaning_Count=$count, Last_Cleaning_Date='$cdate' "
        . "where Laboratory_Cleaning_Id=$act";
if(mysqli_query($conn,$sql))
  {
          echo  "Record Update Successfull";
       }
 else 
     {
    echo "Record not Updated";    
}
mysqli_close($conn);
header("Location:laboratorydisplay.php");
?>