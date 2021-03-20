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
    $dislpaydata = "select * from lab_master where Test_Id='$id'";
    $result = mysqli_query($conn, $dislpaydata);
    if(mysqli_num_rows($result)>0)
    {
        while ($row = mysqli_fetch_assoc($result)) 
                {
    ?>
    <form method="POST">
<table border="1">
    <h1>Update Record</h1>
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
<td><b>Test Charges :</b></td>
                            <td>
                            <select name="testcharges">
                                    <option>200</option>
                                    <option>100</option>
                                    <option>300</option>
                                    <option>100</option>
                            </select>
                            </td>
</tr>
<tr><td></td><td><button formaction="labsampleupdatesave.php" name="save" value="<?php echo $row["Test_Id"];?>"> Save </button></td></tr>
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