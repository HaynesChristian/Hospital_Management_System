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
$current_date = date("Y-m");
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
            <h1 class="mb-3 bread">Daily Attendance</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section ftco-degree-bg">
      <div class="container">
        <div>
          <div class="ftco-animate">
			<!--<center>	
				<a href="" data-toggle="modal" data-target="#modalAppointmen">
					<input type="submit" class="btn btn-primary" value="Regular Attendance">
				</a>
			</center>-->
			<center>
				<h2 class="mb-3 bread"><?php echo date("dS F, Y");;?></h2>
				<form action="#" class="search-form">
				<div class="form-group">
					<span class="icon fa fa-search"></span>
					<input type="text" placeholder="Filter By Employee Name" class="form-control" id="searchemp" onkeyup="Allempname()">
				</div>
				</form>
			</center>	
          </div>
            <!-- .col-md-8 -->
        </div>
      </div>
              <table border="0" class="table table-striped"  id="AllempTable">
                    <thead>
                        <tr>
							<th>Name</th>
                            <th>1</th>
                            <th>2</th>
                            <th>3</th>
                            <th>4</th>
                            <th>5</th>
                            <th>6</th>
                            <th>7</th>
                            <th>8</th>
                            <th>9</th>
                            <th>10</th>
                            <th>11</th>
                            <th>12</th>
                            <th>13</th>
                            <th>14</th>
                            <th>15</th>
                            <th>16</th>
                            <th>17</th>
                            <th>18</th>
                            <th>19</th>
                            <th>20</th>
							<th>21</th>
                            <th>22</th>
                            <th>23</th>
                            <th>24</th>
                            <th>25</th>
                            <th>26</th>
                            <th>27</th>
                            <th>28</th>
                            <th>29</th>
                            <th>30</th>
                            <th>31</th>
                        </tr>
                    </thead>
                    <tbody>
					<?php
					/*
					SELECT employee_master.Employee_Id , employee_master.Employee_Name ,attendance_tran.Att_date , attendance_tran.Att_status 
					FROM attendance_tran, employee_master 
					WHERE attendance_tran.Employee_Id = employee_master.Employee_Id
					*/
					$displaydata = "SELECT Employee_Id , Employee_Name FROM employee_master";
					$result = mysqli_query($conn, $displaydata);
					if(mysqli_num_rows($result)>0)
					{
						while ($row = mysqli_fetch_assoc($result)) 
						{
					?>
					<tr>
					<form method="POST" autocomplete="off">
						<td><?php echo $row["Employee_Name"];?></td>
						<?php
						$displaydata1 = "SELECT Att_date , Att_status FROM attendance_tran WHERE Att_date LIKE '$current_date%' AND Att_status = 'Present' AND Employee_Id = ".$row["Employee_Id"];
						$result1 = mysqli_query($conn, $displaydata1);
						if(mysqli_num_rows($result1)>0)
						{
							while ($row1 = mysqli_fetch_assoc($result1)) 
							{
								$date = date_create($row1["Att_date"]);
								$attDate = date_format($date,"d");
								$attDatelist[] = $attDate;
							}
						?>						
						<td><?php if(in_array("01", $attDatelist)){?><i class="text-success">&#10004;</i><?php }else{?><i class="text-danger">&#10799;</i><?php }?></td>
						<td><?php if(in_array("02", $attDatelist)){?><i class="text-success">&#10004;</i><?php }else{?><i class="text-danger">&#10799;</i><?php }?></td>
						<td><?php if(in_array("03", $attDatelist)){?><i class="text-success">&#10004;</i><?php }else{?><i class="text-danger">&#10799;</i><?php }?></td>
						<td><?php if(in_array("04", $attDatelist)){?><i class="text-success">&#10004;</i><?php }else{?><i class="text-danger">&#10799;</i><?php }?></td>
						<td><?php if(in_array("05", $attDatelist)){?><i class="text-success">&#10004;</i><?php }else{?><i class="text-danger">&#10799;</i><?php }?></td>
						<td><?php if(in_array("06", $attDatelist)){?><i class="text-success">&#10004;</i><?php }else{?><i class="text-danger">&#10799;</i><?php }?></td>
						<td><?php if(in_array("07", $attDatelist)){?><i class="text-success">&#10004;</i><?php }else{?><i class="text-danger">&#10799;</i><?php }?></td>
						<td><?php if(in_array("08", $attDatelist)){?><i class="text-success">&#10004;</i><?php }else{?><i class="text-danger">&#10799;</i><?php }?></td>
						<td><?php if(in_array("09", $attDatelist)){?><i class="text-success">&#10004;</i><?php }else{?><i class="text-danger">&#10799;</i><?php }?></td>
						<td><?php if(in_array("10", $attDatelist)){?><i class="text-success">&#10004;</i><?php }else{?><i class="text-danger">&#10799;</i><?php }?></td>
						<td><?php if(in_array("11", $attDatelist)){?><i class="text-success">&#10004;</i><?php }else{?><i class="text-danger">&#10799;</i><?php }?></td>
						<td><?php if(in_array("12", $attDatelist)){?><i class="text-success">&#10004;</i><?php }else{?><i class="text-danger">&#10799;</i><?php }?></td>
						<td><?php if(in_array("13", $attDatelist)){?><i class="text-success">&#10004;</i><?php }else{?><i class="text-danger">&#10799;</i><?php }?></td>
						<td><?php if(in_array("14", $attDatelist)){?><i class="text-success">&#10004;</i><?php }else{?><i class="text-danger">&#10799;</i><?php }?></td>
						<td><?php if(in_array("15", $attDatelist)){?><i class="text-success">&#10004;</i><?php }else{?><i class="text-danger">&#10799;</i><?php }?></td>
						<td><?php if(in_array("16", $attDatelist)){?><i class="text-success">&#10004;</i><?php }else{?><i class="text-danger">&#10799;</i><?php }?></td>
						<td><?php if(in_array("17", $attDatelist)){?><i class="text-success">&#10004;</i><?php }else{?><i class="text-danger">&#10799;</i><?php }?></td>
						<td><?php if(in_array("18", $attDatelist)){?><i class="text-success">&#10004;</i><?php }else{?><i class="text-danger">&#10799;</i><?php }?></td>
						<td><?php if(in_array("19", $attDatelist)){?><i class="text-success">&#10004;</i><?php }else{?><i class="text-danger">&#10799;</i><?php }?></td>
						<td><?php if(in_array("20", $attDatelist)){?><i class="text-success">&#10004;</i><?php }else{?><i class="text-danger">&#10799;</i><?php }?></td>
						<td><?php if(in_array("21", $attDatelist)){?><i class="text-success">&#10004;</i><?php }else{?><i class="text-danger">&#10799;</i><?php }?></td>
						<td><?php if(in_array("22", $attDatelist)){?><i class="text-success">&#10004;</i><?php }else{?><i class="text-danger">&#10799;</i><?php }?></td>
						<td><?php if(in_array("23", $attDatelist)){?><i class="text-success">&#10004;</i><?php }else{?><i class="text-danger">&#10799;</i><?php }?></td>
						<td><?php if(in_array("24", $attDatelist)){?><i class="text-success">&#10004;</i><?php }else{?><i class="text-danger">&#10799;</i><?php }?></td>
						<td><?php if(in_array("25", $attDatelist)){?><i class="text-success">&#10004;</i><?php }else{?><i class="text-danger">&#10799;</i><?php }?></td>
						<td><?php if(in_array("26", $attDatelist)){?><i class="text-success">&#10004;</i><?php }else{?><i class="text-danger">&#10799;</i><?php }?></td>
						<td><?php if(in_array("27", $attDatelist)){?><i class="text-success">&#10004;</i><?php }else{?><i class="text-danger">&#10799;</i><?php }?></td>
						<td><?php if(in_array("28", $attDatelist)){?><i class="text-success">&#10004;</i><?php }else{?><i class="text-danger">&#10799;</i><?php }?></td>
						<td><?php if(in_array("29", $attDatelist)){?><i class="text-success">&#10004;</i><?php }else{?><i class="text-danger">&#10799;</i><?php }?></td>
						<td><?php if(in_array("30", $attDatelist)){?><i class="text-success">&#10004;</i><?php }else{?><i class="text-danger">&#10799;</i><?php }?></td>
						<td><?php if(in_array("31", $attDatelist)){?><i class="text-success">&#10004;</i><?php }else{?><i class="text-danger">&#10799;</i><?php }?></td>
						<!--<td><?php //echo $row["Att_date"];?></td>
						<td><?php //echo $row["Att_status"];?></td>
						<td>
							<a href="regular_attendance_update.php?Update=<?php echo $row["Att_date"];?>&admin_name=<?php echo $login_name;?>" 
							class="btn btn-primary">
							Update</a>
						</td>-->
						<?php
						$attDatelist = (array) null;
						}
						else
						{
						?>
						<td><i class="text-danger">&#10799;</i></td>
						<td><i class="text-danger">&#10799;</i></td>
						<td><i class="text-danger">&#10799;</i></td>
						<td><i class="text-danger">&#10799;</i></td>
						<td><i class="text-danger">&#10799;</i></td>
						<td><i class="text-danger">&#10799;</i></td>
						<td><i class="text-danger">&#10799;</i></td>
						<td><i class="text-danger">&#10799;</i></td>
						<td><i class="text-danger">&#10799;</i></td>
						<td><i class="text-danger">&#10799;</i></td>
						<td><i class="text-danger">&#10799;</i></td>
						<td><i class="text-danger">&#10799;</i></td>
						<td><i class="text-danger">&#10799;</i></td>
						<td><i class="text-danger">&#10799;</i></td>
						<td><i class="text-danger">&#10799;</i></td>
						<td><i class="text-danger">&#10799;</i></td>
						<td><i class="text-danger">&#10799;</i></td>
						<td><i class="text-danger">&#10799;</i></td>
						<td><i class="text-danger">&#10799;</i></td>
						<td><i class="text-danger">&#10799;</i></td>
						<td><i class="text-danger">&#10799;</i></td>
						<td><i class="text-danger">&#10799;</i></td>
						<td><i class="text-danger">&#10799;</i></td>
						<td><i class="text-danger">&#10799;</i></td>
						<td><i class="text-danger">&#10799;</i></td>
						<td><i class="text-danger">&#10799;</i></td>
						<td><i class="text-danger">&#10799;</i></td>
						<td><i class="text-danger">&#10799;</i></td>
						<td><i class="text-danger">&#10799;</i></td>
						<td><i class="text-danger">&#10799;</i></td>
						<td><i class="text-danger">&#10799;</i></td>						
						<?php	
						}	
						?>						
					</form>
					</tr>
					<?php
						}
					}
					?>                        
                    </tbody>					
                </table>	  
    </section> <!-- .section -->    


				
  <!-- Employee Modal -->
    <div class="modal fade" id="modalAppointmen" tabindex="-1" role="dialog" aria-labelledby="modalAppointmentLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalAppointmentLabel">Regular Attendance</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
              <form action="Attendance_1.php" method="POST">
              <input type="hidden" value="<?php echo $login_name;?>" name="admin_name">
                  <div class="form-group">
                    <label for="empid" class="text-black">Employee name</label>
                    <select class="form-control" name="empid" id="empid">
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
                    <label for="smonth" class="text-black">Month Code</label>
                    <select name="smonth" class="form-control">
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
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="attdate" class="text-black">Attendance Date</label>
                    <input type="date" class="form-control" name="attdate">
                  </div>
                  <div class="form-group">
                    <label for="status" class="text-black">Attendance Status</label>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="status" value="P" />Present
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="status" value="A" />Absent
                  
                  </div>          
              <div class="form-group">
                <input type="submit" value="Attendance" class="btn btn-primary" href="attendance_employee.php">
              </div>
            </form>
          </div>
          
        </div>
      </div>
    </div>

  <script>
        function Allempname() 
        {
          var input, filter, table, tr, td, i, txtValue;
          input = document.getElementById("searchemp");
          filter = input.value.toUpperCase();
          table = document.getElementById("AllempTable");
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