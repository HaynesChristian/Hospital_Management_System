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
$ue27=$_POST['pancard'];
$ue28=$_POST['adharcard'];
$ue29=$_POST['status'];

echo "$ue5";
echo "$ue11";

$sql="delete from employee_master  where Employee_Id=$act";

if(mysqli_query($conn,$sql))
  {
          echo  "Record Deleted Successfull";
       }
 else 
     {
    echo "Record not Deleted";    
}
$sql1="delete from attendance  where Emp_Id=$act";

if(mysqli_query($conn,$sql1))
  {
          echo  "Record Deleted from attendance Successfull";
       }
 else 
     {
    echo "Record not Deleted";    
}
$sql2="delete from attendance_tran  where Employee_Id=$act";

if(mysqli_query($conn,$sql2))
  {
          echo  "Record Deleted from attendance transcation Successfull";
       }
 else 
     {
    echo "Record not Deleted";    
}
$sql3="delete from leave_form  where Emp_Id=$act";

if(mysqli_query($conn,$sql3))
  {
          echo  "Record Deleted from leave form transcation Successfull";
       }
 else 
     {
    echo "Record not Deleted";    
}
$sql4="delete from leave_master  where Employee=$act";

if(mysqli_query($conn,$sql4))
  {
          echo  "Record Deleted from leave master transcation Successfull";
       }
 else 
     {
    echo "Record not Deleted";    
}


if(mysqli_query($conn,$sql))
    {
            header("Location:staffdisplay.php?admin_name=$login_name");
        }
        else
        {
            echo "<script>alert(Employee not Deleted');"
            . "window.location.href = 'staffdisplay.php?admin_name=$login_name';</script>";
        }
    }
?>