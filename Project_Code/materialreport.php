<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hospital_management_system";

$conn = mysqli_connect($servername,$username,$password,$dbname);

if($_POST)
{
    $fdt=$_POST['From_Date'];
    $tdt=$_POST['To_Date'];
}
?>  
<html>
    <head>
        <meta charset="UTF-8">
        <title>Admission history & Physical Assessment form</title>
        <style>
        h2 
        { 
            display: flex; 
            flex-direction: row;
        } 
          
        h2:before, 
        h2:after 
        { 
            content: ""; 
            flex: 1 1; 
            border-bottom: 10px solid #000; 
            margin: auto; 
        }
        img
        {
            height: 20%;
            width: 20%;
        }
        input:not([type="submit"])
        {
            border: 0;
            border-bottom: 1px dashed black;
            width: auto;
        }
        input.fl
        {
            border: 0;
            border-bottom: 1px dashed black;
            width: 100%;
        }        
        input[type="radio"]
        {
            border-radius: 20%;
            border: 1px solid black;
            background: transparent;
        }
        textarea
        {
            border: 1px solid black;
            border-radius: 10px;
        }
        table
        {
            width: 100%;
            line-height: 2;
            margin-right: 5%;
            border-collapse: collapse;
        }
        .notes
        {
            border: 0;
        }
        </style>
         <script>
            function materialreport()
            {
                window.print();
            }
            function materialreportcancel()
            {
                window.location.href = "report_name.php";
            }
        </script>        
    

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hospital_management_system";

$conn = mysqli_connect($servername,$username,$password,$dbname);

?>

     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
   <body onload="materialreport()" onafterprint="materialreportcancel()">
<body>
    <center>

   </head>
    <body class="container" style="font-family: Times New Roman; font-size: 16px;" onload="income_expensedisplay()" onafterprint="income_expensedisplaycancel()">
        <img src="images/tattvam_banner.jpg" align='right'>
        <h2>
            <span style="padding-left: 15px; padding-right: 15px;">
                MATERIAL REPORT
            </span>
        </h2>
        <br/><br/><br/>
        Date : <?php echo date("d/m/Y");?>
        <h4 align="center">
            Period From : <?php echo $fdt;?> To <?php echo $tdt;?><br><br>
        </h4>
      <div class="container">
        
          
<table class="table table-striped">
    <tr style="text-align: center">
                     
                      <th>Purchase Id</th>
                       <th>Item Name</th>
                       <th>Item Type</th>
                       <th>Warranty Period</th>
                       <th>Purchase Date</th>
                       <th>Purchase Quantity</th>
                       <th>Description</th>
                       <th>Unit Price</th>
                       <th>Total Amount</th>
                   </tr>
    <?php

   if($_POST)
{
     $fdt=$_POST['From_Date'];
     $tdt=$_POST['To_Date'];
  // $total_bill_amount=0;
    $dislpaydata = "select * from purchase_order, item_master where item_master.Item_Code = purchase_order.Item_Code And Purchase_Date Between '$fdt' and '$tdt' order by Purchase_Date";
    $result = mysqli_query($conn, $dislpaydata);
    if(mysqli_num_rows($result)>0)
    {
        while ($row = mysqli_fetch_assoc($result)) 
                {
                 //  $total_bill_amount += $row["Total_Amount"];

    ?>
    <tr>
    <form method="POST" autocomplete="off">
      
        <td><?php echo $row["Purchase_Id"];?></td>
        <td><?php echo $row["Item_Name"];?></td>
        <td><?php echo $row["Item_Type"];?></td>
        <td><?php echo $row["Warranty_Period"];?></td>
        <td><?php echo $row["Purchase_Date"];?></td>
        <td><?php echo $row["Purchase_Quantity"];?></td>
        <td><?php echo $row["Description"];?></td>
        <td><?php echo $row["Unit_Price"];?></td>
        <td><?php echo $row["Total_Amount"];?></td>
    </form>
    </tr>
    
    
    
    
  <?php
                }
    }
    mysqli_close($conn);
}
    ?>
    <?php
    
    ?>
                      
  
</table><br>
</body>

</center>
</html>