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
    $dislpaydata = "select * from canteen_menu where Menu_Sr_No=$id";
    $result = mysqli_query($conn, $dislpaydata);
    if(mysqli_num_rows($result)>0)
    {
        while ($row = mysqli_fetch_assoc($result)) 
                {
    ?>
    <form method="POST" autocomplete="off">
<table border="1">
    <tr>
<td>Food_Item_Id</td>
<td><input type="text" name="itemid" value="<?php echo $row["Food_Item_Id"];?>"/></td>
</tr>
<tr>
<td>Food_Item_Name</td>
<td><input type="text" name="item" value="<?php echo $row["Food_Item_Name"];?>"/></td>
</tr>
<tr>
<td>Food_Item_Charges</td>
<td><input type="text" name="charges" value="<?php echo $row["Food_Item_Charges"];?>"/></td>
</tr>
<tr><td><button formaction="canteenmenuupdatesave.php" name="save" value="<?php echo $row["Menu_Sr_No"];?>"> Update </button></td></tr>
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