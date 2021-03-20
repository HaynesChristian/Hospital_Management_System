<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hospital_management_system";

$conn = mysqli_connect($servername,$username,$password,$dbname);
if($conn)
{
    echo "connection successful<br>";
}
 else 
{
    echo "connection not successful<br>";   
}
?>
<html>
    <head>
        
    <center>
        <h1>Delete Record</h1>
<table border="1">
    <?php
    $id=$_POST['Delete'];
    $dislpaydata = "select * from room_master where room_id=$id";
    $result = mysqli_query($conn, $dislpaydata);
    if(mysqli_num_rows($result)>0)
    {
        while ($row = mysqli_fetch_assoc($result)) 
                {
    ?>
    <form method="POST">
<table border="1">
<tr>
<td>room_type</td>
<td><input type="text" name="roomtype" value="<?php echo $row["room_type"];?>"/></td>
</tr>
<tr>
<td>room_charges</td>
<td><input type="text" name="roomprice" value="<?php echo $row["room_charges"];?>"/></td>
</tr>
<tr>
<td>room_status</td>
<td><input type="text" name="roomstatus" value="<?php echo $row["room_status"];?>"/></td>
</tr>
<tr><td><button formaction="roomservicedeletesave.php" name="save" value="<?php echo $row["room_id"];?>"> Delete </button></td></tr>
</table>
</form>
</table><br>
    <?php
                }
    }
    ?>

<?php
mysqli_close($conn);
?>
    </center>
</body>
</html>  