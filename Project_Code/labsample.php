<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hospital_management_system";

$conn = mysqli_connect($servername,$username,$password,$dbname);

if($_POST)
{
    $login_name=$_POST["admin_name"];
    $test_type = $_POST['test_type'];
    $description = $_POST['description'];
    $testcharges = $_POST['testcharges'];
    
    $sql = "INSERT INTO lab_master (Test_Type,Test_Description,Test_Charges) "
            . "VALUES ('$test_type','$description',$testcharges)";
    if(mysqli_query($conn,$sql))
    {
            header("Location: laboratory_test.php?admin_name=$login_name");
        }
        else
        {
            echo "<script>alert(Lab Test not Inserted');"
            . "window.location.href = 'laboratory_test.php?admin_name=$login_name';</script>";
        }
    }