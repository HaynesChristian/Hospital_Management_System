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
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Income and Expenses</title>
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
          <li class="nav-item active"><a href="departments.php?admin_name=<?php echo $login_name;?>" class="nav-link">Departments</a></li>
          <li class="nav-item"><a href="doctor.php?admin_name=<?php echo $login_name;?>" class="nav-link">Doctors</a></li>
          <li class="nav-item"><a href="patient.php?admin_name=<?php echo $login_name;?>" class="nav-link">Patient</a></li>
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
            <p class="breadcrumbs"><span class="mr-2"><a href="index.php?admin_name=<?php echo $login_name;?>">Home</a></span> <span class="mr-2"><a href="departments.php?admin_name=<?php echo $login_name;?>">Departments</a></span></p>
            <h1 class="mb-3 bread">Report Management</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section ftco-degree-bg">
      <div class="container">
         <div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 heading-section ftco-animate text-center">
            <h2 class="mb-4">Transaction Records</h2>
                 <button class="btn btn-primary" data-toggle="modal" data-target="#modal">
                     Insert Data</button>
                 <button class="btn btn-primary" data-toggle="modal" data-target="#modalApp">
                     Generate Date</button><br><br>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <input type="date" placeholder="Search Record" class="form-control" 
                           id="searchrecord" onchange="Allrecords()">
                    <input type="date" placeholder="Search Income" class="form-control" 
                           id="searchIncome" onchange="AllIncome()" style="display:none">
                    <input type="date" placeholder="Search Expense" class="form-control" 
                           id="searchExpense" onchange="AllExpense()" style="display:none">
                    <input type="date" placeholder="Search Asset" class="form-control" 
                           id="searchAsset" onchange="AllAsset()" style="display:none">
                    <input type="date" placeholder="Search Liability" class="form-control" 
                           id="searchLiability" onchange="AllLiability()" style="display:none">                    
                  </div>    
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                      <select class="form-control" onchange="displayrecordlist()"id="recordtypeselect">
                          <option value="All">All</option>
                          <option value="Income">Income List</option>
                          <option value="Expense">Expense List</option>
                          <option value="Asset">Asset List</option>
                          <option value="Liability">Liability List</option>
                      </select>
                  </div>
                </div>
              </div>
          </div>
        </div>
        <div>
          <div class="ftco-animate row d-flex justify-content-center">
              <h4 id="incomeheader"> INCOME LIST </h4>
              <table class="table table-success" id="incometable">
                       <tr>
                           <th>Voucher Date</th>
                           <th>Description</th>
                           <th>Amount</th>
                           <th></th>
                       </tr>
                        <?php
                        $total_income=0;
                        $dislpaydata = "select * from incomeexpense WHERE Account_type = 'income'";
                        $result = mysqli_query($conn, $dislpaydata);
                        if(mysqli_num_rows($result)>0)
                        {
                            while ($row = mysqli_fetch_assoc($result)) 
                                    {
                                  $total_income += $row["Amount"];
                        ?>
                        <tr>
                            <td><?php echo $row["Voucher_date"];?></td>
                            <td><?php echo $row["Description"];?></td>
                            <td><?php echo $row["Amount"];?></td>
                            <td>
                                <form>
                                    <input type="hidden" value="<?php echo $login_name;?>" name="admin_name">
                                    <button formaction="update_income_expense.php" name="vno" value="<?php echo $row["Voucher_no"];?>" 
                                            class="btn btn-success">Update</button>
                                </form>
                            </td>
                        </tr>
                        <?php
                                    }
                        }
                        ?>
                        <tr>
                            <td colspan="2">Total Income Amount </td>
                            <td><?php echo $total_income;?></td>
                        </tr>
                   </table>
                   <br><br>
                   
              <h4 id="expenseheader"> EXPENSE LIST </h4>
              <table class="table table-warning" id="expensetable">
                       <tr>
                           <th>Voucher Date</th>
                           <th>Description</th>
                           <th>Amount</th>
                           <th colspan="2">Action</th>
                       </tr>
                       
                        <?php
                         $total_expense=0;
                        $dislpaydata = "select * from incomeexpense WHERE Account_type = 'expense'";
                        $result = mysqli_query($conn, $dislpaydata);
                        if(mysqli_num_rows($result)>0)
                        {
                            while ($row = mysqli_fetch_assoc($result)) 
                                    {
                                $total_expense += $row["Amount"];
                        ?>
                        <tr>
                            <td><?php echo $row["Voucher_date"];?></td>
                            <td><?php echo $row["Description"];?></td>
                            <td><?php echo $row["Amount"];?></td>

                            <td>
                                <form>
                                    <input type="hidden" value="<?php echo $login_name;?>" name="admin_name">
                                    <button formaction="update_income_expense.php" name="vno" value="<?php echo $row["Voucher_no"];?>" class="btn btn-warning">Update</button>
                                </form>
                            </td>
                          
                        </tr>
                        <?php
                                    }
                        }
                        ?>
                         <tr>
                                   <td colspan="2">Total Expense Amount </td>
                                   <td><?php echo $total_expense;?></td>
                        </tr>
                   </table>
                   <br><br>
              <h4 id="assetheader"> ASSET LIST </h4>
                   <table class="table table-success" id="assettable">
                       <tr>
                           <th>Voucher Date</th>
                           <th>Description</th>
                           <th>Amount</th>
                           <th colspan="2">Action</th>
                       </tr>
                        <?php
                        $total_asset=0;
                        $dislpaydata = "select * from incomeexpense WHERE Account_type = 'asset'";
                        $result = mysqli_query($conn, $dislpaydata);
                        if(mysqli_num_rows($result)>0)
                        {
                            while ($row = mysqli_fetch_assoc($result)) 
                                    {
                                $total_asset += $row["Amount"];
                        ?>
                        <tr>
                            <td><?php echo $row["Voucher_date"];?></td>
                            <td><?php echo $row["Description"];?></td>
                            <td><?php echo $row["Amount"];?></td>
                            <td>
                                <form>
                                    <input type="hidden" value="<?php echo $login_name;?>" name="admin_name">
                                    <button formaction="update_income_expense.php" name="vno" value="<?php echo $row["Voucher_no"];?>" 
                                            class="btn btn-success">Update</button>
                                </form>
                            </td>
                        </tr>
                        <?php
                                    }
                        }
                        ?>
                         <tr>
                            <td colspan="2">Total Asset Amount </td>
                            <td><?php echo $total_asset;?></td>
                        </tr>
                   </table>
                    <br><br>
                    
              <h4 id="liabilityheader"> LIABILITY LIST </h4>
                    <table class="table table-warning" id="liabilitytable">
                       <tr>
                           <th>Voucher Date</th>
                           <th>Description</th>
                           <th>Amount</th>
                           <th colspan="2">Action</th>
                       </tr>
                        <?php
                        $total_liability=0;
                        $dislpaydata = "select * from incomeexpense WHERE Account_type = 'liability'";
                        $result = mysqli_query($conn, $dislpaydata);
                        if(mysqli_num_rows($result)>0)
                        {
                            while ($row = mysqli_fetch_assoc($result)) 
                                    {
                                 $total_liability += $row["Amount"];
                        ?>
                        <tr>
                            <td><?php echo $row["Voucher_date"];?></td>
                            <td><?php echo $row["Description"];?></td>
                            <td><?php echo $row["Amount"];?></td>
                           <td>
                                <form>
                                    <input type="hidden" value="<?php echo $login_name;?>" name="admin_name">
                                    <button formaction="update_income_expense.php" name="vno" value="<?php echo $row["Voucher_no"];?>" class="btn btn-warning">Update</button>
                                </form>
                            </td>
                           
                        </tr>
                        <?php
                                    }
                        }
                        ?>
                          <tr>
                                   <td colspan="2">Total Liability Amount </td>
                                   <td><?php echo $total_liability;?></td>
                        </tr>
                   </table>
          </div>
        </div> <!-- .col-md-8 -->
      </div>

        </div>
      </div>
    </section> 
    <!-- .section -->
  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>
  
