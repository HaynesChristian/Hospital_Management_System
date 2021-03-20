<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hospital_management_system";

$conn = mysqli_connect($servername,$username,$password,$dbname);

if($_GET)
{
    $login_name=$_GET["admin_name"];
}
$current_date = date("Y-m-d");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Departments</title>
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
              <a href="index.php?admin_name=<?php echo $login_name;?>" class="nav-link">
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
            <p class="breadcrumbs"><span class="mr-2"><a href="index.php?admin_name=<?php echo $login_name;?>">Home</a></span> <span class="mr-2"><a href="departments.php?admin_name=<?php echo $login_name;?>">Departments</a></span> </p>
            <h1 class="mb-3 bread">Bill Management</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section bg-light">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-7 heading-section ftco-animate text-center">
              <center>
                  <button class="btn btn-primary" data-toggle="modal" data-target="#modalAppointment" 
                          style="margin-top: 2%">Add Hospital Tax Bill</button>
                  <button class="btn btn-primary" data-toggle="modal" data-target="#modalApp" 
                          style="margin-top: 2%">Generate Hospital Tax Report</button>
              </center>
              <br>
            <h2 class="mb-4">Hospital Tax Bill</h2>            
          </div>
        </div>
        <div class="row d-flex justify-content-center">
            <table class="table table-striped">
                <tr>
                    <th>Bill no.</th>
                    <th>Bill Name</th>
                    <th>Amount</th>
                    <th>Bill Pay Date</th>
                    <th>Bill Add Date</th>
                    <th>Update</th>
                    <th>Delete</th>
                </tr>
                <?php 
                $dislpaydata = "select * from hospital_tax";
                $result = mysqli_query($conn, $dislpaydata);
                if(mysqli_num_rows($result)>0)
                {
                    while ($row = mysqli_fetch_assoc($result)) 
                    {
                ?>
                <tr>
                    <form method="POST" autocomplete="off">
                        <td><?php echo "HT".$row["Hospital_tax_id"];?></td>
                        <td><?php echo $row["Hospital_tax_name"];?></td>
                        <td><?php echo $row["Hospital_tax_amount"];?></td>
                        <td><?php echo $row["hospital_tax_bill_paydate"];?></td>
                        <td><?php echo $row["hospital_tax_bill_adddate"];?></td>
                        <td>
                            <button formaction="hospital_taxUpdate.php?admin_name=<?php echo $login_name;?>" class="btn btn-primary" data-toggle="modal" data-target="#modal1" name="Update" value="<?php echo $row["Hospital_tax_id"];?>">Update</button>
                        </td>
                        <td>
                            <button formaction="hospital_taxDelete.php?admin_name=<?php echo $login_name;?>" class="btn btn-primary" data-toggle="modal" data-target="#modal1" name="Delete" value="<?php echo $row["Hospital_tax_id"];?>">Delete</button>
                        </td>    
                    </form>
                </tr>
                <?php
                    }
                }
                ?>
            </table>
        </div> 
      </div>
    </section>
    <!-- .section -->
    
  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>

  <!-- Modal -->
    <div class="modal fade" id="modalAppointment" tabindex="-1" role="dialog" aria-labelledby="modalAppointmentLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalAppointmentLabel">Insert Hospital Tax</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
              <form method="post" action="hospital_tax.php?admin_name=<?php echo $login_name;?>">
                  <input type="hidden" id="admin_name" name="admin_name" value="<?php echo $login_name;?>">
              <div class="row">
                <div class="col-md-6">                  
                    <div class="form-group">
                        <label for="name" class="text-black">Hospital tax name</label>
                        <input type="text" class="form-control" id="billname" name="billname" required="">
                    </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="amount" class="text-black">Hospital tax amount</label>
                    <input type="number" class="form-control" id="amount" name="amt" required="">
                  </div>    
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="date" class="text-black">Hospital tax bill pay date</label>
                    <input type="date" class="form-control" id="hdate" name="hpdate" required="">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="date" class="text-black">Hospital tax bill add date</label>
                    <input type="date" class="form-control" id="hdate" name="hbdate" readonly=""
                           value="<?php echo $current_date;?>">
                  </div>
                </div>                  
              </div>
              <div class="form-group">
                  <input type="submit" name="Insert data" class="btn btn-primary" value="Add Bill Details">              
              </div>
            </form>
          </div>
          
        </div>
      </div>
    </div>
  
  <!-- Generate report-->
  <div class="modal fade" id="modalApp" tabindex="-1" role="dialog" aria-labelledby="modalApp" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalAppointmentLabel">Hospital Tax Bill Report</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
              <form method="post" action="hospitaltaxdisplay.php">
              <div class="form-group">
                <label for="appointment_name" class="text-black">From</label>
                <input type="date" name="From_Date" class="form-control" id="appointment_name" onchange="checkapt_date()">
              </div>
              <div class="form-group">
                <label for="appointment_tdate" class="text-black">To</label>
                <input type="date" name="To_Date" class="form-control" id="appointment_tdate" onchange="checkapt_date()">
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
  
<script>
     function checkapt_date()
        
{
var selectedText = document.getElementById('appointment_tdate').value;
var selectedDate = new Date(selectedText);
var now = new Date();
var dt1 = Date.parse(now),
dt2 = Date.parse(selectedDate);
if (dt2 > dt1)
{
alert("Date must be in the past ");
document.getElementById('appointment_tdate').value = now.toISOString().split('T')[0];;
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