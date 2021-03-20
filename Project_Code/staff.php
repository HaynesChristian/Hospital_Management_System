<!DOCTYPE html>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hospital_management_system";

$conn = mysqli_connect($servername,$username,$password,$dbname);
if($_GET)
{   
    $login_name=$_GET["admin_name"];
}

?>
<html lang="en">
  <head>
    <title>Staff</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,700" rel="stylesheet">

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">

    
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
    
  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
      <a class="navbar-brand" href="index.php?admin_name=<?php echo $login_name;?>">
          <i class="flaticon-pharmacy"></i>
          <span>Tattvam</span> Hospital
      </a>

      <div class="collapse navbar-collapse" id="ftco-nav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item"><a href="index.php?admin_name=<?php echo $login_name;?>" class="nav-link">Home</a></li>
          <li class="nav-item active"><a href="staff.php?admin_name=<?php echo $login_name;?>" class="nav-link">Staff</a></li>
          <li class="nav-item"><a href="departments.php?admin_name=<?php echo $login_name;?>" class="nav-link">Departments</a></li>
          <li class="nav-item"><a href="doctor.php?admin_name=<?php echo $login_name;?>" class="nav-link">Doctors</a></li>
          <li class="nav-item "><a href="patient.php?admin_name=<?php echo $login_name;?>" class="nav-link">Patient</a></li>
          <li class="nav-item"><a href="services.php?admin_name=<?php echo $login_name;?>" class="nav-link">Services</a></li>
          <li class="nav-item cta">
              <a href="index.php" class="nav-link">
                  <span>Logout</span>
              </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
    <!-- END nav -->
    
    <div class="hero-wrap" style="background-image: url('images/bg_6.jpg'); background-attachment:fixed;">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center" 
             data-scrollax-parent="true">
          <div class="col-md-8 ftco-animate text-center">
            <p class="breadcrumbs"><span class="mr-2"><a href="index.php?admin_name=<?php echo $login_name;?>">Home</a></span> <span>Staff</span></p>
            <h1 class="mb-3 bread">Staff</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section">
    	<div class="container">
            <div class="row d-flex">
                <div class="col-lg-6 d-flex ftco-animate">
                    <div class="dept d-md-flex">
                        <a href="staffdisplay.php?admin_name=<?php echo $login_name;?>" class="img" style="background-image: url(images/employee.jpg);"></a>
                        <div class="text p-4">
                            <h3><a href="staffdisplay.php?admin_name=<?php echo $login_name;?>">Employee</a></h3>
                            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. </p>
                            <ul>
                                <li><span class="ion-ios-checkmark"></span>Register Employee</li>
                                <li><span class="ion-ios-checkmark"></span>Update Employee</li>
                                <li><span class="ion-ios-checkmark"></span>Delete Employee</li>
                            </ul>
                        </div>
                    </div>
                </div>
    			<div class="col-lg-6 d-flex ftco-animate">
    				<div class="dept d-md-flex">
                                    <a href="attendance_employee_display.php?admin_name=<?php echo $login_name;?>" class="img" style="background-image: url(images/attendance.jpg);"></a>
    					<div class="text p-4">
                                            <h3><a href="attendance_employee_display.php?admin_name=<?php echo $login_name;?>">Attendance</a></h3>
    						<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. </p>
    						<ul>
    							<li><span class="ion-ios-checkmark"></span>Daily Attendance</li>
    							<li><span class="ion-ios-checkmark"></span>Attendance Calculation</li>  
    						</ul>
    					</div>
    				</div>
    			</div>
    			
   
    	<div class="container">
            <div class="row d-flex">
                <div class="col-lg-6 d-flex ftco-animate">
                    <div class="dept d-md-flex">
                        <a href="leave_balance_display.php?admin_name=<?php echo $login_name;?>" class="img" style="background-image: url(images/leaves.jpg);"></a>
                        <div class="text p-4">
                            <h3><a href="leave_balance_display.php?admin_name=<?php echo $login_name;?>">Leaves</a></h3>
                            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. </p>
                            <ul>
                                <li><span class="ion-ios-checkmark"></span>Leave Balance</li>
                                <li><span class="ion-ios-checkmark"></span>Leave Transaction</li>
                            </ul>
                        </div>
                    </div>
                </div>
    			<div class="col-lg-6 d-flex ftco-animate">
    				<div class="dept d-md-flex">
                                    <a href="staffsalary_display.php?admin_name=<?php echo $login_name;?>" class="img" style="background-image: url(images/salary.jpg);"></a>
    					<div class="text p-4">
                                            <h3><a href="staffsalary_display.php?admin_name=<?php echo $login_name;?>">Salary</a></h3>
    						<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. </p>
    						<ul>
    							<li><span class="ion-ios-checkmark"></span>Create Salary</li>
    							<li><span class="ion-ios-checkmark"></span>View Salary</li>
    						</ul>
    					</div>
    				</div>
    			</div>
    			
    </section>

    

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>

  <!-- Modal -->
    <div class="modal fade" id="modalAppointment" tabindex="-1" role="dialog" aria-labelledby="modalAppointmentLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalAppointmentLabel">Appointment</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="#">
              <div class="form-group">
                <label for="appointment_name" class="text-black">Full Name</label>
                <input type="text" class="form-control" id="appointment_name">
              </div>
              <div class="form-group">
                <label for="appointment_email" class="text-black">Email</label>
                <input type="text" class="form-control" id="appointment_email">
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="appointment_date" class="text-black">Date</label>
                    <input type="text" class="form-control" id="appointment_date">
                  </div>    
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="appointment_time" class="text-black">Time</label>
                    <input type="text" class="form-control" id="appointment_time">
                  </div>
                </div>
              </div>
              

              <div class="form-group">
                <label for="appointment_message" class="text-black">Message</label>
                <textarea name="" id="appointment_message" class="form-control" cols="30" rows="10"></textarea>
              </div>
              <div class="form-group">
                <input type="submit" value="Send Message" class="btn btn-primary">
              </div>
            </form>
          </div>
          
        </div>
      </div>
    </div>


  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/bootstrap-datepicker.js"></script>
  <script src="js/jquery.timepicker.min.js"></script>
  <script src="js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js/google-map.js"></script>
  <script src="js/main.js"></script>
    
  </body>
</html>