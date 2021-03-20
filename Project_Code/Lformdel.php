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
    $dislpaydata = "select * from leave_form where Emp_Id=$id";
    $result = mysqli_query($conn, $dislpaydata);
    if(mysqli_num_rows($result)>0)
    {
        while ($row = mysqli_fetch_assoc($result)) 
                {
    ?>
     <form method="POST">
<table border="1">
<tr>
<td>Employee Id</td>
<td><input type="text" name="id" value="<?php echo $row["Emp_Id"];?>"/></td>
</tr>
<tr>
<td>Type of leave</td>
<td>
    <select name="type">
        <option>CL</option>
        <option>SL</option>
        <option>PL</option>
    </select>
</td>
</tr>
<tr>
<td>Leave from</td>
<td><input type="date" name="lfrom" value="<?php echo $row["Leave_from"];?>"/></td>
</tr>
<tr>
<td>Leave to</td>
<td><input type="date" name="lto" value="<?php echo $row["Leave_to"];?>"/></td>
</tr>
<tr>
<td>Total</td>
<td><input type="text" name="total" value="<?php echo $row["Total"];?>"/></td>
</tr>
<tr><td></td><td><button formaction="Lformdelsave.php" name="Delete" value="<?php echo $row["Emp_Id"];?>"> Delete </button></td></tr>      
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