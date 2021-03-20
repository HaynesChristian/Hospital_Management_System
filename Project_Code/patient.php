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
          <li class="nav-item">
              <a href="index.php?admin_name=<?php echo $login_name;?>" class="nav-link">Home</a>
          </li>      
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
                    <a href="index.php?admin_name=<?php echo $login_name;?>">Home</a>
                </span>
                <span>Patient</span>
            </p>
            <h1 class="mb-3 bread">Patient</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section bg-light">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-7 heading-section ftco-animate text-center">
            <h2 class="mb-4">Patient List</h2>
            <button class="btn btn-primary" 
                    data-toggle="modal" data-target="#modalPatientRegisteration">
                Register Patient
            </button><br><br>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <input type="text" placeholder="Search Patient" class="form-control" 
                           id="searchpatient" onkeyup="Allpatients()">
                    <input type="text" placeholder="Search InPatient" class="form-control" 
                           id="searchInpatient" onkeyup="AllInpatients()" style="display:none">
                    <input type="text" placeholder="Search OutPatient" class="form-control" 
                           id="searchOutpatient" onkeyup="AllOutpatients()" style="display:none">                    
                  </div>    
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                      <select class="form-control" onchange="displaypatientlist()"id="patientselect">
                          <option value="All">All</option>
                          <option value="Inpatient">Inpatient</option>
                          <option value="Outpatient">Outpatient</option>
                      </select>
                  </div>
                </div>
              </div>
          </div>
        </div>
        <div class="row d-flex justify-content-center">
            <table class="table table-striped" id="AllPatientTable">
                <thead>
                    <tr>
						<th>Srno.</th>
                        <th>Name</th>
                        <th>Contact</th>
                        <th>Current Type</th>
                        <th>Add & Edit Details</th>
                    </tr>
                </thead>
                <?php 
                $view_patient = "SELECT * FROM patient ORDER BY Patient_id DESC";
                $result_patient = mysqli_query($connection, $view_patient);
                if(mysqli_num_rows($result_patient) > 0)
                {
                    while ($row_patient = mysqli_fetch_assoc($result_patient)) 
                    {
                ?>
                <tbody>
                    <tr>
						<td><?php echo $row_patient["Patient_SrNo"]?></td>
                        <td><?php echo $row_patient["Patient_Name"]?></td>
                        <td><?php echo $row_patient["Patient_MobileNo"]?></td>
                        <td><?php echo $row_patient["Patient_Type"]?></td>
                        <td>
                            <a href="ShowUpdate_Patient.php?patient_id=<?php echo $row_patient["Patient_id"]?>&admin_name=<?php echo $login_name?>" 
                               class="btn btn-primary">
                                Personal
                            </a>    
                            <a href="Outpatient_Treatment.php?patient_id=<?php echo $row_patient["Patient_id"]?>&admin_name=<?php echo $login_name?>"
                               class="btn btn-primary">
                                Outpatient Treatment
                            </a>    
                            <a href="Inpatient_Treatment.php?patient_id=<?php echo $row_patient["Patient_id"]?>&admin_name=<?php echo $login_name?>"
                               class="btn btn-primary">
                                Inpatient Treatment
                            </a>
                        </td>
                    </tr>
                </tbody>
                <?php
                        
                    }
                }
                ?>                
            </table>

            <table class="table table-striped" id="AllOutPatientTable"  style="display:none">
                <thead>
                    <tr>
						<th>Srno.</th>
                        <th>Name</th>
                        <th>Contact</th>
                        <th>Current Type</th>
                        <th>Add & Edit Details</th>
                    </tr>
                </thead>
                <?php 
                $view_patient = "SELECT * FROM patient WHERE Patient_Type = 'outpatient'";
                $result_patient = mysqli_query($connection, $view_patient);
                if(mysqli_num_rows($result_patient) > 0)
                {
                    while ($row_patient = mysqli_fetch_assoc($result_patient)) 
                    {
                ?>
                <tbody>
                    <tr>
						<td><?php echo $row_patient["Patient_SrNo"]?></td>
                        <td><?php echo $row_patient["Patient_Name"]?></td>
                        <td><?php echo $row_patient["Patient_MobileNo"]?></td>
                        <td><?php echo $row_patient["Patient_Type"]?></td>
                        <td>
                            <a href="ShowUpdate_Patient.php?patient_id=<?php echo $row_patient["Patient_id"]?>&admin_name=<?php echo $login_name?>"  
                               class="btn btn-primary">
                                Personal
                            </a>
                            <a href="Outpatient_Treatment.php?patient_id=<?php echo $row_patient["Patient_id"]?>&admin_name=<?php echo $login_name?>"
                               class="btn btn-primary">
                                Outpatient Treatment
                            </a>    
                            <a href="Inpatient_Treatment.php?patient_id=<?php echo $row_patient["Patient_id"]?>&admin_name=<?php echo $login_name?>"
                               class="btn btn-primary">
                                Inpatient Treatment
                            </a>
                        </td>
                    </tr>
                </tbody>
                <?php
                    }
                }
                ?>                
            </table>

            <table class="table table-striped" id="AllInPatientTable" style="display:none">
                <thead>
                    <tr>
						<th>Srno.</th>
                        <th>Name</th>
                        <th>Contact</th>
                        <th>Current Type</th>
                        <th>Add & Edit Details</th>
                    </tr>
                </thead>
                <?php 
                $view_patient = "SELECT * FROM patient WHERE Patient_Type = 'inpatient' ";
                $result_patient = mysqli_query($connection, $view_patient);
                if(mysqli_num_rows($result_patient) > 0)
                {
                    while ($row_patient = mysqli_fetch_assoc($result_patient)) 
                    {
                ?>
                <tbody>
                    <tr>
						<td><?php echo $row_patient["Patient_SrNo"]?></td>
                        <td><?php echo $row_patient["Patient_Name"]?></td>
                        <td><?php echo $row_patient["Patient_MobileNo"]?></td>
                        <td><?php echo $row_patient["Patient_Type"]?></td>
                        <td>
                            <a href="ShowUpdate_Patient.php?patient_id=<?php echo $row_patient["Patient_id"]?>&admin_name=<?php echo $login_name?>"  
                               class="btn btn-primary">
                                Personal
                            </a>
                            <a href="Outpatient_Treatment.php?patient_id=<?php echo $row_patient["Patient_id"]?>&admin_name=<?php echo $login_name?>"
                               class="btn btn-primary">
                                Outpatient Treatment
                            </a>    
                            <a href="Inpatient_Treatment.php?patient_id=<?php echo $row_patient["Patient_id"]?>&admin_name=<?php echo $login_name?>"
                               class="btn btn-primary">
                                Inpatient Treatment
                            </a>
                        </td>
                    </tr>
                </tbody>
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

  
  <!-- Patient Modal -->
    <div class="modal fade" id="modalPatientRegisteration" tabindex="-1" 
         role="dialog" aria-labelledby="modalPatientRegisterationLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalPatientRegisterationLabel">
                Patient Registeration
            </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
              <form action="Add_Patient.php" method="POST" autocomplete="off">
                  <input type="hidden" value="<?php echo $login_name;?>" name="admin_name">
                <table style="width: 100%">
                    <tbody>
                        <tr>
                            <td>
                                <div class="form-group">
                                  <label for="patient_srno" class="text-black">Srno.</label>
                                  <input type="number" class="form-control" id="patient_srno" 
                                         required="" name="patient_srno">
                                </div>                                
                            </td>						
                            <td>
                                <div class="form-group">
                                  <label for="patient_name" class="text-black">Full Name</label>
                                  <input type="text" class="form-control" id="patient_name" 
                                         required="" name="patient_name">
                                </div>                                
                            </td>
                            <td>							
                                <div class="form-group">
                                  <label for="patient_gender" class="text-black">Gender</label><br>
                                  <input type="radio" name="patient_gender" 
                                         required="" value="Male" /> Male<br>
                                  <input type="radio" name="patient_gender" 
                                         required="" value="Female" /> Female
                                </div>                                
                            </td>
                            <td>
                                <div class="form-group">
                                  <label for="patient_contact" class="text-black">Mobile No</label>
                                  <input type="tel" pattern="(7|8|9)[0-9]{9}" class="form-control"
                                         id="patient_contact" name="patient_contact" required="" >
                                </div>                                
                            </td>                            
                        </tr>
                        <tr>
                            <td>
                                <div class="form-group">
                                  <label for="patient_age" class="text-black">Age</label>
                                  <input type="number" min="0" max="150" 
                                         class="form-control" id="patient_age" name="patient_age" required="" >
                                </div>                                
                            </td>
                            <td colspan="2">
                                <div class="form-group">
                                  <label for="patient_email" class="text-black">Email id</label>
                                  <input type="email" class="form-control" id="patient_email" name="patient_email">
                                </div>                                
                            </td>
                            <td>
                                <div class="form-group">
                                  <label for="patient_type" class="text-black">Type</label><br>
                                  <input type="radio" name="patient_type" value="inpatient" required=""/> Inpatient <br>
                                  <input type="radio" name="patient_type" value="outpatient" required=""/> Outpatient
                                </div>                                
                            </td>                            
                        </tr>
                        <tr>
                            <td colspan="2">
                                <div class="form-group">
                                  <label for="patient_adrs" class="text-black">Address</label>
                                  <textarea name="patient_adrs" id="patient_adrs" required=""
                                            class="form-control" cols="30" rows="5"></textarea>
                                </div>                                
                            </td>
                            <td>
                                <div class="form-group">
                                  <label for="patient_height" class="text-black">Height</label>
                                  <input type="number" class="form-control" id="patient_height" 
                                         name="patient_height" step=".01" placeholder="for eg: enter 5.2 for 5'2 ">
                                </div> 
                            </td>
                            <td>								
                                <div class="form-group">
                                  <label for="patient_weight" class="text-black">Weight</label>
                                  <input type="number" class="form-control" id="patient_weight" 
                                         name="patient_weight" step=".01">
                                </div>                                
                            </td>                            
                        </tr>
                        <tr>
                            <td colspan="2">
                                <div class="form-group">
                                  <label for="patient_relative_name" class="text-black">Relative Name</label>
                                  <input type="text" class="form-control" required=""
                                         name="patient_relative_name" id="patient_relative_name">
                                </div>                                
                            </td>
                            <td>
                                <div class="form-group">
                                  <label for="patient_relative_rel" class="text-black">Relative Relation</label>
                                  <input type="text" class="form-control" required=""
                                         id="patient_relative_rel" name="patient_relative_rel">
                                </div>                                
                            </td>
                            <td>
                                <div class="form-group">
                                  <label for="patient_relative_no" class="text-black">Relative Contact</label>
                                  <input type="tel" pattern="(7|8|9)[0-9]{9}" class="form-control" required=""
                                         id="patient_relative_no" name="patient_relative_no">
                                </div>                                
                            </td>                            
                        </tr>
                    </tbody>
                </table>

              <div class="form-group">
                <input type="submit" value="Complete Patient Registeration" class="btn btn-primary">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>  


   <script>
        function Allpatients() 
        {
          var input, filter, table, tr, td, i, txtValue;
          input = document.getElementById("searchpatient");
          filter = input.value.toUpperCase();
          table = document.getElementById("AllPatientTable");
          tr = table.getElementsByTagName("tr");
          for (i = 0; i < tr.length; i++) 
          {
            td = tr[i].getElementsByTagName("td")[1];
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

        function AllInpatients() 
        {
          var input, filter, table, tr, td, i, txtValue;
          input = document.getElementById("searchInpatient");
          filter = input.value.toUpperCase();
          table = document.getElementById("AllInPatientTable");
          tr = table.getElementsByTagName("tr");
          for (i = 0; i < tr.length; i++) 
          {
            td = tr[i].getElementsByTagName("td")[1];
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
        
        function AllOutpatients() 
        {
          var input, filter, table, tr, td, i, txtValue;
          input = document.getElementById("searchOutpatient");
          filter = input.value.toUpperCase();
          table = document.getElementById("AllOutPatientTable");
          tr = table.getElementsByTagName("tr");
          for (i = 0; i < tr.length; i++) 
          {
            td = tr[i].getElementsByTagName("td")[1];
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
        function displaypatientlist()
        {   
            var patientselect = document.getElementById("patientselect").value;
            
            
            if(patientselect === "All")
            {
                document.getElementById("searchOutpatient").style.display = "none";
                document.getElementById("AllOutPatientTable").style.display = "none";
                
                document.getElementById("searchInpatient").style.display = "none";
                document.getElementById("AllInPatientTable").style.display = "none";
                
                document.getElementById("searchpatient").style.display = "";
                document.getElementById("AllPatientTable").style.display = "";
            }
            if(patientselect === "Inpatient")
            {
                document.getElementById("searchOutpatient").style.display = "none";
                document.getElementById("AllOutPatientTable").style.display = "none";
                
                document.getElementById("searchInpatient").style.display = "";
                document.getElementById("AllInPatientTable").style.display = "";
                
                document.getElementById("searchpatient").style.display = "none";
                document.getElementById("AllPatientTable").style.display = "none";
            }
            if(patientselect === "Outpatient")
            {
                document.getElementById("searchOutpatient").style.display = "";
                document.getElementById("AllOutPatientTable").style.display = "";
                
                document.getElementById("searchInpatient").style.display = "none";
                document.getElementById("AllInPatientTable").style.display = "none";
                
                document.getElementById("searchpatient").style.display = "none";
                document.getElementById("AllPatientTable").style.display = "none";
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