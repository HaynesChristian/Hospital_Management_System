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
    $payment_date = $_POST["payment_date"];
    $payment_time = $_POST["payment_time"];
    $discharge_date = $_POST["discharge_date"];
    $discharge_time = $_POST["discharge_time"];    
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
    $patient_bill_id = $_POST["patient_bill_id"];
    
    $update_ip_payment = "UPDATE patient_bill SET Patient_Bill_date = '$payment_date' , "
            . "Patient_Bill_time = '$payment_time' , Discharge_date = '$discharge_date' , "
            . "Discharge_time = '$discharge_time', Patient_id = $patient_id , Treatment_id = $treatment_id , "
            . "Doctor_name = '$doctor_name' , Doctor_Charges = $doctor_charges , "
            . "Tax_Charges = $tax_charges , Nursing_charges = $nursing_charges , "
            . "Canteen_charges = $canteen_charges , Room_Charges = $room_charges , OT_charges = $ot_charges , "
            . "Anaesthesia_charges = $anaethetist_charges , Biowaste_charges = $biowaste_charges , "
            . "Medicine_charges = $medicine_charges , Xray_charges = $xray_charges , "
            . "Laboratary_charges  = $lab_charges ,Total_Bill_Amount = $total_amount , Patient_Payment_mode = '$payment_mode',"
            . "Mediclaim_existense = '$mediclaim_exist',Patient_Payment_status = '$payment_status' "
            . "WHERE Patient_Bill_id = $patient_bill_id";
    
    if(mysqli_query($connection, $update_ip_payment))
    {
        header("Location: Inpatient_Treatment.php?patient_id=$patient_id&admin_name=$login_name");
    }
    else
    {
       echo "<script>alert('Patient Payment Details Not Inserted');"
        . "window.location.href = 'Inpatient_Treatment.php?patient_id=$patient_id&admin_name=$login_name';</script>";
    }
}

