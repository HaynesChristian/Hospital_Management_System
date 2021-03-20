<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hospital_management_system";

$conn = mysqli_connect($servername,$username,$password,$dbname);

?>
<html>
<body>
    <center>

    
<table border="5">
    <tr>
        <th>Invoice_Date</th>
        <th>Quantity</th>
        <th>Unit_price</th>
        <th>Total_Pay_Amount</th>
      
        
    </tr>
    <?php
    $dislpaydata = "select * from invoice";
    $result = mysqli_query($conn, $dislpaydata);
    if(mysqli_num_rows($result)>0)
    {
        while ($row = mysqli_fetch_assoc($result)) 
                {
    ?>
    <tr>
    <form method="POST" autocomplete="off">
        <td><?php echo $row["Invoice_Date"];?></td>
        <td><?php echo $row["Quantity"];?></td>
        <td><?php echo $row["Unit_price"];?></td>
        <td><?php echo $row["Total_Pay_Amount"];?></td>
        </tr>
    </form>
  <?php
                }
    }
    mysqli_close($conn);
    ?>
  
</table><br>
</body>

</html>  
