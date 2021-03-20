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
        <th>Employee_Id</th>
        <th>Month_code</th>
        <th>Att_date</th>
        <th>Att_date</th>
        <th>Att_status</th>
        <th colspan="2">Action</th>
        
    </tr>
    <?php
    $dislpaydata = "select * from attendance_tran";
    $result = mysqli_query($conn, $dislpaydata);
    if(mysqli_num_rows($result)>0)
    {
        while ($row = mysqli_fetch_assoc($result)) 
                {
    ?>
    <tr>
    <form method="POST" autocomplete="off">
        <td><?php echo $row["Employee_Id"];?></td>
        <td><?php echo $row["Month_code"];?></td>
        <td><?php echo $row["Att_date"];?></td>
        <td><?php echo $row["Att_status"];?></td>
        <td>
            <button formaction="Attendanceupd.php" name="Update" value="<?php echo $row["Employee_Id"];?>">Update</button>
        </td>
        <td>
            <button formaction="Attdel.php" name="Delete" value="<?php echo $row["Employee_Id"];?>">Delete</button>
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
