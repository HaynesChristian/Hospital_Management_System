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
        <title>Hospital Tax Bill</title>
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
    
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
   </head>
    <body class="container" style="font-family: Times New Roman; font-size: 16px;" onload="materialreport()" onafterprint="materialreportcancel()">
        <img src="images/tattvam_banner.jpg" align='right'>
        <h2>
            <span style="padding-left: 15px; padding-right: 15px;">
                HOSPITAL TAX BILL
            </span>
        </h2>
        <br/><br/><br/>
        <table class="table" style="margin-top: 7%">
            <tr>
                <th>Report Date : <br><?php echo date("d/m/Y");?></th>
                <th colspan="6" style="text-align: center">Period:<br> From <?php echo $fdt;?> To <?php echo $tdt;?></th>
            </tr>
            <tr>
                <th>Bill No.</th>
                <th>Bill Name</th>
                <th>Bill Amount</th>
                <th>Bill Pay Date</th>
                <th>Bill Add Date</th>
            </tr>
            <?php

            $dislpaydata = "select * from hospital_tax where hospital_tax_bill_adddate Between '$fdt' and '$tdt' order by Hospital_tax_id";
            $result = mysqli_query($conn, $dislpaydata);
            if(mysqli_num_rows($result)>0)
            {
                while ($row = mysqli_fetch_assoc($result)) 
                {
            ?>
            <tr>
                <td><?php echo "HT".$row["Hospital_tax_id"];?></td>
                <td><?php echo $row["Hospital_tax_name"];?></td>
                <td><?php echo $row["Hospital_tax_amount"];?></td>
                <td><?php echo $row["hospital_tax_bill_paydate"];?></td>
                <td><?php echo $row["hospital_tax_bill_adddate"];?></td>
            </tr>
            <?php
                }
            }
            ?>
        </table>
        <br>
    </body>
</html>  
