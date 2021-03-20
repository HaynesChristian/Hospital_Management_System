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
        <title>Medicine Report</title>
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
            function medicineexpiryreport()
            {
                window.print();
            }
            function medicineexpiryreportcancel()
            {
                window.location.href = "report_name.php";
            }
        </script>        
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
   </head>
    <body class="container" style="font-family: Times New Roman; font-size: 16px;" 
          onload="medicineexpiryreport()" onafterprint="medicineexpiryreportcancel()">
        <img src="images/tattvam_banner.jpg" align='right'>
        <h2>
            <span style="padding-left: 15px; padding-right: 15px;">
                MEDICINE EXPIRY REPORT
            </span>
        </h2>
        <br/><br/><br/>
        <table class="table" style="margin-top: 7%">
            <tr>
                <th>Report Date : <?php echo date("d/m/Y");?></th>
                <th colspan="6" style="text-align: center">Period:<br> From <?php echo $fdt;?> To <?php echo $tdt;?></th>
            </tr>
            <tr>
                <th>Medicine Name</th>
                <th>Batch No.</th>
                <th>Manufacture Date</th>
                <th>Expiry Date</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Total Price</th>
            </tr>
            <?php
            $total_med_amt = 0;
            $dislpaydata = "select * from Medicine where Expiry_Date Between '$fdt' and '$tdt' order by Expiry_Date";
            $result = mysqli_query($conn, $dislpaydata);
            if(mysqli_num_rows($result)>0)
            {
                while ($row = mysqli_fetch_assoc($result)) 
                {
                    $total_med_amt += $row["Total_Price"];
            ?>
            <tr>
                <td><?php echo $row["Medicine_Name"];?></td>
                <td><?php echo $row["Batch_no"];?></td>
                <td><?php echo $row["manufacture_Date"];?></td>
                <td><?php echo $row["Expiry_Date"];?></td>
                <td><?php echo $row["Quantity"];?></td>
                <td><?php echo $row["Price"];?></td>
                <td><?php echo $row["Total_Price"];?></td>
            </tr>
          <?php
               }
            }
            ?>
            <tr>
                <td colspan="6">Total Amount</td>
                <td><?php echo $total_med_amt;?></td>
            </tr>
        </table>
        <br>
    </body>
</center>

</html>  
