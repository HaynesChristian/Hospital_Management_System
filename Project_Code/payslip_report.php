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

    <section class="ftco-section ftco-degree-bg">
      <div class="container">
        <div class="row">
          <div class="col-md-8 ftco-animate">
            <p>
                
                   <h2 align="center"> Pay-slip Report </h2>
           
                   <center>
                       <button class="btn btn-primary" data-toggle="modal" data-target="#modalApp">Generate Date</button>
                   </center>
                   <br>
                  
            
             
            
 <table class="table table-striped">
            <tr>
                <th>Salary Month</th>
                <th>Working Days</th>
                <th>Employee Name</th>
                <th>Total Leave days</th>
                <th>Basic Salary</th>
                <th>Gross Salary</th>
                <th>Deduction</th>
                <th>Net Salary</th>
            </tr>
            <?php
    $displaydata = "select * from payslip";
    $result = mysqli_query($conn, $displaydata);
    if(mysqli_num_rows($result)>0)
    {
        while ($row = mysqli_fetch_assoc($result)) 
                {
    ?>
            <tr>
                <td><?php echo $row["Salary_Month"];?></td>
                <td><?php echo $row["Working_Days"];?></td>
                <td><?php echo $row["Employee_Name"];?></td>
                <td><?php echo $row["Total_Days"];?></td>
                <td><?php echo $row["Basic_Salary"];?></td>
                <td><?php echo $row["Gross_Salary"];?></td>
                <td><?php echo $row["Deduction"];?></td>
                <td><?php echo $row["Net_Salary"];?></td>
                </tr>
        <?php
                }
            }
            
        ?>
        </table>
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
    
  
  
    <div class="modal fade" id="modalApp" tabindex="-1" role="dialog" aria-labelledby="modalAppointmentLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalAppointmentLabel">View pay-slip</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
              <form method="post" action="slaryslipdisplay.php">
            
                  <div class="form-group">
                    <label for="Employee_Id" class="text-black">Employee Name</label>
                  <select class="form-control" name="Employee_Id" id="Employee_Id">
                    <?php
                    $emp_name = "SELECT Employee_Id, Employee_Name FROM employee_master";
                    $result_emp = mysqli_query($conn, $emp_name);
                    if(mysqli_num_rows($result_emp) > 0)
                    {
                        while($emp_row = mysqli_fetch_assoc($result_emp))
                        {
                    ?>
                    <option value="<?php echo $emp_row["Employee_Id"];?>">
                        <?php echo $emp_row["Employee_Name"];?>
                    </option>
                    <?php
                        }
                    }
                    ?>
                </select>                        
                  </div>    
                    
                      <div class="form-group">
                    <label for="Salary_Month" class="text-black">Month</label>
                    <input type="month" name="Salary_Month" class="form-control" id="appointment_fdate" onchange="checkapt_date()">
                        
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