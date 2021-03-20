<?php
$con_servername = "localhost";
$con_username = "root";
$con_password = "";
$database = "hospital_management_system";

$connection = mysqli_connect($con_servername, $con_username, $con_password, $database);
if($_POST)
{
    $user_realname = $_POST["user_realname"];
    $user_mobileno = $_POST["user_mobileno"];
    $user_type = $_POST["user_type"];
    $user_emailid = $_POST["user_emailid"];
    $user_name = $_POST["user_name"];
    $user_password = $_POST["user_password"];
    
    $view_admin = "SELECT * FROM admin_user";
    $result_admin = mysqli_query($connection, $view_admin);
    if(mysqli_num_rows($result_admin) > 0)
    {
        while ($row_admin = mysqli_fetch_assoc($result_admin))
        {
            if($row_admin["AdminUser_MobileNo"] == $user_mobileno || $row_admin["AdminUser_Email_id"] == $user_emailid)
            {
                echo "user already exist";
                echo "<script>alert('User already exist');</script>";
                if($_POST["admin"])
                {
                    $admin = $_POST["admin"];
                    echo "<script>window.location.href='register_user.php'?username=$admin)</script>";
                }
                else
                {
                    echo "<script>window.location.href='register_user.php';</script>";
                }
            }
            
            if($row_admin["AdminUser_Username"] == $user_name || $row_admin["AdminUser_Password"] == $user_password)
            {
                echo "Username or password already exist";
                echo "<script>alert('Username or password already exist')</script>";
                if($_POST["admin"])
                {
                    $admin = $_POST["admin"];
                    echo "<script>window.location.href='register_user.php'?username=$admin)</script>";
                }
                else
                {
                    echo "<script>window.location.href='register_user.php';</script>";
                }
            }            
        }
    }
    $add_user = "INSERT INTO admin_user (AdminUser_Name , AdminUser_MobileNo , "
            . "AdminUser_Email_id , AdminUser_Type , AdminUser_Username , AdminUser_Password) "
            . "VALUES ('$user_realname' , '$user_mobileno' , '$user_emailid' , '$user_type' , "
            . "'$user_name' , '$user_password')";
    if(mysqli_query($connection, $add_user))
    {
        if($_POST["admin"])
        {
            $admin = $_POST["admin"];
            echo "<script>window.location.href='register_user.php'?username=$admin)</script>";
        }
        else
        {
            echo "<script>window.location.href='register_user.php';</script>";
        }
    }
    else
    {
        echo "<script>alert('User not added')</script>";
        if($_POST["admin"])
        {
            $admin = $_POST["admin"];
            header("Location: register_user.php?username=$admin");
        }
        else
        {
            header("Location: register_user.php");
        }
    }
}