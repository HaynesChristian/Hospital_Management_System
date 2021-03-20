<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
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
    

$sql="DELETE FROM Material_bill_store WHERE Material_bill_store_id=$mbsid";
mysqli_query($conn,$sql);
echo  "Record Delete Successfull";

header("Location:material_bill.php");
mysqli_close($conn);
?>
        
        
    </body>
</html>
