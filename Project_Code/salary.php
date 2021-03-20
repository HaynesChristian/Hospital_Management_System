<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hospital_management_system";

$conn = mysqli_connect($servername,$username,$password,$dbname);

if($_POST)
{
    $login_name=$_POST["admin_name"];
     $empid = $_POST['empid'];
     $smonth = $_POST['smonth'];
     $salaryyear = $_POST['salaryyear'];
     $wdays = $_POST['working'];
     $arr = $_POST['arrears'];
     
     $it = $_POST['income'];
     
     $displaydata = "select * from employee_master where Employee_Id = $empid";
          
     $result = mysqli_query($conn, $displaydata);
     if(mysqli_num_rows($result)>0)
     {
         while ($row = mysqli_fetch_assoc($result))
         {
             $eid=$row["Employee_Id"];
             $enm=$row["Employee_Name"];
             $desig=$row["Employee_Designation"];
             $bdt=$row["Birth_Date"];
             $jdt=$row["Join_Date"];
             $dept=$row["Department"];
             $bslry=$row["Basic_Salary"];
             $damt=$row["Dearness_Allowance"];
             $hamt=$row["House_Rent_Allowance"];
             $pfp=$row["PF_PCTG"];
             $fpsp=$row["FPS_PCTG"];
             $ptax=$row["Professional_Tax"];
             $group=$row["Group_LIC_Premium"];
             $bacc=$row["Bank_Acc_No"];
             $ifscc=$row["IFSC_Code"];
             
         }     
    }
    
    $daamount=$bslry * $damt/100;
    $hraamount=$bslry * $hamt/100;
    $pfpercentage=$bslry * $pfp/100;
    $fpspercengage=$bslry * $fpsp/100;
    $gsal=$bslry+$daamount+$hraamount+$arr;
    $ddn=$pfpercentage+$fpspercengage+$it+$group+$ptax;
    $netsalry=$gsal-$ddn;
  
  $displaydata1 = "select * from attendance where Emp_Id = $empid";
  
  $result = mysqli_query($conn, $displaydata1);
     if(mysqli_num_rows($result)>0)
     {
         while ($row = mysqli_fetch_assoc($result))
         {
             $pdays=$row["Present_Days"];
             $ldays=$row["Leave_Days"];
         }     
    }
    
  
  $displaydata2 = "select * from leave_master where Employee = $empid";
  
  $result = mysqli_query($conn, $displaydata2);
     if(mysqli_num_rows($result)>0)
     {
         while ($row = mysqli_fetch_assoc($result))
         {
             $clbal=$row["CL_Balance"];
             $slbal=$row["SL_Balance"];
             $plbal=$row["PL_Balance"];
         }     
    }    
    $smonth = $_POST['smonth'];
    $working = $_POST['working'];
    $arrears = $_POST['arrears'];
    $income = $_POST['income'];
    
    
    $sql = "insert into payslip (Employee_Id,Salary_Month,Year,"
            . "Working_Days,Attendance,Employee_Name,Designation,Birth_Date,"
            . "Join_Date,Department,Total_Days,"
            . "CL_bal,SL_bal,PL_bal,Basic_Salary,DA_Amount,HRA_Amount,Arrears_Amount,"
            . "PF_Amount,FPS_Amount,PTAX_Amount,Income_Amount,GLIC_Amount,Gross_Salary,Deduction,Net_Salary,Bank_Acc_No,IFSC_Code) "
            . "VALUES ($empid,'$smonth',$salaryyear,$wdays,$pdays,'$enm','$desig','$bdt','$jdt',"
            . "'$dept',$ldays,$clbal,$slbal,$plbal,$bslry,$daamount,$hraamount,$arr,$pfpercentage,"
            . "$fpspercengage,$ptax,$it,$group,$gsal,$ddn,$netsalry,$bacc,'$ifscc')";
    if(mysqli_query($conn,$sql))
    {
            header("Location:staffsalary_display.php?admin_name=$login_name");
        }
        else
        {
            echo "<script>alert(Employee not registerd');"
            . "window.location.href = 'staffsalary_display.php?admin_name=$login_name';</script>";
        }
    }