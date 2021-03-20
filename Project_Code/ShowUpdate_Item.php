<?php
$con_servername = "localhost";
$con_username = "root";
$con_password = "";
$database = "hospital_management_system";

$connection = mysqli_connect($con_servername, $con_username, $con_password, $database);

$itemCode = $_GET["itemCode"];
if($_GET)
{   
    $login_name=$_GET["admin_name"];
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Update Item</title>
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
                <span>Update Item</span></p>
            <h1 class="mb-3 bread">Update Item Details</h1>
          </div>
        </div>
      </div>
    </div>
    

    <section class="ftco-section ftco-degree-bg">
      <div class="container">
          <form method="POST" action="update_item.php">
              <table border="1" class="table table-striped" style="width:75%;">
                <thead>
                    <tr>
                        <th>Item Details</th>
                        
                    </tr>
                </thead>
                <?php
              

                $view_supplierdetails = "SELECT * FROM item "
                        . "WHERE item.Item_Code = $itemCode";
                $result_doctorlist = mysqli_query($connection, $view_supplierdetails);
                if(mysqli_num_rows($result_doctorlist) > 0)
                {
                    while($dr_row= mysqli_fetch_assoc($result_doctorlist))
                    {
                ?>                
                <tbody>
                    
                    <tr>
                        <td>
                            <label for="Doctor_address" class="text-black">Item Name </label>
                            <input type="text" class="form-control"
                              id="itemName" name="itemName" value="<?php echo $dr_row["Item_Name"];?>">
                            <input type="hidden" id="itemCode" name="itemCode" value="<?php echo $itemCode;?>">
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
                                <input type="radio" id="itemType" name="itemType" 
                                       value="Consumable" checked=""> Consumable 
                                <input type="radio" id="itemType" name="itemType" 
                                       value="Non Consumable" > Non Consumable 
                             
                                 <?php
                                }
                                else if($dr_row["Item_Type"]=="Non Consumable")
                                {
                                ?>
                                <input type="radio" id="itemType" name="itemType" 
                                       value="Consumable" > Consumable
                                <input type="radio" id="itemType" name="itemType" 
                                       value="Non Consumable" checked="" > Non Consumable
                               
                                <?php
                                }
                                ?>     
                         </td>
                    </tr>
                   
                    <tr>
                        <td>
                            <label for="Doctor_address" class="text-black">Supplier Name</label>
                            <select selected="" class="form-control" id="supplierName" name="supplierName" required="">
                                    <?php
                                    $dislpaydata = "select * from supplier_master";
                                    $result = mysqli_query($connection, $dislpaydata);
                                    if(mysqli_num_rows($result)>0)
                                    {
                                        while ($row = mysqli_fetch_assoc($result)) 
                                                {
                                    ?>

                                <option value="<?php echo $row["Supplier_Name"];?>"
                                              <?php if($row["Supplier_Name"] == $dr_row["Supplier_Name"]){echo "selected='selected'";}?>>
                                              <?php echo $row["Supplier_Name"];?></option>
                                

                                    <?php
                                                }
                                    }
                                    ?>
                               </select>     
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <input type="submit" value="Update Item Details" class="btn btn-primary">
                            
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