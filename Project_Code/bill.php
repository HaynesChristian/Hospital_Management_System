<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hospital_management_system";

$conn = mysqli_connect($servername,$username,$password,$dbname);
if($_POST)
{
    $login_name=$_POST["admin_name"];
    $billdate = $_POST['billdate'];
    $bpatientid = $_POST['patientid'];
    
    
    $displaydata = "select * from patient_canteen_order where Patient_id = $bpatientid";
    
  
    
  $result = mysqli_query($conn, $displaydata);
  $cnt = 0;
     if(mysqli_num_rows($result)>0)
     {
         
         while ($row = mysqli_fetch_assoc($result))
         {
             $cnt++;
         }     
    }
    echo $cnt;
    
    $displaydata1 = "select * from patient_canteen_order where Patient_id = $bpatientid ";
  
  $result = mysqli_query($conn, $displaydata1);
  $bamount = 0;
     if(mysqli_num_rows($result)>0)
     {
         while ($row = mysqli_fetch_assoc($result))
         {
             $bamount = $bamount + $row['Order_Amount'];
         }    
         }
         
         
         
    
    echo $billdate."<br>";
    echo $bpatientid."<br>";    
    echo $cnt."<br>";
    echo $bamount."<br>";
    
    $sql = "insert into patient_canteen_bill (Bill_Date,Patient_Id,Total_Order,Total_Charges)"
             . " VALUES ('$billdate',$bpatientid,$cnt,$bamount)";
    if(mysqli_query($conn,$sql))
    {
            header("Location:patient_canteen_bill.php?admin_name=$login_name");
        }
        else
        {
            echo "<script>alert(Canteen Bill not Created');"
            . "window.location.href = 'patient_canteen_bill.php?admin_name=$login_name';</script>";
        }
    }
    