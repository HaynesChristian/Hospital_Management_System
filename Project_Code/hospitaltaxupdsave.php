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
    $name = $_POST['name'];
    $amt = $_POST['amt'];
    $hpdate = $_POST['hpdate'];
    $hbdate = $_POST['hbdate'];
    
    $sql="Update hospital_tax set Hospital_tax_name='$name',"
            . "Hospital_tax_amount=$amt,hospital_tax_bill_paydate='$hpdate',hospital_tax_bill_adddate='$hbdate'"
            . " where Hospital_tax_id=$id";
    if(mysqli_query($conn,$sql))
    {
        header("Location: hospital_tax_bill.php?admin_name=$login_name");
    }
    else
    {
        echo "<script>alert('Record not Inserted');"
        . "window.location.href = 'hospital_tax_bill.php?admin_name=$login_name';</script>";
    }    
}


