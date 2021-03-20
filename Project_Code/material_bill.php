<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hospital_management_system";

$conn = mysqli_connect($servername,$username,$password,$dbname);

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Remedic - Free Bootstrap 4 Template by Colorlib</title>
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
      <a class="navbar-brand" href="index.html">
          <i class="flaticon-pharmacy"></i><span>Tattvam</span> Hospital
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="oi oi-menu"></span> Menu
      </button>

      <div class="collapse navbar-collapse" id="ftco-nav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item"><a href="index.html" class="nav-link">Home</a></li>
          <li class="nav-item"><a href="staff.html" class="nav-link">Staff</a></li>
          <li class="nav-item active"><a href="departments.html" class="nav-link">Departments</a></li>
          <li class="nav-item"><a href="doctor.php" class="nav-link">Doctors</a></li>
          <li class="nav-item"><a href="patient.html" class="nav-link">Patient</a></li>
          <li class="nav-item"><a href="services.html" class="nav-link">Services</a></li>
          <li class="nav-item cta"><a href="" class="nav-link" data-toggle="modal" data-target="#modalAppointment"><span>Make an Appointment</span></a></li>
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
            <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span class="mr-2"><a href="departments.html">Departments</a></span> <span>Department Single</span></p>
            <h1 class="mb-3 bread">Report Management</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section ftco-degree-bg">
      <div class="container">
        <div class="row">
          <div class="col-md-8 ftco-animate">
            <p>
                
                   <h2 align="center"> MATERIAL </h2>
           
                   <center>
                       <button class="btn btn-primary" data-toggle="modal" data-target="#modalAppointment" style="margin-top: 2%"> Insert Material Bill</button>
                       <button class="btn btn-primary" data-toggle="modal" data-target="#modalApp" style="margin-top: 2%"> Insert Material Bill</button>
                   </center>
                   <br>

  <table class="table table-striped">
    <tr>
       
        <th>Material_bill_id</th>
        <th>Material_bill_amount</th>
        <th>Material_bill_date</th>
        <th colspan="2">Action</th>
    </tr>
    <?php
    $dislpaydata = "select * from Material_bill_store";
    $result = mysqli_query($conn, $dislpaydata);
    if(mysqli_num_rows($result)>0)
    {
        while ($row = mysqli_fetch_assoc($result)) 
                {
    ?>
    <tr>
    <form method="POST" autocomplete="off">
        <td><?php echo $row["Material_bill_id"];?></td>
        <td><?php echo $row["Material_bill_amount"];?></td>
        <td><?php echo $row["Material_bill_date"];?></td>
       
        <td>
            <button formaction="materialstorebillupd.php" class="btn btn-primary" data-toggle="modal" data-target="#modalApp" name="Update" value="<?php echo $row["Material_bill_store_id"];?>">Update</button>
        </td>
        <td>
            <button formaction="materialstorebilldel.php" class="btn btn-primary" data-toggle="modal" data-target="#modalApp" name="Delete" value="<?php echo $row["Material_bill_store_id"];?>">Delete</button>
        </td>
        </tr>
    </form>
  <?php
                }
    }
    mysqli_close($conn);
    ?>
  
</table><br>


                    <br><br><br>
           
                 
                    
    </center>    
                
          
          </div> <!-- .col-md-8 -->
        

            

            

            
          </div>

        </div>
      </div>
    </section> <!-- .section -->
<!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>

  <!-- Modal -->
    <div class="modal fade" id="modalAppointment" tabindex="-1" role="dialog" aria-labelledby="modalAppointmentLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalAppointmentLabel">Appointment</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
              <form method="post" action="Material_bill_store.php">
              <div class="form-group">
                <label for="appointment_name" class="text-black">Material_bill_store_id</label>
                <input type="text" class="form-control" id="appointment_name" name="msid">
              </div>
              <div class="form-group">
                <label for="appointment_email" class="text-black">Material_bill_id</label>
                <input type="text" class="form-control" id="appointment_email" name="mid">
              </div>
               <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="amt" class="text-black">Material_Bill_Amount</label>
                    <input type="text" class="form-control" id="amount" name="amt">
                  </div>    
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="date" class="text-black">Material_Bill_Date</label>
                    <input type="date" class="form-control" id="hdate" name="mdate">
                  </div>
                </div>
              </div>
              

               <div class="form-group">
                  
              
            <input type="submit" name="search date" class="btn btn-primary" value="Submit" 
               style="margin-top: 2%">
              </div>
             
            </form>
          </div>
          
        </div>
      </div>
    </div>
    <div class="modal fade" id="modalApp" tabindex="-1" role="dialog" aria-labelledby="modalAppointmentLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalAppointmentLabel">Material</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
              <form method="post" action="mbsdisplay.php">
            
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="appointment_date" class="text-black">From</label>
                    <input type="date" name="From_Date" class="form-control" id="appointment_date">
                  </div>    
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="appointment_date" class="text-black">To</label>
                    <input type="date" name="To_Date" class="form-control" id="appointment_date">
                  </div>
                </div>
              </div>
              

             
              <div class="form-group">
                  
              
            <input type="submit" name="search date" class="btn btn-primary" value="Generate Report" 
               style="margin-top: 2%">
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