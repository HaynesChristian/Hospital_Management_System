<?php
$con_servername = "localhost";
$con_username = "root";
$con_password = "";
$database = "hospital_management_system";

$connection = mysqli_connect($con_servername, $con_username, $con_password, $database);

$operation_schedule_id = $_POST["operation_schedule_id"];
if($_GET)
{   
    $login_name=$_GET["admin_name"];
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Operation List</title>
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
                <span>Operation Schedule</span>
            </p>
            <h1 class="mb-3 bread">Operation Schedule Update</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section bg-light">
      <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 heading-section ftco-animate text-center">
            <h2 class="mb-4">Operation Schedule Details</h2>
          </div>
        </div>
        <div class="row d-flex justify-content-center">
            <form method="POST" action="Operation_Schedule_Update.php">
                <input type="hidden" value="<?php echo $login_name;?>" name="admin_name">
              <table border="0" class="table table-striped" style="width:100%;">
                <?php
                $view_operationdetails = "SELECT * FROM operation_schedule "
                        . "WHERE Operation_Schedule_id = $operation_schedule_id";
                $result_operationlist = mysqli_query($connection, $view_operationdetails);
                if(mysqli_num_rows($result_operationlist) > 0)
                {
                    while($operation_row= mysqli_fetch_assoc($result_operationlist))
                    {
                ?>                
                <tbody>
                    <tr>
                        <td>
                            <div class="form-group">
                                <label for="operation_date" class="text-black">Date</label>
                                <input type="date" name="OperationDate" class="form-control" id="operation_date" 
                                       readonly="" value="<?php echo $operation_row["Operation_Schedule_date"]?>">
                                <input type="hidden" name="operation_schedule_id" value="<?php echo $operation_row["Operation_Schedule_id"]?>">
                            </div>                                
                        </td>
                        <td>
                            <div class="form-group">
                              <label for="operation_time" class="text-black">Time</label>
                              <input type="text"name="OperationTime" class="form-control" 
                                     id="operation_time" readonly="" value="<?php echo $operation_row["Operation_Schedule_time"]?>">
                            </div>                                
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="form-group">
                              <label for="Operation_doctor" class="text-black">Doctor Name</label>
                              <select class="form-control" name="Operation_doctor" id="Operation_doctor">
                                  <?php
                                  $doctorname = "SELECT * FROM doctor";
                                  $result_doctor = mysqli_query($connection, $doctorname);
                                  if(mysqli_num_rows($result_doctor) > 0)
                                  {
                                      while($dr_row = mysqli_fetch_assoc($result_doctor))
                                      {
                                  ?>
                                  <option value="<?php echo $dr_row["Doctor_Name"];?>"
                                          <?php if($operation_row["Doctor_name"] == $dr_row["Doctor_Name"])
                                              {echo "selected='selected'";}?>>
                                      <?php echo $dr_row["Doctor_Name"];?>
                                  </option>
                                  <?php
                                      }
                                  }
                                  ?>
                              </select>
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                              <label for="Operation_patient" class="text-black">Patient Name</label>
                              <input type="text" name="Operation_patient" id="Operation_patient" class="form-control" 
                                     readonly="" value="<?php echo $operation_row["Patient_name"]?>">
                            </div>                                
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="form-group">
                              <label for="operation_duration" class="text-black">Operation duration (in Mins)</label>
                              <input type="number" name="OperationDuration" class="form-control" 
                                     id="operation_duration" value="<?php echo $operation_row["Operation_Schedule_duration"]?>">
                            </div>                               
                        </td>
                        <td>
                            <div class="form-group">
                              <label for="operation_status" class="text-black">Operation Status</label>
                              <select class="form-control" id="operation_status" name="operation_status" required="">
                                  <option value="booked"
                                          <?php if($operation_row["Operation_Status"] == "booked")
                                              {echo "selected='selected'";}?>>
                                      Booked</option>
                                  <option value="cancelled"
                                          <?php if($operation_row["Operation_Status"] == "cancelled")
                                              {echo "selected='selected'";}?>>
                                      Cancelled</option>
                                  <option value="completed"
                                          <?php if($operation_row["Operation_Status"] == "completed")
                                              {echo "selected='selected'";}?>>
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
                <input type="submit" value="Update Operation Schedule" class="btn btn-primary">
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