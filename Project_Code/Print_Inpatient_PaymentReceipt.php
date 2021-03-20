<?php
$con_servername = "localhost";
$con_username = "root";
$con_password = "";
$database = "hospital_management_system";

$connection = mysqli_connect($con_servername, $con_username, $con_password, $database);

$current_date = date("Y-m-d");
date_default_timezone_set("Asia/Kolkata");
$current_time = date("H:i");

$patient_id = $_GET["patient_id"];
$treatment_id = $_GET["treatment_id"];
$patient_bill_id = $_GET["patient_bill_id"];
$Patient_Admission_id = $_GET["Patient_Admission_id"];
if($_GET)
{
    $login_name=$_GET["admin_name"];
}
$view_patient = "SELECT * FROM patient_bill , patient_admission , patient "
        . "WHERE Patient_Bill_id = $patient_bill_id AND patient_admission.Treatment_id = $treatment_id "
        . "AND patient.Patient_id = $patient_id";
$result_patient = mysqli_query($connection, $view_patient);
if(mysqli_num_rows($result_patient) > 0)
{
    while ($row_patient_bill = mysqli_fetch_assoc($result_patient))
    {
        $admission_date = $row_patient_bill["Patient_Admission_date"];
        $admission_time = $row_patient_bill["Patient_Admission_time"];
        
        $patient_name = $row_patient_bill["Patient_Name"];
        
        $payment_date = $row_patient_bill["Patient_Bill_date"];
        $payment_time = $row_patient_bill["Patient_Bill_time"];
        $discharge_date = $row_patient_bill["Discharge_date"];
        $discharge_time = $row_patient_bill["Discharge_time"];
        $treatment_days = $row_patient_bill["Treatment_days"];
        $payment_mode = $row_patient_bill["Patient_Payment_mode"];
        $doctor_name = $row_patient_bill["Doctor_name"];
        $doctor_charges = $row_patient_bill["Doctor_Charges"];
        $nursing_charges = $row_patient_bill["Nursing_charges"];
        $tax_charges = $row_patient_bill["Tax_Charges"];
        $canteen_charges = $row_patient_bill["Canteen_charges"];
        $room_charges = $row_patient_bill["Room_Charges"];
        $lab_charges = $row_patient_bill["Laboratary_charges"];
        $xray_charges = $row_patient_bill["Xray_charges"];
        $ot_charges = $row_patient_bill["OT_charges"];
        $receipt_no = $row_patient_bill["Patient_receipt_no"];
        $anaesthesia_charges = $row_patient_bill["Anaesthesia_charges"];
        $biowaste_charges = $row_patient_bill["Biowaste_charges"];
        $medicine_charges = $row_patient_bill["Medicine_charges"];
        $mediclaim_exist = $row_patient_bill["Mediclaim_existense"];
        $total_amount = $row_patient_bill["Total_Bill_Amount"];        
    }
}

$room_bill = "SELECT * FROM patient_admission,room_master "
        . "WHERE Patient_Admission_id = $Patient_Admission_id "
        . "AND Room_no = room_id";
$result_room_bill = mysqli_query($connection, $room_bill);
if(mysqli_num_rows($result_room_bill) > 0)
{
    while ($row_room_bill = mysqli_fetch_assoc($result_room_bill)) 
    {
        $room_charges_day = $row_room_bill["room_charges"];
    }
}

$timestamp1  = strtotime($admission_date);
$admission_date = date('d/m/Y', $timestamp1);

$timestamp2  = strtotime($discharge_date);
$discharge_date = date('d/m/Y', $timestamp2);

