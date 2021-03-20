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
        <th>Bill_Id</th>
        <th>Bill_Date</th>
        <th>Patient_Id</th>
        <th>Total_Order</th>
        <th>Total_Charges</th>
        <th colspan="2">Action</th>
        
    </tr>
    <?php
    $dislpaydata = "select * from patient_canteen_bill";
    $result = mysqli_query($conn, $dislpaydata);
    if(mysqli_num_rows($result)>0)
    {
        while ($row = mysqli_fetch_assoc($result)) 
                {
    ?>
    <tr>
    <form method="POST" autocomplete="off">
        <td><?php echo $row["Bill_Id"];?></td>
        <td><?php echo $row["Bill_Date"];?></td>
        <td><?php echo $row["Patient_Id"];?></td>
        <td><?php echo $row["Total_Order"];?></td>
        <td><?php echo $row["Total_Charges"];?></td>
        <td>
            <button formaction="billupdate.php" name="Update" value="<?php echo $row["Bill_Id"];?>">Update</button>
        </td>
        <td>
            <button formaction="billdelete.php" name="Delete" value="<?php echo $row["Bill_Id"];?>">Delete</button>
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
