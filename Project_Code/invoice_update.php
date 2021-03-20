<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hospital_management_system";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
if($_POST)
{
    $id = $_POST['invoiceNo'];
    //$currentDate =  date("Y-m-d");
    //$invoiceDate = $currentDate;
    $purchaseId = $_POST['purchaseId'];
    $Qty = $_POST['Qty'];
    $unitPrice = $_POST['unitPrice'];
    $totalAmount = $Qty*$unitPrice;
    
}
$insert = " Update invoice Set Purchase_Id='$purchaseId', Quantity='$Qty', Unit_Price='$unitPrice', Total_Pay_Amount='$totalAmount'"
        . "where Invoice_No='$id'";
if(mysqli_query($conn, $insert))
{
    header("Location: department-invoice.php");
}
 else 
{
   echo "<script>alert('Invoice Details Not Save');window.location.href = 'department-invoice.php';</script>";
}