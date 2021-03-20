<?php
$con_servername = "localhost";
$con_username = "root";
$con_password = "";
$database = "hospital_management_system";

$connection = mysqli_connect($con_servername, $con_username, $con_password, $database);

$patient_id = $_GET["patient_id"];
$treatment_id = $_GET["treatment_id"];
$Patient_Admission_id = $_GET["Patient_Admission_id"];

if($_GET)
{
    $login_name=$_GET["admin_name"];
}

$view_patient = "SELECT Patient_Name FROM patient WHERE Patient_id = $patient_id";
$result_pat = mysqli_query($connection, $view_patient);
if(mysqli_num_rows($result_pat) > 0)
{
    while ($row_patient = mysqli_fetch_assoc($result_pat)) 
    {
        $patient_name = $row_patient["Patient_Name"];
    }
}

$current_date = date("Y-m-d");
date_default_timezone_set("Asia/Kolkata");
$current_time = date("H:i");

$view_patientbill = "SELECT * FROM patient_canteen_order "
        . "WHERE Patient_Id = $patient_id AND Treatment_id = $treatment_id";
$result_patbill = mysqli_query($connection, $view_patientbill);
if(mysqli_num_rows($result_patbill) > 0)
{
    $total_canteen = 0;
    while ($row_patientbill = mysqli_fetch_assoc($result_patbill)) 
    {
        $total_canteen += $row_patientbill["Order_Amount"];
    }    
}
else
{$total_canteen = 0;}

$room_bill = "SELECT * FROM patient_admission,room_master "
        . "WHERE Patient_Admission_id = $Patient_Admission_id "
        . "AND Room_no = room_id";
$result_room_bill = mysqli_query($connection, $room_bill);
if(mysqli_num_rows($result_room_bill) > 0)
{
    while ($row_room_bill = mysqli_fetch_assoc($result_room_bill)) 
    {
        $room_charges = $row_room_bill["room_charges"];
        $Patient_Admission_date = $row_room_bill["Patient_Admission_date"];
		$Patient_Admission_time = $row_room_bill["Patient_Admission_time"];
    }
}

$view_labbill = "SELECT * FROM lab_test_data "
        . "WHERE Patient_id = $patient_id AND Treatment_id = $treatment_id "
        . "AND Test_Status = 'Completed'";
