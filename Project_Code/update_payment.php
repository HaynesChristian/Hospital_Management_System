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
    $login_name = $_POST['admin_name'];
    $PaymentId = $_POST['PaymentId'];
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
          $totalAmount = $row["Total_Pay_Amount"];
          
          if($totalAmount == $payAmount)
          {
              $paymentStatus = 'Done' ;
          }
          else 
          {
              $paymentStatus = 'Not Done' ;
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
    $paymentMode = $_POST['paymentMode'];

    
$sql="Update payment Set Invoice_No='$invoiceNo', Supplier_Id='$supplierId', "
        . "Payment_Date='$paymentDate', Pay_Amount='$payAmount', "
        . "Payment_Status='$paymentStatus', Payment_Mode='$paymentMode', Remaining_Amount='$remainingAmount' "
        . "where Payment_Id='$PaymentId'";
        

if(mysqli_query($conn,$sql))
{
     header("Location: department-payment.php?admin_name=$login_name");
}
else
{
   echo "<script>alert('Payment Details Not Updated');window.location.href = 'department-payment.php?admin_name=$login_name';</script>";
}
mysqli_close($conn);
//header("Location:display.php");
}
?>