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
    echo "connection not successfu<br>";   
}
?>
<html>
    <head>
        <title>Delete Record</title>
    </head>
<body>
<center>
    <h1>Delete Record</h1>
<table border="1">
    <?php
    $id=$_POST['Delete'];
    $displaydata = "select * from employee_master where Employee_Id='$id'";
    $result = mysqli_query($conn, $displaydata);
    if(mysqli_num_rows($result)>0)
    {
        while ($row = mysqli_fetch_assoc($result)) 
                {
    ?>
    <form method="POST" action="empdeletesave.php">
<table border="1">

<td><input type="hidden" name="id" value="<?php echo $row["Employee_Id"];?>"/></td>
<tr>
<td>Employee_Name</td>
<td><input type="text" name="ename" value="<?php echo $row["Employee_Name"];?>"/></td>
<td>Employee_Designation</td>
<td><input type="text" name="designation" value="<?php echo $row["Employee_Designation"];?>"/></td>
</tr>
<tr>
<td>Employee_contact</td>
<td><input type="text" name="mobile" value="<?php echo $row["Employee_contact"];?>"/></td>
<td>Employee_Email</td>
<td><input type="text" name="mail" value="<?php echo $row["Employee_Email"];?>"/></td>
</tr>
<tr>
<td>Birth_Date</td>
<td><input type="text" name="birth" value="<?php echo $row["Birth_Date"];?>"/></td>
<td>Employee_Address</td>
<td><input type="text" name="address" value="<?php echo $row["Employee_Address"];?>"/></td>
</tr>
<tr>
<td>Gender</td>
<td><input type="text" name="gender" value="<?php echo $row["Gender"];?>"/></td>
<td>Education</td>
<td><input type="text" name="education" value="<?php echo $row["Education"];?>"/></td>
</tr>
<tr>
<td>Join_Date</td>
<td><input type="text" name="join" value="<?php echo $row["Join_Date"];?>"/></td>
<td>Basic_Salary</td>
<td><input type="text" name="bsalary" value="<?php echo $row["Basic_Salary"];?>"/></td>
</tr>
<tr>
<td>Uniform_Issued_Date</td>
<td><input type="text" name="uniform" value="<?php echo $row["Uniform_Issued_Date"];?>"/></td>
<td>Incremental_qtr_No</td>
<td><input type="text" name="increment" value="<?php echo $row["Incremental_qtr_No"];?>"/></td>
</tr>
<tr>
<td>Last_Increment_Date</td>
<td><input type="text" name="lincrement" value="<?php echo $row["Last_Increment_Date"];?>"/></td>
<td>IFSC_Code</td>
<td><input type="text" name="ifsc" value="<?php echo $row["IFSC_Code"];?>"/></td>
</tr>
<tr>
<td>Bank_Acc_No</td>
<td><input type="text" name="bank" value="<?php echo $row["Bank_Acc_No"];?>"/></td>
<td>Department</td>
<td><input type="text" name="department" value="<?php echo $row["Department"];?>"/></td>
</tr>
<tr>
<td>Grade</td>
<td><input type="text" name="grade" value="<?php echo $row["Grade"];?>"/></td>
<td>Dearness_Allowance</td>
<td><input type="text" name="da" value="<?php echo $row["Dearness_Allowance"];?>"/></td>
</tr>
<tr>
<td>House_Rent_Allowance</td>
<td><input type="text" name="hra" value="<?php echo $row["House_Rent_Allowance"];?>"/></td>
<td>PF_No</td>
<td><input type="text" name="pfno" value="<?php echo $row["PF_No"];?>"/></td>
</tr>
<tr>
<td>PF_PCTG</td>
<td><input type="text" name="pfper" value="<?php echo $row["PF_PCTG"];?>"/></td>
<td>FPS_PCTG</td>
<td><input type="text" name="familypf" value="<?php echo $row["FPS_PCTG"];?>"/></td>
</tr>
<tr>
<td>Professional_Tax</td>
<td><input type="text" name="professional" value="<?php echo $row["Professional_Tax"];?>"/></td>
<td>Group_LIC_Premium</td>
<td><input type="text" name="glic" value="<?php echo $row["Group_LIC_Premium"];?>"/></td>
</tr>
<tr>
<td>PanCard</td>
<td><input type="text" name="pancard" value="<?php echo $row["PanCard"];?>"/></td>
<td>AdharCard</td>
<td><input type="text" name="adharcard" value="<?php echo $row["AdharCard"];?>"/></td>
</tr>
<tr>
<td>Status</td>
<td><input type="text" name="status" value="<?php echo $row["Status"];?>"/></td>
</tr>
<tr><td><input type="submit" value="Delete"></td></tr>
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