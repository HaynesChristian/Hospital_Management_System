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

    $sql="DELETE from lab_test_data where Patient_Test_Id=$patient_test_id";
    if(mysqli_query($conn,$sql))
    {
        header("Location:lab_test_data.php?admin_name=$login_name&patient_id=$patientid&treatment_id=$treatment_id");
    }
    else
    {
        echo "<script>alert(Lab Test not Deleted');"
        . "window.location.href = 'lab_test_data.php?admin_name=$login_name&patient_id=$patientid&treatment_id=$treatment_id';</script>";
    }
}  