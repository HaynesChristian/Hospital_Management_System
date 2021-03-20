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
    echo "connection not successfull<br>";   
}
?>
<html>
    <head>
        <title>Edit Record</title>
    </head>
<body>
<center>
    <h1>Edit Record</h1>
<table border="1">
    <tr>
        <th>Emp_Id</th>
        <th>Month_code</th>
        <th>Working_Days</th>
        <th>Present_Days</th>
        <th>Leave_Days</th>
        <th colspan="2">Action</th>
        
    </tr>
    <?php
    $dislpaydata = "select * from attendance";
    $result = mysqli_query($conn, $dislpaydata);
    if(mysqli_num_rows($result)>0)
    {
        while ($row = mysqli_fetch_assoc($result)) 
                {
    ?>
    <tr>
    <form method="POST" autocomplete="off">
        <td><?php echo $row["Emp_Id"];?></td>
        <td><?php echo $row["Month_code"];?></td>
        <td><?php echo $row["Working_Days"];?></td>
        <td><?php echo $row["Present_Days"];?></td>
        <td><?php echo $row["Leave_Days"];?></td>
        <td>
            <button formaction="attendanceupdate.php" name="update" value="<?php echo $row["Emp_Id"];?>">Update</button>
        </td>
        <td>
            <button formaction="attendancedelete.php" name="Delete" value="<?php echo $row["Emp_Id"];?>">Delete</button>
        </td>
        </tr>
    </form>
  <?php
                }
    }
    mysqli_close($conn);
    ?>
  
</table><br>
</body>

</html>  
