<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hospital_management_system";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
if($_POST)
{
    $purchaseId = $_POST['purchaseId'];
    $receiveQty = $_POST['receiveQty'];
    $currentDate =  date("Y-m-d");
    $receiveDate = $currentDate;
    $itemBatchId = $_POST['itemBatchId'];
    $warrantyDate = $_POST['warrantyDate'];
    $itemDesc = $_POST['itemDesc'];
    
    
    
     $sql = "SELECT * FROM purchase_order where Purchase_Id = $purchaseId";

    if ($result = mysqli_query($conn, $sql))
    {
      // Fetch one and one row
      while ($row = mysqli_fetch_assoc($result)) 
      {
          $itemCode =  $row[Item_Code];
          $supplierId = $row[Supplier_Id];
          $purchaseQty = $row[Purchase_Quantity];
          $remainingQty = $purchaseQty-$receiveQty;
          if($purchaseQty==$receiveQty)
          {
              $receiveStatus = 'Order Completed' ;
          }
          else 
          {
              $receiveStatus = 'Order Not Completed';
          }
          
      }
      if($purchaseQty >= $receiveQty)
                    {
                        echo "<script>alert('Please Enter Valid Quantity');</script>";
                        
                    }
      mysqli_free_result($result);
    }
    
  
}
$insert = "INSERT INTO receive_stock value(receive_quantity_id,'$itemCode','$supplierId','$purchaseId',"
        . "'$receiveQty','$remainingQty','$receiveStatus','$receiveDate','$itemBatchId','$warrantyDate','$itemDesc')";
if(mysqli_query($conn, $insert))
{
    header("Location: department-stock.php");
}
 else 
{
   echo "<script>alert('Stock Details Not Save');window.location.href = 'department-stock.php';</script>";
}