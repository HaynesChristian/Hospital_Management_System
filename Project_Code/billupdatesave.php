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
$act=$_POST['billid'];
$billdate=$_POST['billdate'];
$bpatientid=$_POST['bpatientid'];
$cnt=$_POST['cnt'];
$bamount=$_POST['bamount'];
echo $act;

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
    

$sql="Update patient_canteen_bill set Bill_Date='$billdate' , Patient_Id=$bpatientid ,"
        . " Total_Order=$cnt , Total_Charges=$bamount "
        . "where Bill_Id=$act";

if(mysqli_query($conn,$sql))
    {
            header("Location:patient_canteen_bill.php?admin_name=$login_name");
        }
        else
        {
            echo "<script>alert( Canteen Bill not Updated');"
            . "window.location.href = 'patient_canteen_bill.php?admin_name=$login_name';</script>";
        }
}