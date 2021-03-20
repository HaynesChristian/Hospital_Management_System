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
<table border="1">
    <tr>
        <th>Employee Id</th>
        <th>Type of Leave</th>
        <th>Leave From</th>
        <th>>Leave To</th>
        <th>Total</th>
        
        <th colspan="2">Action</th>
        
    </tr>
    <?php
    $dislpaydata = "select * from leave_form";
    $result = mysqli_query($conn, $dislpaydata);
    if(mysqli_num_rows($result)>0)
    {
        while ($row = mysqli_fetch_assoc($result)) 
                {
    ?>
    <tr>
    <form method="POST" autocomplete="off">
        <td><?php echo $row["Emp_Id"];?></td>
        <td><?php echo $row["Type_of_leave"];?></td>
        <td><?php echo $row["Leave_from"];?></td>
        <td><?php echo $row["Leave_to"];?></td>
        <td><?php echo $row["Total"];?></td>
        
       
        <td>
            <button formaction="Lformupd.php" name="Update" value="<?php echo $row["Emp_Id"];?>">Update</button>
        </td>
        <td>
            <button formaction="Lformdel.php" name="Delete" value="<?php echo $row["Emp_Id"];?>">Delete</button>
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
