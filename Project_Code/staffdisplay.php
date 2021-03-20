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
          <li class="nav-item active"><a href="staff.php?admin_name=<?php echo $login_name;?>" class="nav-link">Staff</a></li>
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

    
    
    <center>
        <a href="" data-toggle="modal" data-target="#modalAppointmen">
            <input type="submit" class="btn btn-primary" value="Register Employee" 
               style="margin-top: 2%">
        </a>
		<h2 class="mb-4">Employee List</h2>
    </center>
    <table class="table table-striped">
    <tr>
        
        <th>Name</th>
        <th>Desig</th>
        <th>Contact</th>
        <th>Email</th>
        <th>DOB</th>
        <th>Address</th>
        <th>Gender</th>
        <th>Education</th>
        <th>Join Date</th>
        <th>Basic</th>
        <th>Issue Date</th>
        <th>Qtr No</th>
        <th>Last Increment Date</th>
        <th>IFSC Code</th>
        <th>Acc No</th>
        <th>Dept</th>
        <th>Grade</th>
        <th>D.A.</th>
        <th>H.R.A</th>
        <th>PF No</th>
        <th>PF%</th>
        <th>FPS%</th>
        <th>Prof Tax</th>
        <th>GLIC</th>
        <th>Status</th>
        <th>Pan Card</th>
        <th>Aadhar Card</th>
        <th colspan="2"></th>
        
    </tr>
    <?php
    $displaydata = "select * from employee_master";
    $result = mysqli_query($conn, $displaydata);
    if(mysqli_num_rows($result)>0)
    {
        while ($row = mysqli_fetch_assoc($result)) 
        {
    ?>
    <tr>
		<form method="POST" autocomplete="off">
			<td><?php echo $row["Employee_Name"];?></td>
			<td><?php echo $row["Employee_Designation"];?></td>
			<td><?php echo $row["Employee_contact"];?></td>
			<td><?php echo $row["Employee_Email"];?></td>
			<td><?php echo $row["Birth_Date"];?></td>
			<td><?php echo $row["Employee_Address"];?></td>
			<td><?php echo $row["Gender"];?></td>
			<td><?php echo $row["Education"];?></td>
			<td><?php echo $row["Join_Date"];?></td>
			<td><?Php echo $row["Basic_Salary"];?></td>
			<td><?php echo $row["Uniform_Issued_Date"];?></td>
			<td><?php echo $row["Incremental_qtr_No"];?></td>
			<td><?php echo $row["Last_Increment_Date"];?></td>
			<td><?php echo $row["IFSC_Code"];?></td>
			<td><?php echo $row["Bank_Acc_No"];?></td>
			<td><?php echo $row["Department"];?></td>
			<td><?php echo $row["Grade"];?></td>
			<td><?php echo $row["Dearness_Allowance"];?></td>
			<td><?php echo $row["House_Rent_Allowance"];?></td>
			<td><?php echo $row["PF_No"];?></td>
			<td><?php echo $row["PF_PCTG"];?></td>
			<td><?php echo $row["FPS_PCTG"];?></td>
			<td><?php echo $row["Professional_Tax"];?></td>
			<td><?php echo $row["Group_LIC_Premium"];?></td>
			<td><?php echo $row["Status"];?></td>
			<td><?php echo $row["PanCard"];?></td>
			<td><?php echo $row["AdharCard"];?></td>
			<td>
				<a href="employee_update.php?Update=<?php echo $row["Employee_Id"];?>&admin_name=<?php echo $login_name;?>"class="btn btn-primary">Update</a>
			</td>
			<td>	
				<a href="employee_delete.php?Delete=<?php echo $row["Employee_Id"];?>&admin_name=<?php echo $login_name;?>"class="btn btn-primary">Delete</a>
			</td>
		</form>		
    </tr>    
  <?php
        }
    }
    ?>
