<?php
$con_servername = "localhost";
$con_username = "root";
$con_password = "";
$database = "hospital_management_system";

$connection = mysqli_connect($con_servername, $con_username, $con_password, $database);

if($_GET)
{
    $otp = $_GET['otp'];
    $uname = $_GET['uname'];
}
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
              <h5 class="modal-title" id="modalLoginLabel">One-Time Password</h5>
            </div>
            <div class="modal-body">
                <form action="Check_OTP.php" method="POST" autocomplete="off">
                    <input type="hidden" name="EmailedOTP" value="<?php echo $otp?>" />
                    <input type="hidden" name="uname" value="<?php echo $uname?>" />                    
                <div class="form-group">
                  <label for="EnteredOtp" class="text-black">Enter Received OTP</label>
                  <input type="text" class="form-control" id="EnteredOtp" name="EnteredOtp">
                </div>
                <div class="form-group">
                  <input type="submit" value="Check OTP" class="btn btn-primary">
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>      
    </body>
</html>
