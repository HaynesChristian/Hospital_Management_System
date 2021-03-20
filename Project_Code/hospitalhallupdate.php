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
    echo "connection not successfu<br>";   
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
    $dislpaydata = "select * from hospitalhall_cleaning where Hospital_Cleaning_Id=$id";
    $result = mysqli_query($conn, $dislpaydata);
    if(mysqli_num_rows($result)>0)
    {
        while ($row = mysqli_fetch_assoc($result)) 
                {
    ?>
    <form method="POST">
<table border="1">
<tr>
<td>Cleaning_Month</td>
<td><select name="month" value="<?php echo $row["Cleaning_Month"];?>">
        <option>January</option>
        <option>February</option>
        <option>March</option>
        <option>April</option>
        <option>May</option>
        <option>June</option>
        <option>July</option>
        <option>August</option>
        <option>September</option>
        <option>October</option>
        <option>November</option>
        <option>December</option>
    </select></td>
</tr>
<tr>
<td>Cleaning_Year</td>
<td><input type="text" name="cyear" value="<?php echo $row["Cleaning_Year"];?>"/></td>
</tr>
<tr>
<td>Cliening_Count</td>
<td><input type="text" name="count" value="<?php echo $row["Cliening_Count"];?>"/></td>
</tr>
<tr>
<td>Last_Cleaning_Date</td>
<td><input type="date" name="cdate" value="<?php echo $row["Last_Cleaning_Date"];?>"/></td>
</tr>
<tr><td></td><td><button formaction="hospitalhallupdatesave.php" name="save" value="<?php echo $row["Hospital_Cleaning_Id"];?>"> Save </button></td><</tr>
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