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

    $mbsid = $_POST['mbsid'];
    $mid = $_POST['mid'];
    $amt = $_POST['amt'];
    $mdate = $_POST['mdate'];
    

$sql="Update Material_bill_store set Material_bill_store_id=$mbsid,Material_bill_id=$mid,Material_bill_amount=$amt,Material_bill_date='$mdate' where Material_bill_store_id=$mbsid";
if (mysqli_query($conn,$sql))

echo  "Record Update Successfull";
else
    echo 'not updated';
mysqli_close($conn);
header("Location:material_bill.php");
?>