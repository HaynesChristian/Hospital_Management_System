<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hospital_management_system";

$conn = mysqli_connect($servername,$username,$password,$dbname);
?>
<html>
    <head>
        
    </head>
    <body>
    <center>
        <h1>Edit Record</h1>
        <table border="1">
            <tr>
                <th>Employee_Id</th>
                <th>Salary_Month</th>
                <th>Working_Days</th>
                <th>Attendance</th>
                <th>Employee_Name</th>
                <th>Designation</th>
                <th>Birth_Date</th>
                <th>Join_Date</th>
                <th>Department</th>
                <th>Total_Att</th>
                <th>CL_Balance</th>
                <th>SL_Balance</th>
                <th>PL_Balance</th>
                <th>Basic_Salary</th>
                <th>DA_Amount</th>
                <th>HRA_Amount</th>
                <th>Arrears_Amount</th>
                <th>PF_Amount</th>
                <th>FPS_Amount</th>
                <th>PTAX_Amount</th>
                <th>Income_Amount</th>
                <th>GLIC_Amount</th>
                <th>Gross_Salary</th>
                <th>Deduction</th>
                <th>Net_Salary</th>
                <th>Bank_Acc_No</th>
                <th>IFSC_Code</th>
                <th colspan="2">Action</th>
            </tr>
            <?php
    $displaydata = "select * from payslip";
    $result = mysqli_query($conn, $displaydata);
    if(mysqli_num_rows($result)>0)
    {
        while ($row = mysqli_fetch_assoc($result)) 
                {
    ?>
            <tr>
            
            <form method="POST" autocomplete="off"> 
                <td><?php echo $row["Employee_Id"];?></td>
                <td><?php echo $row["Salary_Month"];?></td>
                <td><?php echo $row["Working_Days"];?></td>
                <td><?php echo $row["Attendance"];?></td>
                <td><?php echo $row["Employee_Name"];?></td>
                <td><?php echo $row["Designation"];?></td>
                <td><?php echo $row["Birth_Date"];?></td>
                <td><?php echo $row["Join_Date"];?></td>
                <td><?php echo $row["Department"];?></td>
                <td><?php echo $row["Total_Days"];?></td>
                <td><?php echo $row["CL_bal"];?></td>
                <td><?php echo $row["SL_bal"];?></td>
                <td><?php echo $row["PL_bal"];?></td>
                <td><?php echo $row["Basic_Salary"];?></td>
                <td><?php echo $row["DA_Amount"];?></td>
                <td><?php echo $row["HRA_Amount"];?></td>
                <td><?php echo $row["Arrears_Amount"];?></td>
                <td><?php echo $row["PF_Amount"];?></td>
                <td><?php echo $row["FPS_Amount"];?></td>
                <td><?php echo $row["PTAX_Amount"];?></td>
                <td><?php echo $row["Income_Amount"];?></td>
                <td><?php echo $row["GLIC_Amount"];?></td>
                <td><?php echo $row["Gross_Salary"];?></td>
                <td><?php echo $row["Deduction"];?></td>
                <td><?php echo $row["Net_Salary"];?></td>
                <td><?php echo $row["Bank_Acc_No"];?></td>
                <td><?php echo $row["IFSC_Code"];?></td>
                <td>
                    <button formaction="salaryupdate.php" name="Update" value="<?php echo $row["Employee_Id"];?>">Update</button>
                </td>
                <td>
                    <button formaction="salarydelete.php" name="Delete" value="<?php echo $row["Employee_Id"];?>">Delete</button>
                </td>
                </tr>
            </form>
        <?php
                }
            }
            mysqli_close($conn);
        ?>
        </table>
    </center>
    </body>
</html>