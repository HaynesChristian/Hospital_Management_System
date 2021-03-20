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
    <h1>Edit Record</h1>
<table border="1">
    <tr>
        <th>Laboratory_Cleaning_Id</th>
        <th>Cleaning_Month</th>
        <th>Cleaning_Year</th>
        <th>Cliening_Count</th>
        <th>Last_Cleaning_Date</th>
        <th colspan="2">Action</th>
        
    </tr>
    <?php
    $dislpaydata = "select * from laboratory_cleaning";
    $result = mysqli_query($conn, $dislpaydata);
    if(mysqli_num_rows($result)>0)
    {
        while ($row = mysqli_fetch_assoc($result)) 
                {
    ?>
    <tr>
    <form method="POST" autocomplete="off">
        <td><?php echo $row["Laboratory_Cleaning_Id"];?></td>
        <td><?php echo $row["Cleaning_Month"];?></td>
        <td><?php echo $row["Cleaning_Year"];?></td>
        <td><?php echo $row["Cleaning_Count"];?></td>
        <td><?php echo $row["Last_Cleaning_Date"];?></td>
        <td>
            <button formaction="laboratoryupdate.php" name="Update" value="<?php echo $row["Laboratory_Cleaning_Id"];?>">Update</button>
        </td>
        <td>
            <button formaction="laboratorydelete.php" name="Delete" value="<?php echo $row["Laboratory_Cleaning_Id"];?>">Delete</button>
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