<div class="modal fade" id="modalApp" tabindex="-1" role="dialog" aria-labelledby="modalApp" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalApp">Balance</h5>
            <button type="button" class="close" data-dismiss="modalApp" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
              <form method="post" action="balance_display.php">
            
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="appointment_date" class="text-black">From</label>
                    <input type="date" name="From_Date" class="form-control" id="appointment_fdate" onchange="checkapt_date()" required> 
                  </div>    
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="appointment_date" class="text-black">To</label>
                    <input type="date" name="To_Date" class="form-control" id="appointment_tdate" onchange="checkapt_date()" required>
                  </div>
                </div>
              </div>
              <div class="form-group">
                  <input type="submit" name="search date" class="btn btn-primary" value="Generate Report" 
                style="margin-top: 2%">
              </div>
            </form>
          </div>
          
        </div>
      </div>
    </div>

  <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalAppointmentLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalAppointmentLabel">Income expense</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
              <form action="income_expense.php" method="POST" enctype="multipart/form-data" autocomplete="off">
              <div class="form-group">
                <label for="Voucher_date" class="text-black">Voucher date</label>
                <input type="date" class="form-control" id="Voucher_date" name="date" required>
              </div>
              <div class="form-group">
                <label for="Account_type" class="text-black">Account type</label>
                    
                <select name="type"id="Account_type" class="form-control" required>
                           <option value="" disabled="" selected="" hidden="">
                                          Select Account type
                            </option>
                            <option value="income">income</option>
                            <option value="expense">expense</option>
                            <option value="asset">asset</option>
                           <option value="liability">liability</option>
                       </select>
                
                </div>                
              <div class="form-group">
                <label for="Amount" class="text-black">Amount</label>
                <input type="number" class="form-control" id="Amount" name="amt" required>
              </div>
              <div class="form-group">
                <label for="Description" class="text-black">Description</label>
                <input type="text" class="form-control" id="Description" 
                       name="des" required="">                
              </div>
                          
            
              <div class="form-group">
             <td>   <label for="Mode" class="text-black">Payment mode</label><br>
                <input type="radio" id="Mode" name="mode" 
                       value="bank" onclick="showbank()" required=""> bank
                <input type="radio" id="Mode" name="mode" 
                       value="cash" onclick="showcash()" required=""> cash
                 <input type="radio" id="Mode" name="mode" 
                       value="other" onclick="showonline()" required=""> other
              </div>
              <div id="bank" style="display:none">
                 
                  <div class="form-group">
                      <label for="Bank_Name" class="text-black">Bank_Name</label>
                      <input type="text" class="form-control" id="Doctor_designation" 
                             name="bname">
                  </div>
                   <div class="form-group">
                      <label for="Bank_Name" class="text-black">Branch_Name</label>
                      <input type="text" class="form-control" id="Branch_Name" 
                             name="brname">
                  </div>
                  <div class="form-group">
                      <label for="IFSC_Code" class="text-black">IFSC_Code</label>
                      <input type="text" class="form-control" id="IFSC_Code" 
                             name="ifsc">
                  </div>
                  <div class="form-group">
                      <label for="Account_No" class="text-black">Account_No</label>
                      <input type="number" class="form-control" id="Account_No" 
                             name="acc">
                  </div>
                  <div class="form-group">
                      <label for="Cheque_NO" class="text-black">Cheque_NO</label>
                      <input type="text" class="form-control" id="Cheque_NO" 
                             name="cno">
                  </div>
                 
              </div>
              <div id="online" style="display:none">
                   <div class="form-group">
                      <label for="Bank_Name" class="text-black">Bank_Name</label>
                      <input type="text" class="form-control" id="Doctor_designation" 
                             name="online_bname">
                  </div>
                   <div class="form-group">
                      <label for="Branch_Name" class="text-black">Branch_Name</label>
                      <input type="text" class="form-control" id="Branch_Name" 
                             name="online_brname">
                  </div>
                  <div class="form-group">
                      <label for="IFSC_Code" class="text-black">IFSC_Code</label>
                      <input type="text" class="form-control" id="IFSC_Code" 
                             name="online_ifsc">
                  </div>
                  <div class="form-group">
                      <label for="Account_No" class="text-black">Account_No</label>
                      <input type="number" class="form-control" id="Account_No" 
                             name="online_acc">
                  </div>
              </div>                  
                        
              <div class="form-group">
                <input type="submit" value="Create voucher" class="btn btn-primary">
              </div>
            </form>
          </div>
          
        </div>
      </div>
    </div>
  
    <script> 
    function showbank()
    {
        document.getElementById('online').style.display = 'none';
        document.getElementById('bank').style.display = '';
        
    }
    
    function showonline()
    {
        document.getElementById('online').style.display = '';
        document.getElementById('bank').style.display = 'none';    
    }    
     function showcash()
    {
        document.getElementById('bank').style.display = 'none';
        document.getElementById('online').style.display = 'none';
    }     
  </script>
     <script>
        function Allrecords() 
        {
          var input, filter, tableinc, tableexp , tableast , tableliab , 
                  tr, td, i, txtValue;
          input = document.getElementById("searchrecord");
          filter = input.value.toUpperCase();
          tableinc = document.getElementById("incometable");
          tableexp = document.getElementById("expensetable");
          tableast = document.getElementById("assettable");
          tableliab = document.getElementById("liabilitytable");
          
          tr = tableinc.getElementsByTagName("tr");
          for (i = 0; i < tr.length; i++) 
          {
            td = tr[i].getElementsByTagName("td")[0];
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
          
          tr = tableexp.getElementsByTagName("tr");
          for (i = 0; i < tr.length; i++) 
          {
            td = tr[i].getElementsByTagName("td")[0];
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
          
          tr = tableast.getElementsByTagName("tr");
          for (i = 0; i < tr.length; i++) 
          {
            td = tr[i].getElementsByTagName("td")[0];
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
          
          tr = tableliab.getElementsByTagName("tr");
          for (i = 0; i < tr.length; i++) 
          {
            td = tr[i].getElementsByTagName("td")[0];
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

        function AllIncome() 
        {
          var input, filter, table, tr, td, i, txtValue;
          input = document.getElementById("searchIncome");
          filter = input.value.toUpperCase();
          table = document.getElementById("incometable");
          tr = table.getElementsByTagName("tr");
          for (i = 0; i < tr.length; i++) 
          {
            td = tr[i].getElementsByTagName("td")[0];
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
        
        function AllExpense() 
        {
          var input, filter, table, tr, td, i, txtValue;
          input = document.getElementById("searchExpense");
          filter = input.value.toUpperCase();
          table = document.getElementById("expensetable");
          tr = table.getElementsByTagName("tr");
          for (i = 0; i < tr.length; i++) 
          {
            td = tr[i].getElementsByTagName("td")[0];
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
        
        function AllAsset() 
        {
          var input, filter, table, tr, td, i, txtValue;
          input = document.getElementById("searchAsset");
          filter = input.value.toUpperCase();
          table = document.getElementById("assettable");
          tr = table.getElementsByTagName("tr");
          for (i = 0; i < tr.length; i++) 
          {
            td = tr[i].getElementsByTagName("td")[0];
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
        
        function AllLiability() 
        {
          var input, filter, table, tr, td, i, txtValue;
          input = document.getElementById("searchLiability");
          filter = input.value.toUpperCase();
          table = document.getElementById("liabilitytable");
          tr = table.getElementsByTagName("tr");
          for (i = 0; i < tr.length; i++) 
          {
            td = tr[i].getElementsByTagName("td")[0];
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
        
        function displayrecordlist()
        {   
            var recordselect = document.getElementById("recordtypeselect").value;
            
            
            if(recordselect === "All")
            {
                document.getElementById("searchIncome").style.display = "none";
                document.getElementById("searchExpense").style.display = "none";
                document.getElementById("searchAsset").style.display = "none";
                document.getElementById("searchLiability").style.display = "none";
                document.getElementById("searchrecord").style.display = "";
                
                document.getElementById("incometable").style.display = "";
                document.getElementById("expensetable").style.display = "";
                document.getElementById("assettable").style.display = "";
                document.getElementById("liabilitytable").style.display = "";
                
                document.getElementById("incomeheader").style.display = "";
                document.getElementById("expenseheader").style.display = "";
                document.getElementById("assetheader").style.display = "";
                document.getElementById("liabilityheader").style.display = "";
            }
            if(recordselect === "Income")
            {
                document.getElementById("searchIncome").style.display = "";
                document.getElementById("searchExpense").style.display = "none";
                document.getElementById("searchAsset").style.display = "none";
                document.getElementById("searchLiability").style.display = "none";
                document.getElementById("searchrecord").style.display = "none";
                
                document.getElementById("incometable").style.display = "";
                document.getElementById("expensetable").style.display = "none";
                document.getElementById("assettable").style.display = "none";
                document.getElementById("liabilitytable").style.display = "none";
                
                document.getElementById("incomeheader").style.display = "";
                document.getElementById("expenseheader").style.display = "none";
                document.getElementById("assetheader").style.display = "none";
                document.getElementById("liabilityheader").style.display = "none";                
            }
            if(recordselect === "Expense")
            {
                document.getElementById("searchIncome").style.display = "none";
                document.getElementById("searchExpense").style.display = "";
                document.getElementById("searchAsset").style.display = "none";
                document.getElementById("searchLiability").style.display = "none";
                document.getElementById("searchrecord").style.display = "none";
                
                document.getElementById("incometable").style.display = "none";
                document.getElementById("expensetable").style.display = "";
                document.getElementById("assettable").style.display = "none";
                document.getElementById("liabilitytable").style.display = "none";
                
                document.getElementById("incomeheader").style.display = "none";
                document.getElementById("expenseheader").style.display = "";
                document.getElementById("assetheader").style.display = "none";
                document.getElementById("liabilityheader").style.display = "none";                
            }
            if(recordselect === "Asset")
            {
                document.getElementById("searchIncome").style.display = "none";
                document.getElementById("searchExpense").style.display = "none";
                document.getElementById("searchAsset").style.display = "";
                document.getElementById("searchLiability").style.display = "none";
                document.getElementById("searchrecord").style.display = "none";
                
                document.getElementById("incometable").style.display = "none";
                document.getElementById("expensetable").style.display = "none";
                document.getElementById("assettable").style.display = "";
                document.getElementById("liabilitytable").style.display = "none";
                
                document.getElementById("incomeheader").style.display = "none";
                document.getElementById("expenseheader").style.display = "none";
                document.getElementById("assetheader").style.display = "";
                document.getElementById("liabilityheader").style.display = "none";                
            }
            if(recordselect === "Liability")
            {
                document.getElementById("searchIncome").style.display = "none";
                document.getElementById("searchExpense").style.display = "none";
                document.getElementById("searchAsset").style.display = "none";
                document.getElementById("searchLiability").style.display = "";
                document.getElementById("searchrecord").style.display = "none";
                
                document.getElementById("incometable").style.display = "none";
                document.getElementById("expensetable").style.display = "none";
                document.getElementById("assettable").style.display = "none";
                document.getElementById("liabilitytable").style.display = "";
                
                document.getElementById("incomeheader").style.display = "none";
                document.getElementById("expenseheader").style.display = "none";
                document.getElementById("assetheader").style.display = "none";
                document.getElementById("liabilityheader").style.display = "";                
            }            
        }
        </script>
  <script>
        function checkapt_date()
        
{
var selectedText = document.getElementById('appointment_tdate').value;
var selectedDate = new Date(selectedText);
var now = new Date();
var dt1 = Date.parse(now),
dt2 = Date.parse(selectedDate);
if (dt2 > dt1)
{
alert("Date must be in the past ");
document.getElementById('appointment_tdate').value = now.toISOString().split('T')[0];;
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