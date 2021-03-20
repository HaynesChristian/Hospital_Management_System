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
        <th>Year</th>
        <th>CL Balance</th>
        <th>SL Balance</th>
        <th>PL Balance</th>
        
        <th colspan="2">Action</th>
        
    </tr>
    <?php
    $dislpaydata = "select * from leave_master";
    $result = mysqli_query($conn, $dislpaydata);
    if(mysqli_num_rows($result)>0)
    {
        while ($row = mysqli_fetch_assoc($result)) 
                {
    ?>
    <tr>
    <form method="POST" autocomplete="off">
        <td><?php echo $row["Employee"];?></td>
        <td><?php echo $row["Year"];?></td>
        <td><?php echo $row["CL_Balance"];?></td>
        <td><?php echo $row["SL_Balance"];?></td>
        <td><?php echo $row["PL_Balance"];?></td>
        
        <td>
            <button formaction="Leaveupd.php" name="Update" value="<?php echo $row["Employee"];?>">Update</button>
        </td>
        <td>
            <button formaction="Leavedel.php" name="Delete" value="<?php echo $row["Employee"];?>">Delete</button>
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
