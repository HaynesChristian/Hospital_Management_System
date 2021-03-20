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


$billdate = date("Y-m-d");
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
          <li class="nav-item"><a href="staff.php?admin_name=<?php echo $login_name;?>" class="nav-link">Staff</a></li>
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
<!--    <center>
        <a href="" data-toggle="modal" data-target="#modalAppointmen">
            <input type="submit" class="btn btn-primary" value="Patient Canteen Bill" 
               style="margin-top: 2%">
        </a>
    </center>                    -->
  <br>
  <br>
<center>
<table class="table table-striped">
    <tr>
<!--        <th>Bill Id</th>
        <th>Bill Date</th>-->
        <th>Patient Id</th>
        <th>Treatment Id</th>
        <th>Total Order</th>
        <th>Total Amount</th>
<!--        <th colspan="">Action</th>-->
    </tr>
    <?php
    $dislpaydata = "SELECT Patient_Id,Treatment_id,COUNT(Treatment_id) AS 'Total Orders',"
            . "SUM(Order_Amount) AS 'Total Amount' "
            . "FROM patient_canteen_order GROUP BY Treatment_id";
    $result = mysqli_query($conn, $dislpaydata);
    if(mysqli_num_rows($result)>0)
    {
        while ($row = mysqli_fetch_assoc($result)) 
                {
    ?>
    <tr>
    <form method="POST" autocomplete="off">
        <td><?php echo $row["Patient_Id"];?></td>
        <td><?php echo $row["Treatment_id"];?></td>
        <td><?php echo $row["Total Orders"];?></td>
        <td><?php echo $row["Total Amount"];?></td>
<!--        <td>
            <a href="canteen_bill_update.php?Update=<?php echo $row["Bill_Id"];?>&admin_name=<?php echo $login_name;?>"
               class="btn btn-primary">Update</a>
        </td>             -->
        
        </tr>
    </form>
  <?php
                }
    }
    ?>
  
  
</table>
    <br>  
        
    

    
    		
		

    
  <!-- Employee Modal -->
    <div class="modal fade" id="modalAppointmen" tabindex="-1" role="dialog" aria-labelledby="modalAppointmentLabel" aria-hidden="true">
      <div class="modal-dialog " role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalAppointmentLabel">Patient Canteen Bill</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
              <form action="bill.php" autocomplete="off" method="POST">
                 <input type="hidden" value="<?php echo $login_name;?>" name="admin_name">      
                  <div class="col-md-6">
                  <div class="form-group">
                    <label for="billid" class="text-black"></label>
                    <input type="hidden" class="form-control" name="billid">
                  </div>
              </div>
          
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="billdate" class="text-black">Bill Date</label>
                    <input type="date" class="form-control" name="billdate" >
                  </div>
              </div>
          
                 
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="patientid" class="text-black">Patient Id</label>
                    <select class="form-control" name="patientid" id="patientid" required="">
                        <?php
                        $doctorname = "SELECT patient.Patient_id , patient.Patient_Name , patient_canteen_order.Patient_Id "
                                . "FROM patient, patient_canteen_order "
                                . "WHERE patient.Patient_Type = 'inpatient' ";
                        $result_doctor = mysqli_query($conn, $doctorname);
                        if(mysqli_num_rows($result_doctor) > 0)
                        {
                            while($dr_row = mysqli_fetch_assoc($result_doctor))
                            {
                        ?>
                        <option value="<?php echo $dr_row["Patient_id"];?>" 
                            <?php if($dr_row["Patient_id"] != $dr_row["Patient_Id"]){echo "style='display:none'";}?>>
                            <?php echo $dr_row["Patient_Name"];?>
                        </option>
                        <?php
                            }
                        }
                        ?>
                    </select>                    
                  </div>    
                </div>
                 
                     
              <div class="form-group">
                <input type="submit" value="Patient Bill" class="btn btn-primary" href="patient_canteen_bill">
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