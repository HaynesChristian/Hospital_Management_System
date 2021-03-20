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
$patientid=$_POST['patientid'];
$testdate=$_POST['testdate'];
$description=$_POST['description'];
$testcharges=$_POST['testcharges'];
$teststatus=$_POST['teststatus'];
echo $testdate;

echo $description;
echo $testcharges;
echo $teststatus;
$sql="delete from lab_test_data where Patient_Id=$patientid";
mysqli_query($conn,$sql);
echo  "Record Deleted Successfull";
mysqli_close($conn);
header("Location:testdatadisplay.php");
?>