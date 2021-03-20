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
    $treatment_id = $_POST["treatment_id"];
    $treatment_days = $_POST["treatment_days"];
    $payment_date = $_POST["payment_date"];
    $payment_time = $_POST["payment_time"];
    $discharge_date = $_POST["discharge_date"];
    $discharge_time = $_POST["discharge_time"];
    $admission_time = $_POST["admission_time"];
    $admission_date = $_POST["admission_date"];	
    $payment_mode = $_POST["payment_mode"];
    $payment_status = $_POST["payment_status"];
    $doctor_name = $_POST["doctor_name"];
    $doctor_charges = $_POST["doctor_charges"];
    $nursing_charges = $_POST["nursing_charges"];
    $tax_charges = $_POST["tax_charges"];
    $canteen_charges = $_POST["canteen_charges"];
    $room_charges = $_POST["room_charges"];
    $lab_charges = $_POST["lab_charges"];
    $xray_charges = $_POST["xray_charges"];
    $ot_charges = $_POST["ot_charges"];
    $anaethetist_charges = $_POST["anaethetist_charges"];
    $biowaste_charges = $_POST["biowaste_charges"];
    $medicine_charges = $_POST["medicine_charges"];
    $mediclaim_exist = $_POST["mediclaim_exist"];
    $total_amount = $_POST["total_amount"];
    
    $view_patient = "SELECT Patient_Name FROM patient WHERE Patient_id = $patient_id";
    $result_pat = mysqli_query($connection, $view_patient);
    if(mysqli_num_rows($result_pat) > 0)
    {
        while ($row_patient = mysqli_fetch_assoc($result_pat)) 
        {
            $patient_name = $row_patient["Patient_Name"];
        }
    }    
    $recptno = "SELECT Patient_receipt_no FROM patient_bill "
            . "ORDER BY Patient_receipt_no DESC LIMIT 1";
    $result_recptno = mysqli_query($connection, $recptno);
    if(mysqli_num_rows($result_recptno) > 0)
    {
        while($row_recptno = mysqli_fetch_assoc($result_recptno))
        {
            $receipt_no = $row_recptno["Patient_receipt_no"];
            $receipt_no++;
        }
    }
    else
    {$receipt_no=1;}
    
    $insert_ip_payment = "INSERT INTO patient_bill (Patient_Bill_date,Patient_Bill_time,Discharge_date,Discharge_time,"
            . "Patient_id,Patient_receipt_no,Treatment_id,Doctor_name,Doctor_Charges,"
            . "Tax_Charges,Nursing_charges,Canteen_charges,Room_Charges,OT_charges,"
            . "Anaesthesia_charges,Biowaste_charges,Medicine_charges,Xray_charges,"
            . "Laboratary_charges,Treatment_days,Total_Bill_Amount,Patient_Payment_mode,"
            . "Mediclaim_existense,Patient_Payment_status) VALUES "
            . "('$payment_date','$payment_time','$discharge_date','$discharge_time',$patient_id,$receipt_no,$treatment_id,'$doctor_name',$doctor_charges,"
            . "$tax_charges,$nursing_charges,$canteen_charges,$room_charges,$ot_charges,$anaethetist_charges,"
            . "$biowaste_charges,$medicine_charges,$xray_charges,$lab_charges,$treatment_days,$total_amount,"
            . "'$payment_mode','$mediclaim_exist','$payment_status')";    
    if(mysqli_query($connection, $insert_ip_payment))
    {
		$room_select = "SELECT * FROM patient_admission WHERE Treatment_id = $treatment_id AND "
				. "Patient_Admission_date = '$admission_date' AND Patient_Admission_time = '$admission_time'";
		$result_room = mysqli_query($connection, $room_select);
		if(mysqli_num_rows($result_room)>0)
		{
			while($row_room= mysqli_fetch_assoc($result_room))
			{
				$room_no = $row_room["Room_no"];                        
			}
		}		
		$update_room_status = "UPDATE room_master SET room_status = 'Available', Room_Allocated_to = 'None' WHERE room_id = $room_no";
		
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
                && mysqli_query($connection, $update_bal_mstr) && mysqli_query($connection, $update_room_status))
        {
            header("Location: Inpatient_Treatment.php?patient_id=$patient_id&admin_name=$login_name");
        }
        else
        {
            echo "<script>alert('Patient Transactions Details Not Added');"
			. "window.location.href = 'Inpatient_Treatment.php?patient_id=$patient_id&admin_name=$login_name';</script>";
        }        
    }
    else
    {
       echo "<script>alert('Patient Payment Details Not Inserted');"
        . "window.location.href = 'Inpatient_Treatment.php?patient_id=$patient_id&admin_name=$login_name';</script>";
    }
}

