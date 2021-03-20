<!DOCTYPE html>
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
<html lang="en">
  <head>
    <title>Services</title>
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
          <li class="nav-item "><a href="staff.php?admin_name=<?php echo $login_name;?>" class="nav-link">Staff</a></li>
          <li class="nav-item"><a href="departments.php?admin_name=<?php echo $login_name;?>" class="nav-link">Departments</a></li>
          <li class="nav-item"><a href="doctor.php?admin_name=<?php echo $login_name;?>" class="nav-link">Doctors</a></li>
          <li class="nav-item "><a href="patient.php?admin_name=<?php echo $login_name;?>" class="nav-link">Patient</a></li>
          <li class="nav-item active"><a href="services.php?admin_name=<?php echo $login_name;?>" class="nav-link">Services</a></li>
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
                <span>Services</span>
            </p>
            <h1 class="mb-3 bread">Services</h1>
          </div>
        </div>
      </div>
    </div>

    <center>
        <a href="" data-toggle="modal" data-target="#modalAppointmen">
            <input type="submit" class="btn btn-primary" value="Add Room" style="margin-top: 2%">
        </a>        
    </center>                    
  <br>
<center>
    <table class="table table-striped">
	<h2 class="mb-4">Room Details</h2>
    <tr>
        <th>Room No.</th>
        <th>Room Type</th>
        <th>Room Charges</th>
        <th>Room Status</th>
		<th>Room Allocated to</th>
        <th colspan="2">Action</th>
    </tr>
    <?php
    $dislpaydata = "select * from room_master";
    $result = mysqli_query($conn, $dislpaydata);
    if(mysqli_num_rows($result)>0)
    {
        while ($row = mysqli_fetch_assoc($result)) 
                {
    ?>
    <tr>
        <form method="POST" autocomplete="off">
            <td><?php echo $row["room_id"];?></td>
            <td><?php echo $row["room_type"];?></td>
            <td><?php echo $row["room_charges"];?></td>
            <td><?php echo $row["room_status"];?></td>
			<td><?php echo $row["Room_Allocated_to"];?></td>
            <td><a href="room_update.php?Update=<?php echo $row["room_id"];?>&admin_name=<?php echo $login_name;?>"
                   class="btn btn-primary">Update</a>
            </td>             
            <td><a href="room_delete.php?Delete=<?php echo $row["room_id"];?>&admin_name=<?php echo $login_name;?>"
                   class="btn btn-primary">Delete</a>
            </td>  
        </form>
    </tr>
  <?php
                }
    }
    ?>
  
</table><br/><br/><br/><br/><br/>
 
  <!-- Employee Modal -->
    <div class="modal fade" id="modalAppointmen" tabindex="-1" role="dialog" aria-labelledby="modalAppointmentLabel" aria-hidden="true">
      <div class="modal-dialog " role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalAppointmentLabel">Room </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
              <form action="roomservice.php" autocomplete="off" method="POST">
                <input type="hidden" value="<?php echo $login_name;?>" name="admin_name">
                <div class="row">
					<div class="col-md-6">				
					  <div class="form-group">
						<label for="roomid" class="text-black">Room no.</label>
						<input type="number" class="form-control" name="roomid" min="0" required="">
					  </div>
					</div>  
					<div class="col-md-6">
					  <div class="form-group">
						<label for="roomtype" class="text-black">Room Type</label>
						<select name="roomtype" class="form-control" required="">
							<option value="" disabled="" selected="" hidden="">
								Select Room type
							</option>										
							<option value="General">General (Rs.500/day)</option>
							<option value="Semi">Semi (Rs.1000/day)</option>
							<option value="Special">Special (Rs.2000/day)</option>
							<option value="Deluxe">Deluxe (Rs.3000/day)</option>
						</select>    
					  </div>
					</div>  
				</div>
                <div class="row">
					<div class="col-md-6">				
						<div class="form-group">
						<label for="fan" class="text-black">Fan</label><br>
							<input type="radio" name="fan" value="Available" required=""/> Available
							<input type="radio" name="fan" value="Not Available" required=""/> Not Available
						</div> 
					</div>
					<div class="col-md-6">					
						<div class="form-group">
							<label for="ac" class="text-black">AC</label><br>
							<input type="radio" name="ac" value="Available" required=""/> Available
							<input type="radio" name="ac" value="Not Available" required=""/> Not Available
						</div>
					</div>
				</div>

                <div class="row">
					<div class="col-md-6">				
					  <div class="form-group">
						<label for="tv" class="text-black">TV</label><br>
						<input type="radio" name="tv" value="Available" required=""/> Available
						<input type="radio" name="tv" value="Not Available" required=""/> Not Available
					  </div>
					</div>
					<div class="col-md-6">
					  <div class="form-group">
						<label for="refrigerator" class="text-black">Refrigerator</label><br>
						<input type="radio" name="refrigerator" value="Available" required=""/> Available
						<input type="radio" name="refrigerator" value="Not Available" required=""/> Not Available
					  </div>					
					</div>
				</div>
				<input type="hidden" class="form-control" name="roomstatus" value="Available">
                </div>
				<div class="form-group">
                    <input type="submit" value="Room" class="btn btn-primary" href="room_service">
                </div>
            </form>
          </div>
        </div>
      </div>
    </div>


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