<?php
$con_servername = "localhost";
$con_username = "root";
$con_password = "";
$database = "hospital_management_system";

$connection = mysqli_connect($con_servername, $con_username, $con_password, $database);

if($_POST)
{
    $Login_username = $_POST["Login_username"];
    $Login_Email = $_POST["Login_Email"];
    
    $flag = 0;
    $check_login = "SELECT AdminUser_Username , AdminUser_Email_id "
            . "FROM admin_user";
    $result_login = mysqli_query($connection, $check_login);
    if(mysqli_num_rows($result_login) > 0)
    {
        while($login_row = mysqli_fetch_assoc($result_login))
        {
            if($Login_username == $login_row["AdminUser_Username"] && $Login_Email == $login_row["AdminUser_Email_id"])
            {
                $flag = 1;
                break;
            }
        }
    }
    
    if($flag==1)
    {
        $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $otp = substr(str_shuffle($permitted_chars), 0, 7);
        header("Location: SendOTP.php?otp=$otp&uname=$Login_username&email=$Login_Email");
        //echo "matched";
    }
    else
    {
        //alert and go to html page
        echo "<script>alert('Wrong username or email');"
        . "window.location='ForgotPassword.html';</script>";
    }    
}

