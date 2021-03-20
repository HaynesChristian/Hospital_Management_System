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
					<input type="submit" class="btn btn-primary" value="Leaves Transcation">
				</a>
				<h2 class="mb-4">Leave Transcation</h2>
			</center>		 
			  <input type="hidden" value="<?php echo $login_name;?>" name="admin_name">
			<table class="table table-striped">
			<tr>
				<th>Employee Name</th>
				<th>Leave Type</th>
				<th>From</th>
				<th>To</th>
				<th>No of. Days</th>
				<th>Action</th>
			</tr>
			<?php
			$dislpaydata = "select employee_master.Employee_Name , leave_form.* from leave_form,employee_master WHERE leave_form.Emp_Id = employee_master.Employee_Id";
			//$dislpaydata = "select * from leave_form";
			$result = mysqli_query($conn, $dislpaydata);
			if(mysqli_num_rows($result)>0)
			{
				while ($row = mysqli_fetch_assoc($result)) 
				{
			?>
			<form method="POST" autocomplete="off">
			<tr>    
				<td><?php echo $row["Employee_Name"];?></td>
				<td><?php echo $row["Type_of_leave"];?></td>
				<td><?php echo $row["Leave_from"];?></td>
				<td><?php echo $row["Leave_to"];?></td>
				<td><?php echo $row["Total"];?></td>
				<td><a href="leave_transcation_update.php?Update=<?php echo $row["Leave_id"];?>&admin_name=<?php echo $login_name;?>" class="btn btn-primary">
					Update</a>
					<a href="leave_transcation_delete.php?Delete=<?php echo $row["Leave_id"];?>&admin_name=<?php echo $login_name;?>" class="btn btn-primary">
					Delete</a>
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
      <div class="modal-dialog " role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalAppointmentLabel">Leave Transcation</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
              <form action="Leave_form.php" autocomplete="off" method="POST">
              <input type="hidden" value="<?php echo $login_name;?>" name="admin_name">
				  <div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="empid" class="text-black">Employee name</label>
							<select class="form-control" name="empid" id="empid" required="">
							<option value="" disabled="" selected="" hidden="">
							Select Employee
							</option>							
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
					</div>
					<div class="col-md-6">	
					  <div class="form-group">
						<label for="type" class="text-black">Type of Leave</label>
							<td>
								<select name="type" class="form-control" required="">
									<option value="" disabled="" selected="" hidden="">Select Leave Type</option>
									<option>CL</option>
									<option>SL</option>
									<option>PL</option>
								</select>
							</td>
					  </div>
					</div>
				</div>  
          
				<div class="row">
					<div class="col-md-6">
					  <div class="form-group">
						<label for="lfrom" class="text-black">Leave From</label>
						<input type="date" class="form-control" name="lfrom" id="lfrom"  required="">
					  </div>
					</div>
					<div class="col-md-6">	
					  <div class="form-group">
						<label for="lto" class="text-black">Leave To</label>
						<input type="date" class="form-control" name="lto" id="lto"  required="">
					  </div>				  
					</div>
				</div>	
                <div class="col-md-6" style="display:none">
                  <div class="form-group">
                    <label for="total" class="text-black">Total Leave</label>
                    <input type="number" class="form-control" name="total" id="totalLeave">
					<input type="hidden" name="Leave_from_yr" id="Leave_from_yr">
					<input type="hidden" name="Leave_to_yr" id="Leave_to_yr">
                  </div>    
                </div>
                
				<input type="submit" value="Add Leave" class="btn btn-primary" href="Leave_form.php" onclick="leave_days()">  
            </form>
          </div>
          
        </div>
      </div>
    </div>


  <script>
  function leave_days()
  {
	var dd = document.getElementById('lfrom').value;
	var ad = document.getElementById('lto').value;
	
	var addate = new Date(ad);
	var ad_month = addate.getMonth();
	var ad_day = addate.getDate();
	var ad_year = addate.getFullYear();
	var adm_dt = ad_month+"/"+ad_day+"/"+ad_year;
    
	var disdate = new Date(dd);
	var dis_month = disdate.getMonth();
	var dis_day = disdate.getDate();
	var dis_year = disdate.getFullYear();
	var dis_dt = dis_month+"/"+dis_day+"/"+ dis_year;
    
	var admission = new Date(adm_dt);
	var discharge = new Date(dis_dt);
		  
	var Difference_In_Time = discharge.getTime() - admission.getTime();
	var diffDays = Difference_In_Time / (1000 * 3600 * 24);
	document.getElementById("totalLeave").value = Math.abs(diffDays);
	document.getElementById("Leave_from_yr").value = dis_year;
	document.getElementById("Leave_to_yr").value = ad_year;	
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