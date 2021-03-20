<?php
$con_servername = "localhost";
$con_username = "root";
$con_password = "";
$database = "hospital_management_system";

$connection = mysqli_connect($con_servername, $con_username, $con_password, $database);

$current_date = date("Y-m-d");
date_default_timezone_set("Asia/Kolkata");
$current_time = date("H:i");


?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Register User</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,700" rel="stylesheet">

    <link rel="stylesheet" href="../css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="../css/animate.css">
    
    <link rel="stylesheet" href="../css/owl.carousel.min.css">
    <link rel="stylesheet" href="../css/owl.theme.default.min.css">
    <link rel="stylesheet" href="../css/magnific-popup.css">

    <link rel="stylesheet" href="../css/aos.css">

    <link rel="stylesheet" href="../css/ionicons.min.css">

    <link rel="stylesheet" href="../css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="../css/jquery.timepicker.css">

    
    <link rel="stylesheet" href="../css/flaticon.css">
    <link rel="stylesheet" href="../css/icomoon.css">
    <link rel="stylesheet" href="../css/style.css">
    <style>
        td
        {
            padding: 10px;
        }
    </style>
  </head>
  <body>
      
  <?php
  if($_GET)
  {
    $username = $_GET["username"];
  ?>  
  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
      <a class="navbar-brand" href="index.php?admin_name=<?php echo $username;?>">
          <i class="flaticon-pharmacy"></i>
          <span>Tattvam</span> Hospital
      </a>

      <div class="collapse navbar-collapse" id="ftco-nav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active"><a href="../index.php?admin_name=<?php echo $username;?>" class="nav-link">Home</a></li>
          <li class="nav-item"><a href="../staff.html" class="nav-link">Staff</a></li>
          <li class="nav-item"><a href="../departments.html" class="nav-link">Departments</a></li>
          <li class="nav-item"><a href="../doctor.php?admin_name=<?php echo $username;?>" class="nav-link">
                  Doctors</a></li>
          <li class="nav-item"><a href="../patient.php?admin_name=<?php echo $username;?>" class="nav-link">
                  Patient</a></li>
          <li class="nav-item"><a href="../services.html" class="nav-link">Services</a></li>
        </ul>
      </div>
    </div>
  </nav>
      <div class="hero-wrap" style="background-image: url('../images/bg_6.jpg'); background-attachment:fixed;">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center" data-scrollax-parent="true">
          <div class="col-md-8 ftco-animate text-center">
            <p class="breadcrumbs">
                <span class="mr-2">
                    <a href="index.php?admin_name=<?php echo $username;?>">Home</a>
                </span>
                <span>Register User</span>
            </p>
            <h1 class="mb-3 bread">Register User</h1>
          </div>
        </div>
      </div>
    </div>
    <section class="ftco-section bg-light">
      <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 heading-section ftco-animate text-center">
            <h2 class="mb-4">Registered Users Details</h2>
            <button class="btn btn-primary" 
                    data-toggle="modal" data-target="#modalPatientTreatment">
                Add User
            </button>            
          </div>
        </div>
        <div class="row d-flex justify-content-center">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>User Type</th>
                        <th>Name</th>
                        <th>Mobile no.</th>
                        <th>Email_id</th>
                        <th>Edit User details</th>
                    </tr>
                </thead>
                <?php 
                $view_admin = "SELECT AdminUser_id , AdminUser_Type , AdminUser_Name , "
                        . "AdminUser_MobileNo , AdminUser_Email_id FROM admin_user";
                $result_admin = mysqli_query($connection, $view_admin);
                if(mysqli_num_rows($result_admin) > 0)
                {
                    while ($row_admin = mysqli_fetch_assoc($result_admin)) 
                    {
                ?>
                <tbody>
                    <tr>
                        <td><?php echo $row_admin["AdminUser_Type"];?></td>
                        <td><?php echo $row_admin["AdminUser_Name"];?></td>
                        <td><?php echo $row_admin["AdminUser_MobileNo"];?></td>
                        <td><?php echo $row_admin["AdminUser_Email_id"];?></td>
                        <?php
                        if($username == $row_admin["AdminUser_Name"])
                        {
                        ?>
                        <td>
                            <a href="edit_showuser.php?userid=<?php echo $row_admin["AdminUser_id"];?>&admin=<?php echo $username;?>" 
                               class="btn btn-primary">Edit</a>
                        </td>
                        <?php
                        }
                        else
                        {
                        ?>
                        <td>
                        </td>
                        <?php
                        }
                        ?>                        
                    </tr>
                </tbody>
                <?php
                        
                    }
                }
                ?>                
            </table>

        </div> 
      </div>
    </section>
    <footer class="ftco-footer ftco-bg-dark ftco-section img" 
            style="background-image: url(images/bg_5.jpg); padding: 0;">
    	<div class="overlay"></div>
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center">
            <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
         Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart" aria-hidden="true"></i> 
         by <a href="https://colorlib.com" target="_blank">Colorlib</a><br>
            <?php
            if($_GET)
              {
                  $login_name=$_GET["username"];
            ?>         
         developed and modified by <a href="../zDevelopers_Credit.php?admin_name=<?php echo $login_name;?>">Students of MSU BCA 6th Semester (Project No: P1)</a>
            <?php
              }
            else
            {
            ?>
developed and modified by <a href="../zDevelopers_Credit.php">Students of MSU BCA 6th Semester (Project No: P1)</a>         
            <?php
            }
            ?>         
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
          </div>
        </div>
      </div>
    </footer>	
  <?php
  }
  else
  {
  ?>
  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
      <a class="navbar-brand" href="../index.php">
          <i class="flaticon-pharmacy"></i><span>Tattvam</span> Hospital
      </a>

      <div class="collapse navbar-collapse" id="ftco-nav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
              <a href="../index.php" class="nav-link">Home</a>
          </li>          
          <li class="nav-item"><a href="" class="nav-link">Staff</a></li>
          <li class="nav-item"><a href="" class="nav-link">Departments</a></li>
          <li class="nav-item"><a href="" class="nav-link">Doctors</a></li>
          <li class="nav-item"><a href="" class="nav-link">Patient</a></li>
          <li class="nav-item"><a href="" class="nav-link">Services</a></li>
          <li class="nav-item cta" style="padding-left: 1%">
            <a href="register_user.php" class="nav-link">
                <span>Registeration</span>
            </a>
          </li>
          <li class="nav-item cta" style="padding-left: 1%">
              <a href="login_modal.html" class="nav-link">
                  <span>Login</span>
              </a>
          </li>          
        </ul>
      </div>
    </div>
  </nav>    
    <!-- END nav -->
    
    <div class="hero-wrap" style="background-image: url('../images/bg_6.jpg'); background-attachment:fixed;">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center" data-scrollax-parent="true">
          <div class="col-md-8 ftco-animate text-center">
            <p class="breadcrumbs">
                <span class="mr-2">
                    <a href="index.php">Home</a>
                </span>
                <span>Register User</span>
            </p>
            <h1 class="mb-3 bread">Register User</h1>
          </div>
        </div>
      </div>
    </div>
    <section class="ftco-section bg-light">
      <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 heading-section ftco-animate text-center">
            <h2 class="mb-4">Registered Users Details</h2>
            <button class="btn btn-primary" 
                    data-toggle="modal" data-target="#modalnonreg">
                Add User
            </button>            
          </div>
        </div> 
      </div>
    </section>
    <footer class="ftco-footer ftco-bg-dark ftco-section img" 
            style="background-image: url(images/bg_5.jpg); padding: 0;">
    	<div class="overlay"></div>
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center">
            <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
         Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart" aria-hidden="true"></i> 
         by <a href="https://colorlib.com" target="_blank">Colorlib</a><br>
            <?php
            if($_GET)
              {
                  $login_name=$_GET["admin_name"];
            ?>         
         developed and modified by <a href="../zDevelopers_Credit.php?admin_name=<?php echo $login_name;?>">Students of MSU BCA 6th Semester (Project No: P1)</a>
            <?php
              }
            else
            {
            ?>
developed and modified by <a href="../zDevelopers_Credit.php">Students of MSU BCA 6th Semester (Project No: P1)</a>         
            <?php
            }
            ?>         
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
          </div>
        </div>
      </div>
    </footer>    
  <?php
  }
  ?>                
		
  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>
  
  <!-- added by registered user Modal -->
    <div class="modal fade" id="modalPatientTreatment" tabindex="-1" 
         role="dialog" aria-labelledby="modalPatientTreatmentLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalPatientTreatmentLabel">
                User Details
            </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
              <form action="add_user.php" method="POST" autocomplete="off">
                  <input type="hidden" name="admin" value="<?php echo $username?>"/>
                <table style="width: 100%">
                    <tbody>
                        <tr>
                            <td>
                                <div class="form-group">
                                  <label for="user_realname" class="text-black">Full Name</label>
                                  <input type="text" class="form-control" id="user_realname" 
                                         required="" name="user_realname">
                                </div>                                
                            </td>
                            <td>
                                <div class="form-group">
                                  <label for="user_mobileno" class="text-black">Mobile no</label>
                                  <input type="tel" pattern="(7|8|9)[0-9]{9}" class="form-control" id="user_mobileno" 
                                         required="" name="user_mobileno">
                                </div>                                
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-group">
                                  <label for="user_type" class="text-black">User Type</label>
                                  <select class="form-control" id="user_type" name="user_type" required="">
                                        <option value="" disabled="" selected="" hidden="">Select User Type</option>                                      
                                        <option value="admin">Admin</option>
                                        <option value="doctor">Doctor</option>
                                        <option value="receptionist">Receptionist</option>
                                    </select>
                                </div>                                
                            </td>
                            <td>
                                <div class="form-group">
                                  <label for="user_emailid" class="text-black">Email id</label>
                                  <input type="email" class="form-control" id="user_emailid" 
                                         required="" name="user_emailid">
                                </div>                                
                            </td>
                        </tr>                        
                        <tr>
                            <td>
                                <div class="form-group">
                                  <label for="user_name" class="text-black">Username</label>
                                  <input type="text" class="form-control" id="user_name" 
                                         required="" name="user_name">
                                </div>                                
                            </td>
                            <td>
                                <div class="form-group">
                                  <label for="user_password" class="text-black">Password</label><br>
                                  <input type="password" class="form-control" id="user_password" 
                                         required="" name="user_password">                                  
                                </div>                                
                            </td>
                        </tr>
                    </tbody>
                </table>
              <div class="form-group">
                <input type="submit" value="Complete Registeration" class="btn btn-primary">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

  <!-- added by non-registered user Modal -->
    <div class="modal fade" id="modalnonreg" tabindex="-1" 
         role="dialog" aria-labelledby="modalPatientTreatmentLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalPatientTreatmentLabel">
                User Details
            </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
              <form action="add_user.php" method="POST" autocomplete="off">
                <table style="width: 100%">
                    <tbody>
                        <tr>
                            <td>
                                <div class="form-group">
                                  <label for="user_realname" class="text-black">Full Name</label>
                                  <input type="text" class="form-control" id="user_realname" 
                                         required="" name="user_realname">
                                </div>                                
                            </td>
                            <td>
                                <div class="form-group">
                                  <label for="user_mobileno" class="text-black">Mobile no</label>
                                  <input type="tel" pattern="(7|8|9)[0-9]{9}" class="form-control" id="user_mobileno" 
                                         required="" name="user_mobileno">
                                </div>                                
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-group">
                                  <label for="user_type" class="text-black">User Type</label>
                                  <select class="form-control" id="user_type" name="user_type" required="">
                                        <option value="" disabled="" selected="" hidden="">Select User Type</option>                                      
                                        <option value="admin">Admin</option>
                                        <option value="doctor">Doctor</option>
                                        <option value="receptionist">Receptionist</option>
                                    </select>
                                </div>                                
                            </td>
                            <td>
                                <div class="form-group">
                                  <label for="user_emailid" class="text-black">Email id</label>
                                  <input type="email" class="form-control" id="user_emailid" 
                                         required="" name="user_emailid">
                                </div>                                
                            </td>
                        </tr>                        
                        <tr>
                            <td>
                                <div class="form-group">
                                  <label for="user_name" class="text-black">Username</label>
                                  <input type="text" class="form-control" id="user_name" 
                                         required="" name="user_name">
                                </div>                                
                            </td>
                            <td>
                                <div class="form-group">
                                  <label for="user_password" class="text-black">Password</label><br>
                                  <input type="password" class="form-control" id="user_password" 
                                         required="" name="user_password">                                  
                                </div>                                
                            </td>
                        </tr>
                    </tbody>
                </table>
              <div class="form-group">
                <input type="submit" value="Complete Registeration" class="btn btn-primary">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>  


  <script src="../js/jquery.min.js"></script>
  <script src="../js/jquery-migrate-3.0.1.min.js"></script>
  <script src="../js/popper.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <script src="../js/jquery.easing.1.3.js"></script>
  <script src="../js/jquery.waypoints.min.js"></script>
  <script src="../js/jquery.stellar.min.js"></script>
  <script src="../js/owl.carousel.min.js"></script>
  <script src="../js/jquery.magnific-popup.min.js"></script>
  <script src="../js/aos.js"></script>
  <script src="../js/jquery.animateNumber.min.js"></script>
  <script src="../js/bootstrap-datepicker.js"></script>
  <script src="../js/jquery.timepicker.min.js"></script>
  <script src="../js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="../js/google-map.js"></script>
  <script src="../js/main.js"></script>
    
  </body>
</html>