<?php
$con_servername = "localhost";
$con_username = "root";
$con_password = "";
$database = "hospital_management_system";

$connection = mysqli_connect($con_servername, $con_username, $con_password, $database);

if($_POST)
{
    $login_name = $_POST["admin_name"];
    
    $patient_id =$_POST["patient_id"];
    $patient_name = $_POST["patient_name"];
    $treatment_outpatient_id = $_POST["treatment_outpatient_id"];
    $payment_date = $_POST["payment_date"];
    $payment_mode = $_POST["payment_mode"];
    $doctor_charges = $_POST["doctor_charges"];
    $tax_charges = $_POST["tax_charges"];
    $total_amount = $_POST["total_amount"];
    
    $recptno = "SELECT Payment_ReceiptNo FROM treatment_outpatient "
            . "ORDER BY Payment_ReceiptNo DESC LIMIT 1";
    $result_recptno = mysqli_query($connection, $recptno);
    if(mysqli_num_rows($result_recptno) > 0)
    {
        while($row_recptno = mysqli_fetch_assoc($result_recptno))
        {
            $receipt_no = $row_recptno["Payment_ReceiptNo"];
            $receipt_no++;
        }
    }
    else
    {$receipt_no=1;}    
    
    $update_op_payment = "UPDATE treatment_outpatient SET "
            . "Doctor_charges = $doctor_charges , Tax_charges = $tax_charges , "
            . "Total_charges = $total_amount , Payment_mode = '$payment_mode' , "
            . "Payment_date = '$payment_date' , Payment_ReceiptNo = $receipt_no WHERE "
            . "Treatment_Outpatient_id = $treatment_outpatient_id";
    
    if(mysqli_query($connection, $update_op_payment))
    {
        if($_POST['add_payment'])
        {
            $add_bill_voucher = "INSERT INTO incomeexpense (Voucher_date, Account_type, "
                    . "Amount, Description) VALUES ('$payment_date', 'income', "
                    . "$total_amount, 'Patient Bill of ($patient_name)')";
            $add_billmode_voucher = "INSERT INTO incomeexpense (Voucher_date, Account_type, "
                    . "Amount, Description) VALUES ('$payment_date', 'asset', "
                    . "$total_amount, 'Cash for Patient Bill of ($patient_name)')";
            $displaybalance = "SELECT * FROM balance_master";
            $result_balance = mysqli_query($connection, $displaybalance);
            if(mysqli_num_rows($result_balance) > 0)
            {
                while($row_balance = mysqli_fetch_assoc($result_balance))
                {
                    $income_balance=$row_balance["Income_amount"];
                    $income_balance+=$total_amount;
                    
                    $asset_balance=$row_balance["Asset_amount"];
                    $asset_balance+=$total_amount;
                }           
            }
            $update_bal_mstr="update balance_master set Income_amount=$income_balance, Asset_amount=$asset_balance";
            
            if(mysqli_query($connection, $add_bill_voucher) && mysqli_query($connection, $add_billmode_voucher) 
                    && mysqli_query($connection, $update_bal_mstr))
            {
                header("Location: Outpatient_Treatment.php?patient_id=$patient_id&patient_name=$patient_name&admin_name=$login_name");
            }
            else
            {
                echo "<script>alert('Patient Transactions Details Not Added')</script>";
            }            
        }
        else if($_POST['update_payment'])
        {
            $previous_amt = $_POST['previous_amt'];
            $update_bill_voucher = "UPDATE incomeexpense SET Amount = $total_amount "
                    . "WHERE Voucher_date = '$payment_date' AND Description = 'Patient Bill of ($patient_name)' "
                    . "AND Account_type = 'income'";
            
            $update_billmode_voucher = "UPDATE incomeexpense SET Amount = $total_amount "
                    . "WHERE Voucher_date = '$payment_date' AND Description = 'Cash for Patient Bill of ($patient_name)' "
                    . "AND Account_type = 'asset'";
            
            $displaybalance = "SELECT * FROM balance_master";
            $result_balance = mysqli_query($connection, $displaybalance);
            if(mysqli_num_rows($result_balance) > 0)
            {
                while($row_balance = mysqli_fetch_assoc($result_balance))
                {
                    $income_balance=$row_balance["Income_amount"];
                    $income_balance -= $previous_amt;
                    $income_balance+=$total_amount;
                    
                    $asset_balance=$row_balance["Asset_amount"];
                    $asset_balance -= $previous_amt;
                    $asset_balance+=$total_amount;
                }           
            }
            $update_bal_mstr="update balance_master set Income_amount=$income_balance, Asset_amount=$asset_balance";
            
            if(mysqli_query($connection, $update_bill_voucher) && mysqli_query($connection, $update_billmode_voucher) 
                    && mysqli_query($connection, $update_bal_mstr))
            {
                header("Location: Outpatient_Treatment.php?patient_id=$patient_id&patient_name=$patient_name&admin_name=$login_name");
            }
            else
            {
                echo "<script>alert('Patient Transactions Details Not Updated')</script>";
            }            
        }
        else
        {
            header("Location: Outpatient_Treatment.php?patient_id=$patient_id&patient_name=$patient_name&admin_name=$login_name");
        }
    }
    else
    {
       echo "<script>alert('Patient Payment Details Not Updated');"
        . "window.location.href = 'Outpatient_Treatment.php?patient_id=$patient_id&patient_name=$patient_name&admin_name=$login_name';</script>";        
    }
}

