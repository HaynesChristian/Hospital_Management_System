<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hospital_management_system";

$conn = mysqli_connect($servername,$username,$password,$dbname);
if($conn)
{
    echo "connection successful<br>";
}
 else 
{
    echo "connection not successfu<br>";   
}
if($_POST)
{
    $login_name = $_POST['admin_name'];
    $InvoiceNo = $_POST['InvoiceNo'];
    $invoiceDate = $_POST['invoiceDate'];
    $purchasaeId = $_POST['purchasaeId'];
    $unitPrice = $_POST['unitPrice'];
    
    
$sql="DELETE FROM invoice WHERE Invoice_No='$InvoiceNo'";

if(mysqli_query($conn,$sql))
{
     header("Location: department-invoice.php?admin_name=$login_name");
}
else
{
   echo "<script>alert('Distribution Details Not Deleted');window.location.href = 'department-invoice.php?admin_name=$login_name';</script>";
}
mysqli_close($conn);
//header("Location:display.php");
}
?>