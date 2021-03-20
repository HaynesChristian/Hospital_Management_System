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

$docid = $_GET["Docid"];
$doctype = $_GET["Doctype"];

if($doctype == "Outdoor")
{
    $view_doctordetails = "SELECT * FROM doctor, doctor_outdoor "
            . "WHERE doctor.Doctor_id = $docid AND doctor_outdoor.Doctor_id = $docid";
}
if($doctype == "Indoor")
{
    $view_doctordetails = "SELECT * FROM doctor, doctor_indoor "
            . "WHERE doctor.Doctor_id = $docid AND doctor_indoor.Doctor_id = $docid";
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Update Doctor</title>
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
        input:not([type="submit"]),textarea
        {
            width: 100%;
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
            <p class="breadcrumbs">
                <span class="mr-2">
                    <a href="index.php?admin_name=<?php echo $login_name;?>">Home</a>
                </span>
                <span class="mr-2"><a href="doctor.php?admin_name=<?php echo $login_name;?>">Doctor</a></span> 
                <span>Update Doctor</span></p>
            <h1 class="mb-3 bread">Update Doctor Details</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section ftco-degree-bg">
      <div class="container">
          <form method="POST" action="Update_Doctor.php"  enctype="multipart/form-data">
              <input type="hidden" value="<?php echo $login_name;?>" name="admin_name">
              <table border="0" class="table table-striped" style="width:100%;">
                <?php
                $result_doctorlist = mysqli_query($connection, $view_doctordetails);
                if(mysqli_num_rows($result_doctorlist) > 0)
                {
                    while($dr_row= mysqli_fetch_assoc($result_doctorlist))
                    {
                ?>                
                <tbody>
                    <tr>
                        <td>
                            <input type="hidden"  name="default_doctor_photo" 
                                   value="<?php echo $dr_row["Doctor_Photo"];?>">
                            
                            <img id="docpic" src="<?php echo $dr_row["Doctor_Photo"];?>" style="border-radius: 50%"
                                 alt="your image" width="250px" height="250px"/><br><br>
                            <input type="file" name="doctor_photo" accept="image/*"
                                   id="Doctor_photo" onchange="readURL(this);"/><br><br>
                            
                        </td>
                        <td>
                            <label for="Doctor_name" class="text-black">Name</label>
                            <input type="text" id="doctor_name" class="form-control" required=""
                                   name="doctor_name" value="<?php echo $dr_row["Doctor_Name"];?>">
                            <input type="hidden" name="Doctor_id" value="<?php echo $docid;?>"/>
							<br/>
                            <label for="Doctor_contactNo" class="text-black">Contact No</label>
                            <input type="tel" pattern="(7|8|9)\d{9}" class="form-control"
                                   id="doctor_contact" name="doctor_contact" required="" value="<?php echo $dr_row["Doctor_ContactNo"];?>">
<!--                                   oninvalid="this.setCustomValidity('Please match the format :- 10 digits and start with 7/8/9')"-->
                        </td>
                        <td>
                            <label for="Doctor_email" class="text-black">Email</label>
                            <input type="email" id="Doctor_email" class="form-control" required=""
                                   name="doctor_email" value="<?php echo $dr_row["Doctor_Email_id"];?>">
							<br/>
                            <label for="Doctor_address" class="text-black">Address</label><br>
                            <textarea name="doctor_address" id="doctor_address" cols="30" rows="5" class="form-control" required="">
                                <?php echo trim($dr_row["Doctor_Address"]);?>
                            </textarea>
                        </td>
                    </tr>
                    <tr>						
                        <td colspan="2">
                            <label for="Doctor_qualification" class="text-black">Qualification</label>
                            <input type="text" id="Doctor_qualification" class="form-control" required=""
                                   name="doctor_qualification" value="<?php echo $dr_row["Doctor_Qualification"];?>">
                        </td>
                        <td>
                            <label for="Doctor_PanNo" class="text-black">Pan no.</label>
                            <input type="text" class="form-control" id="Doctor_PanNo" name="doctor_PanNo" 
                                   pattern="[A-Z]{5}[0-9]{4}[A-Z]{1}" placeholder="ABCDE1234F" required="" value="<?php echo $dr_row["Doctor_Pan_no"];?>">
<!--                           oninvalid="this.setCustomValidity('Please match the format :- 5 letters (Cap) - 4 digits - 1 letter (Cap)')"-->                                   
                        </td>
                    </tr>
                    <tr>						
                        <td>
                            <label for="Doctor_speciality" class="text-black">Specialty</label>
                            <input type="text" id="Doctor_speciality" class="form-control" required=""
                                   name="doctor_speciality" value="<?php echo $dr_row["Doctor_Speciality"];?>">
                        </td>
                            <input type="hidden" name="doctor_type" value="<?php echo $dr_row["Doctor_Type"];?>">
                            <?php 
                            if($dr_row["Doctor_Type"]=="Outdoor")
                            {
                            ?>
							<td colspan="2">
								<label for="Doctor_visitCharge" class="text-black">Visit Charge</label>
								<input type="number" class="form-control" id="Doctor_visitCharge" required=""
									   name="Doctor_visitCharge" value="<?php echo $dr_row["Doctor_Visit_Charge"];?>">
							</td>			
                            <?php
                            }
                            else
                            {
                            ?>
							<td>
								<label for="Doctor_designation" class="text-black">Designation</label>
								<input type="text" class="form-control" id="Doctor_designation" required=""
									   name="Doctor_designation" value="<?php echo $dr_row["Doctor_designation"];?>">
							</td>
							<td>	
								<label for="Doctor_salary" class="text-black">Salary</label>
								<input type="number" class="form-control" id="Doctor_salary" required=""
									   name="Doctor_salary" value="<?php echo $dr_row["Doctor_Salary"];?>">
							</td>	   
                            <?php 
                            }
                            ?>
                    </tr>
                </tbody>
                <?php
                    }
                }
                ?>                
            </table>
			<input type="submit" value="Update Doctor Details" class="btn btn-primary">
          </form>
      </div>
    </section> <!-- .section -->
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


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
    
//    function showindoor()
//    {
//        document.getElementById('outdoor').style.display = 'none';
//        document.getElementById('indoor').style.display = 'block';
//    }
//    
//    function showoutdoor()
//    {
//        document.getElementById('outdoor').style.display = 'block';
//        document.getElementById('indoor').style.display = 'none';
//    }      
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