<?php
$con_servername = "localhost";
$con_username = "root";
$con_password = "";
$database = "hospital_management_system";

$connection = mysqli_connect($con_servername, $con_username, $con_password, $database);

if($_POST)
{
    $Login_username = $_POST["Login_username"];
    $Login_Password = $_POST["Login_Password"];
    
    /*echo "$Login_username and $Login_Password";*/
    
    $check_login = "SELECT AdminUser_Name , AdminUser_Username , AdminUser_Password FROM admin_user";
    $result_login = mysqli_query($connection, $check_login);
    if(mysqli_num_rows($result_login) > 0)
    {
        while($login_row = mysqli_fetch_assoc($result_login))
        {
            /*echo "<br>".$login_row['AdminUser_Username']." and ";
            echo $login_row['AdminUser_Password']."<br>";*/
            
            if($Login_username == $login_row["AdminUser_Username"] && $Login_Password == $login_row["AdminUser_Password"])
            {
                $admin_name = $login_row["AdminUser_Name"];
                header("Location: ../index.php?admin_name=$admin_name");
                break;
            }
            else
            {
                echo "<script>alert('Username or Password not matched');"
                . "window.location='login_modal.html';</script>";
                //header("Location: ../index.php");
            }
        }
    }
	else
	{
        echo "<script>alert('No User Exist!! Please Register');"
        . "window.location='register_user.php';</script>";		
	}
}

