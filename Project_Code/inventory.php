<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hospital_management_system";

$conn = mysqli_connect($servername,$username,$password,$dbname);
if($_POST)
{
    $inventory = $_POST['inventory'];
    $ldate = $_POST['ldate'];
    $ndate = $_POST['ndate'];
    
    echo $inventory."<br>";    
    echo $ldate."<br>";
    echo $ndate."<br>";
    
    $sql = "insert into inventory_cleaning (Inventory_Batch_Id,Last_Cleaning_Date,Next_Cleaning_Date)"
            
            . " VALUES ('$inventory','$ldate','$ndate')";
    if(mysqli_query($conn,$sql))
    {
        echo "Record Inserted"."<br>";
    }
    else 
    {
        echo "Record not Inserted"."<br>";          
    }
    
    }
    header("Location:inventory_cleaning.php");