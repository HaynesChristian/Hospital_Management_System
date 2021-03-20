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
    <h1>Delete Material Bill</h1>
<table border="5">
    
      <?php
    $mbsid=$_POST['Delete'];
    $dislpaydata = "select * from Material_bill_store where Material_bill_store_id=$mbsid";
    $result = mysqli_query($conn, $dislpaydata);
    if(mysqli_num_rows($result)>0)
    {
        while ($row = mysqli_fetch_assoc($result)) 
                {
    ?>
     <form method="POST">
<tr>
<td>Material_bill_store_id</td>
<td><input type="text" name="mbsid" value="<?php echo $row["Material_bill_store_id"];?>"/></td>
</tr>
<tr>
<td>Material_bill_id</td>
<td><input type="text" name="mid" value="<?php echo $row["Material_bill_id"];?>"/></td>
</tr>
<tr>
<td>Material_bill_amount</td>
<td><input type="text" name="amt" value="<?php echo $row["Material_bill_amount"];?>"/></td>
</tr>
<tr>
<td>Material_bill_date</td>
<td><input type="date" name="mdate" value="<?php echo $row["Material_bill_date"];?>"/></td>
</tr>

<tr><td></td><td><button formaction="materialstorebilldelsave.php" name="Delete" value="<?php echo $row["Material_bill_store_id"];?>"> Delete </button></td></tr>      
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