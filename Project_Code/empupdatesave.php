<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hospital_management_system";

$conn = mysqli_connect($servername,$username,$password,$dbname);
if ($_POST)
{
    $login_name=$_POST["admin_name"];
$act=$_POST['id'];
$ue3=$_POST['ename'];
$ue4=$_POST['designation'];
$ue5=$_POST['mobile'];
$ue6=$_POST['mail'];
$ue7=$_POST['birth'];
$ue8=$_POST['address'];
$ue9=$_POST['gender'];
$ue10=$_POST['education'];
$ue11=$_POST['join'];
$ue12=$_POST['bsalary'];
$ue13=$_POST['uniform'];
$ue14=$_POST['increment'];
$ue15=$_POST['lincrement'];
$ue16=$_POST['ifsc'];
$ue17=$_POST['bank'];
$ue18=$_POST['department'];
$ue19=$_POST['grade'];
$ue20=$_POST['da'];
$ue21=$_POST['hra'];
$ue22=$_POST['pfno'];
$ue23=$_POST['pfper'];
$ue24=$_POST['familypf'];
$ue25=$_POST['professional'];
$ue26=$_POST['glic'];
$ue27=$_POST['status'];
$ue28=$_POST['pancard'];
$ue29=$_POST['adharcard'];



$sql="Update employee_master set Employee_Name='$ue3',Employee_Designation='$ue4',"
        . "Employee_contact='$ue5',Employee_Email='$ue6',Birth_Date='$ue7',"
        . "Employee_Address='$ue8',Gender='$ue9',Education='$ue10',Join_Date='$ue11',"
        . "Basic_Salary=$ue12,Uniform_Issued_Date='$ue13',Incremental_qtr_No=$ue14,"
        . "Last_Increment_Date='$ue15',IFSC_Code='$ue16',Bank_Acc_No=$ue17,"
        . "Department='$ue18',Grade=$ue19,Dearness_Allowance=$ue20,"
        . "House_Rent_Allowance=$ue21,PF_No='$ue22',PF_PCTG=$ue23,FPS_PCTG=$ue24,"
        . "Professional_Tax=$ue25,Group_LIC_Premium=$ue26,Status='$ue27',"
        . "PanCard='$ue28',AdharCard=$ue29 where Employee_Id=$act";

if(mysqli_query($conn,$sql))
    {
            header("Location:staffdisplay.php?admin_name=$login_name");
        }
        else
        {
            echo "<script>alert( Employee not Updated');"
            . "window.location.href = 'staffdisplay.php?admin_name=$login_name';</script>";
        }
    }
mysqli_close($conn);
