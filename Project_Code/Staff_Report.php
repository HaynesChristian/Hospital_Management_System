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
                
                   <h2 align="center"> Staff Report </h2>
           
                   <center>
                       <a class="btn btn-primary" data-toggle="modalsg" data-target="#modalsg" style="margin-top: 2%" >
                           Generate Date
                       </a>
                   </center>
                   <br>
                  
            
             
            
          
     <table border="1">
    <tr>
        <th>Employee_Id</th>
        <th>Employee_Name</th>
        <th>Employee_Designation</th>
        <th>Employee_contact</th>
        <th>Employee_Email</th>
        <th>Date_Of_Birth </th>
        <th>Employee_Address</th>
        <th>Gender</th>
        <th>Education</th>
        <th>Joining_Date</th>
        <th>Basic_Salary</th>
        <th>Uniform_Issued_Date</th>
        <th>Incremental_qtr_No</th>
        <th>Last_Increment_Date</th>
        <th>IFSC_Code</th>
        <th>Bank_Acc_No</th>
        <th>Department</th>
        <th>Grade</th>
        <th>Dearness_Allowance</th>
        <th>House_Rent_Allowance</th>
        <th>PF_No</th>
        <th>PF_PCTG</th>
        <th>FPS_PCTG</th>
        <th>Professional_Tax</th>
        <th>Group_LIC_Premium</th>
        <th>Status</th>
        <th>PanCard</th>
        <th>AdharCard</th><br>
     
        
        
    </tr>
    <?php
    $displaydata = "select * from employee_master";
    $result = mysqli_query($conn, $displaydata);
    if(mysqli_num_rows($result)>0)
    {
        while ($row = mysqli_fetch_assoc($result)) 
                {
    ?>
    <tr>
    <form method="POST" autocomplete="off">
        <td><?php echo $row["Employee_Id"];?></td>
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
        <td><?php echo $row["Uniform_Issued_Date"];?></td>
        <td><?php echo $row["Incremental_qtr_No"];?></td>
        <td><?php echo $row["Last_Increment_Date"];?></td>
        <td><?php echo $row["IFSC_Code"];?></td>
        <td><?php echo $row["Bank_Acc_No"];?></td>
        <td><?php echo $row["Department"];?></td>
        <td><?php echo $row["Grade"];?></td>
        <td><?php echo $row["Dearness_Allowance"];?></td>
        <td><?php echo $row["House_Rent_Allowance"];?></td>
        <td><?php echo $row["PF_No"];?></td>
        <td><?php echo $row["PF_PCTG"];?></td>
        <td><?php echo $row["FPS_PCTG"];?></td>
        <td><?php echo $row["Professional_Tax"];?></td>
        <td><?php echo $row["Group_LIC_Premium"];?></td>
        <td><?php echo $row["Status"];?></td>
        <td><?php echo $row["PanCard"];?></td>
        <td><?php echo $row["AdharCard"];?></td><br>
   
       
        </tr>
    </form>
  <?php
                }
    }
    
    ?>

    
        <table border="1" class="table table-striped" style="width:35%" style="height:200px">
    
   
   
    <?php
   // $displaydata = "SELECT * FROM income INNER JOINT expense ON income.Income_Id = expense.Expense_Id";
     //   $displaydata = "SELECT Income_Amount,Total,Income_Date, Expense_Amount, Expense_Date SUM(Income_Amount) Total FROM income, expense";
     $displaydata = "select count(Employee_Id) Total_Employee,
  
  count(case when gender='Male' then 1 end) as Total_Male_Employee,
  count(case when gender='Female' then 1 end) as Total_Female_Employee,
  count(*) as total_cnt


FROM
    employee_master";
     

    $result = mysqli_query($conn, $displaydata);
    if(mysqli_num_rows($result)>0)
    {
        while ($row = mysqli_fetch_assoc($result)) 
                {
    ?>
    <tr>
    <form method="POST" autocomplete="off">
        
         <th>TOTAL EMPLOYEES =   <?php echo $row["Total_Employee"];?></th>
         <th>TOTAL MALE      =  <?php echo $row["Total_Male_Employee"];?></th>
         <th>TOTAL FEMALE    =<?php echo $row["Total_Female_Employee"];?></th>
         </tr>
    </form><br><br>   
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

		<section class="ftco-section-parallax">
      <div class="parallax-img d-flex align-items-center">
        <div class="container">
          <div class="row d-flex justify-content-center">
            <div class="col-md-7 text-center heading-section heading-section-white ftco-animate">
              <h2>Subcribe to our Newsletter</h2>
              <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in</p>
              <div class="row d-flex justify-content-center mt-5">
                <div class="col-md-8">
                  <form action="#" class="subscribe-form">
                    <div class="form-group d-flex">
                      <input type="text" class="form-control" placeholder="Enter email address">
                      <input type="submit" value="Subscribe" class="submit px-3">
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <footer class="ftco-footer ftco-bg-dark ftco-section img" style="background-image: url(images/bg_5.jpg);">
    	<div class="overlay"></div>
      <div class="container">
        <div class="row mb-5">
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Remedic</h2>
              <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
              <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4 ml-md-5">
              <h2 class="ftco-heading-2">Information</h2>
              <ul class="list-unstyled">
              	<li><a href="#" class="py-2 d-block">Appointments</a></li>
                <li><a href="#" class="py-2 d-block">Our Specialties</a></li>
                <li><a href="#" class="py-2 d-block">Why Choose us</a></li>
                <li><a href="#" class="py-2 d-block">Our Services</a></li>
                <li><a href="#" class="py-2 d-block">health Tips</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
             <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Site Links</h2>
              <ul class="list-unstyled">
                <li><a href="#" class="py-2 d-block">Home</a></li>
                <li><a href="#" class="py-2 d-block">About</a></li>
                <li><a href="#" class="py-2 d-block">Departments</a></li>
                <li><a href="#" class="py-2 d-block">Doctors</a></li>
                <li><a href="#" class="py-2 d-block">Blog</a></li>
                <li><a href="#" class="py-2 d-block">Contact</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
            	<h2 class="ftco-heading-2">Have a Questions?</h2>
            	<div class="block-23 mb-3">
	              <ul>
	                <li><span class="icon icon-map-marker"></span><span class="text">203 Fake St. Mountain View, San Francisco, California, USA</span></li>
	                <li><a href="#"><span class="icon icon-phone"></span><span class="text">+2 392 3929 210</span></a></li>
	                <li><a href="#"><span class="icon icon-envelope"></span><span class="text">info@yourdomain.com</span></a></li>
	              </ul>
	            </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 text-center">

            <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
          </div>
        </div>
      </div>
    </footer>
    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>

    <div class="modal fade" id="modalsg" tabindex="-1" role="dialog" aria-labelledby="modalAppointmentLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalAppointmentLabel">Salary slip Generate</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
              <form method="post" action="empdisplay.php">
            
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="appointment_date" class="text-black">From</label>
                    <input type="date" name="From_Date" class="form-control" id="appointment_date">
                  </div>    
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="appointment_time" class="text-black">To</label>
                    <input type="date" name="To_Date" class="form-control" id="appointment_time">
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