<?php
$con_servername = "localhost";
$con_username = "root";
$con_password = "";
$database = "hospital_management_system";

$connection = mysqli_connect($con_servername, $con_username, $con_password, $database);
$vno = $_GET["vno"];
if($_GET)
{
    $login_name=$_GET["admin_name"];
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Update Income expense</title>
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
          <li class="nav-item">
              <a href="index.php?admin_name=<?php echo $login_name;?>" class="nav-link">Home</a>
          </li>      
          <li class="nav-item"><a href="staff.php?admin_name=<?php echo $login_name;?>" class="nav-link">Staff</a></li>
          <li class="nav-item active"><a href="departments.php?admin_name=<?php echo $login_name;?>" class="nav-link">Departments</a></li>
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
                <span class="mr-2"><a href="incomeexpense1.php?admin_name=<?php echo $login_name;?>">Transactions</a></span> 
            </p>
            <h1 class="mb-3 bread">Update Income Details</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section ftco-degree-bg">
      <div class="container">
          <form method="POST" action="save_income_expense.php"  enctype="multipart/form-data">
              <input type="hidden" value="<?php echo $login_name;?>" name="admin_name">
              <table border="0" class="table table-striped" style="width:100%;">
                <?php
                $displaydata_acc = "SELECT * FROM incomeexpense WHERE Voucher_no = $vno";
                 $result = mysqli_query($connection, $displaydata_acc);
                      if(mysqli_num_rows($result)>0)
                 {
                     while ($row = mysqli_fetch_assoc($result)) 
                {
                ?>        
                <tbody>
                    <tr>
                       <td>
                           <input type="hidden" name="vno" value="<?php echo $row["Voucher_no"];?>">
                            <label for="Voucher_date" class="text-black">Voucher_date</label>
                            <input type="date" id="Voucher_date" 
                                   name="date" value="<?php echo $row["Voucher_date"];?>">
                        </td>
                        <td>
                            <label for="Account_type" class="text-black">Account_type</label>
                            <input type="text" id="Voucher_date" 
                                   name="type" value="<?php echo $row["Account_type"];?>">
                        </td>                        
                     <tr>
                       <td>
                            <label for="Amount" class="text-black">Amount</label>
                            <input type="hidden" id="Voucher_date" 
                                   name="previous_amt" value="<?php echo $row["Amount"];?>">                            
                            <input type="text" id="Voucher_date" 
                                   name="amt" value="<?php echo $row["Amount"];?>">
                        </td>                         
                        <td>
                            <label for="Description" class="text-black">Description</label>
                            <input type="text" id="Description" 
                                   name="des" value="<?php echo $row["Description"];?>">
                        </td>                        
                    </tr>
                     <tr>
                       <td>
                           <label for="Mode" class="text-black">Payment mode</label><br>
                           <input type="radio" id="Mode" name="mode" value="bank" onclick="showbank()" required=""
                                  <?php if($row["Mode"] == 'bank') {echo "checked='checked'";}?>> bank 
                           <input type="radio" id="Mode" name="mode" value="cash" onclick="showcash()" required=""
                                  <?php if($row["Mode"] == 'cash') {echo "checked='checked'";}?>> cash 
                           <input type="radio" id="Mode" name="mode" value="other" onclick="showonline()" required=""
                                  <?php if($row["Mode"] == 'other') {echo "checked='checked'";}?>> other 
                       </td>                         
                       <td style="display:none" id="bank_name">
                            <label for="Bank_Name" class="text-black">Bank_Name</label>
                            <input type="text" id="Voucher_date" 
                                   name="bname" value="<?php echo $row["Bank_Name"];?>">
                        </td>
                     </tr>
                     <tr style="display:none" id="branch_name">
                         <td>
                            <label for="Branch_Name" class="text-black">Branch_Name</label>
                            <input type="text" id="Voucher_date" 
                                   name="brname" value="<?php echo $row["Branch_Name"];?>">
                        </td>
                        <td id="ifsc_code">
                            <label for="IFSC_Code" class="text-black">IFSC_Code</label>
                            <input type="text" id="Doctor_email"
                                   name="ifsc" value="<?php echo $row["IFSC_Code"];?>">
                        </td>                        
                    </tr>
                    <tr style="display:none" id="account_no">
                        <td>
                            <label for="Account_No" class="text-black">Account no</label>
                            <input type="text" id="Doctor_email"
                                   name="acc" value="<?php echo $row["Account_No"];?>">
                        </td>
                        <td id="cheque_no">
                            <label for="Cheque_NO" class="text-black">Cheque no</label>
                            <input type="text" id="Doctor_email"
                                   name="cno" value="<?php echo $row["Cheque_NO"];?>">
                        </td>                        
                    </tr>

            </tbody>
                <?php
                    }
                }
                ?>
            </table>
              <button formaction="save_income_expense.php" name="save" value="<?php echo $row["Voucher_no"];?>" class="btn btn-primary"> 
                  Save 
               </button>
          </form>
      </div>
            <script>
   
    function showbank()
    {
        //document.getElementById('online').style.display = 'none';
        document.getElementById('bank_name').style.display = '';
        document.getElementById('branch_name').style.display = '';
        document.getElementById('ifsc_code').style.display = '';
        document.getElementById('account_no').style.display = '';
        document.getElementById('cheque_no').style.display = '';
        
    }
    
    function showonline()
    {
        document.getElementById('bank_name').style.display = '';
        document.getElementById('branch_name').style.display = '';
        document.getElementById('ifsc_code').style.display = '';
        document.getElementById('account_no').style.display = '';
        document.getElementById('cheque_no').style.display = 'none';    
    }    
     function showcash()
    {
        document.getElementById('bank_name').style.display = 'none';
        document.getElementById('branch_name').style.display = 'none';
        document.getElementById('ifsc_code').style.display = 'none';
        document.getElementById('account_no').style.display = 'none';
        document.getElementById('cheque_no').style.display = 'none';
    }    
    
  </script>
  

        
    </section> <!-- .section -->

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


    <script>
    function readURL(input)
    {
        if (input.files && input.files[0]) 
        {
            var reader = new FileReader();

            reader.onload = function (e) 
            {
                $('#docpic')
                    .attr('src', e.target.result)
                    .width(150)
                    .height(150);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
    
//    function showindoor()
//    {
//        document.getElementById('outdoor').style.display = 'none';
//        document.getElementById('indoor').style.display = 'block';
//    }
//    
//    function showoutdoor()
//    {
//        document.getElementById('outdoor').style.display = 'block';
//        document.getElementById('indoor').style.display = 'none';
//    }      
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