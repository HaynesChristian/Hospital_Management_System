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
            function income_expensedisplay()
            {
                window.print();
            }
            function income_expensedisplaycancel()
            {
                window.location.href = "report_name.php";
            }
        </script>        
    </head>
    <body class="container" style="font-family: Times New Roman; font-size: 16px;" onload="income_expensedisplay()" onafterprint="income_expensedisplaycancel()">
        <img src="images/tattvam_banner.jpg" align='right'>
        <h2>
            <span style="padding-left: 15px; padding-right: 15px;">
                TRANSACTIONS REPORT
            </span>
        </h2>
        <br/><br/><br/>
        Date : <?php echo date("d/m/Y");?>
        <h4 align="center">
            Period From : <?php echo $fdt;?> To <?php echo $tdt;?><br><br>
        </h4>
                   <h4 align="center"> INCOME LIST </h4>
                   <table border="1" class="table table-striped">
                       <tr>
                           <th>Voucher Date</th>
                           <th>Description</th>
                           <th>Amount</th>
                       </tr>
                        <?php
                        $total_income=0;
                        $dislpaydata = "select * from incomeexpense WHERE Account_type = 'income' and Voucher_date Between '$fdt' and '$tdt' order by Voucher_date";
                        $result = mysqli_query($conn, $dislpaydata);
                        if(mysqli_num_rows($result)>0)
                        {
                            while ($row = mysqli_fetch_assoc($result))
                            {
                                $total_income += $row["Amount"];
                        ?>
                        <tr>
                            <td><?php echo $row["Voucher_date"];?></td>
                            <td><?php echo $row["Description"];?></td>
                            <td><?php echo $row["Amount"];?></td>
                        </tr>
                        <?php
                            }
                        }
                        ?>
                        <tr>
                            <td colspan="2">Total Income Amount </td>
                            <td><?php echo $total_income;?></td>
                        </tr>
                   </table>
                   <br><br>
                   
                   <h4 align="center"> EXPENSE LIST </h4>
                   <table border="1">
                       <tr>
                           <th>Voucher Date</th>
                           <th>Description</th>
                           <th>Amount</th>
                      </tr>
                       
                        <?php
                         $total_expense=0;
                        $dislpaydata = "select * from incomeexpense WHERE Account_type = 'expense' and Voucher_date Between '$fdt' and '$tdt' order by Voucher_date";
                        $result = mysqli_query($conn, $dislpaydata);
                        if(mysqli_num_rows($result)>0)
                        {
                            while ($row = mysqli_fetch_assoc($result)) 
                                    {
                                $total_expense += $row["Amount"];
                        ?>
                        <tr>
                            <td><?php echo $row["Voucher_date"];?></td>
                            <td><?php echo $row["Description"];?></td>
                            <td><?php echo $row["Amount"];?></td>

                        </tr>
                        <?php
                                    }
                        }
                        ?>
                         <tr>
                                   <td colspan="2">Total Expense Amount </td>
                                   <td><?php echo $total_expense;?></td>
                        </tr>
                   </table>    
                   </body>
                   <br><br>
                   <h4 align="center"> ASSET LIST </h4>
                   <table border="1">
                       <tr>
                           <th>Voucher Date</th>
                           <th>Description</th>
                           <th>Amount</th>
                       </tr>
                        <?php
                        $total_asset=0;
                        $dislpaydata = "select * from incomeexpense WHERE Account_type = 'asset' and Voucher_date Between '$fdt' and '$tdt' order by Voucher_date";
                        $result = mysqli_query($conn, $dislpaydata);
                        if(mysqli_num_rows($result)>0)
                        {
                            while ($row = mysqli_fetch_assoc($result)) 
                                    {
                                $total_asset += $row["Amount"];
                        ?>
                        <tr>
                            <td><?php echo $row["Voucher_date"];?></td>
                            <td><?php echo $row["Description"];?></td>
                            <td><?php echo $row["Amount"];?></td>

                        </tr>
                        <?php
                                    }
                        }
                        ?>
                         <tr>
                                   <td colspan="2">Total Asset Amount </td>
                                   <td><?php echo $total_asset;?></td>
                        </tr>
                   </table><br><br>
                   <h4 align="center"> LIABILITY LIST </h4>
                    <table border="1">
                       <tr>
                           <th>Voucher Date</th>
                           <th>Description</th>
                           <th>Amount</th>
                      </tr>
                        <?php
                        $total_liability=0;
                        $dislpaydata = "select * from incomeexpense WHERE Account_type = 'liability' and Voucher_date Between '$fdt' and '$tdt' order by Voucher_date";
                        $result = mysqli_query($conn, $dislpaydata);
                        if(mysqli_num_rows($result)>0)
                        {
                            while ($row = mysqli_fetch_assoc($result)) 
                                    {
                                 $total_liability += $row["Amount"];
                        ?>
                        <tr>
                            <td><?php echo $row["Voucher_date"];?></td>
                            <td><?php echo $row["Description"];?></td>
                            <td><?php echo $row["Amount"];?></td>

                        </tr>
                        <?php
                                    }
                        }
                        ?>
                          <tr>
                                   <td colspan="2">Total Liability Amount </td>
                                   <td><?php echo $total_liability;?></td>
                        </tr>
                   </table>        
    </body>
</html>

