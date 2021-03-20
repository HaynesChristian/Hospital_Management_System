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
        <title>Edit Record</title>
    </head>
<body>
<center>
    <h1>Edit Record</h1>
<table border="1">
    <tr>
        <th>Menu_Sr_No</th>
        <th>Food_Item_Id</th>
        <th>Food_Item_Name</th>
        <th>Food_Item_Charges</th>
        <th colspan="2">Action</th>
        
    </tr>
    <?php
    $dislpaydata = "select * from canteen_menu";
    $result = mysqli_query($conn, $dislpaydata);
    if(mysqli_num_rows($result)>0)
    {
        while ($row = mysqli_fetch_assoc($result)) 
                {
    ?>
    <tr>
    <form method="POST" autocomplete="off">
        <td><?php echo $row["Menu_Sr_No"];?></td>
        <td><?php echo $row["Food_Item_Id"];?></td>
        <td><?php echo $row["Food_Item_Name"];?></td>
        <td><?php echo $row["Food_Item_Charges"];?></td>
        <td>
            <button formaction="canteenmenuupdate.php" name="Update" value="<?php echo $row["Menu_Sr_No"];?>">Update</button>
        </td>
        <td>
            <button formaction="canteenmenudelete.php" name="Delete" value="<?php echo $row["Menu_Sr_No"];?>">Delete</button>
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