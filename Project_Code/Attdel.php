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
    <h1>Delete Record</h1>
<table border="1">
    
      <?php
    $id=$_POST['Delete'];
    $dislpaydata = "select * from attendance_tran where Employee_Id=$id";
    $result = mysqli_query($conn, $dislpaydata);
    if(mysqli_num_rows($result)>0)
    {
        while ($row = mysqli_fetch_assoc($result)) 
                {
    ?>
     <form method="POST">
<table border="1">
<tr>
<td>Emp Id</td>
<td><input type="text" name="id" value="<?php echo $row["Employee_Id"];?>"/></td>
</tr>
<tr>
<td>Month code</td>
<td><input type="text" name="code" value="<?php echo $row["Month_code"];?>"/></td>
</tr>
<tr>
<td>Alt Date</td>
<td><input type="date" name="adate" value="<?php echo $row["Att_date"];?>"/></td>
</tr>
<tr>
<td>Alt Status</td>
<td><input type="text" name="status" value="<?php echo $row["Att_status"];?>"/></td>
</tr>
<tr><td></td><td><button formaction="Attdelsave.php" name="Delete" value="<?php echo $row["Employee_Id"];?>"> Delete </button></td></tr>      
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