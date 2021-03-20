<?php
$con_servername = "localhost";
$con_username = "root";
$con_password = "";
$database = "hospital_management_system";

$connection = mysqli_connect($con_servername, $con_username, $con_password, $database);
if($_POST)
{
    $Login_pwd = $_POST['Login_pwd'];
    $user_name = $_POST['user_name'];
    
    $update_new_pwd = "UPDATE admin_user SET AdminUser_Password = '$Login_pwd' "
            . "WHERE AdminUser_Username = '$user_name'";
    if(mysqli_query($connection, $update_new_pwd))
    {
        header("Location: login_modal.html");
    }
    else
    {
        echo "<script>alert('Password not change. Try Again !!');"
        . "window.location='login_modal.html';</script>";
    }
}

