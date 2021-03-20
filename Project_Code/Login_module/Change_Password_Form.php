<?php
$con_servername = "localhost";
$con_username = "root";
$con_password = "";
$database = "hospital_management_system";

$connection = mysqli_connect($con_servername, $con_username, $con_password, $database);

$user_name = $_GET['uname'];
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <style>
            .text-black
            {
                color: rgba(0, 0, 0, 0.5) !important; 
            }
        </style>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>        
        <script>
            $(document).ready(function(){
                $("#myModal").modal('show');
            });
            
            function mainpage()
            {
                window.location = "login_modal.html";
            }
            
            function checkpwd()
            {
                var np = document.getElementById("Login_pwd").value;
                var cp = document.getElementById("Login_confirm_pwd").value;
                if(np != cp)
                {
                    alert("Confirm Password didn't match");
                    document.getElementById("Login_confirm_pwd").style.borderColor = 'red';
                    document.getElementById("submit_button").disabled = true;
                    document.getElementById("Login_confirm_pwd").focus();                    
                }
            }            
        </script>
    </head>        
    <body style="background-image: url('../images/about.jpg'); background-size: cover; background-repeat: no-repeat">
    <div class="modal fade" id="myModal" role="dialog"  data-backdrop="static" data-keyboard="false"
           aria-labelledby="modalLoginLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" aria-label="Close" onclick="mainpage()">
                <span aria-hidden="true">&times;</span>
              </button>                
              <h5 class="modal-title" id="modalLoginLabel">Change Your Password  <?php echo $user_name?></h5>
            </div>
            <div class="modal-body">
                <form action="Change_Password.php" method="POST" autocomplete="off"
                      onkeydown="return event.key != 'Enter';">
                    <input type="hidden" name="user_name" value="<?php echo $user_name?>">
                <div class="form-group">
                  <label for="Login_pwd" class="text-black">New Password</label>
                  <input type="text" class="form-control" id="Login_pwd" name="Login_pwd">
                </div>
                <div class="form-group">
                  <label for="Login_confirm_pwd" class="text-black">Confirm Password</label>
                  <input type="text" class="form-control" id="Login_confirm_pwd" 
                         name="Login_confirm_pwd" onblur="checkpwd()"/>
                </div>
                <div class="form-group">
                  <input type="submit" value="Change Password" id="submit_button" class="btn btn-primary">
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>      
    </body>
</html>
