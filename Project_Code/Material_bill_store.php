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
    $msid = $_POST['msid'];
    $mid = $_POST['mid'];
    $amt = $_POST['amt'];
    $mdate = $_POST['mdate'];
    
    
    
    
    $sql = "insert into Material_bill_store (Material_bill_store_id,Material_bill_id,Material_bill_amount,Material_bill_date) "
            . "VALUES ($msid,$mid,$amt,'$mdate')";
    if(mysqli_query($conn,$sql))
    {
        echo "Record Inserted"."<br>";
    }
    else 
    {
        echo "Record not Inserted"."<br>";          
    }
    
    }