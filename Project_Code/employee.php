<?php
date_default_timezone_set("Asia/Kolkata");
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hospital_management_system";

$conn = mysqli_connect($servername,$username,$password,$dbname);
if($conn)
{
    echo "connection successfull<br>";
}
 else 
{
    echo "connection not successfull<br>";   
}
if($_POST)
{
    $login_name=$_POST["admin_name"];
    $ename = $_POST['ename'];
    $designation = $_POST['designation'];
    $mobile = $_POST['mobile'];
    $mail = $_POST['mail'];
    $birth = $_POST['birth'];
   
    
    $address = $_POST['address'];
    $gender = $_POST['gender'];
    $education = $_POST['education'];
    $join = $_POST['join'];
    
    /*$time=strtotime($join);
    $month=date("F",$time);
    if($month = "January" or "February" or "March" )
    {
        $incerement = 01;
    }
    else if($month = "April" or "May" or "June" )
    {
        $incerement = 02;
    }
    else if($month = "July" or "August" or "September" )
    {
        $incerement = 03;
    }
    else($month = "October" or "November" or "December" )
    {
        $incerement = 04;
    }*/
    $bsalary = $_POST['bsalary'];
    $uniform = $_POST['uniform'];
    $incerement = $_POST['increment'];
    $lincrement = $_POST['lincrement'];
    $ifsc= $_POST['ifsc'];
    $bank = $_POST['bank'];
    $department = $_POST['department'];
    $grade = $_POST['grade'];
    $da = $_POST['da'];
    $hra = $_POST['hra'];
    $pfno = $_POST['pfno'];
    $pfper = $_POST['pfper'];
    $familypf = $_POST['familypf'];
    $professional = $_POST['professional'];
    $glic = $_POST['glic'];
    $status = $_POST['status'];
    $pancard = $_POST['pancard'];
    $adharcard = $_POST['adharcard'];
      
   echo $month;
    
    
    $sql = "insert into employee_master (Employee_Name,Employee_Designation,"
            . "Employee_contact,Employee_Email,Birth_Date,Employee_Address,Gender,Education,Join_Date"
            . ",Basic_Salary,Uniform_Issued_Date,Incremental_qtr_No,Last_Increment_Date,IFSC_Code,Bank_Acc_No,"
            . "Department,Grade,Dearness_Allowance,House_Rent_Allowance,PF_No,PF_PCTG,FPS_PCTG,"
            . "Professional_Tax,Group_LIC_Premium,Status,PanCard,AdharCard)"
            . " VALUES ('$ename','$designation','$mobile','$mail','$birth','$address','$gender',"
            . "'$education','$join',$bsalary,'$uniform',$incerement,'$lincrement','$ifsc',$bank,'$department',"
            . "$grade,$da,$hra,'$pfno',$pfper,$familypf,$professional,$glic,'$status','$pancard',$adharcard)";
    
    if(mysqli_query($conn,$sql))
    {
            header("Location: staffdisplay.php?admin_name=$login_name");
        }
        else
        {
            echo "<script>alert(Employee not registerd');"
            . "window.location.href = 'staffdisplay.php?admin_name=$login_name';</script>";
        }
    }