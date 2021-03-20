<?php
$con_servername = "localhost";
$con_username = "root";
$con_password = "";
$database = "hospital_management_system";

$connection = mysqli_connect($con_servername, $con_username, $con_password, $database);

$appointment_id = $_POST["appointment_id"];
if($_GET)
{   
    $login_name=$_GET["admin_name"];
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Appointments</title>
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
          <li class="nav-item active"><a href="doctor.php?admin_name=<?php echo $login_name;?>" class="nav-link">Doctors</a></li>
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
        <div class="row no-gutters slider-text align-items-center justify-content-center" data-scrollax-parent="true">
          <div class="col-md-8 ftco-animate text-center">
            <p>
                <span class="mr-2">
                    <a href="index.php?admin_name=<?php echo $login_name;?>">Home</a>
                </span>
                <span>Appointment Update</span>
            </p>
            <h1 class="mb-3 bread">Appointment Update</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section bg-light">
      <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 heading-section ftco-animate text-center">
            <h2 class="mb-4">Appointment Details</h2>
          </div>
        </div>
        <div class="row d-flex justify-content-center">
            <form method="POST" action="Appointment_Update.php">
                <input type="hidden" value="<?php echo $login_name;?>" name="admin_name">
              <table border="0" class="table table-striped" style="width:100%;">
                <?php
                $view_operationdetails = "SELECT * FROM doctor_appointment_list "
                        . "WHERE Doctor_Appointment_id = $appointment_id";
                $result_operationlist = mysqli_query($connection, $view_operationdetails);
                if(mysqli_num_rows($result_operationlist) > 0)
                {
                    while($appointment_row= mysqli_fetch_assoc($result_operationlist))
                    {
                ?>                
                <tbody>
                    <tr>
                        <td>
                            <div class="form-group">
                              <label for="appointment_vdate" class="text-black">Date</label>
                              <input type="date" name="VisitorDate" class="form-control" id="appointment_vdate" 
                                     readonly="" value="<?php echo $appointment_row["Doctor_Appointment_date"]?>">
                            </div>
                            <input type="hidden" name="appointment_id" value="<?php echo $appointment_row["Doctor_Appointment_id"]?>">
                            </div>                                
                        </td>
                        <td>
                            <div class="form-group">
                                <label for="appointment_time" class="text-black">Time</label>
                                <select name="VisitorTime" class="form-control" id="appointment_vtime" required="">
                                    <option value="<?php echo $appointment_row["Doctor_Appointment_time"]?>">
                                        <?php echo str_replace("0:00", "0", $appointment_row["Doctor_Appointment_time"])." (selected)";?>
                                    </option> 
                                    <?php
                                    $view_apttime="SELECT Doctor_Appointment_time FROM doctor_appointment_list "
                                            . "WHERE Doctor_Appointment_date = '".$appointment_row['Doctor_Appointment_date']."' AND "
                                            . "Doctor_name  = '".$appointment_row['Doctor_name']."'";
                                    $result_apttime = mysqli_query($connection,$view_apttime);
                                    if(mysqli_num_rows($result_apttime) > 0)
                                    {
                                        while($apptime_row= mysqli_fetch_assoc($result_apttime))
                                        {
                                    ?>
                                    <option value="10:00"
                                        <?php if($apptime_row["Doctor_Appointment_time"] == "10:00:00"){echo "style='display:none'";}?>>
                                        10:00am</option>
                                    <option value="10:30"
                                            <?php if($apptime_row["Doctor_Appointment_time"] == "10:30:00"){echo "style='display:none'";}?>>
                                        10:30am</option>
                                    <option value="11:00"
                                            <?php if($apptime_row["Doctor_Appointment_time"] == "11:00:00"){echo "style='display:none'";}?>>
                                        11:00am</option>
                                    <option value="11:30"
                                            <?php if($apptime_row["Doctor_Appointment_time"] == "11:30:00"){echo "style='display:none'";}?>>
                                        11:30am</option>
                                    <option value="12:00"
                                            <?php if($apptime_row["Doctor_Appointment_time"] == "12:00:00"){echo "style='display:none'";}?>>
                                        12:00pm</option>
                                    <option value="12:30"
                                            <?php if($apptime_row["Doctor_Appointment_time"] == "12:30:00"){echo "style='display:none'";}?>>
                                        12:30pm</option>
                                    <option value="13:00"
                                            <?php if($apptime_row["Doctor_Appointment_time"] == "13:00:00"){echo "style='display:none'";}?>>
                                        1:00pm</option>
                                    <option value="17:00"
                                            <?php if($apptime_row["Doctor_Appointment_time"] == "17:00:00"){echo "style='display:none'";}?>>
                                        5:00pm</option>
                                    <option value="17:30"
                                            <?php if($apptime_row["Doctor_Appointment_time"] == "17:30:00"){echo "style='display:none'";}?>>
                                        5:30pm</option>
                                    <option value="18:00"
                                            <?php if($apptime_row["Doctor_Appointment_time"] == "18:00:00"){echo "style='display:none'";}?>>
                                        6:00pm</option>
                                    <option value="18:30"
                                            <?php if($apptime_row["Doctor_Appointment_time"] == "18:30:00"){echo "style='display:none'";}?>>
                                        6:30pm</option>
                                    <option value="19:00"
                                            <?php if($apptime_row["Doctor_Appointment_time"] == "19:00:00"){echo "style='display:none'";}?>>
                                        7:00pm</option>
                                    
                                    <?php        
                                        }
                                    }
                                    ?>
                                    <?php
                                    ?>                                    
                                </select>                                
                            </div>                                
                        </td>
                        <td>
                            <div class="form-group">
                              <label for="appointment_doctor" class="text-black">Doctor Name</label>
                                <input type="text" readonly="" name="DoctorName" class="form-control" 
                                        id="appointment_doctor" value="<?php echo $appointment_row["Doctor_name"];?>">
                            </div>
                        </td>                        
                    </tr>
                    <tr>
                        <td>
                            <div class="form-group">
                            <label for="appointment_name" class="text-black">Visitor Name</label>
                            <input type="text" name="VisitorName" class="form-control" id="appointment_name" 
                                   required="" value="<?php echo $appointment_row["Visitor_Name"]?>">
                            </div>                                
                        </td>
                        <td>
                            <div class="form-group">
                                <label for="appointment_email" class="text-black">Visitor Email</label>
                                <input type="email" name="VisitorEmail" class="form-control"
                                       id="appointment_email" value="<?php if($appointment_row["Visitor_Email"] == "no email provided")
									   {echo "";}else{echo $appointment_row["Visitor_Email"];}?>">
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                              <label for="appointment_type" class="text-black">Visitor Type</label>
                              <select class="form-control" id="appointment_type" name="VisitorType" required="">
                                  <option value="Patient"
                                          <?php if($appointment_row["Visitor_Type"] == "Patient"){echo "style='display:none'";}?>>
                                      Patient</option>
                                  <option value="MR"
                                          <?php if($appointment_row["Visitor_Type"] == "MR"){echo "style='display:none'";}?>>
                                      MR</option>
                              </select>
                            </div>                            
                        </td>                           
                    </tr>
                    <tr>
                        <td colspan="3">
                            <div class="form-group">
                              <label for="appointment_message" class="text-black">Appointment Description</label>
                              <textarea name="VisitorDesc" id="appointment_message" required=""
                                  class="form-control" cols="20" rows="10">
                               <?php echo trim($appointment_row["Appointment_Description"]);?>             
                              </textarea>
                            </div>                            
                        </td>                        
                    </tr>
                    <tr>
                        <td colspan="3">
                            <div class="form-group">
                              <label for="appointment_status" class="text-black">Visitor Status</label>
                              <select class="form-control" id="appointment_status" name="Visitorstatus" required="">
                                  <option value="booked"
                                          <?php if($appointment_row["Doctor_Appointment_status"] == "booked")
                                              {echo "style='display:none'";}?>>
                                      Booked</option>
                                  <option value="cancelled"
                                          <?php if($appointment_row["Doctor_Appointment_status"] == "cancelled")
                                              {echo "style='display:none'";}?>>
                                      Cancelled</option>
                                  <option value="completed"
                                          <?php if($appointment_row["Doctor_Appointment_status"] == "completed")
                                              {echo "style='display:none'";}?>>
                                      Completed</option>
                              </select>
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
                <input type="submit" value="Update Appointment" class="btn btn-primary">
              </div>              
          </form>

        </div> 
      </div>
    </section>
    
  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>

  <script>
      function checkopr_date()
      {
            var selectedText = document.getElementById('operation_date').value;
            var selectedDate = new Date(selectedText);
            var now = new Date();
            var dt1 = Date.parse(now),
            dt2 = Date.parse(selectedDate);
            if (dt2 < dt1) 
            {
                alert("Date must be in the future ");
                document.getElementById('operation_date').value = now.toISOString().split('T')[0];;
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