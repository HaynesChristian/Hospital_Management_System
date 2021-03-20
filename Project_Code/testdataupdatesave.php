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
$sql="Update lab_test_data set Test_Date='$testdate',Test_Description='$description',Test_Charges=$testcharges,Test_Status='$teststatus' where Patient_Id=$patientid";

//$sql="Update lab_master set Test_Description='$description',Test_Charges=$testcharges where Test_Id=$act";
mysqli_query($conn,$sql);
echo  "Record Updated Successfull";
mysqli_close($conn);
header("Location:testdatadisplay.php");
?>