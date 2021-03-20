<?php
$con_servername = "localhost";
$con_username = "root";
$con_password = "";
$database = "hospital_management_system";

$connection = mysqli_connect($con_servername, $con_username, $con_password, $database);

$patient_id = $_GET["patient_id"];
$patient_name = $_GET["patient_name"];
$visit_no = $_GET["visit_no"];
$treatment_op_id = $_GET["treatment_op_id"];

if($_GET)
{
    $login_name=$_GET["admin_name"];
}


$current_date = date("Y-m-d");
date_default_timezone_set("Asia/Kolkata");
$current_time = date("H:i");

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Patient</title>
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
    <style>
        td
        {
            padding: 10px;
        }
    </style>
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
          <li class="nav-item"><a href="staff.html" class="nav-link">Staff</a></li>
          <li class="nav-item"><a href="departments.html" class="nav-link">Departments</a></li>
          <li class="nav-item"><a href="doctor.php?admin_name=<?php echo $login_name;?>" class="nav-link">Doctors</a></li>
          <li class="nav-item active"><a href="patient.php?admin_name=<?php echo $login_name;?>" class="nav-link">Patient</a></li>
          <li class="nav-item"><a href="services.html" class="nav-link">Services</a></li>
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
        <div class="row no-gutters slider-text align-items-center justify-content-center" data-scrollax-parent="true">
          <div class="col-md-8 ftco-animate text-center">
            <p class="breadcrumbs">
                <span class="mr-2">
                    <a href="index.php?admin_name=<?php echo $login_name;?>">Home</a>
                </span>
                <span>Patient</span>
            </p>
            <h1 class="mb-3 bread">OutPatient</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section bg-light">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-7 heading-section ftco-animate text-center">
            <h2 class="mb-4">Patient Visit Details</h2>
            <h3><?php echo $patient_name ?></h3>            
          </div>
        </div>
        <div class="row d-flex justify-content-center">
            <form action="Print_Outpatient_Treatment.php" method="POST">
                <input type="hidden" value="<?php echo $login_name;?>" name="admin_name">
                <input type="hidden" value="<?php echo $visit_no;?>" name="visit_no">
            <table class="table table-striped">
                <?php 
                $view_patient = "SELECT * FROM treatment_outpatient WHERE Treatment_Outpatient_id = $treatment_op_id";
                $result_patient = mysqli_query($connection, $view_patient);
                if(mysqli_num_rows($result_patient) > 0)
                {
                    while ($row_patient = mysqli_fetch_assoc($result_patient)) 
                    {
                ?>
                    <tbody>
                        <tr>
                            <td>
                                <div class="form-group">
                                  <label for="treatment_date" class="text-black">Date</label>
                                  <input type="date" class="form-control" id="treatment_date" 
                                         readonly="" name="treatment_date" 
                                         value="<?php echo $row_patient["Treatment_Date"]?>">
                                  <input type="hidden" name="patient_id" value="<?php echo $patient_id?>">
                                  <input type="hidden" name="patient_name" value="<?php echo $patient_name?>">
                                  <input type="hidden" value="<?php echo $row_patient["Payment_ReceiptNo"];?>" name="receipt_no">
                                  <input type="hidden" name="treatment_outpatient_id" 
                                         value="<?php echo $row_patient["Treatment_Outpatient_id"]?>">
                                </div>                                
                            </td>
                            <td>
                                <div class="form-group">
                                  <label for="treatment_time" class="text-black">Time</label><br>
                                  <input type="time" class="form-control" id="treatment_time" 
                                         readonly="" name="treatment_time" 
                                         value="<?php echo $row_patient["Treatment_Time"]?>">                                  
                                </div>                                
                            </td>
                            <td>
                                <div class="form-group">
                                  <label for="treatment_next_date" class="text-black">Next Follow up Date</label>
                                  <input type="date" class="form-control" id="treatment_next_date" 
                                         readonly="" name="treatment_next_date"
                                         value="<?php echo $row_patient["Next_date"]?>">
                                </div>                                
                            </td>
                            <td>
                                <div class="form-group">
                                  <label for="treatment_next_time" class="text-black">Next Follow up Time</label><br>
                                  <input type="time" class="form-control" id="treatment_next_time" 
                                         readonly="" name="treatment_next_time"
                                         value="<?php echo $row_patient["Next_time"]?>">                                  
                                </div>                                
                            </td>							
                        </tr>
                        <tr>
                            <td>
                                <div class="form-group">
                                  <label for="payment_date" class="text-black">Payment Date</label>
                                  <input type="date" class="form-control" id="payment_date" 
                                         readonly="" name="payment_date"
                                         value="<?php echo $row_patient["Payment_date"]?>">
                                  <input type="hidden" name="patient_id" value="<?php echo $patient_id?>">
                                  <input type="hidden" name="patient_name" value="<?php echo $patient_name?>">
                                  <input type="hidden" name="treatment_outpatient_id" value="<?php echo $treatment_op_id?>">
                                </div>                                
                            </td>
                            <td>
                                <div class="form-group">
                                  <label for="payment_mode" class="text-black">Payment mode</label><br>
                                  <input type="text" value="<?php echo $row_patient["Payment_mode"]?>" 
                                         readonly="" class="form-control" name="payment_mode">
                                </div>                                
                            </td>
                            <td>
                                <div class="form-group">
                                  <label for="doctor_charges" class="text-black">Doctor charges</label>
                                  <input type="number" class="form-control" id="doctor_charges" 
                                         readonly="" name="doctor_charges" 
                                         value="<?php echo $row_patient["Doctor_charges"]?>">                                  
                                </div>                                
                            </td>
                            <td>
                                <div class="form-group">
                                  <label for="tax_charges" class="text-black">Tax Charges</label>
                                  <input type="number" class="form-control" id="tax_charges" 
                                         readonly="" name="tax_charges"
                                         value="<?php echo $row_patient["Tax_charges"]?>">
                                </div>                                
                            </td>                            
                        </tr>
                        <tr>
                            <td colspan="2">
                                <div class="form-group">
                                  <label for="treatment_details" class="text-black">Treatment Remarks</label>
                                  <textarea name="treatment_details" id="treatment_details" readonly=""
                                            class="form-control" cols="30" rows="5">
                                      <?php echo $row_patient["Treatment_Remarks"]?>
                                  </textarea>
                                </div>                                
                            </td>
                            <td colspan="2">
                                <div class="form-group">
                                  <label for="total_amount" class="text-black">Total amount</label><br>
                                  <input type="number" class="form-control" id="total_amount" 
                                         readonly="" name="total_amount"
                                         value="<?php echo $row_patient["Total_charges"]?>">                                  
                                </div>
								<div class="form-group">
									<input type="submit" value="Print Treatment Details" class="btn btn-primary">
									<button formaction="Print_Outpatient_PaymentReceipt.php" class="btn btn-primary">
										Print Payment Receipt
									</button>
							  </div>                                  
                            </td>
                        </tr>                        
                    </tbody>
                <?php
                        
                    }
                }
                ?>                
            </table>              
            </form>
        </div> 
      </div>
    </section>
		

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>

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