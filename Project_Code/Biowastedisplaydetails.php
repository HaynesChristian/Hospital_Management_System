<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hospital_management_system";

$conn = mysqli_connect($servername,$username,$password,$dbname);

?>
<html>
  
<body>
    <center>

    <h1>Biowaste Dispach Details</h1>
<table border="5">
    <tr>
        <th>Biowaste_dispach_id</th>
        <th>Biowaste_dispach_agency_name</th>
        <th>Biowaste_dispach_date</th>
        <th>Biowaste_dispach_quantity</th>
        <th>Biowaste_dispach_type</th>
        <th>Biowaste_dispach_charge</th>
        <th>Biowaste_dispach_report_date</th>
        
    </tr>
    <?php
    $dislpaydata = "select * from Biowaste_dispach";
    $result = mysqli_query($conn, $dislpaydata);
    if(mysqli_num_rows($result)>0)
    {
        while ($row = mysqli_fetch_assoc($result)) 
                {
    ?>
    <tr>
    <form method="POST" autocomplete="off">
        <td><?php echo $row["Biowaste_dispach_id"];?></td>
        <td><?php echo $row["Biowaste_dispach_agency_name"];?></td>
        <td><?php echo $row["Biowaste_dispach_date"];?></td>
        <td><?php echo $row["Biowaste_dispach_quantity"];?></td>
        <td><?php echo $row["Biowaste_dispach_type"];?></td>
        <td><?php echo $row["Biowaste_dispach_charge"];?></td>
        <td><?php echo $row["Biowaste_dispach_report_date"];?></td>
        
         <td>
            <button formaction="biowasteupd.php" name="Update" value="<?php echo $row["Biowaste_dispach_id"];?>">Update</button>
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
