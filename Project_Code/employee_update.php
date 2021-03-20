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
    <style>
        td
        {
            padding: 10px;
        }
    </style>
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
            <p>
                <span class="mr-2">
                    <a href="index.php?admin_name=<?php echo $login_name;?>">Home</a>
                </span>
                <span>Employee Update</span>
            </p>
            <h1 class="mb-3 bread">Employee Update</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section bg-light">
      <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 heading-section ftco-animate text-center">
            <h2 class="mb-4">Employee Details</h2>
          </div>
        </div>
        <div class="row d-flex justify-content-center">
            <form method="POST" action="empupdatesave.php" autocomplete="off">
                <input type="hidden" value="<?php echo $login_name;?>" name="admin_name">  
              <table border="0" class="table table-striped" style="width:100%;">
                <?php
                $act=$_GET['Update'];
                
    $displaydata = "select * from employee_master where Employee_Id='$act'";
    $result = mysqli_query($connection, $displaydata);
    if(mysqli_num_rows($result)>0)
    {
        while ($employee_row = mysqli_fetch_assoc($result)) 
                {
            
                ?>                
                <tbody>
                    <tr>
                        <td>
                            <div class="form-group">
                              <label for="id" class="text-black">Employee Id</label>
                              <input type="number" name="id" class="form-control" 
                                     required="" readonly=""
                                     value="<?php echo $employee_row["Employee_Id"]?>">
                            
                        </td>
                        <td>
                            <div class="form-group">
                              <label for="ename" class="text-black">Employee Name</label>
                              <input type="text" name="ename" class="form-control" 
                                     required="" readonly=""
                                     value="<?php echo $employee_row["Employee_Name"]?>">
                            
                        </td>
                    </tr>
                    <tr>
                        <td>                        
                            
                            <label for="designation" class="text-black">Designation</label>
                            <input type="text" name="designation" class="form-control" 
                                    value="<?php echo $employee_row["Employee_Designation"]?>">
                            </div>                                
                        </td>
                        <td>
                            <div class="form-group">
                            <label for="mobile" class="text-black">Contact</label>
                            <input type="tel" name="mobile" class="form-control" 
                                    value="<?php echo $employee_row["Employee_contact"]?>">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            
                            <label for="mail" class="text-black">Email</label>
                            <input type="email" name="mail" class="form-control" 
                                    value="<?php echo $employee_row["Employee_Email"]?>">
                            </div>                                
                        </td>
                        <td>
                            <div class="form-group">
                            <label for="birth" class="text-black">Birth Date</label>
                            <input type="date" name="birth" class="form-control" readonly=""
                                    value="<?php echo $employee_row["Birth_Date"]?>">
                            
                        </td>
                    </tr>
                    <tr>
                    
                        <td>
                            
                            <label for="address" class="text-black">Address</label>
                            <input type="text" name="address" class="form-control" 
                                    value="<?php echo $employee_row["Employee_Address"]?>">
                            </div>                                
                        </td>
                        <td>
                            <div class="form-group">
                            <label for="gender" class="text-black">Address</label>
                            <input type="text" name="gender" class="form-control" readonly=""
                                    value="<?php echo $employee_row["Gender"]?>">
                            
                        </td>
                    </tr>
                    <tr>
                    
                        <td>
                            
                            <label for="education" class="text-black">Education</label>
                            <input type="text" name="education" class="form-control" 
                                    value="<?php echo $employee_row["Education"]?>">
                            </div>                                
                        </td>
                        <td>
                            <div class="form-group">
                            <label for="join" class="text-black">Join Date</label>
                            <input type="date" name="join" class="form-control" 
                                    value="<?php echo $employee_row["Join_Date"]?>">
                           
                        </td>
                        </tr>
                    <tr>
                    
                        <td>
                            
                            <label for="bsalary" class="text-black">Basic Salary</label>
                            <input type="number" name="bsalary" class="form-control" 
                                    value="<?php echo $employee_row["Basic_Salary"]?>">
                            </div>                                
                        </td>
                        <td>
                            <div class="form-group">
                            <label for="uniform" class="text-black">Uiform Issued Date</label>
                            <input type="date" name="uniform" class="form-control" id="address" 
                                    value="<?php echo $employee_row["Uniform_Issued_Date"]?>">
                            
                        </td>
                        </tr>
                    <tr>
                    
                        <td>
                            
                            <label for="increment" class="text-black">Incremental Qtr</label>
                            <input type="number" name="increment" class="form-control" 
                                    value="<?php echo $employee_row["Incremental_qtr_No"]?>">
                            </div>                                
                        </td>
                        <td>
                            <div class="form-group">
                            <label for="lincrement" class="text-black">Last Increment</label>
                            <input type="text" name="lincrement" class="form-control" 
                                    value="<?php echo $employee_row["Last_Increment_Date"]?>">
                            
                        </td>
                        </tr>
                    <tr>
                    
                        <td>
                            <label for="ifsc" class="text-black">IFSC Code</label>
                            <input type="text" name="ifsc" class="form-control" 
                                    value="<?php echo $employee_row["IFSC_Code"]?>">
                            </div>                                
                        </td>
                        <td>
                            <div class="form-group">
                            <label for="bank" class="text-black">Bank Acc No</label>
                            <input type="number" name="bank" class="form-control" 
                                    value="<?php echo $employee_row["Bank_Acc_No"]?>">
                            
                        </td>
                        </tr>
                    <tr>
                    
                        <td>
                            <label for="department" class="text-black">Department</label>
                            <input type="text" name="department" class="form-control" 
                                    value="<?php echo $employee_row["Department"]?>">
                            </div>                                
                        </td>
                        <td>
                            <div class="form-group">
                            <label for="grade" class="text-black">Grade</label>
                            <input type="text" name="grade" class="form-control" 
                                    value="<?php echo $employee_row["Grade"]?>">
                            </td>
                            </tr>
                    <tr>
                    
                        <td>
                            <label for="da" class="text-black">Dearness Allowance</label>
                            <input type="number" name="da" class="form-control" 
                                    value="<?php echo $employee_row["Dearness_Allowance"]?>">
                            </div>                                
                        </td>
                        <td>
                            <div class="form-group">
                            <label for="hra" class="text-black">House Rent Allowance</label>
                            <input type="number" name="hra" class="form-control" 
                                    value="<?php echo $employee_row["House_Rent_Allowance"]?>">
                            </td>
                            </tr>
                    <tr>
                    
                        <td>
                            <label for="pfno" class="text-black">PF No</label>
                            <input type="text" name="pfno" class="form-control" 
                                    value="<?php echo $employee_row["PF_No"]?>">
                            </div>                                
                        </td>
                        <td>
                            <div class="form-group">
                            <label for="pfper" class="text-black">PF PCTG</label>
                            <input type="text" name="pfper" class="form-control" 
                                    value="<?php echo $employee_row["PF_PCTG"]?>">
                            </td>
                            </tr>
                    <tr>
                    
                        <td>
                            <label for="familypf" class="text-black">FPS PCTG</label>
                            <input type="text" name="familypf" class="form-control" 
                                   value="<?php echo $employee_row["FPS_PCTG"]?>">
                            </div>                                
                        </td>
                        <td>
                            <div class="form-group">
                            <label for="professional" class="text-black">Professional Tax</label>
                            <input type="number" name="professional" class="form-control" 
                                    value="<?php echo $employee_row["Professional_Tax"]?>">
                            </td>
                            </tr>
                    <tr>
                    
                        <td>
                            <label for="glic" class="text-black">Group LIC Premium</label>
                            <input type="number" name="glic" class="form-control" 
                                    value="<?php echo $employee_row["Group_LIC_Premium"]?>">
                            </div>                                
                        </td>
                        <td>
                            <div class="form-group">
                            <label for="status" class="text-black">Status</label>
                            <input type="text" name="status" class="form-control" 
                                    value="<?php echo $employee_row["Status"]?>">
                            </td>
                            </tr>
                    <tr>
                    
                        <td>
                            
                            <label for="pancard" class="text-black">PanCard</label>
                            <input type="text" name="pancard" class="form-control" 
                                   value="<?php echo $employee_row["PanCard"]?>">
                            </div>                                
                        </td>
                        <td>
                            <div class="form-group">
                            <label for="adharcard" class="text-black">AdharCard</label>
                            <input type="number" name="adharcard" class="form-control" 
                                    value="<?php echo $employee_row["AdharCard"]?>">
                            </div>                                
                        </td>
                    </tr>
                    </tbody>
                <?php
                    }
                }
                ?>                
            </table>
                <center>
              <div class="form-group">
                  <input type="submit" value="Update" class="btn btn-primary" >
              </div>  
                </center>
          </form>

        </div> 
      </div>
    </section>
    
  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>

  <script>
      function checkopr_date()
      {
            var selectedText = document.getElementById('operation_date').value;
            var selectedDate = new Date(selectedText);
            var now = new Date();
            var dt1 = Date.parse(now),
            dt2 = Date.parse(selectedDate);
            if (dt2 < dt1) 
            {
                alert("Date must be in the future ");
                document.getElementById('operation_date').value = now.toISOString().split('T')[0];;
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