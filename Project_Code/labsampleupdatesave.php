<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hospital_management_system";

$conn = mysqli_connect($servername,$username,$password,$dbname);

if($_POST)
{
$login_name=$_POST["admin_name"];
$Test_id=$_POST['Test_id'];
$test_type = $_POST['test_type'];
$description=$_POST['description'];
$testcharges=$_POST['testcharges'];

echo $description;

$sql="Update lab_master set Test_Description='$description', Test_Charges=$testcharges where Test_Id=$Test_id";
$ltd="Update lab_test_data set Test_Description='$test_type : $testdescription' where Test_Id=$Test_id";

if(mysqli_query($conn,$sql) && mysqli_query($conn,$ltd))
    {
            header("Location:laboratory_test.php?admin_name=$login_name");
        }
        else
        {
            echo "<script>alert(Lab Test not Updated');"
            . "window.location.href = 'laboratory_test.php?admin_name=$login_name';</script>";
        }
}