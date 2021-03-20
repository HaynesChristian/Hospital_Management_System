<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hospital_management_system";

$conn = mysqli_connect($servername,$username,$password,$dbname);

if($_POST)
{
    $login_name = $_POST['admin_name'];
    $amt = $_POST['amt'];
    $ebadate = $_POST['ebadate'];
    $ebpdate = $_POST['ebpdate'];
    
    $sql = "insert into electricity_bill (Electricity_bill_amount,Electricity_bill_paydate,Electricity_bill_adddate) "
            . "VALUES ($amt,'$ebpdate','$ebadate')";
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

   
   