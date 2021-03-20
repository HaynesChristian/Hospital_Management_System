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
    
$sql="Update supplier_master Set Supplier_Name='$name', Supplier_Email='$emailid', "
        . "Supplier_MobileNo='$mobile', Supplier_Address='$address', Supplier_Type='$type', Supplier_Gst_no='$gstno', "
        . "Supplier_Account_NO='$accno', Supplier_Ifsc_Code='$ifscCode', Supplier_AccountHolder_Name='$accountHolderName' "
        . "where Supplier_Id='$Supplier_Id'";
        

if(mysqli_query($conn,$sql))
{
     header("Location: department-supplier.php");
}
else
{
   echo "<script>alert('Supplier Details Not Updated');window.location.href = 'department-supplier.php';</script>";
}
mysqli_close($conn);
//header("Location:display.php");
?>