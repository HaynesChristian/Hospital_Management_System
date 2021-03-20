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
        <h1>Update Record</h1>
<table border="1">
    <?php
    $id=$_POST['Update'];
    $dislpaydata = "select * from room_master where room_id=$id";
    $result = mysqli_query($conn, $dislpaydata);
    if(mysqli_num_rows($result)>0)
    {
        while ($row = mysqli_fetch_assoc($result)) 
                {
    ?>
    <form method="POST" autocomplete="off">
<table border="1">
<tr>
<td>room_type</td>
<td>
    <select name="roomtype">
        <option>General</option>
        <option>Semi</option>
        <option>Special</option>
        <option>Deluxe</option>
    </select>
</td>
</tr>
<tr>
<td>room_charges</td>
<td>
    <select name="roomprice">
        <option>500</option>
        <option>1000</option>
        <option>2000</option>
        <option>3000</option>
    </select>
</td>
</tr>
<tr>
<td>room_status</td>
<td>
    <select name="roomstatus">
        <option>Available</option>
        <option>UnAvailable</option>
    </select>
</td>
</tr>
<tr><td><button formaction="roomserviceupdatesave.php" name="save" value="<?php echo $row["room_id"];?>"> Update </button></td></tr>
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