<?php
$con_servername = "localhost";
$con_username = "root";
$con_password = "";
$database = "hospital_management_system";

$connection = mysqli_connect($con_servername, $con_username, $con_password, $database);

$Employee_Id = $_GET["Employee_Id"];
$Att_date = $_GET["Att_date"];
if($_GET)
{   
    $login_name=$_GET["admin_name"];
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Daily Attendance Update</title>
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
          <li class="nav-item active"><a href="staff.php?admin_name=<?php echo $login_name;?>" class="nav-link">Staff</a></li>
          <li class="nav-item"><a href="departments.php?admin_name=<?php echo $login_name;?>" class="nav-link">Departments</a></li>
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
        <div class="row no-gutters slider-text align-items-center justify-content-center" data-scrollax-parent="true">
          <div class="col-md-8 ftco-animate text-center">
            <p>
                <span class="mr-2">
                    <a href="index.php?admin_name=<?php echo $login_name;?>">Home</a>
                </span>
                <span>Staff</span>
            </p>
            <h1 class="mb-3 bread">Attendance Update</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section bg-light">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-7 heading-section ftco-animate text-center">
            <h2 class="mb-4">Attendance Details</h2>
          </div>
        </div>
        <div class="row d-flex justify-content-center">
            <form method="POST" action="attendance_update_save.php">
                <input type="hidden" value="<?php echo $login_name;?>" name="admin_name">
              <table border="0" class="table table-striped" style="width:100%;">
                <?php
                $view_attendancedetails = "SELECT employee_master.Employee_Name , attendance_tran.* FROM attendance_tran, "
                        ."employee_master WHERE attendance_tran.Employee_Id = $Employee_Id AND "
						."employee_master.Employee_Id = $Employee_Id AND attendance_tran.Att_date = '$Att_date'";
                $result_attendancelist = mysqli_query($connection, $view_attendancedetails);
                if(mysqli_num_rows($result_attendancelist) > 0)
                {
                    while($attendance_row= mysqli_fetch_assoc($result_attendancelist))
                    {
                ?>                
                <tbody>
                    <tr>
                        <td>
                            <div class="form-group">
                              <label for="attdate" class="text-black">Attendance Date</label>
                              <input type="date" name="attdate" class="form-control" id="attdate" 
                                     readonly="" value="<?php echo $attendance_row["Att_date"]?>">
                            </div>
                            <input type="hidden" name="employee_id" value="<?php echo $attendance_row["Employee_Id"]?>">
                            </div>                                
                        </td>
                        <td>
                            <div class="form-group">
                              <label for="employee_name" class="text-black">Employee Name</label>
                                <input type="text" readonly="" name="employee_name" class="form-control" 
                                        id="employee_name" value="<?php echo $attendance_row["Employee_Name"];?>">
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                              <label for="attendance_status" class="text-black">Attendance Status</label><br/>
                                <input type="radio" name="attendance_status" value="Absent" required=""
                                       <?php if($attendance_row["Att_status"] == 'Absent'){echo "checked=checked";}?>
                                       /> Absent<br/>
                                <input type="radio" name="attendance_status" value="Present" required=""
                                       <?php if($attendance_row["Att_status"] == 'Present'){echo "checked=checked";}?>
                                       /> Present
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
                <input type="submit" value="Update Attendance" class="btn btn-primary">
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