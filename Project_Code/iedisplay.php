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
<table border="1">
    <tr>
        
        
        <th>Income Name</th>
        <th>Income Amount</th>
        <th>Income Date</th>
        
        <th>Expense Name</th>
        <th>Expense Amount</th>
        <th>Expense Date</th>
         <th colspan="4">Income/Expense</th>
        
    </tr>
    <?php
    $dislpaydata = "select * from Income,Expense";
    $result = mysqli_query($conn, $dislpaydata);
    if(mysqli_num_rows($result)>0)
    {
        while ($row = mysqli_fetch_assoc($result)) 
                {
    ?>
    <tr>
    <form method="POST" autocomplete="off">
        
        
        <td><?php echo $row["Income_Name"];?></td>
        <td><?php echo $row["Income_Amount"];?></td>
        <td><?php echo $row["Income_Date"];?></td>
        
        <td><?php echo $row["Expense_Name"];?></td>
        <td><?php echo $row["Expense_Amount"];?></td>
        <td><?php echo $row["Expense_Date"];?></td>
        
        <td>
            <button formaction="Incomeupd.php" name="Update" value="<?php echo $row["Income_Id"];?>">Update</button>
        </td>
        <td>
            <button formaction="Incomedel.php" name="Delete" value="<?php echo $row["Income_Id"];?>">Delete</button>
            
        </td>
        <td>
            <button formaction="Expenseupd.php" name="Update" value="<?php echo $row["Expense_Id"];?>">Update</button>
        </td>
        <td>
            <button formaction="Expensedel.php" name="Delete" value="<?php echo $row["Expense_Id"];?>">Delete</button>
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
