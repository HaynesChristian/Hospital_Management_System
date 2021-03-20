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
    <h1>Room Details</h1>
    <tr>
        <th>room_id</th>
        <th>room_type</th>
        <th>room_charges</th>
        <th>room_status</th>
        <th colspan="2">Action</th>
</tr>
    <?php
    $dislpaydata = "select * from room_master";
    $result = mysqli_query($conn, $dislpaydata);
    if(mysqli_num_rows($result)>0)
    {
        while ($row = mysqli_fetch_assoc($result)) 
                {
    ?>
    <tr>
    <form method="POST" autocomplete="off">
        <td><?php echo $row["room_id"];?></td>
        <td><?php echo $row["room_type"];?></td>
        <td><?php echo $row["room_charges"];?></td>
        <td><?php echo $row["room_status"];?></td>
        <td>
            <button formaction="roomserviceupdate.php" name="Update" value="<?php echo $row["room_id"];?>">Update</button>
        </td>
        <td>
            <button formaction="roomservicedelete.php" name="Delete" value="<?php echo $row["room_id"];?>">Delete</button>
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
