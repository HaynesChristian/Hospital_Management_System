<!DOCTYPE html>
<?php 
$con_servername = "localhost";
$con_username = "root";
$con_password = "";
$database = "hospital_management_system";

$connection = mysqli_connect($con_servername, $con_username, $con_password, $database);
if($_GET)
{   
    $login_name=$_GET["admin_name"];
}?>
<html lang="en">
  <head>
    <title>Stock</title>
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
    
   <meta name="viewport" content="width=device-width, initial-scale=1">
        <style>
        * {
          box-sizing: border-box;
        }

        #myInput {
          background-image: url('images/searchicon.png');
          background-position: 10px 10px;
          background-repeat: no-repeat;
          width: 100%;
          font-size: 16px;
          padding: 12px 20px 12px 40px;
          border: 1px solid #ddd;
          margin-bottom: 12px;
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
            <p class="breadcrumbs"><span class="mr-2"><a href="index.php?admin_name=<?php echo $login_name;?>">Home</a></span> <span class="mr-2"><a href="departments.php?admin_name=<?php echo $login_name;?>">Departments</a></span> <span>Stock</span></p>
            <h1 class="mb-3 bread">Return Stock</h1>
          </div>
        </div>
      </div>
    </div>

    <center>
        <a href="" data-toggle="modal" data-target="#modalReturnStock">
            <input type="submit" class="btn btn-primary" value="Return Stock" 
               style="margin-top: 2%">
        </a>
    </center>
    
    <section class="ftco-section ftco-degree-bg">
      <div class="container">
        <div class="row">
          <div class="col-md-8 ftco-animate">
              <table border="0" style="padding: 2%" id="myTable" class="table table-striped">
                  <div class="sidebar-box">
                    <form action="#" class="search-form">
                          <div>
                              <input type="text"  id="myInput" onkeyup="myFunction()" class="form-control" placeholder="Search by Item Name">
                          </div>
                    </form>
                  </div>
                  
                  <tr style="text-align: center">
                     
                       
                       <th>Item Name</th>
                       <th>Item Type</th>
                       <th>Item Description</th>
                       <th>Return Date</th>
                       <th>Return Quantity</th>
                       <th>Uom</th>
                       <th>Rate</th> 
                       <th>Value</th>
                       <th>Action</th>
                       
                   </tr>
    
                    <?php
                    $dislpaydata = "select * from item_master,return_stock "
                            . "where item_master.Item_Code = return_stock.Item_Code "
                            . "ORDER BY Return_Quantity_Id DESC";
                    $result = mysqli_query($connection, $dislpaydata);
                    if(mysqli_num_rows($result) > 0)
                    {
                        while ($row = mysqli_fetch_assoc($result)) 
                                {
                    ?>
                    <tr style="text-align: center">
                      <form method="POST" autocomplete="off">

                        
                        <td><?php echo $row["Item_Name"];?></td>
                        <td><?php echo $row["Item_Type"];?></td>
                        <td><?php echo $row["Item_Description"];?></td>
                        <td><?php echo $row["Return_Date"];?></td>
                        <td><?php echo $row["Return_Quantity"];?></td>
                        <td><?php echo $row["Uom"];?></td>
                        <td><?php echo $row["Rate"];?></td>
                        <td><?php echo $row["Value"];?></td>
                        <td>
                            
                            <a href="ShowUpdate_ReturnStock.php?ReturnQuantityId=<?php echo $row["Return_Quantity_Id"];?>&admin_name=<?php echo $login_name;?>"
                                 class="btn btn-primary">
                                Update
                            </a>     
                         </td>
    
                      </form>
                     </tr>
                  <?php
                                }
                    }
                    ?>

                </table>

          </div> <!-- .col-md-8 -->
          <div class="col-md-4 sidebar ftco-animate">
            
            <div class="sidebar-box ftco-animate">
              <div class="categories">
                <h3>Categories</h3>
               
                <li><a href="department-stock.php?admin_name=<?php echo $login_name;?>">Item Master
                        <span>
                            (<?php
                                $search = "SELECT COUNT(*) FROM item_master";
                                   $result = mysqli_query($connection, $search);
                                   if(mysqli_num_rows($result)>0)
                                   {
                                       while ($row = mysqli_fetch_assoc($result)) 
                                          {
                                                echo $row['COUNT(*)'];
                                          }
                                   }
                                   else
                                   {
                                       echo 0;
                                   }
                               ?>)
                       </span></a></li>
                       <li><a href="department-issueStock.php?admin_name=<?php echo $login_name;?>">Issue Stock 
                        <span>
                            (<?php
                                $search = "SELECT COUNT(*) FROM issue_stock";
                                   $result = mysqli_query($connection, $search);
                                   if(mysqli_num_rows($result)>0)
                                   {
                                       while ($row = mysqli_fetch_assoc($result)) 
                                          {
                                                echo $row['COUNT(*)'];
                                          }
                                   }
                                   else
                                   {
                                       echo 0;
                                   }
                               ?>)
                       </span></a></li>
                  <li><a href="department-returnStock.php?admin_name=<?php echo $login_name;?>">Return Stock 
                        <span>
                            (<?php
                                $search = "SELECT COUNT(*) FROM return_stock";
                                   $result = mysqli_query($connection, $search);
                                   if(mysqli_num_rows($result)>0)
                                   {
                                       while ($row = mysqli_fetch_assoc($result)) 
                                          {
                                                echo $row['COUNT(*)'];
                                          }
                                   }
                                   else
                                   {
                                       echo 0;
                                   }
                               ?>)
                       </span></a></li>
                <li><a href="department-distribution.php?admin_name=<?php echo $login_name;?>">Distribution
                         <span>
                            (<?php
                                $search = "SELECT COUNT(*) FROM distribution_of_item";
                                   $result = mysqli_query($connection, $search);
                                   if(mysqli_num_rows($result)>0)
                                   {
                                       while ($row = mysqli_fetch_assoc($result)) 
                                          {
                                                echo $row['COUNT(*)'];
                                          }
                                   }
                                   else
                                   {
                                       echo 0;
                                   }
                               ?>)
                       </span></a></li>
                <li><a href="department-demolition.php?admin_name=<?php echo $login_name;?>">Demolition Item

                         <span>
                            (<?php
                                $search = "SELECT COUNT(*) FROM demolition_item";
                                   $result = mysqli_query($connection, $search);
                                   if(mysqli_num_rows($result)>0)
                                   {
                                       while ($row = mysqli_fetch_assoc($result)) 
                                          {
                                                echo $row['COUNT(*)'];
                                          }
                                   }
                                   else
                                   {
                                       echo 0;
                                   }
                               ?>)
                       </span></a></li>
                <li><a href="department-maintenance.php?admin_name=<?php echo $login_name;?>">Maintenance
                        <span>
                            (<?php
                                $search = "SELECT COUNT(*) FROM maintenance_of_item";
                                   $result = mysqli_query($connection, $search);
                                   if(mysqli_num_rows($result)>0)
                                   {
                                       while ($row = mysqli_fetch_assoc($result)) 
                                          {
                                                echo $row['COUNT(*)'];
                                          }
                                   }
                                   else
                                   {
                                       echo 0;
                                   }
                               ?>)
                       </span></a></li>                       
              </div>
            </div>

            <div class="sidebar-box ftco-animate">
              <h3>Recent Blog</h3>
              
              <div class="block-21 mb-4 d-flex">
                <a class="blog-img mr-4" style="background-image: url(images/recentOrder.png);"></a>
                <div class="text">
                  <h3 class="heading"><a href="#"> Item Master</a></h3>
                  <div class="meta">
                             <?php
                                $lastData = "SELECT * FROM item_master "
                                                    . "ORDER BY Item_Code DESC LIMIT 1;";
                                   $result = mysqli_query($connection, $lastData);
                                   if(mysqli_num_rows($result)>0)
                                   {
                                       while ($row = mysqli_fetch_assoc($result)) 
                                          {
                              ?>
                                           <div><a href="#"><span class="icon-person"></span>
                                               <?php echo $row['Item_Name'];?>
                                           </a></div>
                                           <div><a href="#"><span class="icon-calendar"></span> 
                                               <?php echo $row['Item_Type'];?>
                                           </a></div>
                                           <div><a href="#"><span class="icon-calendar"></span> 
                                               <?php echo $row['Available_Stock'];?>
                                           </a></div>
                               <?php
                                          }
                                   }
                                   else
                                   {
                                       echo 0;
                                   }
                               ?>
                  </div>
                </div>
              </div>
              <div class="block-21 mb-4 d-flex">
                <a class="blog-img mr-4" style="background-image: url(images/recentOrder.png);"></a>
                <div class="text">
                  <h3 class="heading"><a href="#"> Issue Stock</a></h3>
                  <div class="meta">
                             <?php
                                $lastData = "SELECT * FROM issue_stock,item "
                                        . "where issue_stock.Item_Code = item.Item_Code "
                                        . "ORDER BY issue_Quantity_Id DESC LIMIT 1;";
                                   $result = mysqli_query($connection, $lastData);
                                   if(mysqli_num_rows($result)>0)
                                   {
                                       while ($row = mysqli_fetch_assoc($result)) 
                                          {
                              ?>
                                           <div><a href="#"><span class="icon-person"></span>
                                               <?php echo $row['Item_Name'];?>
                                           </a></div>
                                           <div><a href="#"><span class="icon-calendar"></span> 
                                               <?php echo $row['Issue_Quantity'];?>
                                           </a></div>
                                           <div><a href="#"><span class="icon-chat"></span> 
                                               <?php echo $row['Issue_Date'];?>
                                           </a></div>
                               <?php
                                          }
                                   }
                                   else
                                   {
                                       echo 0;
                                   }
                               ?>
                  </div>
                </div>
              </div>
              <div class="block-21 mb-4 d-flex">
                <a class="blog-img mr-4" style="background-image: url(images/recentOrder.png);"></a>
                <div class="text">
                  <h3 class="heading"><a href="#"> Return Stock</a></h3>
                  <div class="meta">
                             <?php
                                $lastData = "SELECT * FROM return_stock,item "
                                        . "where return_stock.Item_Code = item.Item_Code "
                                        . "ORDER BY Return_Quantity_Id DESC LIMIT 1;";
                                   $result = mysqli_query($connection, $lastData);
                                   if(mysqli_num_rows($result)>0)
                                   {
                                       while ($row = mysqli_fetch_assoc($result)) 
                                          {
                              ?>
                                           <div><a href="#"><span class="icon-person"></span>
                                               <?php echo $row['Item_Name'];?>
                                           </a></div>
                                           <div><a href="#"><span class="icon-calendar"></span> 
                                               <?php echo $row['Return_Quantity'];?>
                                           </a></div>
                                           <div><a href="#"><span class="icon-chat"></span> 
                                               <?php echo $row['Return_Date'];?>
                                           </a></div>
                               <?php
                                          }
                                   }
                                   else
                                   {
                                       echo 0;
                                   }
                               ?>
                  </div>
                </div>
              </div>
              <div class="block-21 mb-4 d-flex">
                <a class="blog-img mr-4" style="background-image: url(images/recentOrder.png);"></a>
                <div class="text">
                  <h3 class="heading"><a href="#">Distribution</a></h3>
                  <div class="meta">
                    <?php
                                $lastData = "SELECT * FROM item,distribution_of_item "
                                                    . "where item.Item_Code = distribution_of_item.Item_Code "
                                                    . "ORDER BY Distribution_Id DESC LIMIT 1;";
                                   $result = mysqli_query($connection, $lastData);
                                   if(mysqli_num_rows($result)>0)
                                   {
                                       while ($row = mysqli_fetch_assoc($result)) 
                                          {
                              ?>
                                           <div><a href="#"><span class="icon-person"></span>
                                               <?php echo $row['Item_Name'];?>
                                           </a></div>
                                           <div><a href="#"><span class="icon-calendar"></span> 
                                               <?php echo $row['Distribution_Date'];?>
                                           </a></div>
                                           <div><a href="#"><span class="icon-calendar"></span> 
                                               <?php echo $row['Item_Receiver'];?>
                                           </a></div>
                               <?php
                                          }
                                   }
                                   else
                                   {
                                       echo 0;
                                   }
                               ?>
                  </div>
                </div>
              </div>
              
              <div class="block-21 mb-4 d-flex">
                <a class="blog-img mr-4" style="background-image: url(images/recentOrder.png);"></a>
                <div class="text">
                  <h3 class="heading"><a href="#">Demolition Item</a></h3>
                  <div class="meta">
                    <?php
                                $lastData = "SELECT * FROM purchase_order,invoice,item "
                                                    . "where purchase_order.Purchase_Id = invoice.Purchase_Id And "
                                                    . "item.Item_Code = purchase_order.Item_Code "
                                                    . "ORDER BY Invoice_No DESC LIMIT 1;";
                                   $result = mysqli_query($connection, $lastData);
                                   if(mysqli_num_rows($result)>0)
                                   {
                                       while ($row = mysqli_fetch_assoc($result)) 
                                          {
                              ?>
                                           <div><a href="#modalRecentInvoice"><span class="icon-person"></span>
                                               <?php echo $row['Item_Name'];?>
                                           </a></div>
                                           <div><a href="#"><span class="icon-calendar"></span> 
                                               <?php echo $row['Invoice_Date'];?>
                                           </a></div>
                                           <div><a href="#"><span class="icon-calendar"></span> 
                                               <?php echo $row['Quantity'];?>
                                           </a></div>
                               <?php
                                          }
                                   }
                                   else
                                   {
                                       echo 0;
                                   }
                               ?>
                  </div>
                </div>
              </div>
              <div class="block-21 mb-4 d-flex">
                <a class="blog-img mr-4" style="background-image: url(images/recentOrder.png);"></a>
                <div class="text">
                  <h3 class="heading"><a href="#"> Maintenance of Item</a></h3>
                  <div class="meta">
                             <?php
                                $lastData = "SELECT * FROM item_master,maintenance_of_item "
                                                    . "where item_master.Item_Code = maintenance_of_item.Item_Code "
                                                    . "ORDER BY Maintenance_Id DESC LIMIT 1;";
                                   $result = mysqli_query($connection, $lastData);
                                   if(mysqli_num_rows($result)>0)
                                   {
                                       while ($row = mysqli_fetch_assoc($result)) 
                                          {
                              ?>
                                           <div><a href="#"><span class="icon-person"></span>
                                               <?php echo $row['Item_Name'];?>
                                           </a></div>
                                           <div><a href="#"><span class="icon-calendar"></span> 
                                               <?php echo $row['Maintenance_Date'];?>
                                           </a></div>
                                           <div><a href="#"><span class="icon-calendar"></span> 
                                               <?php echo $row['Status_Of_Item'];?>
                                           </a></div>
                               <?php
                                          }
                                   }
                                   else
                                   {
                                       echo 0;
                                   }
                               ?>
                  </div>
                </div>
              </div>
              
            </div>
              
          </div>

        </div>
      </div>
    </section> <!-- .section -->

	
    
  <!-- Receive Stock Modal -->
    <div class="modal fade" id="modalReturnStock" tabindex="-1" 
         role="dialog" aria-labelledby="modalAppointmentLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalAppointmentLabel">Return Stock</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
              <form action="Return-stock.php" method="POST" enctype="multipart/form-data" autocomplete="off">
              
              <div class="form-group">
                <label for="Doctor_name" class="text-black">Item Name</label>
                <select class="form-control" id="itemName" name="ItemName" required="">
                        <?php
                        $dislpaydata = "select * from item_master";
                        $result = mysqli_query($connection, $dislpaydata);
                        if(mysqli_num_rows($result)>0)
                        {
                            while ($row = mysqli_fetch_assoc($result)) 
                                    {
                        ?>
                       
                          <option value="<?php echo $row["Item_Code"];?>">
                                  <?php echo $row["Item_Name"];?></option>

                        <?php
                                    }
                        }
                        ?>
                   </select>
                <input type="hidden" name="admin_name" value="<?php echo $login_name;?>"
              </div>
                  <div class="form-group">
                  <label for="Doctor_name" class="text-black">Item Type</label><br>
                      <input type="radio" id="itemType" name="itemType" value="Consumable" required=""> Consumable
                <input type="radio" id="itemType" name="itemType" value="Non Consumable" required=""> Non Consumable
               
              </div>
              
              <div class="form-group">
                <label for="Doctor_name" class="text-black">Description</label>
                <input type="text" class="form-control" id="itemDesc" name="itemDesc" required="">
              </div>
             
              <div class="form-group">
                  <label for="Doctor_name" class="text-black"> Return Quantity</label><br>
                  <input type="number"  class="form-control" id="returnQty" name="returnQty" required="">
              </div>
                  <div class="form-group">
                  <label for="Doctor_name" class="text-black">Uom</label><br>
                 <input type="radio" id="uom" name="uom" value="Nos" required=""> Nos
                <input type="radio" id="uom" name="uom" value="unit" required=""> Unit
                <input type="radio" id="uom" name="uom" value="kg" required=""> Kg
              </div>
             
                  <div class="form-group">
                <label for="Doctor_name" class="text-black">Rate</label>
                <input type="number" class="form-control" id="rate" name="rate" required="">
              </div>
                
                  
                            
              <div class="form-group">
                <input type="submit" value="Submit Details" class="btn btn-primary">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  
    <!-- Supplier Update Modal --> 
   <div class="modal fade" id="modalDocView" 
         role="dialog" aria-labelledby="modalDoctorviewLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalDoctorviewLabel">Doctor Details</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">    
              <?php
                    $dislpaydata = "select * from supplier_master where Supplier_Id = $supid";
                    $result = mysqli_query($connection, $dislpaydata);
                    if(mysqli_num_rows($result) > 0)
                    {
                        while ($dr_row = mysqli_fetch_assoc($result)) 
                                {
               ?>
              <form action="supplier_update.php" method="POST" enctype="multipart/form-data">
              <div class="form-group">
                <label for="Doctor_name" class="text-black">Name</label>
                <input type="text" class="form-control" id="name" 
                       name="name" value="<?php echo $dr_row["Supplier_Name"];?>">
                <input type="hidden" name="Supplier_Id" value="<?php echo $supid;?>"
              </div>
              <div class="form-group">
                <label for="Doctor_contactNo" class="text-black">Email Id</label>
                <input type="email" class="form-control"
                       id="mail" name="mail" value="<?php echo $dr_row["Supplier_Email"];?>">
              </div>
              <div class="form-group">
                <label for="Doctor_address" class="text-black">Mobile Number</label>
                <input type="tel" class="form-control"
                       id="mobile" name="mobile" value="<?php echo $dr_row["Supplier_MobileNo"];?>">
              </div>                
              <div class="form-group">
                <label for="Doctor_email" class="text-black">Address</label>
                 <textarea name="address" id="address" 
                          class="form-control" cols="30" rows="10">
                    <?php echo trim($dr_row["Supplier_Address"]);?>
                </textarea>
              </div>
              <div class="form-group">
                  <label for="Doctor_qualification" class="text-black">Type</label><br>
                <?php 
                if($dr_row["Supplier_Type"]=="Material")
                {
                ?>
                <input type="radio" id="type" name="type" 
                       value="Material" checked=""> Material
                <input type="radio" id="type" name="type" 
                       value="Equipment" > Equipment
                <input type="radio" id="type" name="type" 
                       value="Inventory" > Inventory
                 <?php
                }
                else if($dr_row["Supplier_Type"]=="Equipment")
                {
                ?>
                <input type="radio" id="type" name="type" 
                       value="Material" > Material
                <input type="radio" id="type" name="type" 
                       value="Equipment" checked="" > Equipment
                <input type="radio" id="type" name="type" 
                       value="Inventory" > Inventory
                <?php
                }
                else
                {
                ?>
                <input type="radio" id="type" name="type" 
                       value="Material" > Material
                <input type="radio" id="type" name="type" 
                       value="Equipment" > Equipment
                <input type="radio" id="type" name="type" 
                       value="Inventory" checked=""> Inventory
                <?php
                }
                ?>
              </div>
              <div class="form-group">
                <label for="Doctor_speciality" class="text-black">GST No.</label>
                <input type="text" class="form-control" id="gstno"
                       name="gstno" value="<?php echo $dr_row["Supplier_Gst_No"];?>">
              </div>
                  <div class="form-group">
                <label for="Doctor_speciality" class="text-black">Account Number</label>
                <input type="text" class="form-control" id="accno"
                       name="accno" value="<?php echo $dr_row["Supplier_Account_No"];?>">
              </div>
                  <div class="form-group">
                <label for="Doctor_speciality" class="text-black">IFSC Code</label>
                <input type="text" class="form-control" id="ifscCode"
                       name="ifscCode" value="<?php echo $dr_row["Supplier_Ifsc_Code"];?>">
              </div>
                  <div class="form-group">
                <label for="Doctor_speciality" class="text-black">Account Holder Name</label>
                <input type="text" class="form-control" id="accountHolderName"
                       name="accountHolderName" value="<?php echo $dr_row["Supplier_AccountHolder_Name"];?>">
              </div>
              
              <div class="form-group">
                <input type="submit" value="Update Supplier Details" class="btn btn-primary">
              </div>                  
            </form>
            <?php
                }
            }         
            ?>          
          </div>
        </div>
     
  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>

  <!-- Modal -->
    <div class="modal fade" id="modalAppointment" tabindex="-1" role="dialog" aria-labelledby="modalAppointmentLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalAppointmentLabel">Appointment</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="#">
              <div class="form-group">
                <label for="appointment_name" class="text-black">Full Name</label>
                <input type="text" class="form-control" id="appointment_name">
              </div>
              <div class="form-group">
                <label for="appointment_email" class="text-black">Email</label>
                <input type="text" class="form-control" id="appointment_email">
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="appointment_date" class="text-black">Date</label>
                    <input type="text" class="form-control" id="appointment_date">
                  </div>    
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="appointment_time" class="text-black">Time</label>
                    <input type="text" class="form-control" id="appointment_time">
                  </div>
                </div>
              </div>
              

              <div class="form-group">
                <label for="appointment_message" class="text-black">Message</label>
                <textarea name="" id="appointment_message" class="form-control" cols="30" rows="10"></textarea>
              </div>
              <div class="form-group">
                <input type="submit" value="Send Message" class="btn btn-primary">
              </div>
            </form>
          </div>
          
        </div>
      </div>
    </div>
  
       
  <script>
     function searchFunction()
     {
         var input, filter, sc, btn, i, bt, txtvalue;
         input = document.getElementById("myInput").value;
         alert(input);
         filter = input.toLowerCase();
         row = document.getElementById("myRow");
         btn = document.getElementsByTagName("td");
//         alert(btn[0].innerText);
         
         for(i=0; btn.length > 0; i++)
         {
             bt = btn[i].innerText;
             if(bt.startWith(filter))
             {
                 btn[i].style.display = "";
             }
             else
             {
                 btn[i].style.display = "none";
             }
         }
     }
     function myFunction()
     {
             var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("myInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("myTable");
            tr = table.getElementsByTagName("tr");
            for (i = 0; i < tr.length; i++) 
            {
              td = tr[i].getElementsByTagName("td")[0];
              if (td) 
              {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                  tr[i].style.display = "";
                } else {
                  tr[i].style.display = "none";
                }
              }       
            }
        }
    
  </script>
<script>
      function checkapt_date()
      {
            var selectedText = document.getElementById('warrantyDate').value;
            var selectedDate = new Date(selectedText);
            var now = new Date();
            var dt1 = Date.parse(now),
            dt2 = Date.parse(selectedDate);
            if (dt2 < dt1) 
            {
                alert("Date must be in the future ");
                document.getElementById('warrantyDate').value = now.toISOString().split('T')[0];;
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