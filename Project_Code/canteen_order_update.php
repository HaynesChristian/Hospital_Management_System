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
          <li class="nav-item "><a href="staff.php?admin_name=<?php echo $login_name;?>" class="nav-link">Staff</a></li>
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
            <p>
                <span class="mr-2">
                    <a href="index.php?admin_name=<?php echo $login_name;?>">Home</a>
                </span>
                <span>Canteen Order Update</span>
            </p>
            <h1 class="mb-3 bread">Canteen Order Update</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section bg-light">
      <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 heading-section ftco-animate text-center">
            <h2 class="mb-4">Canteen Order Details</h2>
          </div>
        </div>
        <div class="row d-flex justify-content-center">
            <form method="POST" action="orderupdatesave.php">
                <input type="hidden" value="<?php echo $login_name;?>" name="admin_name">    
              <table border="0" class="table table-striped" style="width:100%;">
                <?php
                    $id=$_GET['Update'];
                    $treatment_id = $_GET["treatment_id"];
                    $displaydata = "select * from patient_canteen_order where order_id=$id";
                    $result = mysqli_query($connection, $displaydata);
                    if(mysqli_num_rows($result)>0)
                    {
                        while ($employee_row = mysqli_fetch_assoc($result)) 
                        {
                ?>
                  <input type="hidden" name="npatientid" class="form-control"
                         value="<?php echo $employee_row["Patient_Id"]?>">
                  <input type="hidden" value="<?php echo $treatment_id;?>" name="treatment_id">
                <tbody>
                    <tr>      
                        <td>
                            <div class="form-group">
                              <label for="orderid" class="text-black">Order id</label>
                              <input type="number" name="orderid" class="form-control" 
                                     required="" readonly=""
                                     value="<?php echo $employee_row["order_id"]?>">
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                              <label for="orderdate" class="text-black">Order Date</label>
                              <input type="date" name="orderdate" class="form-control" 
                                     required="" 
                                     value="<?php echo $employee_row["Order_Date"]?>">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="form-group">
                              <input type="hidden" name="itemid1" class="form-control" 
                                     value="<?php echo $employee_row["Item_Id1"]?>">                                
                              <label for="food" class="text-black">Food Name 1</label>
                                <select class="form-control" name="food" id="food">                        
                                    <?php
                                    $foodname = "SELECT * FROM canteen_menu";
                                    $result_food = mysqli_query($connection, $foodname);
                                    if(mysqli_num_rows($result_food) > 0)
                                    {
                                        while($dr_row = mysqli_fetch_assoc($result_food))
                                        {
                                    ?>
                                    <option value="<?php echo $dr_row["Food_Item_Name"];?>"
                                            <?php if($dr_row["Food_Item_Name"] == $employee_row["Description1"])
                                            {echo "selected='selected'";}?>>
                                        <?php echo $dr_row["Food_Item_Name"];?>
                                    <span id="foodcharge1"> (<?php echo $dr_row["Food_Item_Charges"];?>) </span>
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
                              <label for="quantity1" class="text-black">Food Quantity 1</label>
                              <input type="number" name="quantity1" class="form-control" id="quantity1"
                                     required="" value="<?php echo $employee_row["Quantity1"]?>">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="form-group">
                              <input type="hidden" name="itemid2" class="form-control" 
                                     value="<?php echo $employee_row["Item_Id2"]?>">                                
                              <label for="food2" class="text-black">Food Name 2</label>
                                <select class="form-control" name="food2" id="food">                        
                                    <?php
                                    $foodname = "SELECT * FROM canteen_menu";
                                    $result_food = mysqli_query($connection, $foodname);
                                    if(mysqli_num_rows($result_food) > 0)
                                    {
                                        while($dr_row = mysqli_fetch_assoc($result_food))
                                        {
                                    ?>
                                    <option value="<?php echo $dr_row["Food_Item_Name"];?>"
                                            <?php if($dr_row["Food_Item_Name"] == $employee_row["Description2"])
                                            {echo "selected='selected'";}?>>
                                        <?php echo $dr_row["Food_Item_Name"];?>
                                        <span id="foodcharge2"> (<?php echo $dr_row["Food_Item_Charges"];?>) </span>
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
                              <label for="quantity2" class="text-black">Food Quantity 2</label>
                              <input type="number" name="quantity2" class="form-control" id="quantity2" 
                                     required="" value="<?php echo $employee_row["Quantity2"]?>">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="form-group">
                              <input type="hidden" name="itemid3" class="form-control" 
                                     value="<?php echo $employee_row["Item_Id3"]?>">                                
                              <label for="food3" class="text-black">Description3</label>
                                <select class="form-control" name="food3" id="food">                        
                                    <?php
                                    $foodname = "SELECT * FROM canteen_menu";
                                    $result_food = mysqli_query($connection, $foodname);
                                    if(mysqli_num_rows($result_food) > 0)
                                    {
                                        while($dr_row = mysqli_fetch_assoc($result_food))
                                        {
                                    ?>
                                    <option value="<?php echo $dr_row["Food_Item_Name"];?>"
                                            <?php if($dr_row["Food_Item_Name"] == $employee_row["Description3"]){echo "selected='selected'";}?>>
                                        <?php echo $dr_row["Food_Item_Name"];?>
                                    <span id="foodcharge3"> (<?php echo $dr_row["Food_Item_Charges"];?>) </span>
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
                              <label for="quantity3" class="text-black">Quantity3</label>
                              <input type="number" name="quantity3" class="form-control" id="quantity3"
                                     required="" value="<?php echo $employee_row["Quantity3"]?>">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">                        
                            <div class="form-group">
                            <label for="orderamount" class="text-black">Order_Amount</label>
                            <input type="number" name="orderamount" class="form-control" readonly="" id="order_amt"
                                    placeholder="<?php echo $employee_row["Order_Amount"]?>" onclick="calculate_amount()"> 
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
                <input type="submit" value="Update" class="btn btn-primary">
              </div> 
                </center>
          </form>

        </div> 
      </div>
    </section>
    
  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>

  <script>
      function calculate_amount()
      {
          //alert("hi");
          var f1 = document.getElementById("foodcharge1").value;
          
          var f2 = document.getElementById("foodcharge2").value;
          var f3 = document.getElementById("foodcharge3").value;
          var q1 = document.getElementById("quantity1").value;
          var q2 = document.getElementById("quantity2").value;
          var q3 = document.getElementById("quantity3").value;
          
          var amt1 = parseInt(f1)*parseInt(q1);
          var amt2 = parseInt(f2)*parseInt(q2);
          var amt3 = parseInt(f3)*parseInt(q3);
          var total = parseInt(amt1) + parseInt(amt2) + parseInt(amt3);
          document.getElementById("order_amt").value = total;
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