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
        <title>Delete</title>
    <body>
    <center>
<table border="1">
    <h1>Delete Record</h1>
    <?php
    $id=$_POST['Delete'];
    $dislpaydata = "select * from patient_canteen_order where order_id=$id";
    $result = mysqli_query($conn, $dislpaydata);
    if(mysqli_num_rows($result)>0)
    {
        while ($row = mysqli_fetch_assoc($result)) 
                {
    ?>
    <form method="POST">
<table border="1">
<tr>
<td>Bill_id</td>
<td><input type="text" name="billid" value="<?php echo $row["Bill_id"];?>"/></td>
</tr>
<tr>
<td>FoodPlate_id</td>
<td><input type="text" name="plateid" value="<?php echo $row["FoodPlate_id"];?>"/></td>
</tr>
<tr>
<td>Patient_OtherFood_id</td>
<td><input type="text" name="otherfood" value="<?php echo $row["Patient_OtherFood_id"];?>"/></td>
</tr>
<tr><td></td><td><button formaction="orderdeletesave.php" name="save" value="<?php echo $row["order_id"];?>"> Delete </button></td></tr>
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