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
<table border="1">
    
      <?php
    $id=$_POST['Delete'];
    $dislpaydata = "select * from Medicine where Medicine_Id=$id";
    $result = mysqli_query($conn, $dislpaydata);
    if(mysqli_num_rows($result)>0)
    {
        while ($row = mysqli_fetch_assoc($result)) 
                {
    ?>
     <form method="POST">
<table border="1">
<tr>
<td>Medicine_Id</td>
<td><input type="text" name="id" value="<?php echo $row["Medicine_Id"];?>"/></td>
</tr>
<tr>
<td>Medicine_Name</td>
<td><input type="text" name="name" value="<?php echo $row["Medicine_Name"];?>"/></td>
</tr>
<tr>
<td>manufacture_Date</td>
<td><input type="date" name="mdate" value="<?php echo $row["manufactur_Date"];?>"/></td>
</tr>
<tr>
<td>Expiry_Date</td>
<td><input type="date" name="edate" value="<?php echo $row["Expiry_Date"];?>"/></td>
</tr>
        
<tr><td></td><td><button formaction="Mdelsave.php" name="Delete" value="<?php echo $row["Medicine_Id"];?>"> Delete </button></td></tr>      
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