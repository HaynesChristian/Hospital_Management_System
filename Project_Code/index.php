<?php
$con_servername = "localhost";
$con_username = "root";
$con_password = "";
$database = "hospital_management_system";

$connection = mysqli_connect($con_servername, $con_username, $con_password, $database);

$current_date = date("Y-m-d");

if($_GET)
{
    $login_name=$_GET["admin_name"];
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Home</title>
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
      <?php
      if($_GET)
        {
            $login_name=$_GET["admin_name"];
      ?>
  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
      <a class="navbar-brand" href="index.php?admin_name=<?php echo $login_name;?>">
          <i class="flaticon-pharmacy"></i><span>Tattvam</span> Hospital
      </a>

      <div class="collapse navbar-collapse" id="ftco-nav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active"><a href="index.php?admin_name=<?php echo $login_name;?>" class="nav-link">Home</a></li>      
          <li class="nav-item"><a href="staff.php?admin_name=<?php echo $login_name;?>" class="nav-link">Staff</a></li>
          <li class="nav-item"><a href="departments.php?admin_name=<?php echo $login_name;?>" class="nav-link">Departments</a></li>
          <li class="nav-item"><a href="doctor.php?admin_name=<?php echo $login_name;?>" class="nav-link">Doctors</a></li>
          <li class="nav-item"><a href="patient.php?admin_name=<?php echo $login_name;?>" class="nav-link">Patient</a></li>
          <li class="nav-item"><a href="services.php?admin_name=<?php echo $login_name;?>" class="nav-link">Services</a></li>
          <li class="nav-item cta">
            <a href="Login_module/register_user.php?username=<?php echo $login_name;?>" class="nav-link">
                <span>Registeration</span>
            </a>
          </li>
          <li class="nav-item cta" style="padding-left: 1%">
              <a href="index.php" class="nav-link">
                  <span>Logout</span>
              </a>
          </li>          
          <?php 
          }
          else
          {
          ?>
  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
      <a class="navbar-brand" href="index.php">
          <i class="flaticon-pharmacy"></i><span>Tattvam</span> Hospital
      </a>

      <div class="collapse navbar-collapse" id="ftco-nav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
              <a href="index.php" class="nav-link">Home</a>
          </li>          
          <li class="nav-item"><a href="Login_module/login_modal.html" class="nav-link">Staff</a></li>
          <li class="nav-item"><a href="Login_module/login_modal.html" class="nav-link">Departments</a></li>
          <li class="nav-item"><a href="Login_module/login_modal.html" class="nav-link">Doctors</a></li>
          <li class="nav-item"><a href="Login_module/login_modal.html" class="nav-link">Patient</a></li>
          <li class="nav-item"><a href="Login_module/login_modal.html" class="nav-link">Services</a></li>
          <li class="nav-item cta" style="padding-left: 1%">
            <a href="Login_module/register_user.php" class="nav-link">
                <span>Registeration</span>
            </a>
          </li>
          <li class="nav-item cta" style="padding-left: 1%">
              <a href="Login_module/login_modal.html" class="nav-link">
                  <span>Login</span>
              </a>
          </li>          
          <?php
          }
          ?>
        </ul>
      </div>
    </div>
  </nav>
    <!-- END nav -->
    
    <div class="hero-wrap" style="background-image: url('images/bg_1.jpg'); background-attachment:fixed;">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center" data-scrollax-parent="true">
          <div class="col-md-8 ftco-animate text-center">
            <h1 class="mb-4">The most valuable thing is your Health</h1>
            <p>We care about your health Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life</p>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-services">
      <div class="container">
        <div class="row no-gutters">
          <div class="col-md-4 ftco-animate py-5 nav-link-wrap">
            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
              <a class="nav-link px-4 active" id="v-pills-master-tab"
                 data-toggle="pill" href="#v-pills-master" role="tab"
                 aria-controls="v-pills-master" aria-selected="true">
                  <span class="mr-3 flaticon-cardiogram"></span> Appointments
              </a>

              <a class="nav-link px-4" id="v-pills-buffet-tab"
                 data-toggle="pill" href="#v-pills-buffet" role="tab" 
                 aria-controls="v-pills-buffet" aria-selected="false">
                  <span class="mr-3 flaticon-neurology"></span> Staff Attendance
              </a>

              <a class="nav-link px-4" id="v-pills-fitness-tab" 
                 data-toggle="pill" href="#v-pills-fitness" role="tab" 
                 aria-controls="v-pills-fitness" aria-selected="false">
                  <span class="mr-3 flaticon-stethoscope"></span> Operation Schedule
              </a>
            </div>
          </div>
            <!-- <div class="col-md-8 ftco-animate p-4 **p-md-5** d-flex align-items-center">-->
          <div class="col-md-8 ftco-animate p-4 d-flex align-items-center">
            
            <div class="tab-content pl-md-5" id="v-pills-tabContent">

              <div class="tab-pane fade show active" id="v-pills-master" role="tabpanel" 
                   aria-labelledby="v-pills-master-tab">
                <span class="icon d-block flaticon-cardiogram"></span>
                <h2 class="mb-4">Todays' Appointments</h2>
                <table border="0" class="table table-striped">
                    <thead>
                        <tr>
                            <th>Doctor Name</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Visitor Name</th>
                            <th>Visitor Type</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    //echo "$current_date";
                    $apt = "SELECT * FROM doctor_appointment_list WHERE "
                            . "Doctor_Appointment_date = '$current_date' AND Doctor_Appointment_status = 'booked' "
                            . "ORDER BY Doctor_Appointment_time";
                    $appointment_result = mysqli_query($connection, $apt);
                    if(mysqli_num_rows($appointment_result) > 0)
                    {
                        while ($apt_row = mysqli_fetch_assoc($appointment_result)) 
                       {
						   $timestamp  = strtotime($apt_row["Doctor_Appointment_date"]);
						   $appt_date = date('d/m/Y', $timestamp );
                    ?>
                        <tr>
                            <td><?php echo $apt_row["Doctor_name"];?></td>
                            <td><?php echo $appt_date;?></td>
                            <td><?php echo $apt_row["Doctor_Appointment_time"];?></td>
                            <td><?php echo $apt_row["Visitor_Name"];?></td>
                            <td><?php echo $apt_row["Visitor_Type"];?></td>
                            <td><?php echo $apt_row["Doctor_Appointment_status"];?></td>
                        </tr>
                    <?php
                            
                        }
                    }
                    ?>                        
                    </tbody>
                </table>
                <?php
                if($_GET)
                  {
                      $login_name=$_GET["admin_name"];
                ?>
                <a href="Appointment_list.php?admin_name=<?php echo $login_name;?>" class="btn btn-primary">
                        View Appointments</a>
				<a href="" data-toggle="modal" data-target="#modalAppointment" class="btn btn-primary" style="margin-left: 1px">
                  Appointment
				</a>						
                <?php
                  }
                  else
                  {
                ?>
                <p><a href="Login_module/login_modal.html" class="btn btn-primary">View Appointments</a></p>
                <?php
                  }
                ?>                
              </div>

              <div class="tab-pane fade " id="v-pills-buffet" role="tabpanel" aria-labelledby="v-pills-buffet-tab">
                <span class="icon d-block flaticon-neurology"></span>
                <h2 class="mb-4">Todays' Staff Attendance</h2>
                <table border="0" class="table table-striped">
                    <thead>
                        <tr>
                            <th>Employee Name</th>
                            <th>Attendance Status</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    //echo "$current_date";
                    $emp_atd = "SELECT attendance_tran.* , employee_master.Employee_Id , employee_master.Employee_Name FROM attendance_tran, employee_master WHERE attendance_tran.Employee_Id = employee_master.Employee_Id AND Att_date = '$current_date' ";
                    $emp_atd_result = mysqli_query($connection, $emp_atd);
                    if(mysqli_num_rows($emp_atd_result) > 0)
                    {
                        while ($emp_atd_row = mysqli_fetch_assoc($emp_atd_result)) 
                       {
                    ?>
                        <tr>
                            <td><?php echo $emp_atd_row["Employee_Name"];?></td>
                            <td><?php echo $emp_atd_row["Att_status"];?></td>
                        </tr>
                    <?php
                        }
                    }
                    ?>                        
                    </tbody>
                </table>
                <?php
                if($_GET)
                  {
                      $login_name=$_GET["admin_name"];
                ?>
                <p>
					<a href="attendance_update_list.php?admin_name=<?php echo $login_name;?>" class="btn btn-primary">Update Staff Attendance</a>
					<a href="attendance_daily.php?admin_name=<?php echo $login_name;?>" class="btn btn-primary">Add Staff Attendance</a>
				</p>
                <?php
                  }
                  else
                  {
                ?>
                <p>
                    <a href="Login_module/login_modal.html" class="btn btn-primary">View Staff Attendance</a>
                </p>
                <?php
                  }
                ?>				
              </div>

              <div class="tab-pane fade" id="v-pills-fitness" role="tabpanel" aria-labelledby="v-pills-fitness-tab">
                <span class="icon d-block flaticon-stethoscope"></span>
                <h2 class="mb-4">Todays' Operation Schedule</h2>
                <table border="0" class="table table-striped">
                    <thead>
                        <tr>
                            <th>Doctor Name</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Patient Name</th>
                            <th>Apx. Duration</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    
                    //echo "$current_date";
                    $apt = "SELECT * FROM operation_schedule WHERE "
                            . "Operation_Schedule_date = '$current_date' ORDER BY Operation_Schedule_time";
                    $appointment_result = mysqli_query($connection, $apt);
                    if(mysqli_num_rows($appointment_result) > 0)
                    {
                        while ($apt_row = mysqli_fetch_assoc($appointment_result)) 
                       {
						   $timestamp_opr  = strtotime($apt_row["Operation_Schedule_date"]);
						   $opr_date = date('d/m/Y', $timestamp_opr );						   
                    ?>
                        <tr>
                            <td><?php echo $apt_row["Doctor_name"];?></td>
                            <td><?php echo $opr_date;?></td>
                            <td><?php echo $apt_row["Operation_Schedule_time"];?></td>
                            <td><?php echo $apt_row["Patient_name"];?></td>
                            <td><?php echo $apt_row["Operation_Schedule_duration"]." mins";?></td>
                            <td><?php echo $apt_row["Operation_Status"];?></td>
                        </tr>
                    <?php
                            
                        }
                    }
                    ?>                        
                    </tbody>
                </table>
                <?php
                if($_GET)
                  {
                      $login_name=$_GET["admin_name"];
                ?>
                <p>
                    <a href="Operation_Schedule_list.php?admin_name=<?php echo $login_name;?>" class="btn btn-primary">View Operation Schedule</a>
                    <a href="" class="btn btn-primary"  data-toggle="modal" data-target="#modalOperation"
                       style="margin-left: 1px">Schedule Operation</a>
                </p>
                <?php
                  }
                  else
                  {
                ?>
                <p>
                    <a href="Login_module/login_modal.html" class="btn btn-primary">View Operation Schedule</a>
                </p>
                <?php
                  }
                ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>    
      <?php
      if($_GET)
        {
            $login_name=$_GET["admin_name"];
      ?>
    <section class="ftco-section-2 img" style="background-image: url(images/bg_3.jpg);">
    	<div class="container">
            <div class="row d-md-flex justify-content-end">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-12">
                            <a href="Appointment_list.php?admin_name=<?php echo $login_name;?>" class="services-wrap ftco-animate">
                                <div class="icon d-flex justify-content-center align-items-center">
                                    <span class="ion-ios-arrow-back"></span>
                                    <span class="ion-ios-arrow-forward"></span>
                                </div>
                                <h2>Recent Appointment Booked</h2>
                                <?php
                                $last_apt = "SELECT * FROM doctor_appointment_list ORDER BY Doctor_Appointment_id DESC LIMIT 1;";
                                $last_apt_res = mysqli_query($connection,$last_apt);
                                if(mysqli_num_rows($last_apt_res) > 0)
                                {
                                    while($l_apt = mysqli_fetch_assoc($last_apt_res))
                                    {
                                        $last_vstr = $l_apt["Visitor_Name"];
                                        $last_vstr_date = $l_apt["Doctor_Appointment_date"];
                                        $last_vstr_time = $l_apt["Doctor_Appointment_time"];
                                    }
                                ?>                                
                                <p><?php echo $last_vstr;?> 
                                    on date : <?php echo $last_vstr_date;?> 
                                    at time : <?php echo $last_vstr_time;?>
                                </p>
                                <?php
								}
								else
								{
                                ?>                                
                                <p> No Records</p>
                                <?php									
								}
                                ?>								
                            </a>
                            <a href="" class="services-wrap ftco-animate">
                                <div class="icon d-flex justify-content-center align-items-center">
                                    <span class="ion-ios-arrow-back"></span>
                                    <span class="ion-ios-arrow-forward"></span>
                                </div>
                                <h2>Recent Patient Admitted</h2>
                                <?php
                                $last_adm = "SELECT Patient_Name FROM patient "
                                        . "WHERE Patient_Type = 'inpatient' ORDER BY Patient_id DESC LIMIT 1;";
                                $last_adm_res = mysqli_query($connection,$last_adm);
                                if(mysqli_num_rows($last_adm_res) > 0)
                                {
                                    while($lp = mysqli_fetch_assoc($last_adm_res))
                                    {
                                        $last_patient = $lp["Patient_Name"];
                                    }
                                ?>                                
                                <p><?php echo $last_patient;?></p>
                                <?php
								}
								else
								{
                                ?>                                
                                <p> No Records</p>
                                <?php									
								}
                                ?>								
                            </a>
                            <a href="Operation_Schedule_list.php?admin_name=<?php echo $login_name;?>" class="services-wrap ftco-animate">
                                <div class="icon d-flex justify-content-center align-items-center">
                                    <span class="ion-ios-arrow-back"></span>
                                    <span class="ion-ios-arrow-forward"></span>
                                </div>
                                <h2>Recent Operation Scheduled</h2>                                
                                <?php
                                $last_os = "SELECT * FROM operation_schedule ORDER BY "
                                        . "Operation_Schedule_date DESC LIMIT 1;";
                                $last_os_res = mysqli_query($connection,$last_os);
                                if(mysqli_num_rows($last_os_res) > 0)
                                {
                                    while($l_os = mysqli_fetch_assoc($last_os_res))
                                    {
                                        $last_patient_os = $l_os["Patient_name"];
                                        $last_patient_osdate = $l_os["Operation_Schedule_date"];
                                        $last_patient_ostime = $l_os["Operation_Schedule_time"];
                                    }
                                ?>                                
                                <p><?php echo $last_patient_os;?> 
                                    on date : <?php echo $last_patient_osdate;?> 
                                    at time : <?php echo $last_patient_ostime;?>
                                </p>
                                <?php
								}
								else
								{
                                ?>                                
                                <p> No Records</p>
                                <?php									
								}
                                ?>								
                            </a>
                            <a href="incomeexpense1.php?admin_name=<?php echo $login_name;?>" class="services-wrap ftco-animate">
                                <div class="icon d-flex justify-content-center align-items-center">
                                    <span class="ion-ios-arrow-back"></span>
                                    <span class="ion-ios-arrow-forward"></span>
                                </div>
                                <h2>Recent Added Transaction</h2>
                                <?php
                                $last_trans = "SELECT * FROM incomeexpense ORDER BY "
                                        . "Voucher_date DESC LIMIT 1;";
                                $last_trans_res = mysqli_query($connection,$last_trans);
                                if(mysqli_num_rows($last_trans_res) > 0)
                                {
                                    while($l_trans = mysqli_fetch_assoc($last_trans_res))
                                    {
                                        $last_trans_dt = $l_trans["Voucher_date"];
                                        $last_trans_type = $l_trans["Account_type"];
                                        $last_trans_amt = $l_trans["Amount"];
                                        $last_trans_desc = $l_trans["Description"];
                                    }
                                ?>                                
                                <p><?php echo $last_trans_type;?> : <?php echo $last_trans_desc;?> 
                                    on date : <?php echo $last_trans_dt;?> 
                                    of amount : Rs.<?php echo $last_trans_amt;?>
                                </p>
                                <?php
								}
								else
								{
                                ?>                                
                                <p> No Records</p>
                                <?php									
								}
                                ?>								
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>    
    <section class="ftco-section">
    	<div class="container">
            <div class="row">
              <div class="col-md-3 heading-section ftco-animate">
                  <h2 class="text-black"><a href="incomeexpense1.php?admin_name=<?php echo $login_name;?>">Financial Transactions</a></h2>
              </div>
              <div class="col-md-3 heading-section ftco-animate">
                  <h2 class=""><a href="biowaste_report.php?admin_name=<?php echo $login_name;?>">Biowaste</a></h2>
              </div>
              <div class="col-md-3 heading-section ftco-animate">
                  <h2 class=""><a href="medical_expiry_report.php?admin_name=<?php echo $login_name;?>">Medicine</a></h2>
              </div>                
              <div class="col-md-3 heading-section ftco-animate">
                  <h2 class=""><a href="department-issueStock.php?admin_name=<?php echo $login_name;?>">Stock Issue</a></h2>
              </div>          
            </div>
    	</div>
    </section>
      <?php
        }
        else
        {
      ?>
    <section class="ftco-section-2 img" style="background-image: url(images/bg_3.jpg);">
    	<div class="container">
            <div class="row d-md-flex justify-content-end">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-12">
                            <a href="/Login_module/login_modal.html" class="services-wrap ftco-animate">
                                <div class="icon d-flex justify-content-center align-items-center">
                                    <span class="ion-ios-arrow-back"></span>
                                    <span class="ion-ios-arrow-forward"></span>
                                </div>
                                <h2>Recent Appointment Booked</h2>
                                <?php
                                $last_apt = "SELECT * FROM doctor_appointment_list ORDER BY Doctor_Appointment_id DESC LIMIT 1;";
                                $last_apt_res = mysqli_query($connection,$last_apt);
                                if(mysqli_num_rows($last_apt_res) > 0)
                                {
                                    while($l_apt = mysqli_fetch_assoc($last_apt_res))
                                    {
                                        $last_vstr = $l_apt["Visitor_Name"];
                                        $last_vstr_date = $l_apt["Doctor_Appointment_date"];
                                        $last_vstr_time = $l_apt["Doctor_Appointment_time"];
                                    }
                                ?>                                
                                <p><?php echo $last_vstr;?> 
                                    on date : <?php echo $last_vstr_date;?> 
                                    at time : <?php echo $last_vstr_time;?>
                                </p>
                                <?php
								}
								else
								{
                                ?>                                
                                <p> No Records</p>
                                <?php									
								}
                                ?>									
                            </a>
                            <a href="/Login_module/login_modal.html" class="services-wrap ftco-animate">
                                <div class="icon d-flex justify-content-center align-items-center">
                                    <span class="ion-ios-arrow-back"></span>
                                    <span class="ion-ios-arrow-forward"></span>
                                </div>
                                <h2>Recent Patient Admitted</h2>
                                <?php
                                $last_adm = "SELECT Patient_Name FROM patient "
                                        . "WHERE Patient_Type = 'inpatient' ORDER BY Patient_id DESC LIMIT 1;";
                                $last_adm_res = mysqli_query($connection,$last_adm);
                                if(mysqli_num_rows($last_adm_res) > 0)
                                {
                                    while($lp = mysqli_fetch_assoc($last_adm_res))
                                    {
                                        $last_patient = $lp["Patient_Name"];
                                    }
                                ?>                                
                                <p><?php echo $last_patient;?></p>
                                <?php
								}
								else
								{
                                ?>                                
                                <p> No Records</p>
                                <?php									
								}
                                ?>									
                            </a>
                            <a href="/Login_module/login_modal.html" class="services-wrap ftco-animate">
                                <div class="icon d-flex justify-content-center align-items-center">
                                    <span class="ion-ios-arrow-back"></span>
                                    <span class="ion-ios-arrow-forward"></span>
                                </div>
                                <h2>Recent Operation Scheduled</h2>                                
                                <?php
                                $last_os = "SELECT * FROM operation_schedule ORDER BY "
                                        . "Operation_Schedule_date DESC LIMIT 1;";
                                $last_os_res = mysqli_query($connection,$last_os);
                                if(mysqli_num_rows($last_os_res) > 0)
                                {
                                    while($l_os = mysqli_fetch_assoc($last_os_res))
                                    {
                                        $last_patient_os = $l_os["Patient_name"];
                                        $last_patient_osdate = $l_os["Operation_Schedule_date"];
                                        $last_patient_ostime = $l_os["Operation_Schedule_time"];
                                    }
                                ?>                                
                                <p><?php echo $last_patient_os;?> 
                                    on date : <?php echo $last_patient_osdate;?> 
                                    at time : <?php echo $last_patient_ostime;?>
                                </p>
                                <?php
								}
								else
								{
                                ?>                                
                                <p> No Records</p>
                                <?php									
								}
                                ?>									
                            </a>
                            <a href="/Login_module/login_modal.html" class="services-wrap ftco-animate">
                                <div class="icon d-flex justify-content-center align-items-center">
                                    <span class="ion-ios-arrow-back"></span>
                                    <span class="ion-ios-arrow-forward"></span>
                                </div>
                                <h2>Recent Added Transaction</h2>
                                <?php
                                $last_trans = "SELECT * FROM incomeexpense ORDER BY "
                                        . "Voucher_date DESC LIMIT 1;";
                                $last_trans_res = mysqli_query($connection,$last_trans);
                                if(mysqli_num_rows($last_trans_res) > 0)
                                {
                                    while($l_trans = mysqli_fetch_assoc($last_trans_res))
                                    {
                                        $last_trans_dt = $l_trans["Voucher_date"];
                                        $last_trans_type = $l_trans["Account_type"];
                                        $last_trans_amt = $l_trans["Amount"];
                                        $last_trans_desc = $l_trans["Description"];
                                    }
                                ?>                                
                                <p><?php echo $last_trans_type;?> : <?php echo $last_trans_desc;?> 
                                    on date : <?php echo $last_trans_dt;?> 
                                    of amount : Rs.<?php echo $last_trans_amt;?>
                                </p>
                                <?php
								}
								else
								{
                                ?>                                
                                <p> No Records</p>
                                <?php									
								}
                                ?>									
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>    
    <section class="ftco-section">
    	<div class="container">
            <div class="row">
              <div class="col-md-3 heading-section ftco-animate">
                  <h2 class="text-black"><a href="Login_module/login_modal.html">Financial Transactions</a></h2>
              </div>
              <div class="col-md-3 heading-section ftco-animate">
                  <h2 class=""><a href="Login_module/login_modal.html">Biowaste</a></h2>
              </div>
              <div class="col-md-3 heading-section ftco-animate">
                  <h2 class=""><a href="Login_module/login_modal.html">Medicine</a></h2>
              </div>                
              <div class="col-md-3 heading-section ftco-animate">
                  <h2 class=""><a href="Login_module/login_modal.html">Stock Issue</a></h2>
              </div>          
            </div>
    	</div>
    </section>    
      <?php
        }
      ?>    

    <section class="ftco-section ftco-counter img" id="section-counter" 
             style="background-image: url(images/bg_4.jpg);">
    	<div class="container">
    		<div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 text-center heading-section heading-section-white ftco-animate">
            <h2 class="mb-4">Some Statistics</h2>
            <span class="subheading">about our Tattvam Surgical Hospital</span>
          </div>
        </div>
    		<div class="row justify-content-center">
    			<div class="col-md-10">
                            <div class="row">
		          <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
		            <div class="block-18 text-center">
		              <div class="text">
                                <?php
                                $patient_count = "SELECT Patient_id FROM patient";
                                if($patient_count_res=mysqli_query($connection,$patient_count))
                                {
                                    $patient_no = mysqli_num_rows($patient_count_res);
                                }
                                ?>
                                  <strong class="number" data-number="<?php echo $patient_no;?>">0</strong>
		                <span>Patients</span>
		              </div>
		            </div>
		          </div>
		          <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
		            <div class="block-18 text-center">
		              <div class="text">
                                <?php
                                $doctor_count = "SELECT Doctor_id FROM doctor";
                                if($doctor_count_res = mysqli_query($connection,$doctor_count))
                                {
                                    $doctor_no = mysqli_num_rows($doctor_count_res);
                                }
                                ?>                                  
		                <strong class="number" data-number="<?php echo $doctor_no;?>">0</strong>
		                <span>Doctors</span>
		              </div>
		            </div>
		          </div>
		          <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
		            <div class="block-18 text-center">
		              <div class="text">
                                <?php
                                $employee_count = "SELECT Employee_Id FROM employee_master";
                                if($employee_count_res=mysqli_query($connection,$employee_count))
                                {
                                    $employee_no = mysqli_num_rows($employee_count_res);
                                }
                                ?>                                  
		                <strong class="number" data-number="<?php echo $employee_no;?>">0</strong>
		                <span>Staff</span>
		              </div>
		            </div>
		          </div>
		          <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
		            <div class="block-18 text-center">
		              <div class="text">
                                <?php
                                $med_count = "SELECT Medicine_Id FROM medicine";
                                if($med_count_res = mysqli_query($connection,$med_count))
                                {
                                    $med_no = mysqli_num_rows($med_count_res);
                                }
                                ?>                                  
		                <strong class="number" data-number="<?php echo $med_no;?>">0</strong>
		                <span>Medicines</span>
		              </div>
		            </div>
		          </div>
		        </div>
	        </div>
        </div>
    	</div>
    </section>
    <footer class="ftco-footer ftco-bg-dark ftco-section img" 
            style="background-image: url(images/bg_5.jpg); padding: 0;">
    	<div class="overlay"></div>
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center">
            <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
         Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart" aria-hidden="true"></i> 
         by <a href="https://colorlib.com" target="_blank">Colorlib</a><br>
            <?php
            if($_GET)
              {
                  $login_name=$_GET["admin_name"];
            ?>         
         developed and modified by <a href="zDevelopers_Credit.php?admin_name=<?php echo $login_name;?>">Students of MSU BCA 6th Semester (Project No: P1)</a>
            <?php
              }
            else
            {
            ?>
developed and modified by <a href="zDevelopers_Credit.php">Students of MSU BCA 6th Semester (Project No: P1)</a>         
            <?php
            }
            ?>         
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
          </div>
        </div>
      </div>
    </footer>
  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>

  <!--Appointment Modal -->
    <div class="modal fade" id="modalAppointment" tabindex="-1" role="dialog" 
         aria-labelledby="modalAppointmentLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalAppointmentLabel">Appointment</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
              <form action="Appointment_booking.php" method="POST" autocomplete="off">
                  <input type="hidden" value="<?php echo $login_name;?>" name="admin_name">
              <div class="form-group">
                <label for="appointment_name" class="text-black">Visitor Name</label>
                <input type="text" name="VisitorName" class="form-control" id="appointment_name" required="">
              </div>
              <div class="form-group">
                <label for="appointment_type" class="text-black">Visitor Type</label>
                <select class="form-control" id="appointment_type" name="VisitorType" required="">
                    <option value="" disabled="" selected="" hidden="">
                        Select Visitor type
                    </option>				
                    <option value="Patient">Patient</option>
                    <option value="MR">MR</option>
                </select>
              </div>
              <div class="form-group">
                <label for="appointment_doctor" class="text-black">Doctor Name</label>
                <select class="form-control" name="DoctorName" id="appointment_doctor" required="required">
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
					else
					{
                    ?>
                    <option>No registered doctor</option>
                    <?php									
					}
                    ?>						
                </select>
              </div>                
              <div class="form-group">
                <label for="appointment_email" class="text-black">Visitor Email</label>
                <input type="email" name="VisitorEmail" class="form-control" id="appointment_email">
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="appointment_vdate" class="text-black">Date</label>
                    <input type="date" name="VisitorDate" class="form-control" id="appointment_vdate" 
                           required="" onchange="checkapt_date()">
                  </div>    
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="appointment_time" class="text-black">Time</label>
                    <select name="VisitorTime" class="form-control" id="appointment_vtime" required="">
						<option value="" disabled="" selected="" hidden="">
							Select Time
						</option>					
                        <option value="10:00">10:00am</option>
                        <option value="10:30">10:30am</option>
                        <option value="11:00">11:00am</option>
                        <option value="11:30">11:30am</option>
                        <option value="12:00">12:00pm</option>
                        <option value="12:30">12:30pm</option>
                        <option value="13:00">1:00pm</option>
                        <option value="17:00">5:00pm</option>
                        <option value="17:30">5:30pm</option>
                        <option value="18:00">6:00pm</option>
                        <option value="18:30">6:30pm</option>
                        <option value="19:00">7:00pm</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label for="appointment_message" class="text-black">Appointment Description</label>
                <textarea name="VisitorDesc" id="appointment_message" required=""
                          class="form-control" cols="20" rows="10"></textarea>
              </div>
              <div class="form-group">
                <input type="submit" value="Book Appointment" class="btn btn-primary">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

  <!--Operation Modal -->
    <div class="modal fade" id="modalOperation" tabindex="-1" role="dialog" 
         aria-labelledby="modalOperationLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalOperationLabel">Operation</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
              <form action="Operation_Schedule_Add.php" method="POST" autocomplete="off">
                  <input type="hidden" value="<?php echo $login_name;?>" name="admin_name">
              <div class="form-group">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="operation_date" class="text-black">Date</label>
                    <input type="date" name="OperationDate" class="form-control" id="operation_date" 
                           required="" onchange="checkopr_date()">
                  </div>    
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="operation_time" class="text-black">Time</label>
                    <select name="OperationTime" class="form-control" id="operation_time" required="">
                        <option value="" disabled="" selected="" hidden="">
                            Select Operation Time
                        </option>
                        <option value="10:00">10:00am</option>
                        <option value="10:30">10:30am</option>
                        <option value="11:00">11:00am</option>
                        <option value="11:30">11:30am</option>
                        <option value="12:00">12:00pm</option>
                        <option value="12:30">12:30pm</option>
                        <option value="13:00">1:00pm</option>
                        <option value="17:00">5:00pm</option>
                        <option value="17:30">5:30pm</option>
                        <option value="18:00">6:00pm</option>
                        <option value="18:30">6:30pm</option>
                        <option value="19:00">7:00pm</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label for="Operation_doctor" class="text-black">Doctor Name</label>
                <select class="form-control" name="Operation_doctor" id="Operation_doctor" required="">
                    <option value="" disabled="" selected="" hidden="">
                  	Select Doctor
                    </option>
                    <?php
                    $doctorname = "SELECT * FROM doctor";
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
              <div class="form-group">
                <label for="Operation_patient" class="text-black">Patient Name</label>
                <select class="form-control" name="Operation_patient" id="Operation_patient" required="">
                    <option value="" disabled="" selected="" hidden="">
                  	Select Patient
                    </option>
                    <?php
                    $doctorname = "SELECT Patient_id , Patient_Name FROM patient "
                            . "WHERE Patient_Type = 'inpatient' ";
                    $result_doctor = mysqli_query($connection, $doctorname);
                    if(mysqli_num_rows($result_doctor) > 0)
                    {
                        while($dr_row = mysqli_fetch_assoc($result_doctor))
                        {
                    ?>
                    <option value="<?php echo $dr_row["Patient_Name"];?>">
                        <?php echo $dr_row["Patient_Name"];?>
                    </option>
                    <?php
                        }
                    }
                    ?>
                </select>
              </div>                  
              <div class="form-group">
                <label for="operation_duration" class="text-black">Operation duration (in Mins)</label>
                <input type="number" name="OperationDuration" class="form-control" id="operation_duration" required="">
              </div>
              <div class="form-group">
                <label for="operation_status" class="text-black">Operation Status</label>
                <select class="form-control" id="operation_status" name="operation_status" required="">
                    <option value="" disabled="" selected="" hidden="">
                  	Select Operation Status
                    </option>				
                    <option value="booked">Booked</option>
                    <option value="confirmed">Confirmed</option>
                    <option value="completed">Completed</option>
                </select>
              </div>                  
              <div class="form-group">
                <input type="submit" value="Book Operation" class="btn btn-primary">
              </div>
          </div>
                </form>
        </div>
      </div>
    </div>
  
  <script>
      function checkapt_date()
      {
            var selectedText = document.getElementById('appointment_vdate').value;
            var selectedDate = new Date(selectedText);
            var now = new Date();
            var dt1 = Date.parse(now),
            dt2 = Date.parse(selectedDate);
            if (dt2 < dt1) 
            {
                alert("Date must be in the future ");
                document.getElementById('appointment_vdate').value = now.toISOString().split('T')[0];;
            }
            
      }
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