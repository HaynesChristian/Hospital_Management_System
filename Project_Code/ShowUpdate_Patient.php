<?php
$con_servername = "localhost";
$con_username = "root";
$con_password = "";
$database = "hospital_management_system";

$connection = mysqli_connect($con_servername, $con_username, $con_password, $database);

$patient_id = $_GET["patient_id"];
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
            <p>
                <span class="mr-2">
                    <a href="index.php?admin_name=<?php echo $login_name;?>">Home</a>
                </span>
                <span>Patient</span>
            </p>
            <h1 class="mb-3 bread">Patient</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section bg-light">
      <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 heading-section ftco-animate text-center">
            <h2 class="mb-4">Patient Personal Details</h2>
          </div>
        </div>
        <div class="row d-flex justify-content-center">
            <form method="POST" action="Update_Patient.php">
                <input type="hidden" value="<?php echo $login_name;?>" name="admin_name">
              <table border="0" class="table table-striped" style="width:100%;">
                <?php
                $view_patientdetails = "SELECT * FROM patient WHERE Patient_id = $patient_id";
                $result_patientlist = mysqli_query($connection, $view_patientdetails);
                if(mysqli_num_rows($result_patientlist) > 0)
                {
                    while($patient_row= mysqli_fetch_assoc($result_patientlist))
                    {
                ?>                
                <tbody>
                    <tr>
                        <td>
                            <div class="form-group">
                                <label for="patient_srno" class="text-black">Srno.</label>
								<input type="number" class="form-control" id="patient_srno" 
									required="" name="patient_srno" value="<?php echo $patient_row["Patient_SrNo"]?>">
                            </div>                                
                        </td>					
                        <td>
                            <div class="form-group">
                                <label for="patient_name" class="text-black">Full Name</label>
                                <input type="text" class="form-control" id="patient_name" 
                                       required="" name="patient_name" value="<?php echo $patient_row["Patient_Name"]?>">
                                <input type="hidden" name="patient_id" value="<?php echo $patient_row["Patient_id"]?>">
                            </div>                                
                        </td>
                        <td>
                            <div class="form-group">
                                <label for="patient_gender" class="text-black">Gender</label><br>
                                <input type="radio" name="patient_gender" required="" value="Male" 
                                       <?php if($patient_row["Patient_Gender"] == 'Male'){echo "checked=checked";}?>
                                       /> Male <br/>
                                <input type="radio" name="patient_gender" required="" value="Female" 
                                         <?php if($patient_row["Patient_Gender"] == 'Female'){echo "checked=checked";}?>
                                         /> Female
                            </div>                                
                        </td>
                        <td>
                            <div class="form-group">
                                <label for="patient_contact" class="text-black">Mobile No</label>
                                <input type="tel" pattern="(7|8|9)[0-9]{9}" class="form-control"
                                        id="patient_contact" name="patient_contact" required=""
                                        value="<?php echo $patient_row["Patient_MobileNo"]?>">
                            </div>
                        </td>                        
                    </tr>
                    <tr>
                        <td>
                            <div class="form-group">
                                <label for="patient_type" class="text-black">Type</label><br>
                                <input type="radio" name="patient_type" value="inpatient" required=""
                                       <?php if($patient_row["Patient_Type"] == 'inpatient'){echo "checked=checked";}?>
                                       /> Inpatient <br/>
                                <input type="radio" name="patient_type" value="outpatient" required=""
                                       <?php if($patient_row["Patient_Type"] == 'outpatient'){echo "checked=checked";}?>
                                       /> Outpatient
                            </div>                                
                        </td>
                        <td>
                            <div class="form-group">
                                <label for="patient_age" class="text-black">Age</label>
                                <input type="number" min="0" max="150" value="<?php echo $patient_row["Patient_Age"]?>"
                                         class="form-control" id="patient_age" name="patient_age" required="" >
                            </div>                                
                        </td>
                        <td colspan="2">
                            <div class="form-group">
                                <label for="patient_email" class="text-black">Email id</label>
                                <input type="email" class="form-control" 
                                       id="patient_email" name="patient_email"
									   value="<?php if($patient_row["Patient_Email_id"] == "no email provided"){echo "";}
									   else{echo $patient_row["Patient_Email_id"];}?>">
                            </div>                                
                        </td>                            
                    </tr>
                    <tr>
                        <td colspan="2">
                            <div class="form-group">
                                <label for="patient_adrs" class="text-black">Address</label>
                                <textarea name="patient_adrs" id="patient_adrs" required="" class="form-control" cols="30" rows="5"><?php echo $patient_row["Patient_Address"]?></textarea>
                            </div>                                
                        </td>
                        <td>
                            <div class="form-group">
                                <label for="patient_height" class="text-black">Height</label>
                                <input type="number" class="form-control" id="patient_height" step="0.01"
                                       name="patient_height" value="<?php echo $patient_row["Patient_Height"]?>">
                            </div>
                        </td>
                        <td>							
                            <div class="form-group">
                                <label for="patient_weight" class="text-black">Weight</label>
                                <input type="number" class="form-control" id="patient_weight" step="0.01" 
                                       name="patient_weight" value="<?php echo $patient_row["Patient_Weight"]?>">
                            </div>                            
                        </td>                        
                    </tr>
                    <tr>
                        <td colspan="2">
                            <div class="form-group">
                                <label for="patient_relative_name" class="text-black">Relative Name</label>
                                <input type="text" class="form-control" required=""
                                       name="patient_relative_name" id="patient_relative_name"
                                       value="<?php echo $patient_row["Patient_Relative_name"]?>">
                            </div>                                
                        </td>
                        <td>
                            <div class="form-group">
                                <label for="patient_relative_rel" class="text-black">Relative Relation</label>
                                <input type="text" class="form-control" required=""
                                       id="patient_relative_rel" name="patient_relative_rel"
                                       value="<?php echo $patient_row["Patient_Relative_Relation"]?>">
                            </div>                                
                        </td>
                        <td>
                            <div class="form-group">
                                <label for="patient_relative_no" class="text-black">Relative Contact</label>
                                <input type="text" class="form-control" required="" 
                                         id="patient_relative_no" name="patient_relative_no"
                                         value="<?php echo $patient_row["Patient_Relative_Contact"]?>">
                            </div>                                
                        </td>                        
                    </tr>
                </tbody>
                <?php
                    }
                }
                ?>                
            </table>
              <div class="form-group">
                <input type="submit" value="Update Patient Details" class="btn btn-primary">
              </div>              
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