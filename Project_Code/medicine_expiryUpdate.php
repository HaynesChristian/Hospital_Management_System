<?php
$con_servername = "localhost";
$con_username = "root";
$con_password = "";
$database = "hospital_management_system";

$conn = mysqli_connect($con_servername, $con_username, $con_password, $database);
if($_GET)
{
    $login_name=$_GET["admin_name"];
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Update Medicine</title>
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
            <p class="breadcrumbs">
                <span class="mr-2"><a href="index.php?admin_name=<?php echo $login_name;?>">Home</a></span>
                <span class="mr-2"><a href="medical_expiry_report.php?admin_name=$login_name">Medicine Expiry report details</a></span> 
            <h1 class="mb-3 bread">Update Medicine expiry Details</h1>
          </div>
        </div>
      </div>
    </div>
    <section class="ftco-section bg-light">
      <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 heading-section ftco-animate text-center">
            <h2 class="mb-4">Update Medicine expiry</h2>           
          </div>
        </div>
        <div class="row d-flex justify-content-center">
            <form method="POST" enctype="multipart/form-data">
                <input type="hidden" name="admin_name" value="<?php echo $login_name;?>">
              <table border="0" class="table table-striped" style="width:100%;">
                <?php
                $id=$_POST['Update'];
                $dislpaydata = "select * from Medicine where Medicine_Id=$id";
                $result = mysqli_query($conn, $dislpaydata);
                if(mysqli_num_rows($result)>0)
                {
                    while ($row = mysqli_fetch_assoc($result)) 
                    {
                ?>
                <tbody>
                    <tr>
                       <td>
                           <input type="hidden" name="id" value="<?php echo $row["Medicine_Id"];?>"/>
                           <label for="medicine_name" class="text-black">Medicine Name</label>
                           <input type="text" class="form-control" id="medicine_name" 
                                  name="medicine_name" required="" value="<?php echo $row["Medicine_Name"];?>"/>
                       </td>
                       <td>
                           <label for="mdate" class="text-black">Manufacture Date</label>
                           <input type="date"  class="form-control" id="mdate" 
                                  name="mdate" required="" value="<?php echo $row["manufacture_Date"];?>"/>
                       </td>
                       <td>
                           <label for="edate" class="text-black">Expiry Date</label>
                           <input type="date"  class="form-control" id="edate" 
                                  name="edate" required="" value="<?php echo $row["Expiry_Date"];?>"/>
                       </td> 
                    </tr>
                    <tr>
                        <td>
                            <label for="medicine_batchno" class="text-black">Batch No.</label>
                            <input type="text" class="form-control" id="medicine_batchno" 
                                   name="medicine_batchno" required="" value="<?php echo $row["Batch_no"];?>">                            
                        </td>
                        <td>
                            <label for="medicine_quantity" class="text-black">Quantity</label>
                            <input type="number" class="form-control" id="medicine_quantity" 
                                   name="medicine_quantity" required="" value="<?php echo $row["Quantity"];?>">                            
                        </td>
                        <td>
                            <label for="medicine_price" class="text-black">Price</label>
                            <input type="number" class="form-control" id="medicine_price" 
                                   name="medicine_price" required="" value="<?php echo $row["Price"];?>">                            
                        </td>                        
                    </tr>
                    <tr>
                        <td colspan="3">
                            <label for="medicine_totalprice" class="text-black">Total Price</label>
                            <input type="number" class="form-control" id="medicine_totalprice"
                                   name="medicine_totalprice" readonly="" value="<?php echo $row["Total_Price"];?>">                            
                        </td>
                    </tr>
                </tbody>
                <?php
                    }
                }
                ?>
            </table>
              <button formaction="Mupdsave.php" name="save" value="<?php echo $row["Medicine_Id"];?>" class="btn btn-primary"> 
                  Update 
               </button>
          </form>
        </div> 
      </div>
    </section>


  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script>
      function calculate_med()
      {
          var quan = document.getElementById("medicine_quantity").value;
          var price = document.getElementById("medicine_price").value;
          total = quan * price;
          document.getElementById("medicine_totalprice").value = total;
          
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