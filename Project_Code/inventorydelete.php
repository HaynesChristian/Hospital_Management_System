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
    $dislpaydata = "select * from inventory_cleaning where Inventory_CLeaning_Id=$id";
    $result = mysqli_query($conn, $dislpaydata);
    if(mysqli_num_rows($result)>0)
    {
        while ($row = mysqli_fetch_assoc($result)) 
                {
    ?>
    <form method="POST">
<table border="1">
<tr>
<td>Inventory_Batch_Id</td>
<td><input type="text" name="batch" value="<?php echo $row["Inventory_Batch_Id"];?>"/></td>
</tr>
<tr>
<td>Last_Cleaning_Date</td>
<td><input type="text" name="ldate" value="<?php echo $row["Last_Cleaning_Date"];?>"/></td>
</tr>
<tr>
<td>Next_Cleaning_Date</td>
<td><input type="text" name="ndate" value="<?php echo $row["Next_Cleaning_Date"];?>"/></td>
</tr>
<tr><td></td><td><button formaction="inventorydeletesave.php" name="save" value="<?php echo $row["Inventory_CLeaning_Id"];?>"> Delete </button></td></tr>
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