$result_labbill = mysqli_query($connection, $view_labbill);
if(mysqli_num_rows($result_labbill) > 0)
{
    $total_lab = 0;
    $total_xray = 0;
    while ($row_labbill = mysqli_fetch_assoc($result_labbill)) 
    {
        if($row_labbill["Test_Description"] == 'Radioactive Test : X-ray')
        {
            $total_xray += $row_labbill["Test_Charges"];
        }
        else
        {
            $total_lab += $row_labbill["Test_Charges"];
        }
    }    
}
else
{$total_lab = 0;$total_xray=0;}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Patient</title>
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
          <li class="nav-item"><a href="staff.php?admin_name=<?php echo $login_name;?>" class="nav-link">Staff</a></li>
          <li class="nav-item"><a href="departments.php?admin_name=<?php echo $login_name;?>" class="nav-link">Departments</a></li>
          <li class="nav-item"><a href="doctor.php?admin_name=<?php echo $login_name;?>" class="nav-link">Doctors</a></li>
          <li class="nav-item active"><a href="patient.php?admin_name=<?php echo $login_name;?>" class="nav-link">Patient</a></li>
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
                    <a href="index.?admin_name=<?php echo $login_name;?>">Home</a>
                </span>
                <span>Patient</span>
                
            </p>
            <h1 class="mb-3 bread">InPatient</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section bg-light">
      <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 heading-section ftco-animate text-center">
            <h2 class="mb-4">Patient Payment Details</h2>
            <h3><?php echo $patient_name ?></h3>            
          </div>
        </div>
        <div class="row d-flex justify-content-center">
            <form action="Inpatient_Payment_Add.php" method="POST" onsubmit="return validateForm()">
                <input type="hidden" value="<?php echo $login_name;?>" name="admin_name">
                <input type="hidden" value="<?php echo $treatment_id;?>" name="treatment_id">
                <input type="hidden" value="<?php echo $patient_id?>" name="patient_id">
                <input type="hidden" value="<?php echo $Patient_Admission_date?>" id="admission_date" name="admission_date">
				<input type="hidden" value="<?php echo $Patient_Admission_time?>" id="admission_date" name="admission_time">
                <input type="hidden" value="" name="treatment_days" id="treatment_days">
                
            <table class="table table-striped">
                <tbody>
                        <tr>
                            <td>
                                <div class="form-group">
                                  <label for="payment_date" class="text-black">Payment Date</label>
                                  <input type="date" class="form-control" id="payment_date" 
                                         required="" name="payment_date"  value="<?php echo $current_date?>">
                                </div>                                
                            </td>
                            <td>
                                <div class="form-group">
                                  <label for="payment_time" class="text-black">Payment Time</label>
                                  <input type="time" class="form-control" id="payment_time" 
                                         required="" name="payment_time"  value="<?php echo $current_time?>">
                                </div>                                
                            </td>                            
                            <td>
                                <div class="form-group">
                                  <label for="payment_mode" class="text-black">Payment mode</label><br>
                                  <select class="form-control" required="" id="payment_mode" name="payment_mode">
                                      <option value="" disabled="" selected="" hidden="">
                                          Select Payment mode
                                      </option>
                                      <option value="Cash"> Cash</option>
                                      <option value="Other">Other</option>
                                  </select>
                                </div>                                
                            </td>
                            <td>
                                <div class="form-group">
                                  <label for="payment_status" class="text-black">Payment status</label><br>
                                  <input type="radio" name="payment_status" required="" 
                                         id="payment_status" value="paid"/> Paid<br>
                                  <input type="radio" name="payment_status" required="" 
                                         id="payment_status" value="unpaid"/> Unpaid
                                </div>                                
                            </td>                            
                        </tr>
                        <tr>
                            <td>
                                <div class="form-group">
                                  <label for="doctor_name" class="text-black">Doctor name</label>
                                  <select class="form-control" id="doctor_name" required="" name="doctor_name">
                                    <option value="" disabled="" selected="" hidden="">
                                        Select Doctor
                                    </option>                                      
                                    <?php
                                    $doctorname = "SELECT Doctor_Name FROM doctor";
                                    $result_doctor = mysqli_query($connection, $doctorname);
                                    if(mysqli_num_rows($result_doctor) > 0)
                                    {
                                        while($dr_row = mysqli_fetch_assoc($result_doctor))
                                        {
                                    ?>
                                    <option value="<?php echo $dr_row["Doctor_Name"];?>">
                                        <?php echo $dr_row["Doctor_Name"];?>
                                    </option>
                                    <?php
                                        }
                                    }
                                    ?>
                                </select>                                   
                                </div>                                
                            </td>
                            <td>
                                <div class="form-group">
                                  <label for="doctor_charges" class="text-black">Doctor charges</label>
                                  <input type="number" class="form-control" id="doctor_charges" 
                                         required="" name="doctor_charges" min="0" >                                  
                                </div>                                
                            </td>                            
                            <td>
                                <div class="form-group">
                                  <label for="nursing_charges" class="text-black">Nursing charges</label>
                                  <input type="number" class="form-control" id="nursing_charges" min="0" 
                                         required="" name="nursing_charges" placeholder="Enter per day amount">                                  
                                </div>                                
                            </td>                            
                            <td>
                                <div class="form-group">
                                  <label for="tax_charges" class="text-black">Tax Charges</label>
                                  <input type="number" class="form-control" id="tax_charges" min="0" 
                                         required="" name="tax_charges">
                                </div>                                
                            </td>                            
                        </tr>                        
                        <tr>
                            <td>
                                <div class="form-group">
                                  <label for="canteen_charges" class="text-black">Canteen charges</label>
                                  <input type="number" class="form-control" id="canteen_charges" min="0"  
                                         readonly="" name="canteen_charges" value="<?php echo $total_canteen?>">                                  
                                </div>                                
                            </td>
                            <td>
                                <div class="form-group">
                                  <label for="room_charges" class="text-black">Room Charges</label>
                                  <input type="number" class="form-control" id="room_charges" min="0" title="Per day charges"  
                                         readonly="" name="room_charges" value="<?php echo $room_charges?>">
                                </div>                                
                            </td>
                            <td>
                                <div class="form-group">
                                  <label for="lab_charges" class="text-black">Laboratory Charges</label>
                                  <input type="number" class="form-control" id="lab_charges" min="0"  
                                         readonly="" name="lab_charges" value="<?php echo $total_lab?>">
                                </div>                                
                            </td>
                            <td>
                                <div class="form-group">
                                  <label for="xray_charges" class="text-black">XRay charges</label>
                                  <input type="number" class="form-control" id="xray_charges" min="0"  
                                         readonly="" name="xray_charges" value="<?php echo $total_xray?>">                                  
                                </div>                                
                            </td>                            
                        </tr>                        
                        <tr>
                            <td>
                                <div class="form-group">
                                  <label for="ot_charges" class="text-black">OT charges</label>
                                  <input type="number" class="form-control" id="ot_charges" min="0"  
                                         required="" name="ot_charges">                                  
                                </div>                                
                            </td>
                            <td>
                                <div class="form-group">
                                  <label for="anaethetist_charges" class="text-black">Anaethetist Charges</label>
                                  <input type="number" class="form-control" id="anaethetist_charges" min="0"  
                                         required="" name="anaethetist_charges">
                                </div>                                
                            </td> 
                            <td>
                                <div class="form-group">
                                  <label for="biowaste_charges" class="text-black">Biowaste charges</label>
                                  <input type="number" class="form-control" id="biowaste_charges" min="0"  
                                         required="" name="biowaste_charges">                                  
                                </div>                                
                            </td>
                            <td>
                                <div class="form-group">
                                  <label for="medicine_charges" class="text-black">Medicine Charges</label>
                                  <input type="number" class="form-control" id="medicine_charges" min="0"  
                                         required="" name="medicine_charges">
                                </div>                                
                            </td>                            
                        </tr>
                        <tr>
                            <td>
                                <div class="form-group">
                                  <label for="mediclaim_exist" class="text-black">Mediclaim Existence</label><br>
                                  <input type="radio" name="mediclaim_exist" required="" 
                                         id="mediclaim_exist" value="yes"/> Yes<br>
                                  <input type="radio" name="mediclaim_exist" required="" 
                                         id="mediclaim_exist" value="no"/> No
                                </div>                                
                            </td>
                            <td>
                                <div class="form-group">
                                  <label for="discharge_date" class="text-black">Discharge Date</label>
                                  <input type="date" class="form-control" id="discharge_date" 
                                         required="" name="discharge_date" onchange="checkdischarge_date()">
                                </div>                                
                            </td>
                            <td>
                                <div class="form-group">
                                  <label for="discharge_time" class="text-black">Discharge Time</label>
                                  <input type="time" class="form-control" id="discharge_time" 
                                         required="" name="discharge_time">
                                </div>                                
                            </td>                            
                            <td>
                                <div class="form-group">
                                  <label for="total_amount" class="text-black">Total amount</label><br>
								  <span style="display:none;" id="bill_amount"> = </span>
                                  <input type="number" class="form-control" id="total_amount" placeholder="Click to calculate"
                                         readonly="" name="total_amount" onfocus="calculate_amount()">                                  
                                </div>                                
                            </td>
                        </tr>
                    </tbody>               
            </table>
              <div class="form-group">
                <input type="submit" value="Complete Patient Payment" class="btn btn-primary">
              </div>                
            </form>
        </div> 
      </div>
    </section>
    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
  <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>



  <script>
      function validateForm() 
      {
        var x = document.getElementById("total_amount").value;
        if (x == "") 
        {
			alert("Please click on Total Amount field to calculate");
            return false;
        }
      }  
      function calculate_amount()
      {
		  
          var dc = document.getElementById("doctor_charges").value;
          var tc = document.getElementById("tax_charges").value;
          var nc = document.getElementById("nursing_charges").value;
          var cc = document.getElementById("canteen_charges").value;
          var rc = document.getElementById("room_charges").value;
          var otc = document.getElementById("ot_charges").value;
          var ac = document.getElementById("anaethetist_charges").value;
          var bc = document.getElementById("biowaste_charges").value;
          var mc = document.getElementById("medicine_charges").value;
          var lc = document.getElementById("lab_charges").value;
          var xc = document.getElementById("xray_charges").value;
          
          var dd = document.getElementById('discharge_date').value;
          var ad = document.getElementById('admission_date').value;
		  
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
          
        var total = parseInt(dc) + parseInt(tc) + (parseInt(nc)*diffDays) + parseInt(cc) + 
                  (parseInt(rc)*diffDays) + parseInt(otc) + parseInt(ac) + parseInt(bc) + 
                  parseInt(mc) + parseInt(lc) + parseInt(xc);		  
        document.getElementById("treatment_days").value = diffDays;
		
		document.getElementById("nursing_charges").value = parseInt(nc)*diffDays;
		document.getElementById("room_charges").value = parseInt(rc)*diffDays;
		
		document.getElementById("total_amount").style.display = "none";
		document.getElementById("total_amount").value = total;
		document.getElementById("bill_amount").style.display = "";
		document.getElementById("bill_amount").innerHTML = total;
      }
      
      function checkdischarge_date()
      {
            var selectedText = document.getElementById('discharge_date').value;
            var selectedDate = new Date(selectedText);
			var dis_month = selectedDate.getMonth();
			var dis_day = selectedDate.getDate();
			var dis_year = selectedDate.getFullYear();
			var dis_dt = dis_month+"/"+dis_day+"/"+ dis_year;			
			
            var now = new Date();
			var ad_month = now.getMonth();
			var ad_day = now.getDate();
			var ad_year = now.getFullYear();
			var adm_dt = ad_month+"/"+ad_day+"/"+ad_year;			
            /*var dt1 = Date.parse(now),dt2 = Date.parse(selectedDate);
			alert("dt1 : "+dt1+" dt2 : "+dt2);
            if (dt2 < dt1) 
            {
                alert("Date must be in the future ");
                document.getElementById('discharge_date').value = now.toISOString().split('T')[0];;
            }*/
            
			if(dis_dt < adm_dt)
            {
                alert("Date must be in the future ");
                document.getElementById('discharge_date').value = now.toISOString().split('T')[0];;
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
