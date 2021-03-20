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
    <title>Operation List</title>
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
            <p class="breadcrumbs"><span class="mr-2">
                    <a href="index.php?admin_name=<?php echo $login_name;?>">Home</a></span> 
                <span class="mr-2">
                    <a href="doctor.php?admin_name=<?php echo $login_name;?>">Doctor</a>
                </span>
                <span>Operation Schedule</span>
            </p>
            <h1 class="mb-3 bread">Operation Schedule</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section ftco-degree-bg">
      <div class="container">
        <div>
          <div class="ftco-animate">
              <div class="row">
                  <div class="col-md-4">
                      <form action="#" class="search-form">
                          <div class="form-group">
                              <span class="icon fa fa-search"></span>
                              <input type="text" placeholder="Filter By Doctor Name" class="form-control" 
                                   id="searchdoctor" onkeyup="Alldoctorname()">
                          </div>
                      </form>
                  </div>
                  <div class="col-md-4">
                      <form action="#" class="search-form">
                          <div class="form-group">
                              <span class="icon fa fa-search"></span>
                              <input type="date" placeholder="Filter By Visiting Date" class="form-control" 
                                   id="searchvisitdate" onchange="Allvisitingdate()">
                          </div>
                      </form>
                  </div>
                  <div class="col-md-4">
                      <form action="#" class="search-form">
                          <div class="form-group">
                              <span class="icon fa fa-search"></span>
                              <input type="text" placeholder="Filter By Patient Name" class="form-control" 
                                   id="searchpatientname" onkeyup="Allpatientname()">
                          </div>
                      </form>
                  </div>
              </div>
              <table border="0" class="table table-striped"  id="AlloperationTable">
                    <thead>
                        <tr>
                            <th>Doctor Name</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Patient Name</th>
                            <th>Approx duration</th>
                            <th>Status</th>
                            <th>Update</th>
                        </tr>
                    </thead>
                    <tbody>
                    <tbody>
                    <?php
                    //echo "$current_date";
                    $apt = "SELECT * FROM operation_schedule ORDER BY Operation_Schedule_date DESC";
                    $appointment_result = mysqli_query($connection, $apt);
                    if(mysqli_num_rows($appointment_result) > 0)
                    {
                        while ($apt_row = mysqli_fetch_assoc($appointment_result)) 
                       {
                        $timestamp  = strtotime($apt_row["Operation_Schedule_date"]);
                        $ops_date = date('d/m/Y', $timestamp );						   
                    ?>
                    <form method="POST">
                        <tr>
                            <input type="hidden" name="operation_schedule_id" value="<?php echo $apt_row["Operation_Schedule_id"];?>">
                            <td><?php echo $apt_row["Doctor_name"];?></td>
                            <td style="display:none"><?php echo $apt_row["Operation_Schedule_date"];?></td>
							<td><?php echo $ops_date;?></td>
                            <td><?php echo $apt_row["Operation_Schedule_time"];?></td>
                            <td><?php echo $apt_row["Patient_name"];?></td>
                            <td><?php echo $apt_row["Operation_Schedule_duration"];?> min</td>
                            <td><?php echo $apt_row["Operation_Status"];?></td>
                            <td>
                                <button <?php if($apt_row["Operation_Status"] == 'completed')
                                    {echo "style='display:none'";}?>
                                    formaction="Operation_Schedule_ShowUpdate.php?admin_name=<?php echo $login_name;?>" class="btn btn-primary">
                                    Update
                                </button>
                            </td>
                        </tr>
                    </form>                        
                    <?php
                            
                        }
                    }
                    ?>                        
                    </tbody>
                </table>              
          </div>
            <!-- .col-md-8 -->
        </div>
      </div>
    </section> <!-- .section -->

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>

    <script>
        function Alldoctorname() 
        {
          var input, filter, table, tr, td, i, txtValue;
          input = document.getElementById("searchdoctor");
          filter = input.value.toUpperCase();
          table = document.getElementById("AlloperationTable");
          tr = table.getElementsByTagName("tr");
          for (i = 0; i < tr.length; i++) 
          {
            td = tr[i].getElementsByTagName("td")[0];
            if (td) 
            {
              txtValue = td.textContent || td.innerText;
              if (txtValue.toUpperCase().indexOf(filter) > -1) 
              {
                tr[i].style.display = "";
              }
              else 
              {
                tr[i].style.display = "none";
              }
            }       
          }
        }
        function Allvisitingdate() 
        {
          var input, filter, table, tr, td, i, txtValue;
          input = document.getElementById("searchvisitdate");
          filter = input.value.toUpperCase();
          table = document.getElementById("AlloperationTable");
          tr = table.getElementsByTagName("tr");
          for (i = 0; i < tr.length; i++) 
          {
            td = tr[i].getElementsByTagName("td")[1];
            if (td) 
            {
              txtValue = td.textContent || td.innerText;
              if (txtValue.toUpperCase().indexOf(filter) > -1) 
              {
                tr[i].style.display = "";
              }
              else 
              {
                tr[i].style.display = "none";
              }
            }       
          }
        }
        function Allpatientname() 
        {
          var input, filter, table, tr, td, i, txtValue;
          input = document.getElementById("searchpatientname");
          filter = input.value.toUpperCase();
          table = document.getElementById("AlloperationTable");
          tr = table.getElementsByTagName("tr");
          for (i = 0; i < tr.length; i++) 
          {
            td = tr[i].getElementsByTagName("td")[3];
            if (td) 
            {
              txtValue = td.textContent || td.innerText;
              if (txtValue.toUpperCase().indexOf(filter) > -1) 
              {
                tr[i].style.display = "";
              }
              else 
              {
                tr[i].style.display = "none";
              }
            }       
          }
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