$timestamp2  = strtotime($payment_date);
$payment_date = date('d/m/Y', $timestamp2);

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Inpatient Treatment Details</title>
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
        .fl
        {
            float: right;
            border:0;
            padding-right: 5%;
        }
        .fl2
        {
            border: 0;
        }
        </style>
        <script>
            function print_op_treatment()
            {
                window.print();
            }
            function cancel_op_treatment()
            {
				window.location.href = "Inpatient_Treatment.php?&patient_id=<?php echo $patient_id?>&admin_name=<?php echo $login_name?>";
            }
            //code to convert in words
            var a = ['','One ','Two ','Three ','Four ', 'Five ','Six ','Seven ','Eight ','Nine ','Ten ','Eleven ','Twelve ','Thirteen ','Fourteen ','Fifteen ','Sixteen ','Seventeen ','Eighteen ','Nineteen '];
            var b = ['', '', 'Twenty','Thirty','Forty','Fifty', 'Sixty','Seventy','Eighty','Ninety'];

            function inWords (num) {
                if ((num = num.toString()).length > 9) return 'overflow';
                n = ('000000000' + num).substr(-9).match(/^(\d{2})(\d{2})(\d{2})(\d{1})(\d{2})$/);
                if (!n) return; var str = '';
                str += (n[1] != 0) ? (a[Number(n[1])] || b[n[1][0]] + ' ' + a[n[1][1]]) + 'Crore ' : '';
                str += (n[2] != 0) ? (a[Number(n[2])] || b[n[2][0]] + ' ' + a[n[2][1]]) + 'Lakh ' : '';
                str += (n[3] != 0) ? (a[Number(n[3])] || b[n[3][0]] + ' ' + a[n[3][1]]) + 'Thousand ' : '';
                str += (n[4] != 0) ? (a[Number(n[4])] || b[n[4][0]] + ' ' + a[n[4][1]]) + 'Hundred ' : '';
                str += (n[5] != 0) ? ((str != '') ? 'and ' : '') + (a[Number(n[5])] || b[n[5][0]] + ' ' + a[n[5][1]]) + 'only ' : '';
                return str;
            }

            function convertinwords() 
            {
                var total_amt = document.getElementById('total_amt').innerHTML;
                document.getElementById('inwords').innerHTML = inWords(total_amt);
            }            
        </script>        
    </head>
    <body class="container" style="font-family: Times New Roman;" 
          onload="convertinwords(); print_op_treatment()" onafterprint="cancel_op_treatment()">
        <img src="images/tattvam_banner.jpg" align='right'>
        <h2>
            <span style="padding-left: 15px; padding-right: 15px;">
                INPATIENT PAYMENT
            </span>
        </h2><br>
        <table>
            <tbody>
                <tr>
                    <td class="fl2">Patient no: <?php echo $patient_id;?></td>
                    <td class="fl">Bill date: <?php echo $payment_date;?></td>
                </tr>
                <tr>
                    <td class="fl2">Patient name: <?php echo $patient_name;?> </td>
                    <td class="fl">Bill time: <?php echo $payment_time;?></td>
                </tr>
                <tr>
                    <td class="fl2">Doctor name: <?php echo $doctor_name;?> </td>
                    <td class="fl">
                        Admission date:  <?php echo $admission_date;?> 
                        time: <?php echo $admission_time;?> </td>
                </tr>
                <tr>
                    <td class="fl2">Treatment days: <?php echo $treatment_days;?> </td>
                    <td class="fl">
                        Discharge date:  <?php echo $discharge_date;?> 
                        time: <?php echo $discharge_time;?> 
                    </td>
                </tr>
                <tr>
                    <td class="fl2">Receipt no: <?php echo $receipt_no;?> </td>
                    <td class="fl">Payment mode: <?php echo $payment_mode;?> </td>
                </tr>
            </tbody>
        </table>
        <br>

        <table border="1">
            <thead>
                <tr>
                    <th>Sr no.</th>
                    <th>Particulars</th>
                    <th>Amount</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1.</td>
                    <td>Doctor Charges</td>
                    <td> <?php echo $doctor_charges;?> </td>
                </tr>
                <tr>
                    <td>2.</td>
                    <td>Tax Charges</td>
                    <td> <?php echo $tax_charges;?> </td>
                </tr>
                <tr>
                    <td>3.</td>
                    <td>Nursing Charges</td>
                    <td> <?php echo $nursing_charges;?> </td>
                </tr>
                <tr>
                    <td>4.</td>
                    <td>Canteen Charges</td>
                    <td> <?php echo $canteen_charges;?> </td>
                </tr>
                <tr>
                    <td>5.</td>
                    <td>Room Charges (<?php echo $room_charges_day." X ".$treatment_days;?>)</td>
                    <td> <?php echo $room_charges;?> </td>
                </tr>
                <tr>
                    <td>6.</td>
                    <td>OT Charges</td>
                    <td> <?php echo $ot_charges;?> </td>
                </tr>
                <tr>
                    <td>7.</td>
                    <td>Anaesthesia Charges</td>
                    <td> <?php echo $anaesthesia_charges;?> </td>
                </tr>
                <tr>
                    <td>8.</td>
                    <td>Biowaste Charges</td>
                    <td> <?php echo $biowaste_charges;?> </td>
                </tr>
                <tr>
                    <td>9.</td>
                    <td>Medicine Charges</td>
                    <td> <?php echo $medicine_charges;?> </td>
                </tr>
                <tr>
                    <td>10.</td>
                    <td>X-ray Charges</td>
                    <td> <?php echo $xray_charges;?> </td>
                </tr>
                <tr>
                    <td>11.</td>
                    <td>Laboratory Charges</td>
                    <td> <?php echo $lab_charges;?> </td>
                </tr>
                <tr>
                    <td colspan="2"><span class="fl">Total Amount</span></td>
                    <td><span id="total_amt"><?php echo $total_amount;?></span></td>
                </tr>
                <tr>
                    <td><b>Amount In words</b></td>
                    <td colspan="2"><span id="inwords"></span></td>
                </tr>                
            </tbody>
        </table>
        <br><br>
        Does Patient have Mediclaim :  <?php echo $mediclaim_exist;?> 
        <br><br><br>
        <footer>
        <div style="bottom: 0; float:left">Prepared By</div>
        <div style="bottom: 0; float:right ">Authorized Signature</div>
        </footer>
    </body>
</html>
