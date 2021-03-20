<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hospital_management_system";

$conn = mysqli_connect($servername,$username,$password,$dbname);
if($_POST)
{
    $login_name = $_POST['admin_name'];
    $id = $_POST['id'];

    $sql="DELETE FROM Electricity_bill WHERE Electricity_bill_id=$id";
    if(mysqli_query($conn,$sql))
    {
        header("Location: Electricity_bill.php?admin_name=$login_name");
    }
    else
    {
        echo "<script>alert('Record not Inserted');"
        . "window.location.href = 'Electricity_bill.php?admin_name=$login_name';</script>";
    }
}
?>
