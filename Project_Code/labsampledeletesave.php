<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hospital_management_system";

$conn = mysqli_connect($servername,$username,$password,$dbname);
if($_POST)
{
    $login_name=$_POST["admin_name"];
    $act=$_POST['testid'];
    $description=$_POST['description'];
    $testcharges=$_POST['testcharges'];

    $sql="delete from lab_master where Test_Id='$act'";

    if(mysqli_query($conn,$sql))
        {
                header("Location:laboratory_test.php?admin_name=$login_name");
            }
            else
            {
                echo "<script>alert(Lab Test not Deleted');"
                . "window.location.href = 'laboratory_test.php?admin_name=$login_name';</script>";
            }
}  