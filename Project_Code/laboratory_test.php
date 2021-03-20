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
            <center>
                <a href="" data-toggle="modal" data-target="#modalAppointmen">
                    <input type="submit" class="btn btn-primary" value="Add New Lab Test">
                </a>
            </center>
              <br>
            <h2 class="mb-4">Lab Test</h2>            
          </div>
        </div>
        <div class="row d-flex justify-content-center">
            <table class="table table-striped">
                <tr>
                    <th>Test Type</th>
                    <th>Test Description</th>
                    <th>Test Charges</th>
                    <th>Action</th>
                </tr>
                <?php
                $displaydata = "select * from lab_master ORDER BY Test_Type";
                $result = mysqli_query($conn, $displaydata);
                if(mysqli_num_rows($result)>0)
                {
                    while ($row = mysqli_fetch_assoc($result)) 
                            {
                ?>
                <tr>
                    <form method="POST" autocomplete="off">
                        <td><?php echo $row["Test_Type"];?></td>
                        <td><?php echo $row["Test_Description"];?></td>
                        <td>Rs. <?php echo $row["Test_Charges"];?></td>
                        <td><a href="lab_test_update.php?Update=<?php echo $row["Test_Id"];?>&admin_name=<?php echo $login_name;?>" 
                               class="btn btn-primary">Update</a>
                            <a href="lab_test_delete.php?Delete=<?php echo $row["Test_Id"];?>&admin_name=<?php echo $login_name;?>" 
                               class="btn btn-primary">Delete</a>                               
                        </td>
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
            <h5 class="modal-title" id="modalAppointmentLabel">Lab Test</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
              <form action="labsample.php" autocomplete="off" method="POST">
                  <input type="hidden" value="<?php echo $login_name;?>" name="admin_name">
                  <div class="form-group">
                    <label for="test_type" class="text-black">Test Type </label>
                    <select name="test_type" class="form-control">
                        <option value="" disabled="" selected="" hidden="">
                            Select Test Type
                        </option>                        
                        <option>Blood Test</option>
                        <option>Urine Test</option>
                        <option>Radioactive Test</option>
                        <option>Sputum Test</option>
                        <option>Biopsy Test</option>
                        <option>Stool Test</option>
                        <option>Pap Smear <!--For Survival Cancer--> Test</option>
                        <option>CSF <!-- Cerebrospinal fluid --> Test</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="description" class="text-black">Test Description </label>
                    <input type="text" class="form-control" name="description" required="">
                  </div>                  
                  <div class="form-group">
                    <label for="testcharges" class="text-black">Test Charges </label>
                    <input type="number" class="form-control" name="testcharges" required=""
                           min="20">
                    </td>    
                  </div>    
                </div>   
              <div class="form-group">
                <input type="submit" value="Insert New Lab Test" class="btn btn-primary" 
                       href="laboratory_test.php">
              </div>
            </form>
              </div>
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