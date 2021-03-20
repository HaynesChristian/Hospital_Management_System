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
    $Supplier_Id = $_POST['Supplier_Id'];
    $name = $_POST['name'];
    $emailid = $_POST['emailid'];
    $mobile = $_POST['mobile'];
    $address = $_POST['address'];
    $type = $_POST['type'];
    $gstno = $_POST['gstno'];
    $accno = $_POST['accno'];
    $ifscCode = $_POST['ifscCode'];
    $accountHolderName = $_POST['accountHolderName'];
    

    $sql="DELETE FROM supplier_master WHERE Supplier_Id='$Supplier_Id'";    

if(mysqli_query($conn,$sql))
{
     header("Location: department-supplier.php?admin_name=$login_name");
}
else
{
   echo "<script>alert('Supplier Details Not Deleted');window.location.href = 'department-supplier.php?admin_name=$login_name';</script>";
}
mysqli_close($conn);
//header("Location:display.php");
}
?>