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
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Medicine Report</title>
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
            <p class="breadcrumbs"><span class="mr-2"><a href="index.php?admin_name=<?php echo $login_name;?>">Home</a></span> <span class="mr-2"><a href="departments.php?admin_name=<?php echo $login_name;?>">Departments</a></span></p>
            <h1 class="mb-3 bread">Report Management</h1>
          </div>
        </div>
      </div>
    </div>
    <section class="ftco-section bg-light">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-7 heading-section ftco-animate text-center">
               <center>
                   <button class="btn btn-primary" data-toggle="modal" data-target="#modal" 
                           style="margin-top: 2%">Add New Medicine </button>
                   <button class="btn btn-primary" data-toggle="modal" data-target="#modalApp" 
                           style="margin-top: 2%">Generate Medicine Report</button>
               </center><br>
            <h2 class="mb-4">Medicine Report</h2>            
          </div>
        </div>
        <div class="row d-flex justify-content-center">
            <table class="table table-striped">
                <tr>
                    <th>Medicine Name</th>
                    <th>Batch No.</th>
                    <th>Manufacture Date</th>
                    <th>Expiry Date</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Total Price</th>
                    <th></th>
                </tr>
                <?php
                $dislpaydata = "select * from Medicine ORDER BY Expiry_Date";
                $result = mysqli_query($conn, $dislpaydata);
                if(mysqli_num_rows($result)>0)
                {
                    while ($row = mysqli_fetch_assoc($result)) 
                    {
                ?>
                <tr>
                <form method="POST" autocomplete="off">
                    <td><?php echo $row["Medicine_Name"];?></td>
                    <td><?php echo $row["Batch_no"];?></td>
                    <td><?php echo $row["manufacture_Date"];?></td>
                    <td><?php echo $row["Expiry_Date"];?></td>
                    <td><?php echo $row["Quantity"];?></td>
                    <td><?php echo $row["Price"];?></td>
                    <td><?php echo $row["Total_Price"];?></td>
                    <td>
                        <button formaction="medicine_expiryUpdate.php?admin_name=<?php echo $login_name;?>" name="Update"  class="btn btn-primary"
                                value="<?php echo $row["Medicine_Id"];?>" >
                            Update
                        </button>
                        <button formaction="medicine_expiryDelete.php?admin_name=<?php echo $login_name;?>" name="Delete"  class="btn btn-primary"
                                value="<?php echo $row["Medicine_Id"];?>">
                            Delete
                        </button>
                     </td>
                </tr>
                </form>
              <?php
                    }
                }
                ?>
            </table>
        </div> 
      </div>
    </section>
<!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>

  <!-- Modal -->
    
  <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalAppointmentLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalAppointmentLabel">Medicine Details</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
              <form method="post" action="Medicine.php?admin_name=<?php echo $login_name;?>">
                  <input type="hidden" name="admin_name" value="<?php echo $login_name;?>">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                      <label for="medicine_name" class="text-black">Medicine Name</label>
                      <input type="text" class="form-control" id="medicine_name" 
                             name="medicine_name" required="">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                      <label for="medicine_batchno" class="text-black">Batch No.</label>
                      <input type="text" class="form-control" id="medicine_batchno" 
                             name="medicine_batchno" required="">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                      <label for="medicine_quantity" class="text-black">Quantity</label>
                      <input type="number" class="form-control" id="medicine_quantity" 
                             name="medicine_quantity" required="">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                      <label for="medicine_price" class="text-black">Price</label>
                      <input type="number" class="form-control" id="medicine_price" 
                             name="medicine_price" required="">
                  </div>
                </div>                  
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="mdate" class="text-black">Manufacture Date</label>
                    <input type="date"  class="form-control" id="mdate" name="mdate" required="">
                  </div>    
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="edate" class="text-black">Expiry Date</label>
                    <input type="date"  class="form-control" id="edate" name="edate" required="">
                  </div>
                </div>
              </div>
              <div class="form-group">
                  <input type="submit" name="search date" class="btn btn-primary" value="Add Medicine" 
                         style="margin-top: 2%">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  
    <div class="modal fade" id="modalApp" tabindex="-1" role="dialog" aria-labelledby="modalAppointmentLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalAppointmentLabel">Medicine expiry report</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
              <form method="post" action="Mdisplay.php">
            
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="appointment_date" class="text-black">From Expiry Date</label>
                    <input type="date" name="From_Date" class="form-control" id="appointment_edate">
                  </div>    
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="appointment_ldate" class="text-black">To Expiry Date</label>
                    <input type="date" name="To_Date" class="form-control" id="appointment_ldate">
                  </div>
                </div>
              </div>
              <div class="form-group">
                  <input type="submit" name="search date" class="btn btn-primary" 
                         value="Generate Report" style="margin-top: 2%">
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
if (dt2 < dt1)
{
alert("Date must be in the future ");
document.getElementById('appointment_tdate').value = now.toISOString().split('T')[0];;
}
}
     function checkapt_date()
        
{
var selectedText = document.getElementById('appointment_ldate').value;
var selectedDate = new Date(selectedText);
var now = new Date();
var dt1 = Date.parse(now),
dt2 = Date.parse(selectedDate);
if (dt2 > dt1)
{
alert("Date must be in the past ");
document.getElementById('appointment_ldate').value = now.toISOString().split('T')[0];;
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