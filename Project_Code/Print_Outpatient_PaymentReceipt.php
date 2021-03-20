<?php
$con_servername = "localhost";
$con_username = "root";
$con_password = "";
$database = "hospital_management_system";

$connection = mysqli_connect($con_servername, $con_username, $con_password, $database);


$current_date = date("Y-m-d");
date_default_timezone_set("Asia/Kolkata");
$current_time = date("H:i");

if($_POST)
{
    $login_name = $_POST["admin_name"];
    $receipt_no = $_POST["receipt_no"];
    $visit_no = $_POST["visit_no"];
    
    $patient_id = $_POST["patient_id"];
    $patient_name = $_POST["patient_name"];
    $treatment_op_id = $_POST["treatment_outpatient_id"];
            
    $treatment_date = $_POST["treatment_date"];
    $treatment_time = $_POST["treatment_time"];
    $treatment_details = trim($_POST["treatment_details"]);
    $treatment_next_date = $_POST["treatment_next_date"];
    $treatment_next_time = $_POST["treatment_next_time"];
    
    $payment_date = $_POST["payment_date"];
    $payment_mode = $_POST["payment_mode"];
    $doctor_charges = $_POST["doctor_charges"];
    $tax_charges = $_POST["tax_charges"];
    $total_amount = $_POST["total_amount"];    
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Outpatient Treatment Details</title>
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
        table
        {
            width: 100%;
            border-collapse: collapse;
            border-spacing: 0;
            padding: 0;
            margin: 0;
            line-height: 2;
            table-layout: auto;
            white-space: nowrap;
        }
        td
        {
            border-spacing: 0;
            border: 1px solid black;
            padding: 0;
            padding-left: 10px;
            margin: 0;
            white-space: nowrap;
        }
        img
        {
            height: 20%;
            width: 20%;
        }
        textarea
        {
            border: 0;
        }
        </style>      
    </head>
    <body class="container" style="font-family: Times New Roman;" 
          onload="print_op_treatment()" onafterprint="cancel_op_treatment()">
        <img src="images/tattvam_banner.jpg" align='right'>
        <h2>
            <span style="padding-left: 15px; padding-right: 15px;">
                OUTPATIENT PAYMENT
            </span>
        </h2><br>
        Date : <?php echo $current_date?><br>
        Time : <?php echo $current_time?><br>
        Patient no. : <?php echo "P".$patient_id?><br>
        Patient Name : <?php echo $patient_name?><br>
        Receipt no. : <?php echo "RO".$receipt_no?><br><br>
        <table border="1">
            <thead>
                <tr>
                    <th colspan="2">Payment Details</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Payment Date</td>
                    <td><?php echo $payment_date?></td>
                </tr>
                <tr>
                    <td>Payment Mode</td>
                    <td><?php echo $payment_mode?></td>
                </tr>
                <tr>
                    <td>Doctor Charges</td>
                    <td><?php echo $doctor_charges?></td>
                </tr>
                <tr>
                    <td>Tax Charges</td>
                    <td><?php echo $tax_charges?></td>
                </tr>
                <tr>
                    <td>Total Charges</td>
                    <td><?php echo $total_amount?></td>
                </tr>                
            </tbody>
        </table>
        <br><br>
        
        <div style="position: fixed; bottom: 0px;">Doctor Signature</div>
        <script>
            function print_op_treatment()
            {
                window.print();
            }
            function cancel_op_treatment()
            {
                window.location.href = "View_Outpatient_Treatment.php?treatment_op_id=<?php echo $treatment_op_id?>&patient_id=<?php echo $patient_id?>&patient_name=<?php echo $patient_name?>&admin_name=<?php echo $login_name?>&visit_no=<?php echo $visit_no?>";
            }
        </script>  		
    </body>
</html>
