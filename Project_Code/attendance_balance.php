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
    <title>Staff</title>
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
          <li class="nav-item active" ><a href="staff.php?admin_name=<?php echo $login_name;?>" class="nav-link">Staff</a></li>
          <li class="nav-item"><a href="departments.php?admin_name=<?php echo $login_name;?>" class="nav-link">Departments</a></li>
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
                <span>Staff</span>
            </p>
            <h1 class="mb-3 bread">Staff</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section ftco-degree-bg">
      <div class="container">
        <div>
          <div class="ftco-animate">
			<center>
				<a href="" data-toggle="modal" data-target="#modalAppointmen">
					<input type="submit" class="btn btn-primary" value="Attendance Balance">
				</a>
				<h2 class="mb-4">Attendance Calculation</h2>
			</center>		 
			  <input type="hidden" value="<?php echo $login_name;?>" name="admin_name">
			<table class="table table-striped">
			<tr>
				<th>Employee Name</th>
				<th>Month Code</th>
				<th>Working Days</th>
				<th>Present Days</th>
				<th>Leave Days</th>
				<th>Action</th>
			</tr>
			<?php
			$dislpaydata = "select employee_master.Employee_Name , attendance.* from attendance,employee_master WHERE attendance.Emp_Id = employee_master.Employee_Id";
			$result = mysqli_query($conn, $dislpaydata);
			if(mysqli_num_rows($result)>0)
			{
				while ($row = mysqli_fetch_assoc($result)) 
				{
			?>
			<form method="POST" autocomplete="off">
			<tr>    
				<td><?php echo $row["Employee_Name"];?></td>
				<td><?php echo $row["Month_code"];?></td>
				<td><?php echo $row["Working_Days"];?></td>
				<td><?php echo $row["Present_Days"];?></td>
				<td><?php echo $row["Leave_Days"];?></td>
				<td>
					<a href="attendance_delete.php?Delete=<?php echo $row["Attendance_calc_id"];?>&admin_name=<?php echo $login_name;?>" class="btn btn-primary">Delete</a>
				</td>             
			</tr>
			</form>
			<?php
				}
			}
			?>
			</table>	
          </div>
            <!-- .col-md-8 -->
        </div>
      </div>
    </section> <!-- .section -->    
    
  <!-- Employee Modal -->
    <div class="modal fade" id="modalAppointmen" tabindex="-1" role="dialog" aria-labelledby="modalAppointmentLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalAppointmentLabel">Attendance Balance</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
              <form action="attendance.php" autocomplete="off" method="POST">
                <input type="hidden" value="<?php echo $login_name;?>" name="admin_name">
				<div class="form-group">
					<label for="eid" class="text-black">Employee name</label>
					<select class="form-control" name="eid" id="eid">
					<?php
					$emp_name = "SELECT Employee_Id, Employee_Name FROM employee_master";
					$result_emp = mysqli_query($conn, $emp_name);
					if(mysqli_num_rows($result_emp) > 0)
					{
						while($emp_row = mysqli_fetch_assoc($result_emp))
						{
					?>
					<option value="<?php echo $emp_row["Employee_Id"];?>">
						<?php echo $emp_row["Employee_Name"];?>
					</option>
					<?php
						}
					}
					?>
					</select>  
				</div>
                
                <div class="form-group">
					<label for="mcode" class="text-black">Month Code</label>
					<input type="month" class="form-control" name="mcode" >
                    <!--<select name="mcode" class="form-control">
						<option>January</option>
                        <option>February</option>
                        <option>March</option>
                        <option>April</option>
                        <option>May</option>
                        <option>June</option>
                        <option>July</option>
                        <option>August</option>
                        <option>September</option>
                        <option>October</option>
                        <option>November</option>
                        <option>December</option>
                    </select>-->
                </div>
                  
				<div class="form-group">
                   <label for="working" class="text-black">Working Days</label>
                   <input type="number" class="form-control" name="working" >
                </div>
				
				<input type="submit" value="Attendance" class="btn btn-primary" href="attendance_employee.php">  
            </form>
          
          
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