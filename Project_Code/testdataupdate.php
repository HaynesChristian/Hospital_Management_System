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
        
    <center>
        <h1>Update Record</h1>
<table border="1">
    <?php
    $id=$_POST['Update'];
    $dislpaydata = "select * from lab_test_data where Test_Id='$id'";
    $result = mysqli_query($conn, $dislpaydata);
    if(mysqli_num_rows($result)>0)
    {
        while ($row = mysqli_fetch_assoc($result)) 
                {
    ?>
    <form method="POST" autocomplete="off">
<table border="1">
 <tr>
<td>Patient_Id</td>
<td><input type="text" name="patientid" value="<?php echo $row["Patient_Id"];?>"/></td>
</tr>   
<tr>
<td>Date</td>
<td><input type="date" name="testdate" value="<?php echo $row["Test_Date"];?>"/></td>
</tr>

<tr>
<td>Test_Description</td>
        <td>
            <select name="description">
                <option>Blood</option>
                <option>Urine</option>
                <option>X ray</option>
                <option>stool</option>
            </select>
        </td>
</tr>
<tr>
<td>Test_Charges</td>
        <td>
            <select name="testcharges">
                <option>200</option>
                <option>100</option>
                <option>300</option>
                <option>100</option>
            </select>
        </td>
</tr>
<tr>
<td>Test_Status</td>
<td><input type="text" name="teststatus" value="<?php echo $row["Test_Status"];?>"/></td>
</tr>
<tr><td><button formaction="testdataupdatesave.php" name="save" value="<?php echo $row["Patient_Id"];?>"> Update </button></td></tr>
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