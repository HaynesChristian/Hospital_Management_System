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
        <title>Update Record</title>
    </head>
<body>
<center>
    <h1>Edit Records</h1>
<table border="1">
    <?php
    $id=$_POST['Update'];
    $displaydata = "select * from patient_canteen_bill where Bill_Id=$id";
    $result = mysqli_query($conn, $displaydata);
    if(mysqli_num_rows($result)>0)
    {
        while ($row = mysqli_fetch_assoc($result)) 
                {
    ?>
    <form method="POST" action="billupdatesave.php">
<table border="1">   
<tr>
<td>Delivered Plates</td>
<td><input type="text" name="delivered" value="<?php echo $row["Plates_Delivered"];?>"/></td>
</tr>
<tr>
<td>Delivered Plates Charges</td>
<td><input type="text" name="dcharges" value="<?php echo $row["Plates_Delivered_Charges"];?>"/></td>
</tr>
<tr>
<td>Extra Food Charges</td>
<td><input type="text" name="extra" value="<?php echo $row["Extra_Food_Charges"];?>"/></td>
</tr>
<tr>
<td>Total Canteen Charges</td>
<td><input type="text" name="total" value="<?php echo $row["Total_Cnateen_Charges"];?>"/></td>
</tr>

<tr><td></td><td><button formaction="billupdatesave.php" name="save" value="<?php echo $row["Bill_Id"];?>">Update</button></td></tr>
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
</body>
</html>  