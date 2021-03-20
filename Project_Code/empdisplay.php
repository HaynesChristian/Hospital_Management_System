<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hospital_management_system";

$conn = mysqli_connect($servername,$username,$password,$dbname);

if($_POST)
{
    $fdt=$_POST['From_Date'];
    $tdt=$_POST['To_Date'];
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
   <body class="container" style="font-family: Times New Roman; font-size: 16px;" 
          onload="staffreport()" onafterprint="staffreportcancel()">
        <img src="images/tattvam_banner.jpg" align='right'>
        <h2>
            <span style="padding-left: 15px; padding-right: 15px;">
                STAFF REPORT
            </span>
        </h2>
        <br/><br/>
      <div class="container">
        
        <table class="table" style="margin-top: 7%; border-bottom: 1px solid black">
            <tr>
                <th>Report Date : <br><?php echo date("d/m/Y");?></th>
                <th style="text-align: center">Period:<br> From <?php echo $fdt;?> To <?php echo $tdt;?></th>
            </tr>
        </table>
          
        <?php
            $display_desig = "SELECT Employee_Designation from employee_master";
            $result_desig = mysqli_query($conn, $display_desig);
            if(mysqli_num_rows($result_desig)>0)
            {
                while ($row_desig = mysqli_fetch_assoc($result_desig)) 
                {
        ?>          
          <br>  
          <table class="table table-striped">
                <tr>
                    <th colspan="15" style="text-align: center">
                        <?php echo $row_desig["Employee_Designation"];?></th>
                </tr>
                <tr>
                    <th>Emp Id</th>
                    <th>Name</th>
                    <th>Contact</th>
                    <th>Email</th>
                    <th>DOB</th>
                    <th>Address</th>
                    <th>Gender</th>
                    <th>Education</th>
                    <th>Joining Date</th>
                    <th>Basic Salary</th>
                    <th>Bank AcNo</th>
                    <th>Dept.</th>
                    <th>Pan Card</th>
                    <th>Aadhar Card</th>                
                </tr>
                <?php
                $count = 0;
                $displaydata = "select * from employee_master where Join_Date "
                        . "Between '$fdt' and '$tdt' AND "
                        . "Employee_Designation = '".$row_desig['Employee_Designation']."' order by Join_Date";
                $result = mysqli_query($conn, $displaydata);
                if(mysqli_num_rows($result)>0)
                {
                    $count = 0;
                    while ($row = mysqli_fetch_assoc($result)) 
                    {
                        $count++;
                ?>
                <tr>
                    <td><?php echo $row["Employee_Id"];?></td>
                    <td><?php echo $row["Employee_Name"];?></td>
                    <td><?php echo $row["Employee_contact"];?></td>
                    <td><?php echo $row["Employee_Email"];?></td>
                    <td><?php echo $row["Birth_Date"];?></td>
                    <td><?php echo $row["Employee_Address"];?></td>
                    <td><?php echo $row["Gender"];?></td>
                    <td><?php echo $row["Education"];?></td>
                    <td><?php echo $row["Join_Date"];?></td>
                    <td><?Php echo $row["Basic_Salary"];?></td>
                    <td><?php echo $row["Bank_Acc_No"];?></td>
                    <td><?php echo $row["Department"];?></td>
                    <td><?php echo $row["PanCard"];?></td>
                    <td><?php echo $row["AdharCard"];?></td>
                </tr>
                <?php
                    }
                }
                ?>
                <tr>
                    <td colspan="14">Total Employees in <?php echo $row_desig["Employee_Designation"];?></td>
                    <td><?php echo $count;?></td>
                </tr>
            </table>
            <br/>
        <?php
               }
           }
        ?>
            
        <table>          
            <?php
            $displaydata = "select count(Employee_Id) Total_Employee,
                count(case when gender='Male' then 1 end) as Total_Male_Employee,
                count(case when gender='Female' then 1 end) as Total_Female_Employee,
                count(*) as total_cnt FROM employee_master where Join_Date Between '$fdt' and '$tdt' order by Join_Date";
            $result_cnt = mysqli_query($conn, $displaydata);
            if(mysqli_num_rows($result_cnt)>0)
            {
                while ($row = mysqli_fetch_assoc($result_cnt)) 
                { 
                    $total_memp = $row["Total_Male_Employee"];
                    $total_femp = $row["Total_Female_Employee"];
                    $total_emp = $row["Total_Employee"];
            ?>
            <tr>
                <th colspan="4">Total Male Employee</th>
                <th colspan="4">Total Female Employee</th>
                <th colspan="4">Total Employee</th>
            </tr>
            <tr>
                <td colspan="4"><?php echo $total_memp;?></td>
                <td colspan="4"><?php echo $total_femp;?></td>
                <td colspan="4"><?php echo $total_emp;?></td>                
            </tr>
            <?php
                }
            }    
            ?>
            </table>
            <br><br>
      </div>
    </body>
</html>