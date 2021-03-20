<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hospital_management_system";

$conn = mysqli_connect($servername,$username,$password,$dbname);


?>  
<html style="border: 5px solid black;">
    <head>
        <meta charset="UTF-8">
        <title></title>
        <style>
h3 {
   width: 100%; 
   text-align: center; 
   border-bottom: 3px solid #000; 
   line-height: 0.5em;
    
} 

h3 span { 
    background:#fff; 
    padding:0 10px; 
}            
        </style>
         <script>
            function income_expensedisplay()
            {
                window.print();
            }
            function income_expensedisplaycancel()
            {
                window.location.href = "report_name.php";
            }
        </script>
     
        
        



<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  
      <body onload="income_expensedisplay()" onafterprint="income_expensedisplaycancel()">
<body>
    <center>

   
   <body style="text-align: center; padding: 2%">
      
       <h3><span>INCOME EXPENSE REPORT</span> <img style="width: 20%; height: 20%;" src="images/tattvam_banner.jpg" align="right"/></h3><br>
        
        <h2 align="right">Dr. Mrunal Panchal<br>
            Address :Sun Pharma Road,Vadodara <br><br>
        
        
        <?php
   if($_POST)
{
     $fdt=$_POST['From_Date'];
     $tdt=$_POST['To_Date'];
}
?>
      <h2 align="center">   <b>Report Date : <?php echo date("d/m/Y");?></b><br><br></h2>
     <h2> <b>Period From : <?php echo $fdt;?> 
           To   <?php echo $tdt;?></b><br><br></h2>
      
      <div class="container">
        
          
<table border="5" class="table table-striped">
    <tr>
        
        <th>Income Name</th>
        <th>Income Amount</th>
        <th>Income Date</th>
       
    </tr>
    <?php
   if($_POST)
{
     $fdt=$_POST['From_Date'];
     $tdt=$_POST['To_Date'];

    $dislpaydata = "select * from income where Income_Date Between '$fdt' and '$tdt' order by Income_Date";
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
        
       
        </tr>
    </form>
    
    
    
    
  <?php
                }
    }
}
  
    ?>
    <?php
    
    ?>
  
</table><br>

    
        <table border="1" class="table table-striped" style="width:35%" style="height:200px">
    
   
    <tr>
        <tr><td>Total_Income_Amount </td></tr>
    </tr>
    <?php
   // $displaydata = "SELECT * FROM income INNER JOINT expense ON income.Income_Id = expense.Expense_Id";
     //   $displaydata = "SELECT Income_Amount,Total,Income_Date, Expense_Amount, Expense_Date SUM(Income_Amount) Total FROM income, expense";
     $displaydata = "SELECT Income_Name,Income_Amount, SUM(Income_Amount) Income_Amount
FROM
    income";
     

    $result = mysqli_query($conn, $displaydata);
    if(mysqli_num_rows($result)>0)
    {
        while ($row = mysqli_fetch_assoc($result)) 
                {
    ?>
    <tr>
    <form method="POST" autocomplete="off">
        
         <th><?php echo $row["Income_Amount"];?></th>
         </tr>
    </form><br><br>   
  <?php
                }
    }
   
    ?>
  
</table><br>


   
     <body style="text-align: center; padding: 2%">
      
        
          <h1 align="left">Expense Details</h1>
          
<table border="5" class="table table-striped">
    
    <tr>
        
        <th>Expense Name</th>
        <th>Expense Amount</th>
        <th>Expense Date</th>      
        
    </tr>
    <?php
    if($_POST)
    {
        $fdt1=$_POST['From_Date'];
        $tdt1=$_POST['To_Date'];
        
    }    
    $dislpaydata = "select * from expense where Expense_Date Between '$fdt1' and '$tdt1' order by Expense_Date";
    $result = mysqli_query($conn, $dislpaydata);
    if(mysqli_num_rows($result)>0)
    {
        while ($row = mysqli_fetch_assoc($result)) 
                {
    ?>
    <tr>
    <form method="POST" autocomplete="off">
      
        <td><?php echo $row["Expense_Name"];?></td>
        <td><?php echo $row["Expense_Amount"];?></td>
        <td><?php echo $row["Expense_Date"];?></td>
        
       
        </tr>
    </form>
    
    
    
    
  <?php
                }
    }
   
    ?>
    <?php
    
    ?>
  
</table><br>

    
        <table border="1" class="table table-striped" style="width:35%" style="height:200px">
    
   
    <tr>
        <tr><td>Total_Expense_Amount </td></tr>
    </tr>
    <?php
   // $displaydata = "SELECT * FROM income INNER JOINT expense ON income.Income_Id = expense.Expense_Id";
     //   $displaydata = "SELECT Income_Amount,Total,Income_Date, Expense_Amount, Expense_Date SUM(Income_Amount) Total FROM income, expense";
     $displaydata = "SELECT Expense_Name,Expense_Amount, SUM(Expense_Amount) Expense_Amount
FROM
    expense";

    $result = mysqli_query($conn, $displaydata);
    if(mysqli_num_rows($result)>0)
    {
        while ($row = mysqli_fetch_assoc($result)) 
                {
    ?>
    <tr>
    <form method="POST" autocomplete="off">
        
         <th><?php echo $row["Expense_Amount"];?></th>
         </tr>
    </form><br><br>   
    
  
  <?php
                }
    }
   
    ?>
  
</table><br>
</body>

