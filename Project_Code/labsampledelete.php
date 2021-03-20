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
    $dislpaydata = "select * from lab_master where Test_Id='$id'";
    $result = mysqli_query($conn, $dislpaydata);
    if(mysqli_num_rows($result)>0)
    {
        while ($row = mysqli_fetch_assoc($result)) 
                {
    ?>
    <form method="POST">
<table border="1">
<tr>
<td>Test_Description</td>
<td><input type="text" name="description" value="<?php echo $row["Test_Description"];?>"/></td>
</tr>
<tr>
<td>Test_Charges</td>
<td><input type="text" name="testcharges" value="<?php echo $row["Test_Charges"];?>"/></td>
</tr>
<tr><td></td><td><button formaction="labsampledeletesave.php" name="save" value="<?php echo $row["Test_Id"];?>"> Delete </button></td></tr>
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