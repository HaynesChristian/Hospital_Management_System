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
    $dislpaydata = "select * from patient_canteen_bill where Bill_Id=$id";
    $result = mysqli_query($conn, $dislpaydata);
    if(mysqli_num_rows($result)>0)
    {
        while ($row = mysqli_fetch_assoc($result)) 
                {
    ?>
    <form method="POST">
<table border="1">
<tr>
<td>Plates_Delivered</td>
<td><input type="text" name="dplates" value="<?php echo $row["Plates_Delivered"];?>"/></td>
</tr>
<tr>
<td>Plates_Delivered_Charges</td>
<td><input type="text" name="dcharge" value="<?php echo $row["Plates_Delivered_Charges"];?>"/></td>
</tr>
<tr>
<td>Extra_Food_Charges</td>
<td><input type="text" name="extra" value="<?php echo $row["Extra_Food_Charges"];?>"/></td>
</tr>
<tr>
<td>Total_Cnateen_Charges</td>
<td><input type="text" name="total" value="<?php echo $row["Total_Cnateen_Charges"];?>"/></td>
</tr>
<tr><td></td><td><button formaction="billdeletesave.php" name="save" value="<?php echo $row["Bill_Id"];?>"> Delete </button></td></tr>
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