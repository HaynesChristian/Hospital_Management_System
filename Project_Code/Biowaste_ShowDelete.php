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
    <title>Update Biowaste</title>
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
                <span class="mr-2"><a href="biowaste_report.php?admin_name=<?php echo $login_name;?>">Biowaste report details</a></span> 
            <h1 class="mb-3 bread">Delete Biowaste Details</h1>
          </div>
        </div>
      </div>
    </div>
    <section class="ftco-section bg-light">
      <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 heading-section ftco-animate text-center">
            <h2 class="mb-4">Biowaste Details for Delete</h2>           
          </div>
        </div>
        <div class="row d-flex justify-content-center">
            <form method="POST" enctype="multipart/form-data">
                <input type="hidden" name="admin_name" value="<?php echo $login_name;?>">
              <table border="0" class="table table-striped" style="width:100%;">
    
                <?php
              $id=$_POST['Delete'];
              $dislpaydata = "select * from Biowaste_dispach where Biowaste_dispach_id=$id";
              $result = mysqli_query($conn, $dislpaydata);
              if(mysqli_num_rows($result)>0)
              {
                  while ($row = mysqli_fetch_assoc($result)) 
                  {
              ?>
                <tbody>
                    <tr>
                       <td>
                           <input type="hidden" name="biowaste_id" value="<?php echo $row["Biowaste_dispach_id"];?>"/>
                            <label for="agency_name" class="text-black">Agency_name</label>
                            <input type="text" class="form-control" id="agency_name" name="agency_name" 
                                   value="<?php echo $row["Biowaste_dispach_agency_name"];?>" readonly="">
                        </td>
                        <td>
                            <label for="dispatch_date" class="text-black">Date</label>
                            <input type="date" class="form-control" name="dispatch_date" 
                                   value="<?php echo $row["Biowaste_dispach_date"];?>" readonly=""/>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="red_quantity" class="text-black">Red Quantity</label>
                            <input type="number" class="form-control" id="red_quantity" placeholder="format: kilos.grams" 
                                   min="0" name="red_quantity" readonly="" 
                                   step="0.01" value="<?php echo $row["Red_Quantity"];?>">
                        </td>
                        <td>
                            <label for="yellow_quantity" class="text-black">Yellow Quantity</label>
                            <input type="number" class="form-control" id="yellow_quantity" placeholder="format: kilos.grams"
                                   min="0" name="yellow_quantity" readonly="" 
                                   step="0.01" value="<?php echo $row["Yellow_Quantity"];?>"/>
                        </td>
                    </tr>
                    <tr>                        
                        <td>
                            <label for="white_quantity" class="text-black">White Quantity</label>
                            <input type="number" class="form-control" id="white_quantity" placeholder="format: kilos.grams"
                                   min="0" name="white_quantity" readonly="" 
                                   step="0.01" value="<?php echo $row["White_Quantity"];?>"/>
                        </td>
                        <td>
                            <label for="blue_quantity" class="text-black">Blue Quantity</label>
                            <input type="number" class="form-control" id="blue_quantity" placeholder="format: kilos.grams"
                                   min="0" name="blue_quantity" readonly="" 
                                   step="0.01" value="<?php echo $row["Blue_Quantity"];?>"/>
                        </td>     
                    </tr>                    
            </tbody>
              <?php
                  }
               }
              ?>
            </table>
              <button formaction="biowastedelsave.php?admin_name=<?php echo $login_name;?>" name="save" value="<?php echo $row["Biowaste_dispach_id"];?>" class="btn btn-primary"> 
                  Delete 
               </button>
          </form>
        </div> 
      </div>
    </section>


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