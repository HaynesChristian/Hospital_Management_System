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

    
    
    <center>
        <a href="" data-toggle="modal" data-target="#modalAppointmen">
            <input type="submit" class="btn btn-primary" value="Laboratory Cleaning" 
               style="margin-top: 2%">
        </a>
    
        
        
        
    </center>                    
  <br>
  <br>
<center>
<table class="table table-striped">
    <h4>Laboratory Cleaning</h4>
    <tr>
        <th>Laboratory Cleaning Id</th>
        <th>Cleaning Month</th>
        <th>Cleaning Count</th>
        <th>Last Cleaning Date</th>
        
    </tr>
    <?php
    $dislpaydata = "select * from laboratory_cleaning";
    $result = mysqli_query($conn, $dislpaydata);
    if(mysqli_num_rows($result)>0)
    {
        while ($row = mysqli_fetch_assoc($result)) 
                {
    ?>
    <tr>
    <form method="POST" autocomplete="off">
        <td><?php echo $row["Laboratory_Cleaning_Id"];?></td>
        <td><?php echo $row["Cleaning_Month"];?></td>
        <td><?php echo $row["Cleaning_Count"];?></td>
        <td><?php echo $row["Last_Cleaning_Date"];?></td>
        </tr>
    </form>
  <?php
                }
    }
    mysqli_close($conn);
    ?>
  
</table><br>

    
    		
		

    
  <!-- Employee Modal -->
    <div class="modal fade" id="modalAppointmen" tabindex="-1" role="dialog" aria-labelledby="modalAppointmentLabel" aria-hidden="true">
      <div class="modal-dialog " role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalAppointmentLabel">Cleaning Details</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
              <form action="laboratory.php" autocomplete="off" method="POST">
                  <input type="hidden" value="<?php echo $login_name;?>" name="admin_name">      
                  <div class="col-md-6">
                  <div class="form-group">
                    <label for="month" class="text-black">Cleaning Month</label>
                    <input type="month" class="form-control" name="month">
                    </div>    
                </div>
                
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="count" class="text-black">Cleaning Count</label>
                    <input type="number" class="form-control" name="count">
                  </div>    
                </div>
                
                  
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="cdate" class="text-black">Last Cleaning</label>
                    <input type="date" class="form-control" name="cdate" onchange="checkapt_date()" id="cdate">
                  </div>    
                </div>
                  
              <div class="col-md-6">      
              <div class="form-group">
                <input type="submit" value="Cleaning Details" class="btn btn-primary" href="laboratory_cleaning">
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
          
            var selectedText = document.getElementById('cdate').value;
            var selectedDate = new Date(selectedText);
            var now = new Date();
            var dt1 = Date.parse(now),
            dt2 = Date.parse(selectedDate);
            if (dt2 > dt1) 
            {
                alert("Date must be in the Past ");
                document.getElementById('cdate').value = now.toISOString().split('T')[0];;
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