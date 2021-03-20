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
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Departments</title>
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
          <li class="nav-item"><a href="staff.php?admin_name=<?php echo $login_name;?>" class="nav-link">Staff</a></li>
          <li class="nav-item active"><a href="departments.php?admin_name=<?php echo $login_name;?>" class="nav-link">Departments</a></li>
          <li class="nav-item"><a href="doctor.php?admin_name=<?php echo $login_name;?>" class="nav-link">Doctors</a></li>
          <li class="nav-item"><a href="patient.php?admin_name=<?php echo $login_name;?>" class="nav-link">Patient</a></li>
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
              <p class="breadcrumbs"><span class="mr-2"><a href="index.php?admin_name=<?php echo $login_name;?>">Home</a></span> <span class="mr-2"><a href="departments.php?admin_name=<?php echo $login_name;?>">Departments</span></p>
            <h1 class="mb-3 bread">Reports</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section">
    	<div class="container">
            <div class="row d-flex">
                <div class="col-lg-6 d-flex ftco-animate">
                    <div class="dept d-md-flex">
                        <a href="incomeexpense1.php?admin_name=<?php echo $login_name;?>" class="img" style="background-image: url(images/Income-and-Expenses.jpg);"></a>
                        <div class="text p-4">
                            <h3><a href="incomeexpense1.php?admin_name=<?php echo $login_name;?>">Income Expense Report</a></h3>
                            <p><span class="loc">Tattvam Hospital,vadodara</span></p>
                            <p><span class="doc">Monthly Report</span></p>
                            <p>This report summarizes the total income, total expenses, and net income for each of the sub-categories within the income and expense categories; and the total income, total expenses, and net income overall for a specified date range. </p>
                            <ul>
                                <li><span class="ion-ios-checkmark"></span>Generate Report</li>
                                <li><span class="ion-ios-checkmark"></span>Display Report Data</li>
                                <li><span class="ion-ios-checkmark"></span>Search Report</li>
                            </ul>
                        </div>
                    </div>
                </div>
    			<div class="col-lg-6 d-flex ftco-animate">
    				<div class="dept d-md-flex">
                                    <a href="biowaste_report.php?admin_name=<?php echo $login_name;?>" class="img" style="background-image: url(images/biowaste.jpg);"></a>
    					<div class="text p-4">
                                            <h3><a href="biowaste_report.php?admin_name=<?php echo $login_name;?>">Biowaste Report</a></h3>
    						<p><span class="loc">Tattvam Hospital , Vadodara</span></p>
    						<p><span class="doc">Monthly Report</span></p>
    						<p>The safe and sustainable management of biomedical waste (BMW) is social and legal responsibility of all people supporting and financing health-care activities. </p>
    						<ul>
    							 <li><span class="ion-ios-checkmark"></span>Generate Report</li>
                                <li><span class="ion-ios-checkmark"></span>Display Report Data</li>
                                <li><span class="ion-ios-checkmark"></span>Search Report</li>
    						</ul>
    					</div>
                                        
                                        
                                        
                                        
    				</div>
    			</div>
    			<div class="col-lg-6 d-flex ftco-animate">
    				<div class="dept d-md-flex">
                                    <a href="material_report.php?admin_name=<?php echo $login_name;?>" class="img" style="background-image: url(images/medical_material.jpg);"></a>
    					<div class="text p-4">
    						<h3><a href="material_report.php?admin_name=<?php echo $login_name;?>">Material Report</a></h3>
    						<p><span class="loc">Tattvam Hospital , Vadodara</span></p>
    						<p><span class="doc">Monthly Report</span></p>
    						<p>Material Report focus on ensuring their medical facility is properly stocked with the right products and equipment. They're involved in procuring everything from blood pressure cuffs and medications to hospital beds and x-ray machines. </p>
    						<ul>
    							 <li><span class="ion-ios-checkmark"></span>Generate Report</li>
                                                         <li><span class="ion-ios-checkmark"></span>Display Report Data</li>
                                                         <li><span class="ion-ios-checkmark"></span>Search Report</li>
    						</ul>
    					</div>
    				</div>
    			</div>
                
                
                
                
    			<div class="col-lg-6 d-flex ftco-animate">
    				<div class="dept d-md-flex">
                                    <a href="medical_expiry_report.php?admin_name=<?php echo $login_name;?>" class="img" style="background-image: url(images/medicine_expiry.jpg);"></a>
    					<div class="text p-4">
                                            <h3><a href="medical_expiry_report.php?admin_name=<?php echo $login_name;?>">Medicine Expiry Report</a></h3>
    						<p><span class="loc">Tattvam Hospital , Vadodara</span></p>
    						<p><span class="doc">Monthly Report</span></p>
    						<p>Expiration date management is a process that is used to ensure that medical supplies and equipment are up-to-date before they are used on a patient. </p>
    						<ul>
    							 <li><span class="ion-ios-checkmark"></span>Generate Report</li>
                                                         <li><span class="ion-ios-checkmark"></span>Display Report Data</li>
                                                         <li><span class="ion-ios-checkmark"></span>Search Report</li>
    						</ul>
    					</div>
    				</div>
    			</div>
    		</div>
              <div class="row d-flex">
                <div class="col-lg-6 d-flex ftco-animate">
                    <div class="dept d-md-flex">
                        <a href="staff_general_report.php?admin_name=<?php echo $login_name;?>" class="img" style="background-image: url(images/medical_staff.jpg);"></a>
                        <div class="text p-4">
                            <h3><a href="staff_general_report.php?admin_name=<?php echo $login_name;?>">Staff Report</a></h3>
                            <p><span class="loc">Tattvam Hospital,vadodara</span></p>
                            <p><span class="doc">Monthly Report</span></p>
    						<p>Doctors assess and manage your medical treatment. Nurses provide ongoing care. Allied health professionals provide services to help with diagnosis and treatment, and help you during the recovery process. Support and administrative staff work to support the day-to-day running of the hospital. </p>
                            <ul>
                                <li><span class="ion-ios-checkmark"></span>Generate Report</li>
                                <li><span class="ion-ios-checkmark"></span>Display Report Data</li>
                                <li><span class="ion-ios-checkmark"></span>Search Report</li>
                            </ul>
                        </div>
                    </div>
                </div>
    			<div class="col-lg-6 d-flex ftco-animate">
    				<div class="dept d-md-flex">
                                    <a href="payslip_report.php?admin_name=<?php echo $login_name;?>" class="img" style="background-image: url(images/salary_payslip.jpg);"></a>
    					<div class="text p-4">
                                            <h3><a href="payslip_report.php?admin_name=<?php echo $login_name;?>">View Payslip</a></h3>
    						<p><span class="loc">Tattvam Hospital , Vadodara</span></p>
    						<p><span class="doc">Monthly Report</span></p>
    						<p>payslip online and Free pay slip system helps to customize the payslip as per need such as add different logo for each payslip, add employees details, multi currency, add taxes accordingly, add custom fields and terms for each payslip. </p>
    						<ul>
    							 <li><span class="ion-ios-checkmark"></span>Generate Report</li>
                                <li><span class="ion-ios-checkmark"></span>Display Report Data</li>
                                <li><span class="ion-ios-checkmark"></span>Search Report</li>
    						</ul>
    					</div>
                                        
                                        
                                        
                                        
    				</div>
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