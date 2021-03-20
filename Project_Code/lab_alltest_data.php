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
    <title>Services</title>
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
          <li class="nav-item"><a href="departments.php?admin_name=<?php echo $login_name;?>" class="nav-link">Departments</a></li>
          <li class="nav-item"><a href="doctor.php?admin_name=<?php echo $login_name;?>" class="nav-link">Doctors</a></li>
          <li class="nav-item "><a href="patient.php?admin_name=<?php echo $login_name;?>" class="nav-link">Patient</a></li>
          <li class="nav-item active"><a href="services.php?admin_name=<?php echo $login_name;?>" class="nav-link">Services</a></li>
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
                <span>Services</span>
            </p>
            <h1 class="mb-3 bread">Services</h1>
          </div>
        </div>
      </div>
    </div>
                    
    <section class="ftco-section bg-light">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-7 heading-section ftco-animate text-center">
             
            <h2 class="mb-4">Lab Test Details</h2>            
          </div>
        </div>
        <div class="row d-flex justify-content-center">
        <table class="table table-striped">
            <tr>
                <th>Date</th>
                <th>Patient Name</th>
                <th>Test Description</th>
                <th>Test Charges</th>
                <th>Test Status</th>
            </tr>
            <?php
            $dislpaydata = "SELECT lab_test_data.*, patient.Patient_Name "
                    . "FROM lab_test_data,patient WHERE patient.Patient_id = lab_test_data.Patient_id "
                    . "ORDER BY Test_Date";
            $result = mysqli_query($conn, $dislpaydata);
            if(mysqli_num_rows($result)>0)
            {
                while ($row = mysqli_fetch_assoc($result)) 
                {
            ?>
            <tr>
                <form method="POST" autocomplete="off">
                    <td><?php echo $row["Test_Date"];?></td>
                    <td><?php echo $row["Patient_Name"];?></td>
                    <td><?php echo $row["Test_Description"];?></td>
                    <td><?php echo $row["Test_Charges"];?></td>
                    <td><?php echo $row["Test_Status"];?></td>
                </form>
            </tr>
          <?php
                }
            }
            ?>
        </table>
        </div> 
      </div>
    </section>
    
  <!-- Employee Modal -->
    <div class="modal fade" id="modalAppointmen" tabindex="-1" role="dialog" aria-labelledby="modalAppointmentLabel" aria-hidden="true">
      <div class="modal-dialog " role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalAppointmentLabel">Lab Test Data </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
              <form action="testdata.php" autocomplete="off" method="POST">
                  <input type="hidden" value="<?php echo $login_name;?>" name="admin_name">      
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="patientid" class="text-black">Patient Id </label>
                    <select class="form-control" name="patientid" id="patientid" required="">
                        <?php
                        $doctorname = "SELECT Patient_id , Patient_Name "
                                . "FROM patient";
                        $result_doctor = mysqli_query($conn, $doctorname);
                        if(mysqli_num_rows($result_doctor) > 0)
                        {
                            while($dr_row = mysqli_fetch_assoc($result_doctor))
                            {
                        ?>
                        <option value="<?php echo $dr_row["Patient_id"];?>">
                            <?php echo $dr_row["Patient_Name"];?>
                        </option>
                        <?php
                            }
                        }
                        ?>
                    </select>                    
                  </div>    
                
                  </div>
                  
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="testdate" class="text-black">Test Date  </label>
                    <input type="date" class="form-control" name="testdate" onchange="checkapt_date()" id="testdate" required="">
                  </div>    
                </div>
                  
                  
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="testid" class="text-black">Test Id </label>
                    <select class="form-control" name="testid" id="testid" required="">
                        <?php
                        $doctorname = "SELECT Test_Id "
                                . "FROM lab_master";
                        $result_doctor = mysqli_query($conn, $doctorname);
                        if(mysqli_num_rows($result_doctor) > 0)
                        {
                            while($dr_row = mysqli_fetch_assoc($result_doctor))
                            {
                        ?>
                        <option value="<?php echo $dr_row["Test_Id"];?>">
                            <?php echo $dr_row["Test_Id"];?>
                        </option>
                        <?php
                            }
                        }
                        ?>
                    </select>                    
                  </div>    
                
                  </div>  
                <tr>
                        <td>                        
                            <div class="form-group">
                            <label for="teststatus" class="text-black">Test Status </label>
                             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="teststatus" value="Completed" />Completed
                     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="teststatus" value="UnCompleted" />UnCompleted
                            </div>                                
                        </td>
                    </tr>  
                <div class="col-md-6">      
              <div class="form-group">
                <input type="submit" value="Lab Test Details" class="btn btn-primary" href="lab_test_data.php">
              </div>
                  </div>
            </form>
          </div>
          
        </div>
      </div>
    </div>

<script>
      function checkapt_date()
      {
          
            var selectedText = document.getElementById('testdate').value;
            var selectedDate = new Date(selectedText);
            var now = new Date();
            var dt1 = Date.parse(now),
            dt2 = Date.parse(selectedDate);
            if (dt2 > dt1) 
            {
                alert("Date must be in the Past ");
                document.getElementById('testdate').value = now.toISOString().split('T')[0];;
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