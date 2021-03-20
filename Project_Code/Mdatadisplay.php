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
        <th>Medicine_Id</th>
        <th>Medicine_Name</th>
        <th>manufactur_Date</th>
        <th>Expiry_Date</th>
        
         <th colspan="2">Action</th>
        
    </tr>
    <?php
    $dislpaydata = "select * from Medicine";
    $result = mysqli_query($conn, $dislpaydata);
    if(mysqli_num_rows($result)>0)
    {
        while ($row = mysqli_fetch_assoc($result)) 
                {
    ?>
    <tr>
    <form method="POST" autocomplete="off">
        <td><?php echo $row["Medicine_Id"];?></td>
        <td><?php echo $row["Medicine_Name"];?></td>
        <td><?php echo $row["manufactur_Date"];?></td>
        <td><?php echo $row["Expiry_Date"];?></td>
        
        
        <td>
            <button formaction="Mupd.php" name="Update" value="<?php echo $row["Medicine_Id"];?>">Update</button>
        </td>
        <td>
            <button formaction="Mdel.php" name="Delete" value="<?php echo $row["Medicine_Id"];?>">Delete</button>
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
