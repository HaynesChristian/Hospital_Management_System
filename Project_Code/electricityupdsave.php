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
    $amt = $_POST['amt'];
    $ebadate = $_POST['ebadate'];
    $ebpdate = $_POST['ebpdate'];
    

    $sql="Update electricity_bill set "
            . "Electricity_bill_amount=$amt, Electricity_bill_paydate='$ebpdate',"
            . "Electricity_bill_adddate='$ebadate' where Electricity_bill_id=$id";
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