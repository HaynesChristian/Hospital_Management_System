<!DOCTYPE html>
<?php 
$con_servername = "localhost";
$con_username = "root";
$con_password = "";
$database = "hospital_management_system";

$connection = mysqli_connect($con_servername, $con_username, $con_password, $database);
$PurchaseId = $_GET["PurchaseId"];
if($_GET)
{   
    $login_name=$_GET["admin_name"];
}
?>
<html lang="en">
  <head>
    <title>Print Purchase Order</title>
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
h1 {
   width: 100%; 
   text-align: center; 
   border-bottom: 5px solid #000; 
   line-height: 0.5em;
    
} 

h1 span { 
    background:#fff; 
    padding:0 10px; 
}            
        </style>
        <script>
//            function staffreport()
//            {
//                window.print();
//            }
            function staffreportcancel()
            {
                window.location.href = "department-purchaseOrder.php";
            }
        </script>
  </head>
  <body>
    
 
   <section class="ftco-section">
    	<div class="container">
            <div class="row d-flex">
               <body onload="staffreport()" onafterprint="staffreportcancel()">
  <body style="text-align: center; padding: 2%">
        <img style="width: 15%; height: 15%;" src="images/tattvam_banner.jpg" align="right"/>
        <h1><span>Tattvam Hospital</span></h1><br>
        
        <div>
         <b>Purchase Date : <?php echo date("d/m/Y");?></b><br><br>
         </div>
        <div style="text-align: center; margin-left: 60%">
            <table border="1" align="center">
                <tbody>
                    <tr>
                         <h2><b>Purchase Order</b><br></h2>
                    </tr>
                    <tr>
                    <div style="text-align: left">
                        
                        <b>PO No : <?php
                                $search = "SELECT * FROM purchase_order,item "
                        . "WHERE purchase_order.Purchase_Id = $PurchaseId And "
                            . "item.Item_Code = purchase_order.Item_Code ";
                                   $result = mysqli_query($connection, $search);
                                   if(mysqli_num_rows($result)>0)
                                   {
                                       while ($row = mysqli_fetch_assoc($result)) 
                                          {
                                                echo $row["Purchase_Id"];
                                          }
                                   }
                                   else
                                   {
                                       echo 0;
                                   }
                               ?></b>
                    </div>
                    </tr>
                    <tr>
                    <div style="text-align: left">
                        <b>Purchase Date : <?php echo date("d/m/Y");?></b><br><br>
                    </div>
                        
                    </tr>
                    
                 </tbody>
            </table>
        </div>
         <div class="col-md-8 ftco-animate">
              <table border="0" style="padding: 2%" class="table table-striped">
                    
                  <tr style="text-align: center">
                       <th>Item Name</th> 
                       <th>Description</th>
                       <th>Purchase Quantity</th>
                       <th>Unit Price</th> 
                       <th>Total Amount</th> 
                  </tr>
                      
                   <?php
                    $dislpaydata = "SELECT * FROM purchase_order,item "
                        . "WHERE purchase_order.Purchase_Id = $PurchaseId And "
                            . "item.Item_Code = purchase_order.Item_Code ";
                    $result = mysqli_query($connection, $dislpaydata);
                    if(mysqli_num_rows($result)>0)
                    {
                        while ($row = mysqli_fetch_assoc($result)) 
                                {
                    ?>
                   
                    <tr style="text-align: center">
                    <form method="POST" autocomplete="off">
                        <td><?php echo $row["Item_Name"];?></td>
                        <td><?php echo $row["Description"];?></td>
                        <td><?php echo $row["Purchase_Quantity"];?></td>
                        <td><?php echo $row["Unit_Price"];?></td>
                        <td><?php echo $row["Total_Amount"];?></td>
                        
                    </form>
                    
                    </tr>
                    <?php
                                  }
                      }
                      ?>
                    <tr>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th>Order Total</th> 
                        <th><?php
                                $search = "SELECT SUM(Total_Amount) FROM purchase_order,item "
                                        . "WHERE purchase_order.Purchase_Id = $PurchaseId And "
                                        . "item.Item_Code = purchase_order.Item_Code ";
                                   $result = mysqli_query($connection, $search);
                                   if(mysqli_num_rows($result)>0)
                                   {
                                       while ($row = mysqli_fetch_assoc($result)) 
                                          {
                                                echo $row['SUM(Total_Amount)'];
                                          }
                                   }
                                   else
                                   {
                                       echo 0;
                                   }
                               ?></th>
                    </tr>
                </table>

          </div>
                 
    </body>
    		</div>
    	</div></div>
    </section>
       
    
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