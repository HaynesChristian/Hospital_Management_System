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
        <title>Edit Record</title>
    </head>
<body>
<center>
<table border="1">
    <?php
    $id=$_POST['Update'];
    $dislpaydata = "select * from leave_master where Employee=$id";
    $result = mysqli_query($conn, $dislpaydata);
    if(mysqli_num_rows($result)>0)
    {
        while ($row = mysqli_fetch_assoc($result)) 
                {
    ?>
    <form method="POST" >
<table border="1">
<tr>
<td>Emp Id</td>
<td><input type="text" name="Id" value="<?php echo $row["Employee"];?>"/></td>
</tr>
<tr>
<td>Year</td>
<td><input type="text" name="Year" value="<?php echo $row["Year"];?>"/></td>
</tr>
<tr>
<td>CL Balance</td>
<td><input type="date" name="CLB" value="<?php echo $row["CL_Balance"];?>"/></td>
</tr>
<tr>
<td>SL Balance</td>
<td><input type="text" name="SLB" value="<?php echo $row["SL_Balance"];?>"/></td>
</tr>
<tr>
<td>PL Balance</td>
<td><input type="text" name="PLB" value="<?php echo $row["PL_Balance"];?>"/></td>
</tr>



<tr><td></td><td><button formaction="Leaveupdsave.php" name="save" value="<?php echo $row["Employee"];?>"> Save </button></td></tr>
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