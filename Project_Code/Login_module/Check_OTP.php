<?php
$con_servername = "localhost";
$con_username = "root";
$con_password = "";
$database = "hospital_management_system";

$connection = mysqli_connect($con_servername, $con_username, $con_password, $database);
if($_POST)
{
    $email_otp = $_POST['EmailedOTP'];
    $entered_otp = $_POST['EnteredOtp'];
    $uname = $_POST['uname'];
    
    if($email_otp == $entered_otp)
    {
        echo "OTP correct";
        //Fgt_ChangePasswordForm
        header("Location: Change_Password_Form.php?uname=$uname");
    }
    else
    {
        echo "OTP inCorrect";
    }
}

