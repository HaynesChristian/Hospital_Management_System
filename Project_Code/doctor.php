<?php
$con_servername = "localhost";
$con_username = "root";
$con_password = "";
$database = "hospital_management_system";

$connection = mysqli_connect($con_servername, $con_username, $con_password, $database);

if($_GET)
{
    $login_name=$_GET["admin_name"];
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Doctor</title>
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
            <p class="breadcrumbs">
                <span class="mr-2"><a href="index.php?admin_name=<?php echo $login_name;?>">Home</a></span>
                <span>Doctor</span>
            </p>
            <h1 class="mb-3 bread">Well Experienced Doctors</h1>
          </div>
        </div>
      </div>
    </div>
    
    <center>
        <a href="" data-toggle="modal" data-target="#modalDocRegisteration">
            <input type="submit" class="btn btn-primary" value="Register Doctor" 
               style="margin-top: 2%">
        </a>
    </center>    
    <section class="ftco-section">
    	<div class="container">
        <div class="row">
            <?php
            $count=0;
            $view_doctor = "SELECT * FROM doctor";
            $result_doctorlist = mysqli_query($connection, $view_doctor);
            if(mysqli_num_rows($result_doctorlist) > 0)
            {
                while($dr_row= mysqli_fetch_assoc($result_doctorlist))
                {
            ?>
        	<div class="col-md-6 col-lg-3 ftco-animate">
	          <div class="block-2">
	            <div class="flipper">
	              <div class="front" 
                           style="background-image: url(<?php echo $dr_row["Doctor_Photo"];?>);">
	                <div class="box">
                            <h2><?php echo $dr_row["Doctor_Name"];?></h2>
                            <p><?php echo $dr_row["Doctor_Speciality"];?></p>
	                </div>
	              </div>
	              <div class="back">
	                <!-- back content -->
	                <blockquote>
	                  <p>
                              <!-- &ldquo; -> " <- &rdquo;-->
                              Contact : <?php echo $dr_row["Doctor_ContactNo"];?><br>
                              Type : <?php echo $dr_row["Doctor_Type"];?><br>
                              Pan no : <?php echo $dr_row["Doctor_Pan_no"];?><br><br>
                              <a href="ShowUpdate_Doctor.php?Docid=<?php echo $dr_row["Doctor_id"];?>&Doctype=<?php echo $dr_row["Doctor_Type"];?>&admin_name=<?php echo $login_name;?>"
                                 class="btn btn-primary">
                                Update Details
                              </a>                              
                          </p>
	                </blockquote>
	                <div class="author d-flex">
	                  <div class="image mr-3 align-self-center">
                              <a href="#modalDocPic" data-toggle="modal">
                                  <div class="img" style="background-image: url(<?php echo $dr_row["Doctor_Photo"];?>);">
                                  </div>
                              </a>
	                  </div>
	                  <div class="name align-self-center"><?php echo $dr_row["Doctor_Name"];?> 
                              <span class="position"><?php echo $dr_row["Doctor_Speciality"];?></span></div>
	                </div>
	              </div>
	            </div>
	          </div> <!-- .flip-container -->
	        </div>
            <?php
            $count++;
                }
                if($count == 4)
                {
                    echo "<br>";
                    $count=0;
                }
            }            
            ?>
        </div>
    </section>


  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
      <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/>
      <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <!-- Doctor registration Modal -->
    <div class="modal fade" id="modalDocRegisteration" tabindex="-1" 
         role="dialog" aria-labelledby="modalAppointmentLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalAppointmentLabel">Doctor Registeration</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
              <form action="Add_Doctor.php" method="POST" enctype="multipart/form-data" autocomplete="off">
                  <input type="hidden" value="<?php echo $login_name;?>" name="admin_name">
                <div class="row">
					<div class="col-md-4">			  	  
					  <div class="form-group">
						<label for="Doctor_name" class="text-black">Name</label>
						<input type="text" class="form-control" id="doctor_name" name="doctor_name" required="">
					  </div>
					</div>
					<div class="col-md-4">
					  <div class="form-group">
						<label for="Doctor_contactNo" class="text-black">Contact No</label>
						<input type="tel" pattern="(7|8|9)\d{9}" class="form-control"
							   id="doctor_contact" name="doctor_contact" required="" 
							   title="Please match the format :- 10 digits and start with 7/8/9">
		<!--                       oninvalid="this.setCustomValidity('Please match the format :- 10 digits and start with 7/8/9')"-->
					  </div>
					</div>
					<div class="col-md-4">
					  <div class="form-group">
						<label for="Doctor_email" class="text-black">Email</label>
						<input type="email" class="form-control" id="Doctor_email" name="doctor_email" required="">
					  </div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4">
					  <div class="form-group">
						<label for="Doctor_qualification" class="text-black">Qualification</label>
						<input type="text" class="form-control" id="Doctor_qualification" 
							   name="doctor_qualification" required="">                
					  </div>					
					</div>
					<div class="col-md-4">
					  <div class="form-group">
						<label for="Doctor_speciality" class="text-black">Specialty</label>
						<input type="text" class="form-control" id="Doctor_speciality" 
							   name="doctor_speciality" required="">
					  </div>					
					</div>
					<div class="col-md-4">
					  <div class="form-group">
							<label for="Doctor_PanNo" class="text-black">Pan no.</label>
							<input type="text" class="form-control" id="Doctor_PanNo" name="doctor_PanNo" 
								   pattern="[A-Z]{5}[0-9]{4}[A-Z]{1}" placeholder="For example:- ABCDE1234F" required=""
								   title="Please match the format :- 5 letters (Cap) - 4 digits - 1 letter (Cap)">
		<!--                           oninvalid="this.setCustomValidity('Please match the format :- 5 letters (Cap) - 4 digits - 1 letter (Cap)')"-->
					  </div>					
					</div>					
				</div>
				
				<div class="form-group">
					<label for="Doctor_address" class="text-black">Address</label>
					<textarea name="doctor_address" required=""
							id="doctor_address" class="form-control" cols="30" rows="5"></textarea>
				</div>				
				
				<div class="row">
					<div class="col-md-6">
					  <div class="form-group">
						<label for="Doctor_type" class="text-black">Type</label><br>
						<input type="radio" id="Doctor_type" name="doctor_type" 
							   value="Outdoor" onclick="showoutdoor()" required=""> Outdoor
						<input type="radio" id="Doctor_type" name="doctor_type" 
							   value="Indoor" onclick="showindoor()" required=""> Indoor
					  </div>
					</div>
					<div class="col-md-6">
					  <div class="form-group">
						<label for="Doctor_photo" class="text-black">Photo</label><br>
						<input type="file" name="doctor_photo" accept="image/*" required="required" id="Doctor_photo"/>
					  </div>					
					</div>
				</div>				
			  
              <div id="indoor" style="display:none">
				<div class="row">
					<div class="col-md-6">			  
					  <div class="form-group">
						  <label for="Doctor_designation" class="text-black">Designation</label>
						  <input type="text" class="form-control" id="Doctor_designation" 
								 name="Doctor_designation">
					  </div>
					</div>
					<div class="col-md-6">					
					  <div class="form-group">
						  <label for="Doctor_salary" class="text-black">Salary</label>
						  <input type="number" class="form-control" id="Doctor_salary" 
								 name="Doctor_salary">
					  </div>
					</div>  
				</div>	  
              </div>
              <div id="outdoor" style="display:none">
                  <div class="form-group">
                      <label for="Doctor_visitCharge" class="text-black">Visit Charge</label>
                      <input type="number" class="form-control" id="Doctor_visitCharge" 
                             name="Doctor_visitCharge">
                  </div>
              </div>                  
                
              <div class="form-group">
                <input type="submit" value="Complete Registeration" class="btn btn-primary">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  
  <script>
    function readURL(input)
    {
        if (input.files && input.files[0]) 
        {
            var reader = new FileReader();

            reader.onload = function (e) 
            {
                $('#docpic')
                    .attr('src', e.target.result)
                    .width(150)
                    .height(150);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
    
    function showindoor()
    {
        document.getElementById('outdoor').style.display = 'none';
        document.getElementById('indoor').style.display = 'block';
    }
    
    function showoutdoor()
    {
        document.getElementById('outdoor').style.display = 'block';
        document.getElementById('indoor').style.display = 'none';
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