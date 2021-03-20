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
    $patient_id = $_GET["patient_id"];
    $treatment_id = $_GET["treatment_id"];
    $view_patient = "SELECT * FROM patient WHERE Patient_id = $patient_id";
    $result_pat = mysqli_query($conn, $view_patient);
    if(mysqli_num_rows($result_pat) > 0)
    {
        while ($row_patient = mysqli_fetch_assoc($result_pat)) 
        {
            $patient_name = $row_patient["Patient_Name"];
        }
    }    
}

$orderdate = date("Y-m-d");
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
    <section class="ftco-section bg-light">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-7 heading-section ftco-animate text-center">
            <center>
                <a href="" data-toggle="modal" data-target="#modalAppointmen">
                    <input type="submit" class="btn btn-primary" value="Create Order">
                </a>
            </center>              
            <h2 class="mb-4">Patient Canteen Order</h2>
            <h3><?php echo $patient_name ?></h3>            
          </div>
        </div>
        <div class="row d-flex justify-content-center">
            <table class="table table-striped">
                <tr>
                    <th>Order id</th>
                    <th>Order Date</th>
                    <th>Food Name 1</th>
                    <th>Food Quantity 1</th>
                    <th>Food Name 2</th>
                    <th>Food Quantity 2</th>
                    <th>Food Name 3</th>
                    <th>Food Quantity 3</th>
                    <th>Order Amount</th>
                    <th colspan="2">Action</th>
                </tr>
                <?php
                $dislpaydata = "select * from patient_canteen_order WHERE Patient_Id = $patient_id "
                        . "AND Treatment_id = $treatment_id";
                $result = mysqli_query($conn, $dislpaydata);
                if(mysqli_num_rows($result)>0)
                {
                    while ($row = mysqli_fetch_assoc($result)) 
                    {
                ?>
                <tr>
                    <form method="POST" autocomplete="off">
                        <td><?php echo $row["order_id"];?></td>
                        <td><?php echo $row["Order_Date"];?></td>
                        <td><?php echo $row["Description1"];?></td>
                        <td><?php echo $row["Quantity1"];?></td>
                        <td><?php echo $row["Description2"];?></td>
                        <td><?php echo $row["Quantity2"];?></td>
                        <td><?php echo $row["Description3"];?></td>
                        <td><?php echo $row["Quantity3"];?></td>
                        <td><?php echo $row["Order_Amount"];?></td>
                        <td><a href="canteen_order_update.php?Update=<?php echo $row["order_id"];?>&admin_name=<?php echo $login_name;?>&treatment_id=<?php echo $treatment_id;?>"
                               class="btn btn-primary">Update</a><br><br>
                        </td>             
                        <td><a href="canteen_order_delete.php?Delete=<?php echo $row["order_id"];?>&admin_name=<?php echo $login_name;?>&treatment_id=<?php echo $treatment_id;?>"
                               class="btn btn-primary">Delete</a><br><br>
                        </td>
                    </form>
                </tr>
              <?php
                    }
                }
              ?>
            </table>
        </div> 
      </div>
    </section>  
  <br>

<!-- Canteen Modal -->
    <div class="modal fade" id="modalAppointmen" tabindex="-1" role="dialog" aria-labelledby="modalAppointmentLabel" aria-hidden="true">
      <div class="modal-dialog " role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalAppointmentLabel">Create Order</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
              <form action="order.php" autocomplete="off" method="POST">
                   <input type="hidden" value="<?php echo $login_name;?>" name="admin_name">
                   <input type="hidden" value="<?php echo $treatment_id;?>" name="treatment_id">
                   <input type="hidden" value="<?php echo $patient_id;?>" name="patientid">
                <div class="form-group">
                    <label for="orderdate" class="text-black">Order Date</label>
                    <input type="date" class="form-control" name="orderdate" required=""/>
                </div>
                <div class="form-group">
                    <label for="itemid1" class="text-black">Food Item 1</label>
                    <select class="form-control" name="itemid1" id="itemid1" required="">
                        <option value="" disabled="" selected="" hidden="">
                            Select Food
                        </option>                        
                        <?php
                        $foodname = "SELECT * FROM canteen_menu";
                        $result_food = mysqli_query($conn, $foodname);
                        if(mysqli_num_rows($result_food) > 0)
                        {
                            while($dr_row = mysqli_fetch_assoc($result_food))
                            {
                        ?>
                        <option value="<?php echo $dr_row["Food_Item_Id"];?>">
                            <?php echo $dr_row["Food_Item_Name"]." (".$dr_row["Food_Item_Charges"].")";?>
                        </option>
                        <?php
                            }
                        }
                        ?>
                    </select>                    
                </div>
                <div class="form-group">
                    <label for="quantity1" class="text-black">Quantity 1</label>
                    <input type="number" class="form-control" name="quantity1" required="">
                </div>    
                <div class="form-group">
                    <label for="itemid2" class="text-black">Food Item 2</label>
                    <select class="form-control" name="itemid2" id="itemid2" required="">
                        <option value="" disabled="" selected="" hidden="">
                            Select Food
                        </option>
                        <?php
                        $foodname = "SELECT * FROM canteen_menu";
                        $result_food = mysqli_query($conn, $foodname);
                        if(mysqli_num_rows($result_food) > 0)
                        {
                            while($dr_row = mysqli_fetch_assoc($result_food))
                            {
                        ?>
                        <option value="<?php echo $dr_row["Food_Item_Id"];?>">
                            <?php echo $dr_row["Food_Item_Name"]." (".$dr_row["Food_Item_Charges"].")";?>
                        </option>
                        <?php
                            }
                        }
                        ?>
                    </select>                    
                </div>                
                <div class="form-group">
                    <label for="quantity2" class="text-black">Quantity 2</label>
                    <input type="number" class="form-control" name="quantity2" required=""/>
                </div>
                <div class="form-group">
                    <label for="itemid3" class="text-black">Food Item 3</label>
                    <select class="form-control" name="itemid3" id="itemid3" required="">
                        <option value="" disabled="" selected="" hidden="">
                            Select Food
                        </option>                        
                        <?php
                        $foodname = "SELECT * FROM canteen_menu";
                        $result_food = mysqli_query($conn, $foodname);
                        if(mysqli_num_rows($result_food) > 0)
                        {
                            while($dr_row = mysqli_fetch_assoc($result_food))
                            {
                        ?>
                        <option value="<?php echo $dr_row["Food_Item_Id"];?>">
                            <?php echo $dr_row["Food_Item_Name"]." (".$dr_row["Food_Item_Charges"].")";?>
                        </option>
                        <?php
                            }
                        }
                        ?>
                    </select>                    
                </div>
                <div class="form-group">
                    <label for="quantity3" class="text-black">Quantity 3</label>
                    <input type="number" class="form-control" name="quantity3" required=""/>
                </div>   
          </div>
          <div class="form-group">
            <input type="submit" value="Create Order" class="btn btn-primary" href="canteen_order_display.php">
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