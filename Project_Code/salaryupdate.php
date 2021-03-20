<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hospital_management_system";

$conn = mysqli_connect($servername,$username,$password,$dbname);
if($conn)
{
    echo "connection successful<br>";
}
 else 
{
    echo "connection not successful<br>";   
}
?>
<html>
    <head>
        <title>Update Record</title>
    </head>
<body>
<center>
<table border="1">
    <?php
    $id=$_POST['Update'];
    $displaydata = "select * from payslip where Employee_Id='$id'";
    $result = mysqli_query($conn, $displaydata);
    if(mysqli_num_rows($result)>0)
    {
        while ($row = mysqli_fetch_assoc($result)) 
                {
    ?>
    <form method="POST" action="salaryupdatesave.php">
<table border="1">
<tr>
<td><input type="hidden" name="id" value="<?php echo $row["Employee_Id"];?>"/></td>
</tr>    
<tr>
<td>Salary_Month</td>
<td>
<select name="smonth">
<option>January</option>
<option>February</option>
<option>March</option>
<option>April</option>
<option>May</option>
<option>June</option>
<option>July</option>
<option>August</option>
<option>September</option>
<option>October</option>
<option>November</option>
<option>December</option>
</select>
</td>
<td>Working_Days</td>
<td><input type="text" name="working" value="<?php echo $row["Working_Days"];?>"/></td>
</tr>
<tr>
<td>Attendance</td>
<td><input type="text" name="attendance" value="<?php echo $row["Attendance"];?>"/></td>
<td>Employee_Type</td>
<td><input type="text" name="etype" value="<?php echo $row["Employee_Type"];?>"/></td>
</tr>
<tr>
<td>Employee_Name</td>
<td><input type="text" name="ename" value="<?php echo $row["Employee_Name"];?>"/></td>
<td>Designation</td>
<td><input type="text" name="designation" value="<?php echo $row["Designation"];?>"/></td>
</tr>
<tr>
<td>Birth_Date</td>
<td><input type="date" name="birth" value="<?php echo $row["Birth_Date"];?>"/></td>
<td>Join_Date</td>
<td><input type="date" name="join" value="<?php echo $row["Join_Date"];?>"/></td>
</tr>
<tr>
<td>Department</td>
<td><input type="text" name="department" value="<?php echo $row["Department"];?>"/></td>
<td>Leave_Type</td>
<td>
<select name="leavetype">
<option>CL</option>
<option>SL</option>
<option>PL</option>
</select>
</td>
</tr>
<tr>
<td>Leave_From</td>
<td><input type="date" name="from" value="<?php echo $row["Leave_From"];?>"/></td>
<td>Leave_To</td>
<td><input type="date" name="to" value="<?php echo $row["Leave_To"];?>"/></td>
</tr>
<tr>
<td>Total_Days</td>
<td><input type="text" name="total" value="<?php echo $row["Total_Days"];?>"/></td>
<td>CL_bal</td>
<td><input type="text" name="cl" value="<?php echo $row["CL_bal"];?>"/></td>
</tr>
<tr>
<td>SL_bal</td>
<td><input type="text" name="sl" value="<?php echo $row["SL_bal"];?>"/></td>
<td>PL_bal</td>
<td><input type="text" name="pl" value="<?php echo $row["PL_bal"];?>"/></td>
</tr>
<tr>
<td>Basic_Salary</td>
<td><input type="text" name="basic" value="<?php echo $row["Basic_Salary"];?>"/></td>
<td>DA_Amount</td>
<td><input type="text" name="da" value="<?php echo $row["Basic_Salary"];?>"/></td>
</tr>
<tr>
<td>HRA_Amount</td>
<td><input type="text" name="hra" value="<?php echo $row["HRA_Amount"];?>"/></td>
<td>Arrears_Amount</td>
<td><input type="text" name="arrears" value="<?php echo $row["Arrears_Amount"];?>"/></td>
</tr>
<tr>
<td>PF_Amount</td>
<td><input type="text" name="pfamt" value="<?php echo $row["PF_Amount"];?>"/></td>
<td>FPS_Amount</td>
<td><input type="text" name="fpsamt" value="<?php echo $row["FPS_Amount"];?>"/></td>
</tr>
<tr>
<td>PTAX_Amount</td>
<td><input type="text" name="professional" value="<?php echo $row["PTAX_Amount"];?>"/></td>
<td>Income_Amount</td>
<td><input type="text" name="income" value="<?php echo $row["Income_Amount"];?>"/></td>
</tr>
<tr>
<td></td>
<td>GLIC_Amount<input type="text" name="glic" value="<?php echo $row["GLIC_Amount"];?>"/></td>
<td></td>
<td>Gross_Salary<input type="text" name="gross" value="<?php echo $row["Gross_Salary"];?>"/></td>
</tr>
<tr>
<td>Deduction</td>
<td><input type="text" name="deduction" value="<?php echo $row["Deduction"];?>"/></td>
<td>Net_Salary</td>
<td><input type="text" name="net" value="<?php echo $row["Net_Salary"];?>"/></td>
</tr>
<tr>
<td>Bank_Acc_No</td>
<td><input type="text" name="bankacc" value="<?php echo $row["Bank_Acc_No"];?>"/></td>
<td>IFSC_Code</td>
<td><input type="text" name="ifsc" value="<?php echo $row["IFSC_Code"];?>"/></td>
</tr>
<tr><td></td><td><input type="submit" value="Update"></td></tr>
</table>
</form>
</table><br>
    <?php
                }
    }
    ?>

<?php
mysqli_close($conn);
?>
</body>
</html>  