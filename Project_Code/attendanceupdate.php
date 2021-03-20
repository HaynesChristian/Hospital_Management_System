<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hospital_management_system";

$conn = mysqli_connect($servername,$username,$password,$dbname);
if($conn)
{
    echo "connection successfull<br>";
}
 else 
{
    echo "connection not successful<br>";   
}
if($_POST)
{
$eid=$_POST["update"];

?>
<html>
    <head>
        <title>Edit Record</title>
        <script>
            function clchange()
            {
                alert("Heloo sejal");
            }
        </script>
    </head>
<body>
<center>
    <h1>Update Record</h1>
<table border="1">
    <?php
    
    $displaydata = "select * from attendance where Emp_Id = $eid";
    $result = mysqli_query($conn, $displaydata);
    if(mysqli_num_rows($result)>0)
    {
        while ($row = mysqli_fetch_assoc($result)) 
                {
    ?>
    <form method="POST">
<table border="1">
<tr>
<td>Emp_Id</td>
<td><input type="text" name="eid" value="<?php echo $row["Emp_Id"];?>"/></td>
</tr>
<tr>
<td>Month_code</td>
<td><input type="text" name="mcode" value="<?php echo $row["Month_code"];?>"/></td>
</tr>
<tr>
<td>Working_Days</td>
<td><input type="text" name="working" value="<?php echo $row["Working_Days"];?>"/></td>
</tr>
<tr>
<td>Present_Days</td>
<td><input type="text" name="present" value="<?php echo $row["Present_Days"];?>"/></td>
</tr>
<tr>
<td>Leave_Days</td>
<td><input type="text" name="leave" value="<?php echo $row["Leave_Days"];?>"/></td>
</tr>
<tr>
    <td></td>
    <td>
        <button formaction="attendanceupdatesave.php" name="save" value="<?php echo $row["Emp_Id"];?>"> Save </button>
    </td>
</tr>
</table>
</form>
</table><br>
    <?php
                }
    }
}
    ?>

<?php
mysqli_close($conn);
?>
</body>
</html>  