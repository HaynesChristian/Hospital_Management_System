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
<table border="5">
    <?php
    $id=$_POST['Update'];
    $dislpaydata = "select * from Biowaste_dispach where Biowaste_dispach_id=$id";
    $result = mysqli_query($conn, $dislpaydata);
    if(mysqli_num_rows($result)>0)
    {
        while ($row = mysqli_fetch_assoc($result)) 
                {
    ?>
    <form method="POST" >
<table border="5">
<tr>
<td>Biowaste_dispach_id</td>
<td><input type="text" name="id" value="<?php echo $row["Biowaste_dispach_id"];?>"/></td>
</tr>
<tr>
<td>Biowaste_dispach_agency_name</td>
<td><input type="text" name="name" value="<?php echo $row["Biowaste_dispach_agency_name"];?>"/></td>
</tr>
<tr>
<td>Biowaste_dispach_date</td>
<td><input type="date" name="date" value="<?php echo $row["Biowaste_dispach_date"];?>"/></td>
</tr>
<tr>
<td>Biowaste_dispach_quantity</td>
<td><input type="number" name="quantity" value="<?php echo $row["Biowaste_dispach_quantity"];?>"/></td>
</tr>
<tr>
<td>Biowaste_dispach_type</td>
<td><input type="text" name="type" value="<?php echo $row["Biowaste_dispach_type"];?>"/></td>
</tr>
<tr>
<td>Biowaste_dispach_charge</td>
<td><input type="number" name="charge" value="<?php echo $row["Biowaste_dispach_charge"];?>"/></td>
</tr>


<tr><td></td><td><button formaction="biowasteupdsave.php" name="save" value="<?php echo $row["Biowaste_dispach_id"];?>"> Save </button></td></tr>
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