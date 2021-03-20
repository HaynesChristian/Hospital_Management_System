<?php
$con_servername = "localhost";
$con_username = "root";
$con_password = "";
$database = "hospital_management_system";

$connection = mysqli_connect($con_servername, $con_username, $con_password, $database);

$IssueQuantityId = $_GET["IssueQuantityId"];
if($_GET)
{   
    $login_name=$_GET["admin_name"];
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Delete Supplier</title>
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
          <li class="nav-item">
              <a href="index.php?admin_name=<?php echo $login_name;?>" class="nav-link">Home</a>
          </li>      
          <li class="nav-item"><a href="staff.php?admin_name=<?php echo $login_name;?>" class="nav-link">Staff</a></li>
          <li class="nav-item active"><a href="departments.php?admin_name=<?php echo $login_name;?>" class="nav-link">Departments</a></li>
          <li class="nav-item"><a href="doctor.php?admin_name=<?php echo $login_name;?>" class="nav-link">Doctors</a></li>
          <li class="nav-item "><a href="patient.php?admin_name=<?php echo $login_name;?>" class="nav-link">Patient</a></li>
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
                <span class="mr-2"><a href="departments.php?admin_name=<?php echo $login_name;?>">Departments</a></span> 
                <span>Delete Stock</span></p>
            <h1 class="mb-3 bread">Delete Stock Details</h1>
          </div>
        </div>
      </div>
    </div>
    

    <section class="ftco-section ftco-degree-bg">
      <div class="container">
          <form method="POST" action="delete_issueStock.php">
              <table border="1" class="table table-striped" style="width:75%;">
                <thead>
                    <tr>
                        <th>Stock Details</th>
                        
                    </tr>
                </thead>
                <?php
              

                $view_supplierdetails = "SELECT * FROM issue_stock "
                        . "WHERE issue_stock.Issue_Quantity_Id = $IssueQuantityId";
                $result_doctorlist = mysqli_query($connection, $view_supplierdetails);
                if(mysqli_num_rows($result_doctorlist) > 0)
                {
                    while($dr_row= mysqli_fetch_assoc($result_doctorlist))
                    {
                ?>                
                <tbody>
                    <tr>
                       
                        <td>
                             <label for="Doctor_name" class="text-black">Item Name</label>
                             <select class="form-control" id="itemCode" name="itemCode" required="">
                                    <?php
                                    $dislpaydata = "select * from item_master ";
                                    $result = mysqli_query($connection, $dislpaydata);
                                    if(mysqli_num_rows($result)>0)
                                    {
                                        while ($row = mysqli_fetch_assoc($result)) 
                                                {
                                    ?>

                                      <option value="<?php echo $row["Item_Code"];?>">
                                              <?php echo $row["Item_Name"];?></option>

                                    <?php
                                                }
                                    }
                                    ?>
                               </select>
                            <input type="hidden" name="IssueQuantityId" value="<?php echo $IssueQuantityId;?>">
                                   <input type="hidden" name="admin_name" value="<?php echo $login_name;?>">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="Doctor_contactNo" class="text-black">Item Type</label>
                             <?php 
                                if($dr_row["Item_Type"]=="Consumable")
                                {
                                ?>
                                <input type="radio" id="itemtype" name="itemtype" 
                                       value="Consumable" checked=""> Consumable 
                                <input type="radio" id="itemtype" name="itemtype" 
                                       value="Non Consumable" > Non Consumable 
                             
                                 <?php
                                }
                                else if($dr_row["Item_Type"]=="Non Consumable")
                                {
                                ?>
                                <input type="radio" id="itemtype" name="itemtype" 
                                       value="Consumable" > Consumable
                                <input type="radio" id="itemtype" name="itemtype" 
                                       value="Non Consumable" checked="" > Non Consumable
                               
                                <?php
                                }
                                ?>
                         </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="Doctor_address" class="text-black">Description</label>
                            <input type="text" readonly=""  class="form-control"
                              id="description" name="description" value="<?php echo $dr_row["Item_Description"];?>">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="Doctor_address" class="text-black">Issue Date</label>
                            <input type="date" readonly=""  class="form-control"
                              id="issueDate" name="issueDate" value="<?php echo $dr_row["Issue_Date"];?>">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="Doctor_address" class="text-black">Issue Quantity</label>
                            <input type="number" readonly=""  class="form-control"
                              id="issueQuantity" name="issueQuantity" value="<?php echo $dr_row["Issue_Quantity"];?>">
                        </td>
                    </tr>
                    <tr>
                        <td>
                           <label for="Doctor_qualification" class="text-black">Unit Of Measure</label><br>
                          
                             <?php 
                                if($dr_row["Uom"]=="Nos")
                                {
                                ?>
                                <input type="radio" readonly=""  id="uom" name="uom" 
                                       value="Nos" checked=""> Nos 
                                <input type="radio" readonly=""  id="uom" name="uom" 
                                       value="Unit" > Unit 
                                <input type="radio" readonly=""  id="uom" name="uom" 
                                       value="Kg" > Kg
                                 <?php
                                }
                                else if($dr_row["Uom"]=="Unit")
                                {
                                ?>
                                <input type="radio" readonly=""  id="uom" name="uom" 
                                       value="Nos" > Nos
                                <input type="radio" readonly=""  id="uom" name="uom" 
                                       value="Unit" checked="" > Unit
                                <input type="radio" readonly=""  id="uom" name="uom" 
                                       value="Kg" > Kg
                                <?php
                                }
                                else
                                {
                                ?>
                                <input type="radio" readonly=""  id="uom" name="uom" 
                                       value="Nos" > Nos
                                <input type="radio" readonly=""  id="uom" name="uom" 
                                       value="Unit" > Unit
                                <input type="radio" readonly=""  id="uom" name="uom" 
                                       value="Kg" checked=""> Kg
                                <?php
                                }
                                ?>
                        </td>
                    </tr>
                     <tr>
                        <td>
                            <label for="Doctor_address" class="text-black">Rate</label>
                            <input type="number" readonly=""  class="form-control"
                              id="rate" name="rate" value="<?php echo $dr_row["Rate"];?>">
                        </td>
                    </tr>
                    
                    
                    <tr>
                        <td>
                            <input type="submit" value="Delete Stock Details" class="btn btn-primary">
                            
                        </td>
                    </tr>
                </tbody>
                <?php
                    }
                }
                ?>                
            </table>
          </form>
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
            <form action="#">
              <div class="form-group">
                <label for="appointment_name" class="text-black">Full Name</label>
                <input type="text" class="form-control" id="appointment_name">
              </div>
              <div class="form-group">
                <label for="appointment_email" class="text-black">Email</label>
                <input type="text" class="form-control" id="appointment_email">
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="appointment_date" class="text-black">Date</label>
                    <input type="text" class="form-control" id="appointment_date">
                  </div>    
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="appointment_time" class="text-black">Time</label>
                    <input type="text" class="form-control" id="appointment_time">
                  </div>
                </div>
              </div>
              

              <div class="form-group">
                <label for="appointment_message" class="text-black">Message</label>
                <textarea name="" id="appointment_message" class="form-control" cols="30" rows="10"></textarea>
              </div>
              <div class="form-group">
                <input type="submit" value="Send Message" class="btn btn-primary">
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