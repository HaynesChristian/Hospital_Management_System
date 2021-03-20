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
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Staff Report</title>
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
          <li class="nav-item active"><a href="departments.php?admin_name=<?php echo $login_name;?>" class="nav-link">Departments</a></li>
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
            <p class="breadcrumbs"><span class="mr-2"><a href="index.php?admin_name=<?php echo $login_name;?>">Home</a></span> <span class="mr-2"><a href="departments.php?admin_name=<?php echo $login_name;?>">Departments</a></span></p>
            <h1 class="mb-3 bread">Report Management</h1>
          </div>
        </div>
      </div>
    </div>
    <section class="ftco-section bg-light">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-7 heading-section ftco-animate text-center">
               <center>
                   <button class="btn btn-primary" data-toggle="modal" data-target="#modalApp">Generate Date</button>
               </center><br>
            <h2 class="mb-4">Staff Report</h2>            
          </div>
        </div>
        <div class="d-flex justify-content-center">
            <table class="table table-striped">
                <tr>
                    <th>Name</th>
                    <th>Designation</th>
                    <th>Contact</th>
                    <th>Email</th>
                    <th>DOB</th>
                    <th>Address</th>
                    <th>Gender</th>
                    <th>Education</th>
                    <th>Joining Date</th>
                    <th>Basic Salary</th>
                    <th>Bank Acc No</th>
                    <th>PF No</th>
                    <th>PanCard</th>
                    <th>AdharCard</th>
                </tr>
                <?php
                $displaydata = "select * from employee_master ";
                $result = mysqli_query($conn, $displaydata);
                if(mysqli_num_rows($result)>0)
                {
                    while ($row = mysqli_fetch_assoc($result)) 
                    {                        
                ?>
                <tr>
                    <td><?php echo $row["Employee_Name"];?></td>
                    <td><?php echo $row["Employee_Designation"];?></td>
                    <td><?php echo $row["Employee_contact"];?></td>
                    <td><?php echo $row["Employee_Email"];?></td>
                    <td><?php echo $row["Birth_Date"];?></td>
                    <td><?php echo $row["Employee_Address"];?></td>
                    <td><?php echo $row["Gender"];?></td>
                    <td><?php echo $row["Education"];?></td>
                    <td><?php echo $row["Join_Date"];?></td>
                    <td><?Php echo $row["Basic_Salary"];?></td>
                    <td><?php echo $row["Bank_Acc_No"];?></td>
                    <td><?php echo $row["PF_No"];?></td>
                    <td><?php echo $row["PanCard"];?></td>
                    <td><?php echo $row["AdharCard"];?></td><br>
                </tr>
                <?php
                    }
                }
                ?>
            </table>
        </div> 
      </div>
    </section>
    <!-- .section -->
 <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>

  <!-- Modal -->
    <div class="modal fade" id="modalAppointment" tabindex="-1" role="dialog" aria-labelledby="modalAppointmentLabel" aria-hidden="true">
      
    </div>
  
  
    <div class="modal fade" id="modalApp" tabindex="-1" role="dialog" aria-labelledby="modalAppointmentLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalAppointmentLabel">Staff report</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
              <form method="post" action="empdisplay.php">
            
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="from_date" class="text-black">From</label>
                    <input type="date" name="From_Date" class="form-control" id="from_date" onchange="checkapt_date()">
                  </div>    
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="to_date" class="text-black">To</label>
                    <input type="date" name="To_Date" class="form-control" id="to_date" onchange="checkapt_date()">
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
  
  <script>
     function checkapt_date()
        
{
var selectedText = document.getElementById('to_date').value;
var selectedDate = new Date(selectedText);
var now = new Date();
var dt1 = Date.parse(now),
dt2 = Date.parse(selectedDate);
if (dt2 > dt1)
{
alert("Date must be in the past ");
document.getElementById('to_date').value = now.toISOString().split('T')[0];;
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