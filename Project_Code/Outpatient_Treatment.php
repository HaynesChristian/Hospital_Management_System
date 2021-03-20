<?php
$con_servername = "localhost";
$con_username = "root";
$con_password = "";
$database = "hospital_management_system";

$connection = mysqli_connect($con_servername, $con_username, $con_password, $database);

$patient_id = $_GET["patient_id"];
$view_patient = "SELECT * FROM patient WHERE Patient_id = $patient_id";
$result_patient = mysqli_query($connection, $view_patient);
if(mysqli_num_rows($result_patient) > 0)
{
    while ($row_patient = mysqli_fetch_assoc($result_patient)) 
    {
        $patient_name = $row_patient["Patient_Name"];
    }
}
$current_date = date("Y-m-d");
date_default_timezone_set("Asia/Kolkata");
$current_time = date("H:i");

if($_GET)
{   
    $login_name=$_GET["admin_name"];
}
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
            <h2 class="mb-4">Outpatient Treatment Details</h2>
            <h3><?php echo $patient_name ?></h3>
            <button class="btn btn-primary" 
                    data-toggle="modal" data-target="#modalPatientTreatment">
                Add Treatment
            </button>            
          </div>
        </div>
        <div class="row d-flex justify-content-center">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Treatment Remarks</th>
                        <th>Next Follow up Time</th>
                        <th>Next Follow up Date</th>
                        <th colspan="3"><center>Payment</center></th>
                    </tr>
                </thead>
                <?php
                $visitno= strval($patient_id)."".strval(0);
                $view_patient = "SELECT * FROM treatment, treatment_outpatient WHERE "
                        . "treatment.Patient_id = $patient_id"
                        . " AND treatment.Treatment_id = treatment_outpatient.Treatment_id";
                $result_patient = mysqli_query($connection, $view_patient);
                if(mysqli_num_rows($result_patient) > 0)
                {
                    while ($row_patient = mysqli_fetch_assoc($result_patient)) 
                    {
                        $timestamp  = strtotime($row_patient["Treatment_Date"]);
                        $tm_date = date('d/m/Y', $timestamp );
                        $timestamp1  = strtotime($row_patient["Next_date"]);
                        $fu_date = date('d/m/Y', $timestamp1 );						
                        $visitno++;
                ?>
                <tbody>
                    <tr>
                        <td><?php echo $tm_date?></td>
                        <td><?php echo $row_patient["Treatment_Time"];?></td>
                        <td><?php echo $row_patient["Treatment_Remarks"];?></td>
                        <td><?php echo $row_patient["Next_time"];?></td>
                        <td><?php echo $fu_date;?></td>
                        <td>
                            <a href="ShowUpdate_Outpatient_Treatment.php?treatment_op_id=<?php echo $row_patient["Treatment_Outpatient_id"]?>&patient_id=<?php echo $patient_id?>&patient_name=<?php echo $patient_name?>&admin_name=<?php echo $login_name?>" 
                               class="btn btn-primary">
                                Edit Treatment
                            </a>
                        </td>
                        <td>
                            <?php
                            if($row_patient["Total_charges"] == 0)
                            {
                            ?>
                            <a href="Outpatient_Payment.php?treatment_op_id=<?php echo $row_patient["Treatment_Outpatient_id"]?>&patient_id=<?php echo $patient_id?>&patient_name=<?php echo $patient_name?>&admin_name=<?php echo $login_name?>" 
                               class="btn btn-primary">Add</a>
                            <?php
                            }
                            else
                            {
                            ?>
                            <a href="ShowUpdate_Outpatient_Payment.php?treatment_op_id=<?php echo $row_patient["Treatment_Outpatient_id"]?>&patient_id=<?php echo $patient_id?>&patient_name=<?php echo $patient_name?>&admin_name=<?php echo $login_name?>"
                               class="btn btn-primary">Edit</a>
                            <?php
                            }
                            ?>
                        </td>
                        <td>
                            <a href="View_Outpatient_Treatment.php?treatment_op_id=<?php echo $row_patient["Treatment_Outpatient_id"]?>&patient_id=<?php echo $patient_id?>&patient_name=<?php echo $patient_name?>&admin_name=<?php echo $login_name?>&visit_no=<?php echo $visitno?>"
                               class="btn btn-primary">View & Print</a>
                        </td>                        
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
		

  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>
  
  <!-- Patient Modal -->
    <div class="modal fade" id="modalPatientTreatment" tabindex="-1" 
         role="dialog" aria-labelledby="modalPatientTreatmentLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalPatientTreatmentLabel">
                Patient Treatment Details
            </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
              <form action="Outpatient_Treatment_Add.php" method="POST">
                  <input type="hidden" value="<?php echo $login_name;?>" name="admin_name">
                <table style="width: 100%">
                    <tbody>
                        <tr>
                            <td>
                                <div class="form-group">
                                  <label for="treatment_date" class="text-black">Date</label>
                                  <input type="date" class="form-control" id="treatment_date"
                                         required="" name="treatment_date" value="<?php echo $current_date?>">
                                  <input type="hidden" name="patient_id" value="<?php echo $patient_id?>">
                                  <input type="hidden" name="patient_name" value="<?php echo $patient_name?>">
                                </div>                                
                            </td>
                            <td>
                                <div class="form-group">
                                  <label for="treatment_time" class="text-black">Time</label><br>
                                  <input type="time" class="form-control" id="treatment_time" 
                                         required="" name="treatment_time" value="<?php echo $current_time?>">                                  
                                </div>                                
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <div class="form-group">
                                  <label for="treatment_details" class="text-black">Treatment Remarks</label>
                                  <textarea name="treatment_details" id="treatment_details" required=""
                                            class="form-control" cols="30" rows="5"></textarea>
                                </div>                                
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-group">
                                  <label for="treatment_next_date" class="text-black">Next Follow up Date</label>
                                  <input type="date" class="form-control" id="treatment_next_date" onchange="checkapt_date()"
                                         required="" name="treatment_next_date">
                                </div>                                
                            </td>
                            <td>
                                <div class="form-group">
                                  <label for="treatment_next_time" class="text-black">Next Follow up Time</label><br>
                                  <input type="time" class="form-control" id="treatment_next_time" 
                                         required="" name="treatment_next_time">                                  
                                </div>                                
                            </td>
                        </tr>
                    </tbody>
                </table>

              <div class="form-group">
                <input type="submit" value="Complete Patient Treatment" class="btn btn-primary">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>  

  <script>
        function checkapt_date()
        {
              var selectedText = document.getElementById('treatment_next_date').value;
              var selectedDate = new Date(selectedText);
              var now = new Date();
              var tomorrow = new Date();
              tomorrow.setDate(new Date().getDate()+1);              
              var dt1 = Date.parse(now),
              dt2 = Date.parse(selectedDate);
              if (dt2 < dt1) 
              {
                  alert("Date must be in the future ");
                  document.getElementById('treatment_next_date').value = tomorrow.toISOString().split('T')[0];;
              }
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