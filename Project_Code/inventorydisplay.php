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
    <h1>Inventory Cleaning</h1>
    <tr>
        <th>Inventory_CLeaning_Id</th>
        <th>Inventory_Batch_Id</th>
        <th>Last_Cleaning_Date</th>
        <th>Next_Cleaning_Date</th>
        <th colspan="2">Action</th>
        
    </tr>
    <?php
    $dislpaydata = "select * from inventory_cleaning";
    $result = mysqli_query($conn, $dislpaydata);
    if(mysqli_num_rows($result)>0)
    {
        while ($row = mysqli_fetch_assoc($result)) 
                {
    ?>
    <tr>
    <form method="POST" autocomplete="off">
        <td><?php echo $row["Inventory_CLeaning_Id"];?></td>
        <td><?php echo $row["Inventory_Batch_Id"];?></td>
        <td><?php echo $row["Last_Cleaning_Date"];?></td>
        <td><?php echo $row["Next_Cleaning_Date"];?></td>
        <td>
            <button formaction="inventoryupdate.php" name="Update" value="<?php echo $row["Inventory_CLeaning_Id"];?>">Update</button>
        </td>
        <td>
            <button formaction="inventorydelete.php" name="Delete" value="<?php echo $row["Inventory_CLeaning_Id"];?>">Delete</button>
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
