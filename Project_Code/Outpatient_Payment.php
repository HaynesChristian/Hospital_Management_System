<?php
$con_servername = "localhost";
$con_username = "root";
$con_password = "";
$database = "hospital_management_system";

$connection = mysqli_connect($con_servername, $con_username, $con_password, $database);

$patient_id = $_GET["patient_id"];
$patient_name = $_GET["patient_name"];
$treatment_op_id = $_GET["treatment_op_id"];

if($_GET)
{
    $login_name=$_GET["admin_name"];
}

$view_patient = "SELECT Treatment_id FROM treatment WHERE Patient_id = $patient_id";
    $result_patient = mysqli_query($connection, $view_patient);
    if(mysqli_num_rows($result_patient) > 0)
    {
        while ($row_patient = mysqli_fetch_assoc($result_patient))
        {
            $treatment_id = $row_patient["Treatment_id"];
        }
    }
$current_date = date("Y-m-d");
/*date_default_timezone_set("Asia/Kolkata");
$current_time = date("H:i");*/


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
          <li class="nav-item"><a href="staff.php?admin_name=<?php echo $login_name;?>" class="nav-link">Staff</a></li>
          <li class="nav-item"><a href="departments.php?admin_name=<?php echo $login_name;?>" class="nav-link">Departments</a></li>
          <li class="nav-item"><a href="doctor.php?admin_name=<?php echo $login_name;?>" class="nav-link">Doctors</a></li>
          <li class="nav-item active"><a href="patient.php?admin_name=<?php echo $login_name;?>" class="nav-link">Patient</a></li>
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
        <div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 heading-section ftco-animate text-center">
            <h2 class="mb-4">Patient Payment Details</h2>
            <h3><?php echo $patient_name ?></h3>            
          </div>
        </div>
        <div class="row d-flex justify-content-center">
            <form action="Outpatient_Payment_AddUpdate.php" method="POST" onsubmit="return validateForm()">
                <input type="hidden" value="<?php echo $login_name;?>" name="admin_name">
                <input type="hidden" value="<?php echo $treatment_id;?>" name="treatment_id">
                <input type="hidden" value="add_tran" name="add_payment">
            <table class="table table-striped">
                <tbody>
                        <tr>
                            <td>
                                <div class="form-group">
                                  <label for="payment_date" class="text-black">Payment Date</label>
                                  <input type="date" class="form-control" id="payment_date" 
                                         required="" name="payment_date">
                                  <input type="hidden" name="patient_id" value="<?php echo $patient_id?>">
                                  <input type="hidden" name="patient_name" value="<?php echo $patient_name?>">
                                  <input type="hidden" name="treatment_outpatient_id" value="<?php echo $treatment_op_id?>">
                                </div>                                
                            </td>
                            <td>
                                <div class="form-group">
                                  <label for="payment_mode" class="text-black">Payment mode</label><br>
                                  <select class="form-control" required="" id="payment_mode" name="payment_mode">
                                      <option value="" disabled="" selected="" hidden="">
                                          Select Payment mode
                                      </option>
                                      <option value="Cash"> Cash</option>
                                      <option value="Other">Other</option>
                                  </select>
                                </div>                                
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-group">
                                  <label for="doctor_charges" class="text-black">Doctor charges</label>
                                  <input type="number" class="form-control" id="doctor_charges" min="0" 
                                         required="" name="doctor_charges">                                  
                                </div>                                
                            </td>
                            <td>
                                <div class="form-group">
                                  <label for="tax_charges" class="text-black">Tax Charges</label>
                                  <input type="number" class="form-control" id="tax_charges" min="0" 
                                         required="" name="tax_charges">
                                </div>                                
                            </td>                            
                        </tr>
                        <tr>
                            <td colspan="2">
                                <div class="form-group">
                                  <label for="total_amount" class="text-black">Total amount</label><br>
                                  <input type="number" class="form-control" id="total_amount" placeholder="Click to calculate"
                                         required="" readonly="" name="total_amount" onfocus="calculate_amount()">                                  
                                </div>                                
                            </td>
                        </tr>
                    </tbody>               
            </table>
              <div class="form-group">
                <input type="submit" value="Complete Patient Payment" class="btn btn-primary">
              </div>                
            </form>
        </div> 
      </div>
    </section>
    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>



  <script>
       function validateForm() 
       {
          var x = document.getElementById("total_amount").value;
          if (x == "") 
          {
            alert("Please click on Total Amount field to calculate");
            return false;
          }
		  document.getElementById("total_amount").focus;
       }
      function calculate_amount()
      {
          var dc = document.getElementById("doctor_charges").value;
          var tc = document.getElementById("tax_charges").value;
          var total = parseInt(dc) + parseInt(tc);
          document.getElementById("total_amount").value = total;
      }
  </script>
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