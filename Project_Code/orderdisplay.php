<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hospital_management_system";

$conn = mysqli_connect($servername,$username,$password,$dbname);
?>
<html>
    <head>
        <title>Edit Record</title>
    </head>
<body>
<center>
<table border="1">
    <h1>Edit Record</h1>
    <tr>
        <th>Patient_Id</th>
        <th>order_id</th>
        <th>Order_Date</th>
        <th>Item_Id1</th>
        <th>Description1</th>
        <th>Quantity1</th>
        <th>Item_Id2</th>
        <th>Description2</th>
        <th>Quantity2</th>
        <th>Item_Id3</th>
        <th>Description3</th>
        <th>Quantity3</th>
        <th>Order_Amount</th>
        <th colspan="2">Action</th>
        
    </tr>
    <?php
    $dislpaydata = "select * from patient_canteen_order";
    $result = mysqli_query($conn, $dislpaydata);
    if(mysqli_num_rows($result)>0)
    {
        while ($row = mysqli_fetch_assoc($result)) 
                {
    ?>
    <tr>
    <form method="POST" autocomplete="off">
        <td><?php echo $row["Patient_Id"];?></td>
        <td><?php echo $row["order_id"];?></td>
        <td><?php echo $row["Order_Date"];?></td>
        <td><?php echo $row["Item_Id1"];?></td>
        <td><?php echo $row["Description1"];?></td>
        <td><?php echo $row["Quantity1"];?></td>
        <td><?php echo $row["Item_Id2"];?></td>
        <td><?php echo $row["Description2"];?></td>
        <td><?php echo $row["Quantity2"];?></td>
        <td><?php echo $row["Item_Id3"];?></td>
        <td><?php echo $row["Description3"];?></td>
        <td><?php echo $row["Quantity3"];?></td>
        <td><?php echo $row["Order_Amount"];?></td>
        <td>
            <button formaction="orderupdate.php" name="Update" value="<?php echo $row["order_id"];?>">Update</button>
        </td>
        <td>
            <button formaction="orderdelete.php" name="Delete" value="<?php echo $row["order_id"];?>">Delete</button>
        </td>
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
