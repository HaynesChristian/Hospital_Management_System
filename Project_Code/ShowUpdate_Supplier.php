<?php
$con_servername = "localhost";
$con_username = "root";
$con_password = "";
$database = "hospital_management_system";

$connection = mysqli_connect($con_servername, $con_username, $con_password, $database);

$SupplierId = $_GET["SupplierId"];
if($_GET)
{   
    $login_name=$_GET["admin_name"];
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Update Supplier</title>
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
                <span>Update Supplier</span></p>
            <h1 class="mb-3 bread">Update Supplier Details</h1>
          </div>
        </div>
      </div>
    </div>
    

    <section class="ftco-section ftco-degree-bg">
      <div class="container">
          <form method="POST" action="update_supplier.php">
              <table border="1" class="table table-striped" style="width:75%;">
                <thead>
                    <tr>
                        <th>Supplier Details</th>
                        
                    </tr>
                </thead>
                <?php
              

                $view_supplierdetails = "SELECT * FROM supplier_master "
                        . "WHERE supplier_master.Supplier_Id = $SupplierId";
                $result_doctorlist = mysqli_query($connection, $view_supplierdetails);
                if(mysqli_num_rows($result_doctorlist) > 0)
                {
                    while($dr_row= mysqli_fetch_assoc($result_doctorlist))
                    {
                ?>                
                <tbody>
                    <tr>
                       
                        <td>
                             <label for="Doctor_name" class="text-black">Name</label>
                            <input type="text" class="form-control" id="name" 
                                   name="name" value="<?php echo $dr_row["Supplier_Name"];?>">
                            <input type="hidden" name="Supplier_Id" value="<?php echo $SupplierId;?>">
                                   <input type="hidden" name="admin_name" value="<?php echo $login_name;?>">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="Doctor_contactNo" class="text-black">Email Id</label>
                                 <input type="email" class="form-control"
                                     id="emailid" name="emailid" value="<?php echo $dr_row["Supplier_Email"];?>">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="Doctor_address" class="text-black">Mobile Number</label>
                             <input type="tel" class="form-control"
                              id="mobile" name="mobile" value="<?php echo $dr_row["Supplier_MobileNo"];?>">
                        </td>
                    </tr>
                    
                    <tr>
                        <td>
                           <label for="Doctor_email" class="text-black">Address</label>
                           <textarea name="address" id="address" 
                                     class="form-control" cols="15" rows="5">
                               <?php echo trim($dr_row["Supplier_Address"]);?>
                           </textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>
                           <label for="Doctor_qualification" class="text-black">Type</label><br>
                                <?php 
                                if($dr_row["Supplier_Type"]=="Material")
                                {
                                ?>
                                <input type="radio" id="type" name="type" 
                                       value="Material" checked=""> Material
                                <input type="radio" id="type" name="type" 
                                       value="Equipment" > Equipment
                                <input type="radio" id="type" name="type" 
                                       value="Inventory" > Inventory
                                 <?php
                                }
                                else if($dr_row["Supplier_Type"]=="Equipment")
                                {
                                ?>
                                <input type="radio" id="type" name="type" 
                                       value="Material" > Material
                                <input type="radio" id="type" name="type" 
                                       value="Equipment" checked="" > Equipment
                                <input type="radio" id="type" name="type" 
                                       value="Inventory" > Inventory
                                <?php
                                }
                                else
                                {
                                ?>
                                <input type="radio" id="type" name="type" 
                                       value="Material" > Material
                                <input type="radio" id="type" name="type" 
                                       value="Equipment" > Equipment
                                <input type="radio" id="type" name="type" 
                                       value="Inventory" checked=""> Inventory
                                <?php
                                }
                                ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                           <label for="Doctor_speciality" class="text-black">GST No.</label>
                            <input type="text" class="form-control" id="gstno"
                                   name="gstno" value="<?php echo $dr_row["Supplier_Gst_No"];?>">
                        </td>
                    </tr>
                    <tr>
                        <td>
                          <label for="Doctor_speciality" class="text-black">Account Number</label>
                          <input type="number" class="form-control" id="accno"
                                   name="accno" value="<?php echo $dr_row["Supplier_Account_No"];?>">
                        </td>
                    </tr>
                    <tr>
                        <td>
                          <label for="Doctor_speciality" class="text-black">IFSC Code</label>
                            <input type="text" class="form-control" id="ifscCode"
                                   name="ifscCode" value="<?php echo $dr_row["Supplier_Ifsc_Code"];?>">
                        </td>
                    </tr>
                    <tr>
                        <td>
                           <label for="Doctor_speciality" class="text-black">Account Holder Name</label>
                            <input type="text" class="form-control" id="accountHolderName"
                                   name="accountHolderName" value="<?php echo $dr_row["Supplier_AccountHolder_Name"];?>">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="submit" value="Update Supplier Details" class="btn btn-primary">
                            
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