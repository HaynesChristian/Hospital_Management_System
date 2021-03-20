<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hospital_management_system";

$conn = mysqli_connect($servername,$username,$password,$dbname);

if($_POST)
{
    $login_name=$_POST["admin_name"];
    $patientid = $_POST['patientid'];
    $treatment_id = $_POST['treatment_id'];
    $patient_test_id=$_POST['patient_test_id'];
    
    $testdate=$_POST['testdate'];
    $testdescription=$_POST['testdescription'];
    $testcharegs=$_POST['testcharegs'];
    $teststatus=$_POST['teststatus'];



    $sql="Update lab_test_data set Test_Date='$testdate', Test_Description='$testdescription',"
            . "Test_Charges=$testcharegs ,Test_Status='$teststatus' where Patient_Test_Id=$patient_test_id";

    if(mysqli_query($conn,$sql))
    {
        header("Location:lab_test_data.php?admin_name=$login_name&patient_id=$patientid&treatment_id=$treatment_id");
    }
    else
    {
        echo "<script>alert(Lab Test Details not Updated');"
        . "window.location.href = 'lab_test_data.php?admin_name=$login_name&patient_id=$patientid&treatment_id=$treatment_id';</script>";
    }
}