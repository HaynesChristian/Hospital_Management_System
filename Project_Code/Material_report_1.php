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
    $Id = $_POST['Id'];
    $Name = $_POST['Name'];
    $Purchase = $_POST['Purchase'];
    $Received = $_POST['Received'];
    $Return_Defective = $_POST['Return_Defective'];
    $Distribution_Id = $_POST['Distribution_Id'];
    $Expired = $_POST['Expired'];
    $Report_Date = $_POST['Report_Date'];
   
    $sql = "insert into material_report (Material_Id,Material_Name,Purchase_Items,Received_Items,Return_Defective_Items,Material_Distribution_Id,Expired_Items,Material_purchase_Date) "
            . "VALUES ($Id,'$Name',$Purchase,$Received,$Return_Defective,$Distribution_Id,$Expired,'$Report_Date')";
    if(mysqli_query($conn,$sql))
    {
        echo "Record Inserted"."<br>";
    }
    else 
    {
        echo "Record not Inserted"."<br>";          
    }
    
    }