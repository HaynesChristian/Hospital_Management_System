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
    <h1>Edit Record</h1>
    <tr>
        <th>Patient_Id</th>
        <th>Date</th>
        <th>Test_Id</th>
        <th>Test_Description</th>
        <th>Test_Charges</th>
        <th>Test_Status</th>
        <th colspan="2">Action</th>
</tr>
    <?php
    $dislpaydata = "select * from lab_test_data";
    $result = mysqli_query($conn, $dislpaydata);
    if(mysqli_num_rows($result)>0)
    {
        while ($row = mysqli_fetch_assoc($result)) 
                {
    ?>
    <tr>
    <form method="POST" autocomplete="off">
        <td><?php echo $row["Patient_Id"];?></td>
        <td><?php echo $row["Test_Date"];?></td>
        <td><?php echo $row["Test_Id"];?></td>
        <td><?php echo $row["Test_Description"];?></td>
        <td><?php echo $row["Test_Charges"];?></td>
        <td><?php echo $row["Test_Status"];?></td>
        <td>
            <button formaction="testdataupdate.php" name="Update" value="<?php echo $row["Test_Id"];?>">Update</button>
        </td>
        <td>
            <button formaction="testdatadelete.php" name="Delete" value="<?php echo $row["Test_Id"];?>">Delete</button>
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
