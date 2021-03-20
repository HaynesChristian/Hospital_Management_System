<?php
$con_servername = "localhost";
$con_username = "root";
$con_password = "";
$database = "hospital_management_system";

$connection = mysqli_connect($con_servername, $con_username, $con_password, $database);

$patient_id = $_GET["patient_id"];

$view_patient = "SELECT * FROM patient , treatment WHERE patient.Patient_id = $patient_id "
        . "AND treatment.Patient_id = $patient_id";
$result_patient = mysqli_query($connection, $view_patient);
if(mysqli_num_rows($result_patient) > 0)
{
    while ($row_patient = mysqli_fetch_assoc($result_patient)) 
    {
        $patient_name = $row_patient["Patient_Name"];
        $treatment_id = $row_patient["Treatment_id"];
    }
}

/*$patient_bill_id = "";
$view_patient_bill = "SELECT Patient_Bill_id FROM patient_bill WHERE Patient_id = $patient_id "
        . "AND Treatment_id = $treatment_id";
$result_patient_bill = mysqli_query($connection, $view_patient_bill);
if(mysqli_num_rows($result_patient_bill) > 0)
{
    while ($row_patient_bill = mysqli_fetch_assoc($result_patient_bill)) 
    {
        $patient_bill_id = $row_patient_bill["Patient_Bill_id"];
    }
}

if($patient_bill_id == "")
{
    $patient_bill_id = "";
}*/

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
        .dropbtn 
        {
          border: none;
          cursor: pointer;
        }

        .dropdown {
          position: relative;
          display: inline-block;
        }

        .dropdown-content {
          display: none;
          position: absolute;
          background-color: #f9f9f9;
          border-radius: 10px;
          min-width: 160px;
          box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
          z-index: 1;
        }

        .dropdown-content a {
          color: black;
          padding: 12px 16px;
          text-decoration: none;
          display: block;
        }

        .dropdown-content a:hover {background-color: #f1f1f1}

        .dropdown:hover .dropdown-content {
          display: block;
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
            <h1 class="mb-3 bread">InPatient</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section bg-light">
      <div class="container">
        <div class="row justify-content-center mb-5">
          <div class="col-md-7 heading-section ftco-animate text-center">
            <h2 class="mb-4">Inpatient Treatment Details</h2>
            <h3><?php echo $patient_name ?></h3>
            <button class="btn btn-primary" 
                    onclick="window.location.href='patient_document_format/General_Consent.php?patient_id=<?php echo $patient_id; ?>
					&treatment_id=0&admin_name=<?php echo $login_name?>'">
                Add Treatment
            </button>            
          </div>
        </div>
        <div class="row d-flex justify-content-center">
            <!-- 
            SELECT * FROM treatment, patient_admission, treatment_inpatient 
            WHERE treatment.Patient_id = 14 
            AND treatment.Treatment_id = patient_admission.Treatment_id 
            AND patient_admission.Patient_Admission_id = treatment_inpatient.Patient_Admission_id
            -->
            <table class="table table-striped" >
                <thead>
                    <tr>
                        <th>Admission <br> Date</th>
                        <th>Admission <br> Time</th>
                        <th>Registeration <br> Documents</th>
                        <th>Surgery <br> Documents</th>
                        <th>Daily Assessment <br> Documents</th>
                        <th>Investigation <br> Sheet</th>
                        <th>Services</th>
                        <th>Discharge <br> Documents</th>
                    </tr>
                </thead>
                <?php 
                $view_patient_treatment = "SELECT * FROM treatment, patient_admission "
                        . "WHERE treatment.Patient_id = $patient_id "
                        . "AND treatment.Treatment_id = patient_admission.Treatment_id ";
                $result_patient_treatment = mysqli_query($connection, $view_patient_treatment);
                if(mysqli_num_rows($result_patient_treatment) > 0)
                {
                    while ($row_patient = mysqli_fetch_assoc($result_patient_treatment)) 
                    {
                        $timestamp  = strtotime($row_patient["Patient_Admission_date"]);
                        $patient_adm_date = date('d/m/Y', $timestamp );
                ?>                
                <tbody>
                    <tr>
                        <td><?php echo $patient_adm_date?></td>
                        <td><?php echo $row_patient["Patient_Admission_time"]?></td>
                        <td>
                            <div class="dropdown">
                              <button class="dropbtn btn btn-primary">
                                  Edit / Print
                              </button>
                              <div class="dropdown-content">
                                <a href="patient_document_update/General_Consent.php?patient_id=<?php echo $row_patient['Patient_id']; ?>&admin_name=<?php echo $login_name?>&treatment_id=<?php echo $row_patient['Treatment_id']; ?>">
                                    Edit General Consent</a>
                                <a href="patient_document_update/Admission_history_and_Physical_Assessment_form1.php?patient_id=<?php echo $row_patient['Patient_id']; ?>&treatment_id=<?php echo $row_patient['Treatment_id']; ?>&admin_name=<?php echo $login_name?>">
                                    Edit Admission form page1</a>
                                <a href="patient_document_update/Admission_history_and_Physical_Assessment_form2.php?patient_id=<?php echo $row_patient['Patient_id']; ?>&treatment_id=<?php echo $row_patient['Treatment_id']; ?>&admin_name=<?php echo $login_name?>">
                                    Edit Admission form page2</a>
                                <a href="patient_document_update/Admission_history_and_Physical_Assessment_form3.php?patient_id=<?php echo $row_patient['Patient_id']; ?>&treatment_id=<?php echo $row_patient['Treatment_id']; ?>&admin_name=<?php echo $login_name?>">
                                    Edit Admission form page3</a>
                                <a href="patient_document_update/Admission_history_and_Physical_Assessment_form4.php?patient_id=<?php echo $row_patient['Patient_id']; ?>&treatment_id=<?php echo $row_patient['Treatment_id']; ?>&admin_name=<?php echo $login_name?>">
                                    Edit Admission form page4</a>
                              </div>
                            </div>
                        </td>
                        <td>
                            <div class="dropdown">
                              <button class="dropbtn btn btn-primary">
                                  Add
                              </button>
                              <div class="dropdown-content">
                                <a href="patient_document_format/Surgery_Consent.php?patient_id=<?php echo $row_patient['Patient_id']; ?>&treatment_id=<?php echo $row_patient['Treatment_id']; ?>&admin_name=<?php echo $login_name?>">
                                    Add Surgery Consent
                                </a>
                                <a href="New_Anaesthesia_Consent.php?patient_id=<?php echo $row_patient['Patient_id']; ?>&treatment_id=<?php echo $row_patient['Treatment_id']; ?>&admin_name=<?php echo $login_name?>">
                                    Add Anaesthesia Consent
                                </a>
                                <a href="New_Operative_Notes.php?patient_id=<?php echo $row_patient['Patient_id']; ?>&treatment_id=<?php echo $row_patient['Treatment_id']; ?>&admin_name=<?php echo $login_name?>">
                                    Add Operative Notes
                                </a>
                                  <a href="New_Pre_Anaesthesia.php?patient_id=<?php echo $row_patient['Patient_id']; ?>&treatment_id=<?php echo $row_patient['Treatment_id']; ?>&admin_name=<?php echo $login_name?>">
                                    Add Pre-Anaesthesia
                                </a>
                                <!--<a href="patient_document_format/Anesthesia_records.php?patient_id=<?php echo $row_patient['Patient_id']; ?>&treatment_id=<?php echo $row_patient['Treatment_id']; ?>&admin_name=<?php echo $login_name?>">
                                    Add Anesthesia records
                                </a>-->
                              </div>
                            </div>
                            <br><br>
                            <div class="dropdown">
                              <button class="dropbtn btn btn-primary">
                                  Edit / Print
                              </button>
                              <div class="dropdown-content">
                                <a href="Edit_Surgery_Consent.php?patient_id=<?php echo $row_patient['Patient_id']; ?>&treatment_id=<?php echo $row_patient['Treatment_id']; ?>&admin_name=<?php echo $login_name?>">
                                      Edit Surgery Consent</a>
                                  <a href="Edit_Anaesthesia_Consent.php?patient_id=<?php echo $row_patient['Patient_id']; ?>&treatment_id=<?php echo $row_patient['Treatment_id']; ?>&admin_name=<?php echo $login_name?>">
                                    Edit Anaesthesia Consent</a>
                                  <a href="Edit_Operative_Notes_Page1.php?patient_id=<?php echo $row_patient['Patient_id']; ?>&treatment_id=<?php echo $row_patient['Treatment_id']; ?>&admin_name=<?php echo $login_name?>">
                                    Edit Operative Notes Page 1</a>
                                  <a href="Edit_Operative_Notes_Page2.php?patient_id=<?php echo $row_patient['Patient_id']; ?>&treatment_id=<?php echo $row_patient['Treatment_id']; ?>&admin_name=<?php echo $login_name?>">
                                    Edit Operative Notes Page 2</a>
                                  <a href="Edit_PreAnaesthesia.php?patient_id=<?php echo $row_patient['Patient_id']; ?>&treatment_id=<?php echo $row_patient['Treatment_id']; ?>&admin_name=<?php echo $login_name?>">
                                    Edit Pre-Anaesthesia</a>
                                  <!--<a href="Edit_Anesthesia_records.php?patient_id=<?php echo $row_patient['Patient_id']; ?>&treatment_id=<?php echo $row_patient['Treatment_id']; ?>&admin_name=<?php echo $login_name?>">
                                    Edit Anesthesia records</a>-->
                              </div>
                            </div>                            
                        </td>
                        <td>
                            <div class="dropdown">
                              <button class="dropbtn btn btn-primary">
                                  Add
                              </button>
                              <div class="dropdown-content">
                                <a href="patient_document_format/Doctor_Note.php?patient_id=<?php echo $row_patient['Patient_id']; ?>&treatment_id=<?php echo $row_patient['Treatment_id']; ?>&admin_name=<?php echo $login_name?>">
                                    Add Doctor's Note
                                </a>
                                <a href="patient_document_format/Daily_Treatment_Sheet.php?patient_id=<?php echo $row_patient['Patient_id']; ?>&admission_time=<?php echo $row_patient["Patient_Admission_time"]?>&admission_date=<?php echo $row_patient["Patient_Admission_date"]?>&treatment_id=<?php echo $row_patient['Treatment_id']; ?>&admin_name=<?php echo $login_name?>">
                                    Add Daily Treatment Sheet
                                </a>
                                <a href="patient_document_format/Clinical_handover_note.php?patient_id=<?php echo $row_patient['Patient_id']; ?>&treatment_id=<?php echo $row_patient['Treatment_id']; ?>&admin_name=<?php echo $login_name?>">
                                    Add Clinical Hand-over Note
                                </a>
                              </div>
                            </div>
                            <br><br>
                            <div class="dropdown">
                              <button class="dropbtn btn btn-primary">
                                  Edit / Print
                              </button>
                              <div class="dropdown-content">
                                <a href="Edit_Doctor_Note.php?patient_id=<?php echo $row_patient['Patient_id']; ?>&treatment_id=<?php echo $row_patient['Treatment_id']; ?>&admin_name=<?php echo $login_name?>">
                                    Edit Doctor's Note</a>
                                  <a href="Edit_Daily_Treatment_Sheet.php?patient_id=<?php echo $row_patient['Patient_id']; ?>&admission_time=<?php echo $row_patient["Patient_Admission_time"]?>&admission_date=<?php echo $row_patient["Patient_Admission_date"]?>&treatment_id=<?php echo $row_patient['Treatment_id']; ?>&admin_name=<?php echo $login_name?>">
                                    Edit Daily Treatment Sheet</a>
                                  <a href="Edit_Clinical_handover_note.php?patient_id=<?php echo $row_patient['Patient_id']; ?>&treatment_id=<?php echo $row_patient['Treatment_id']; ?>&admin_name=<?php echo $login_name?>">
                                    Edit Clinical Hand-over Note</a>
                              </div>
                            </div>                            
                        </td>
                        <td>
                            <a class="btn btn-primary" href="patient_document_format/Investigation_Sheet.php?patient_id=<?php echo $row_patient['Patient_id']; ?>&treatment_id=<?php echo $row_patient['Treatment_id']; ?>&admin_name=<?php echo $login_name?>">
                                    Add
                            </a>
                            <br><br>
                            <a class="btn btn-primary" href="Edit_Investigation_Sheet.php?patient_id=<?php echo $row_patient['Patient_id']; ?>&treatment_id=<?php echo $row_patient['Treatment_id']; ?>&admin_name=<?php echo $login_name?>">
                                  Edit / Print
                            </a>
                        </td>
                        <td>
                            <?php
                            $view_patient_bill = "SELECT Patient_Bill_id FROM patient_bill WHERE Patient_id = $patient_id "
                                    . "AND Treatment_id = ". $row_patient['Treatment_id'];
                            $result_patient_bill = mysqli_query($connection, $view_patient_bill);
                            if(mysqli_num_rows($result_patient_bill) <= 0)
                            {
                            ?>                            
                            <div class="dropdown">
                              <button class="dropbtn btn btn-primary">
                                Add
                              </button>
                              <div class="dropdown-content">
                                  <a href="lab_test_data.php?patient_id=<?php echo $row_patient['Patient_id']; ?>&treatment_id=<?php echo $row_patient['Treatment_id']; ?>&admin_name=<?php echo $login_name?>">
                                      Lab Test</a>
                                  <a href="canteen_order_display.php?patient_id=<?php echo $row_patient['Patient_id']; ?>&treatment_id=<?php echo $row_patient['Treatment_id']; ?>&admin_name=<?php echo $login_name?>">
                                      Canteen Order</a>                                  
                              </div>
                            </div>
                            <br><br>                            
                        </td>                        
                        <td>
                            <div class="dropdown">
                              <button class="dropbtn btn btn-primary">
                                Add
                              </button>
                              <div class="dropdown-content">
                                  <a href="Inpatient_Payment.php?patient_id=<?php echo $row_patient['Patient_id']; ?>&Patient_Admission_id=<?php echo $row_patient['Patient_Admission_id']; ?>&treatment_id=<?php echo $row_patient['Treatment_id']; ?>&admin_name=<?php echo $login_name?>">
                                      Patient Bill</a>
                              </div>
                            </div>
                            <br><br>
                            <button class="dropbtn btn btn-secondary">
                                Edit / Print
                            </button>                            
                            <?php
                            }
                            else
                            {
                            ?>
                              <button class="btn btn-secondary">
                                Add
                              </button>
                            <br><br>                            
                        </td>                        
                        <td>                            
                            <button class="dropbtn btn btn-secondary">Add</button>                                                        
                            </a>
                            <br><br>
                            <div class="dropdown">
                              <button class="dropbtn btn btn-primary">
                                Edit / Print
                              </button>
                              <div class="dropdown-content">
                                  <a href="ShowUpdate_Inpatient_Payment.php?patient_id=<?php echo $row_patient['Patient_id']; ?>&Patient_Admission_id=<?php echo $row_patient['Patient_Admission_id']; ?>&treatment_id=<?php echo $row_patient['Treatment_id']; ?>&admin_name=<?php echo $login_name?>">
                                      Patient Bill</a>
                              </div>
                            </div>
                            <?php
                            }
                            ?>                            
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
	  <br/><br/><br/><br/>
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
                                  <input type="date" class="form-control" id="treatment_next_date" 
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