</table><br>  
        
    

    
    		
		

    
  <!-- Employee Modal -->
    <div class="modal fade" id="modalAppointmen" tabindex="-1" role="dialog" aria-labelledby="modalAppointmentLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalAppointmentLabel">New Employee</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
              <form action="employee.php" autocomplete="off" method="POST">
                  <input type="hidden" value="<?php echo $login_name;?>" name="admin_name">
                  <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="ename" class="text-black">Employee Name</label>
                    <input type="text" class="form-control" name="ename" required="">
                  </div>    
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="designation" class="text-black">Employee Designaton</label>
                    <input type="text" class="form-control" name="designation" required="">
                  </div>
                </div>
              </div>
                 <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="mobile" class="text-black">Employee Contact</label>
                    <input type="tel" class="form-control" name="mobile" pattern="[0-9]{10}" required=""/>
                  </div>    
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="mail" class="text-black">Employee Email</label>
                    <input type="email" class="form-control" name="mail" required="" />
                  </div>
                </div>
              </div> 
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="birth" class="text-black">Birth Date</label>
                    <input type="date" class="form-control" name="birth" onchange="checkapt_date()" id="birth" required="">
                  </div>    
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="address" class="text-black">Employee Address</label>
                    <textarea name="address" rows="4" cols="20" class="form-control" required="">
                            </textarea>
                  </div>
                </div>
              </div>
                  
                   <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="gender" class="text-black">Gender</label>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="gender" value="male" />Male
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="gender" value="female" />Female
                  </div>    
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="address" class="text-black">Education</label>
                    <select name="education" class="form-control" required="">
                                <option>10th</option>
                                <option>12th</option>
                                <option>Bachelor</option>
                                <option>Master</option>
                                <option>PHD</option>
                            </select>
                  </div>
                </div>
              </div>
                  <div class="modal-body">
              <form action="#" autocomplete="off">
                  <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="join" class="text-black">Join Date</label>
                    <input type="date" class="form-control" name="join" required="">
                  </div>    
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="bsalary" class="text-black">Basic Salary</label>
                    <input type="number" class="form-control" name="bsalary" required="">
                  </div>
                </div>
              </div>
                
                    <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="uniform" class="text-black">Uniform Issued</label>
                    <input type="date" class="form-control" name="uniform" required="">
                  </div>    
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="increment" class="text-black">Incremental Quarter</label>
                    <select name="increment" class="form-control" required="">
                                <option>01</option>
                                <option>02</option>
                                <option>03</option>
                                <option>04</option>
                   <select>
                  </div>
                </div>
              </div>
          
               <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="lincrement" class="text-black">Last Increment</label>
                    <input type="date" class="form-control" name="lincrement" onchange="checkapt_date()" id="lincrement" required="">
                  </div>    
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="ifsc" class="text-black">IFSC Code</label>
                    <input type="text" class="form-control" name="ifsc" required="">
                  </div>
                </div>
                   <div class="modal-body">
              <form action="#" autocomplete="off">
                  <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="bank" class="text-black">Bank Acc Number</label>
                    <input type="number" class="form-control" name="bank" required="">
                  </div>    
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="department" class="text-black">Department</label>
                    <input type="text" class="form-control" name="department" required="">
                  </div>
                </div>
              </div>
               
                  <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="grade" class="text-black">Grade</label>
                    <select name="grade" class="form-control" required="">
                                <option>5500</option>
                                <option>8500</option>
                                <option>10000</option>
                            </select>
                  </div>    
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="da" class="text-black">Dearness  Allowance</label>
                    <input type="number" class="form-control" name="da" required="">
                  </div>
                </div>
              </div>
                    
                <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="hra" class="text-black">House Rent Allowance</label>
                    <input type="number" class="form-control" name="hra" required="">
                  </div>    
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="pfno" class="text-black">PF Number</label>
                    <input type="text" class="form-control" name="pfno" required="">
                  </div>
                </div>
              </div>
                <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="pfper" class="text-black">PF Percentage</label>
                    <input type="text" class="form-control" name="pfper" required="">
                  </div>    
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="familypf" class="text-black">FPS Percentage</label>
                    <input type="text" class="form-control" name="familypf" required="">
                  </div>
                </div>
              </div>
                    
                <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="professional" class="text-black">Professional Tax</label>
                    <input type="text" class="form-control" name="professional" required="">
                  </div>    
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="glic" class="text-black">Group LIC Premium</label>
                    <input type="number" class="form-control" name="glic" required="">
                  </div>
                </div>
                <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="status" class="text-black">Status</label>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="status" value="Y" />Yes
                     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="status" value="N" />No
                  </div>    
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="pancard" class="text-black">Pan Card</label>
                    <input type="text" class="form-control" name="pancard" required="">
                  </div>
                </div>
                    
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="adharcard" class="text-black">Adhar Card</label>
                    <input type="number" class="form-control" name="adharcard" required="">
                  </div>    
                </div>
                   
                    
              <div class="col-md-6">      
              <div class="form-group">
                <input type="submit" value="Add Employee" class="btn btn-primary" href="staffdisplay.php">
              </div>
                  </div>
            </form>
          </div>
          
        </div>
      </div>
    </div>

 <script>
      function checkapt_date()
      {
          
            var selectedText = document.getElementById('birth').value;
            var selectedDate = new Date(selectedText);
            var now = new Date();
            var dt1 = Date.parse(now),
            dt2 = Date.parse(selectedDate);
            if (dt2 > dt1) 
            {
                alert("Date must be in the Past ");
                document.getElementById('birth').value = now.toISOString().split('T')[0];;
            }
            
      }
      function checkapt_date()
      {
          
            var selectedText = document.getElementById('lincrement').value;
            var selectedDate = new Date(selectedText);
            var now = new Date();
            var dt1 = Date.parse(now),
            dt2 = Date.parse(selectedDate);
            if (dt2 > dt1) 
            {
                alert("Date must be in the Past ");
                document.getElementById('lincrement').value = now.toISOString().split('T')[0];;
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