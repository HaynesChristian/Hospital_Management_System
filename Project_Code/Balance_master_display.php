<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hospital_management_system";

$conn = mysqli_connect($servername,$username,$password,$dbname);

?>
<html>
  
<body>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <center>

    <h1>Balance Master</h1>
<table border="2" class="table table-striped">
    <tr>
        <th>Income_amount</th>
        <th>Expense_amount</th>
        <th>Asset_amount</th>
        <th>Liability_amount</th>
       
    </tr>
    <?php
    $dislpaydata = "select * from balance_master";
    $result = mysqli_query($conn, $dislpaydata);
    if(mysqli_num_rows($result)>0)
    {
        while ($row = mysqli_fetch_assoc($result)) 
                {
    ?>
    <tr>
    <form method="POST" autocomplete="off">
        <td><?php echo $row["Income_amount"];?></td>
        <td><?php echo $row["Expense_amount"];?></td>
        <td><?php echo $row["Asset_amount"];?></td>
        <td><?php echo $row["Liability_amount"];?></td>
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
