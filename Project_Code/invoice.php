<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hospital_management_system";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
if($_POST)
{
    $login_name = $_POST['admin_name'];
    $currentDate =  date("Y-m-d");
    $invoiceDate = $currentDate;
    $purchaseId = $_POST['purchaseId'];
    
    $unitPrice = $_POST['unitPrice'];
    
    $sql = "SELECT * FROM purchase_order where Purchase_Id = $purchaseId";
    
    if ($result = mysqli_query($conn, $sql))
    {
      // Fetch one and one row
      while ($row = mysqli_fetch_assoc($result)) 
      {
          
          $Qty = $row[Purchase_Quantity];
         
      }
      mysqli_free_result($result);
    }
   $totalAmount = $Qty*$unitPrice;
    

$insert = "INSERT INTO invoice value(invoice_no,'$invoiceDate','$purchaseId','$Qty',"
        . "'$unitPrice','$totalAmount')";
if(mysqli_query($conn, $insert))
{
    header("Location: department-invoice.php?admin_name=$login_name");
}
 else 
{
   echo "<script>alert('Invoice Details Not Save');window.location.href = 'department-invoice.php?admin_name=$login_name';</script>";
}
}