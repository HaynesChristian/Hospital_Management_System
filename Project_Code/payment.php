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
    $invoiceNo = $_POST['invoiceNo'];
    $supplierId = $_POST['supplierId'];
    $paymentDate = date("Y-m-d");
    $payAmount = $_POST['payAmount'];
    
    $sql = "SELECT * FROM invoice where Invoice_No = $invoiceNo";
    
    if ($result = mysqli_query($conn, $sql))
    {
      // Fetch one and one row
      while ($row = mysqli_fetch_assoc($result)) 
      {
          
          $totalAmount = $row[Total_Pay_Amount];
          if($totalAmount == $payAmount)
          {
              $paymentStatus = 'Done' ;
          }
          else 
          {
              $paymentStatus = 'Not Done' ;
          }
          $remainingAmount = $totalAmount-$payAmount;
      }
      if($payAmount >= $totalAmount)
         {
             echo "<script>alert('Please Enter Valid Amount');</script>";                       
         }
      mysqli_free_result($result);
    }
   
   
    $paymentMode = $_POST['paymentMode'];
  

$insert = "INSERT INTO payment value(payment_id,'$invoiceNo','$supplierId','$paymentDate',"
        . "'$payAmount','$paymentStatus','$paymentMode','$remainingAmount')";
if(mysqli_query($conn, $insert))
{
     header("Location: department-payment.php?admin_name=$login_name");
}
 else 
{
     echo "<script>alert('Payment Details Not Save');window.location.href = 'department-payment.php?admin_name=$login_name';</script>";
}
}