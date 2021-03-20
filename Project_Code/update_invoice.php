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
    echo "connection not successful<br>";   
}
if($_POST)
{
    $login_name = $_POST['admin_name'];
    $InvoiceNo = $_POST['InvoiceNo'];
    
    $invoiceDate = $_POST['invoiceDate'];    
    $purchaseId = $_POST['purchaseId'];
    $unitPrice = $_POST['unitPrice'];
    $sql = "SELECT * FROM purchase_order where Purchase_Id = $purchaseId";
    
    if ($result = mysqli_query($conn, $sql))
    {
      // Fetch one and one row
      while ($row = mysqli_fetch_assoc($result)) 
      {
          
          $Qty = $row["Purchase_Quantity"];
         
      }
      
    }
    
    $totalAmount = $Qty*$unitPrice;
    
    
$sql="Update invoice Set Invoice_Date='$invoiceDate', "
        . "Purchase_Id='$purchaseId', Quantity='$Qty', "
        . "Unit_price='$unitPrice', Total_Pay_Amount='$totalAmount' "
        . "where Invoice_No='$InvoiceNo'";
        

if(mysqli_query($conn,$sql))
{
     header("Location: department-invoice.php?admin_name=$login_name");
}
else
{
  echo "<script>alert('Invoice Details Not Updated');window.location.href = 'department-invoice.php?admin_name=$login_name';</script>";
}
mysqli_close($conn);
//header("Location:display.php");
}
?>