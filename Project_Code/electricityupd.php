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
    <h1>Update Electricity Bill</h1>
<table border="1">
    <?php
    $id=$_POST['Update'];
    $dislpaydata = "select * from electricity_bill where Electricity_bill_id=$id";
    $result = mysqli_query($conn, $dislpaydata);
    if(mysqli_num_rows($result)>0)
    {
        while ($row = mysqli_fetch_assoc($result)) 
                {
    ?>
    <form method="POST" >
<table border="5">
<tr>
<td>Electricity bill id</td>
<td><input type="text" name="id" value="<?php echo $row["Electricity_bill_id"];?>"/></td>
</tr>
<tr>
<td>Electricity_bill_amount</td>
<td><input type="text" name="amt" value="<?php echo $row["Electricity_bill_amount"];?>"/></td>
</tr>
<tr>
<td>Electricity_bill_date</td>
<td><input type="date" name="date" value="<?php echo $row["Electricity_bill_date"];?>"/></td>
</tr>





<tr><td></td><td><button formaction="electricityupdsave.php" name="save" value="<?php echo $row["Electricity_bill_id"];?>"> Save </button></td></tr>
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