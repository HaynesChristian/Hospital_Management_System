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
    $Id = $_POST['paymentId'];
    $invoiceNo = $_POST['invoiceNo'];
    $supplierId = $_POST['supplierId'];
    $paymentDate = $_POST['paymentDate'];
    $payAmount = $_POST['payAmount'];
    
    $sql = "SELECT * FROM invoice where Invoice_No = $invoiceNo";
    if ($result = mysqli_query($conn, $sql))
    {
      // Fetch one and one row
      while ($row = mysqli_fetch_assoc($result)) 
      { 
          $totalAmount = $row[Total_Pay_Amount];
          echo "$totalAmount";
          if($totalAmount == $payAmount)
          {
              $paymentStatus = 'Done' ;
          }
          else 
          {
              $paymentStatus = 'Not' ;
          }
          if($payAmount > $totalAmount)
         {
             echo "<script>alert('Please Enter Valid Amount');</script>";                       
         }
         else
         {
          $remainingAmount = $totalAmount-$payAmount;
         }
      }
      
      mysqli_free_result($result);
    }
   
   
    $receiveId = $_POST['receiveId'];
    $paymentMode = $_POST['paymentMode'];
   
    
    
$sql="Update payment Set Invoice_No='$invoiceNo', Supplier_Id='$supplierId', Payment_Date='$paymentDate', "
        . "Pay_Amount='$payAmount', Payment_Status='$paymentStatus', Receive_Id='$receiveId',"
        . "Payment_Mode='$paymentMode', Remaining_Amount='$remainingAmount' "
        . "where Payment_Id='$Id'";
        

if(mysqli_query($conn,$sql))
{
    echo  "Record Update Successfull";
    
}
else
{
    echo "Record Not UPDATED";
    
}
mysqli_close($conn);
//header("Location:display.php");
?>