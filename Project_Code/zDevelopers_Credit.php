<?php
$con_servername = "localhost";
$con_username = "root";
$con_password = "";
$database = "hospital_management_system";

$connection = mysqli_connect($con_servername, $con_username, $con_password, $database);

$current_date = date("Y-m-d");

if($_GET)
{
    $login_name=$_GET["admin_name"];
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Developers' Credits</title>
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
    <link rel="stylesheet" href="css/w3.css">
    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">

    
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">
    
    <style>
        .fadein { 
            animation: fadeInAnimation ease 3s; 
            animation-iteration-count: 1; 
            animation-fill-mode: forwards; 
        } 

        @keyframes fadeInAnimation { 
            0% { 
                opacity: 0; 
            } 
            100% { 
                opacity: 1; 
             } 
        }        
    </style>
  </head>
  <body>
      <?php
      if($_GET)
        {
            $login_name=$_GET["admin_name"];
      ?>
  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
      <a class="navbar-brand" href="index.php?admin_name=<?php echo $login_name;?>">
          <i class="flaticon-pharmacy"></i><span>Tattvam</span> Hospital
      </a>

      <div class="collapse navbar-collapse" id="ftco-nav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active"><a href="index.php?admin_name=<?php echo $login_name;?>" class="nav-link">Home</a></li>      
          <li class="nav-item"><a href="staff.php?admin_name=<?php echo $login_name;?>" class="nav-link">Staff</a></li>
          <li class="nav-item"><a href="departments.php?admin_name=<?php echo $login_name;?>" class="nav-link">Departments</a></li>
          <li class="nav-item"><a href="doctor.php?admin_name=<?php echo $login_name;?>" class="nav-link">Doctors</a></li>
          <li class="nav-item"><a href="patient.php?admin_name=<?php echo $login_name;?>" class="nav-link">Patient</a></li>
          <li class="nav-item"><a href="services.php?admin_name=<?php echo $login_name;?>" class="nav-link">Services</a></li>         
          <?php 
          }
          else
          {
          ?>
  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
      <a class="navbar-brand" href="index.php">
          <i class="flaticon-pharmacy"></i><span>Tattvam</span> Hospital
      </a>

      <div class="collapse navbar-collapse" id="ftco-nav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
              <a href="index.php" class="nav-link">Home</a>
          </li>          
          <li class="nav-item"><a href="Login_module/login_modal.html" class="nav-link">Staff</a></li>
          <li class="nav-item"><a href="Login_module/login_modal.html" class="nav-link">Departments</a></li>
          <li class="nav-item"><a href="Login_module/login_modal.html" class="nav-link">Doctors</a></li>
          <li class="nav-item"><a href="Login_module/login_modal.html" class="nav-link">Patient</a></li>
          <li class="nav-item"><a href="Login_module/login_modal.html" class="nav-link">Services</a></li>          
          <?php
          }
          ?>
        </ul>
      </div>
    </div>
  </nav>
    <!-- END nav -->
    
    <div class="hero-wrap" style="background-image: url('images/bg_6.jpg'); background-attachment:fixed;">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center" 
             data-scrollax-parent="true">
          <div class="col-md-8 ftco-animate text-center">
            <h1 class="bread">Developers Credits</h1>
          </div>
        </div>
      </div>
    </div><br><br>
    
    <div class="w3-container w3-animate-left" style="margin: 2em; width: 50%">
        <div class="testimony-wrap text-center">
            <div class="user-img" style="background-image: url(images/Developer1.jpg)">
                <span class="quote d-flex align-items-center justify-content-center">
                    <i class="icon-quote-left"></i>
                </span>
            </div>
            <br>
            <div class="text">
                <p class="name">HAYNES CHRISTIAN</p>
                <span class="position">Developer</span>
                <p class="">
                    PHONE : <a href="tel:7405430082">7405430082 </a><br>
                    EMAIL : <a href="https://mail.google.com/mail/?view=cm&fs=1&to=hayneschristian10@gmail.com&su=CONTACT DEVELOPER&body=Reason for Contacting you is: &bcc=mehulchauhan2399@gmail.com,jigishaparmar577@gmail.com,sejalpar26@gmail.com"
                               target="_BLANK">
                        hayneschristian10@gmail.com</a>
                </p>
            </div>
        </div>
    </div>
    
    <div class="w3-container w3-animate-right" style=" margin: 2em; width: 50%; float: right">
        <div class="testimony-wrap text-center">
            <div class="user-img" style="background-image: url(images/Developer2.jpeg)">
                <span class="quote d-flex align-items-center justify-content-center">
                    <i class="icon-quote-left"></i>
                </span>
            </div>
            <br>
            <div class="text">
                <p class="name">SEJAL PARMAR</p>
                <span class="position">Developer</span>
                <p class="">
                    PHONE : <a href="tel:9662058818">9662058818 </a><br>
                    EMAIL : <a href="https://mail.google.com/mail/?view=cm&fs=1&to=sejalpar26@gmail.com&su=CONTACT DEVELOPER&body=Reason for Contacting you is: &bcc=mehulchauhan2399@gmail.com,jigishaparmar577@gmail.com,hayneschristian10@gmail.com"
                               target="_BLANK">
                        sejalpar26@gmail.com</a>
                </p>
            </div>
        </div>
    </div><br>

    <div class="w3-container w3-animate-left" style="margin: 2em; width: 50%">
        <div class="testimony-wrap text-center">
            <div class="user-img" style="background-image: url(images/Developer3.jpeg)">
                <span class="quote d-flex align-items-center justify-content-center">
                    <i class="icon-quote-left"></i>
                </span>
            </div>
            <br>
            <div class="text">
                <p class="name">MEHUL CHAUHAN</p>
                <span class="position">Developer</span>
                <p class="">
                    PHONE : <a href="tel:9574804504">9574804504 </a><br>
                    EMAIL : <a href="https://mail.google.com/mail/?view=cm&fs=1&to=mehulchauhan2399@gmail.com&su=CONTACT DEVELOPER&body=Reason for Contacting you is: &bcc=sejalpar26@gmail.com,jigishaparmar577@gmail.com,hayneschristian10@gmail.com"
                               target="_BLANK">
                        mehulchauhan2399@gmail.com</a>
                </p>
            </div>
        </div>
    </div>

    <div class="w3-container w3-animate-right" style="margin: 2em; width: 50%; float: right">
        <div class="testimony-wrap text-center">
            <div class="user-img" style="background-image: url(images/Developer4.jpeg)">
                <span class="quote d-flex align-items-center justify-content-center">
                    <i class="icon-quote-left"></i>
                </span>
            </div>
            <br>
            <div class="text">
                <p class="name">JIGISHA PARMAR</p>
                <span class="position">Developer</span>
                <p class="">
                    PHONE : <a href="tel:7984915423">7984915423 </a><br>
                    EMAIL : <a href="https://mail.google.com/mail/?view=cm&fs=1&to=jigishaparmar577@gmail.com&su=CONTACT DEVELOPER&body=Reason for Contacting you is: &bcc=sejalpar26@gmail.com,mehulchauhan2399@gmail.com,hayneschristian10@gmail.com"
                               target="_BLANK">
                        jigishaparmar577@gmail.com</a>
                </p>
            </div>
        </div>
    </div>    
    <br><br><br>
  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>

  <script>
      function faderight()
      {
          var element = document.getElementById("jp");
          element.classList.add("w3-animate-right");
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