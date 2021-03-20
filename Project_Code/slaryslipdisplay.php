<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hospital_management_system";

$conn = mysqli_connect($servername,$username,$password,$dbname);

if($_POST)
{
     $Employee_Id=$_POST['Employee_Id'];
     $Salary_Month=$_POST['Salary_Month'];
      
}
     
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Admission history & Physical Assessment form</title>
        <style>
        h2 
        { 
            display: flex; 
            flex-direction: row;
        } 
          
        h2:before, 
        h2:after 
        { 
            content: ""; 
            flex: 1 1; 
            border-bottom: 10px solid #000; 
            margin: auto; 
        }
        img
        {
            height: 20%;
            width: 20%;
        }
        input:not([type="submit"])
        {
            border: 0;
            border-bottom: 1px dashed black;
            width: auto;
        }
        input.fl
        {
            border: 0;
            border-bottom: 1px dashed black;
            width: 100%;
        }        
        input[type="radio"]
        {
            border-radius: 20%;
            border: 1px solid black;
            background: transparent;
        }
        textarea
        {
            border: 1px solid black;
            border-radius: 10px;
        }
        table
        {
            width: 100%;
            line-height: 2;
            margin-right: 5%;
            border-collapse: collapse;
        }
        .notes
        {
            border: 0;
        }
        </style>
         <script>
            function staffreport()
            {
                window.print();
            }
            function staffreportcancel()
            {
                window.location.href = "report_name.php";
            }
        </script>        
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
   </head>
    <body class="container" style="font-family: Times New Roman; font-size: 16px;" onload="staffreport()" onafterprint="staffreportcancel()">
        <img src="images/tattvam_banner.jpg" align='right'>
        <h2>
            <span style="padding-left: 15px; padding-right: 15px;">
                SALARY SLIP
            </span>
        </h2>
        <br/><br/><br/>
        Date : <?php echo date("d/m/Y");?>


<html>
    <head>
        
    </head>
    <body>
    <center>
        <table class="table table-striped">
            <tr>
                <th>Employee Id</th>
                <th>Salary Month</th>
                <th>Working Days</th>
                <th>Employee Name</th>
                <th>Designation</th>
                <th>Basic Salary</th>
                <th>Hra Amt</th>
                <th>DA Amt</th>
                <th>Arrears Amt</th>
                <th>PF Amt</th>
                <th>Gross Salary</th>
                <th>Bank Acc No</th>
               
            </tr>
            <?php
     $dislpaydata = "select * from payslip where Employee_Id = $Employee_Id AND Salary_Month = '$Salary_Month' order by 'Employee_Id' and 'Salary_Month'";
     $result = mysqli_query($conn, $dislpaydata);
     if(mysqli_num_rows($result)>0)
    {
        while ($row = mysqli_fetch_assoc($result)) 
                {
     ?>
            <tr> 
                <td><?php echo "Emp".$row["Employee_Id"];?></td>
                <td><?php echo $row["Salary_Month"];?></td>
                <td><?php echo $row["Working_Days"];?></td>
                <td><?php echo $row["Employee_Name"];?></td>
                <td><?php echo $row["Designation"];?></td>
               
                <td><?php echo $row["Basic_Salary"];?></td>
                <td><?php echo $row["HRA_Amount"];?></td>
                <td><?php echo $row["DA_Amount"];?></td>
                <td><?php echo $row["Arrears_Amount"];?></td>
                <td><?php echo $row["PF_Amount"];?></td>
                <td><?php echo $row["Gross_Salary"];?></td>
                <td><?php echo $row["Bank_Acc_No"];?></td>
                </tr>
                 <tr>
                <th>Deduction</th>
                <th>Net_Salary</th>
            </tr>
                 <tr> 
                <td><?php echo $row["Deduction"];?></td>
                <td><?php echo $row["Net_Salary"];?></td>
                </tr>
        <?php
                }
            }
        ?>
    </center>
    </body>
</html>