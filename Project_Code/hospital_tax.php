<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hospital_management_system";

$conn = mysqli_connect($servername,$username,$password,$dbname);

if($_POST)
{
    $login_name = $_POST['admin_name'];
    
    $name = $_POST['billname'];
    $amt = $_POST['amt'];
    $hpdate = $_POST['hpdate'];
    $hbdate = $_POST['hbdate'];
    
    $sql = "insert into hospital_tax (Hospital_tax_name,Hospital_tax_amount,"
            . "hospital_tax_bill_paydate,hospital_tax_bill_adddate) "
            . "VALUES ('$name',$amt,'$hpdate','$hbdate')";

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
