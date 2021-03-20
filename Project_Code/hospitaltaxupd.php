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
<center>  <h1>Update Hospital Tax</h1></center>
<center>
<table border="5">
    <?php
    $id=$_POST['Update'];
    $dislpaydata = "select * from hospital_tax where Hospital_tax_id=$id";
    $result = mysqli_query($conn, $dislpaydata);
    if(mysqli_num_rows($result)>0)
    {
        while ($row = mysqli_fetch_assoc($result)) 
                {
    ?>
    <form method="POST" >
<table border="5" class="table table-striped">
<tr>
<td>Hospital_tax_id</td>
<td><input type="text" name="id" value="<?php echo $row["Hospital_tax_id"];?>"/></td>
</tr>
<tr>
<td>Hospital_tax_name</td>
<td><input type="text" name="name" value="<?php echo $row["Hospital_tax_name"];?>"/></td>
</tr>
<tr>
<td>Hospital_tax_amount</td>
<td><input type="text" name="amt" value="<?php echo $row["Hospital_tax_amount"];?>"/></td>
</tr>
<tr>
<td>hospital_tax_date</td>
<td><input type="date" name="hdate" value="<?php echo $row["hospital_tax_date"];?>"/></td>
</tr>




<tr><td></td><td><button formaction="hospitaltaxupdsave.php" name="save" value="<?php echo $row["Hospital_tax_id"];?>"> Save </button></td></tr>
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