<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hospital_management_system";

$conn = mysqli_connect($servername,$username,$password,$dbname);
if($_POST)
{
    $login_name=$_POST["admin_name"];
    $id=$_POST['orderid'];
    $npatientid=$_POST['npatientid'];
    $treatment_id = $_POST['treatment_id'];
    $orderdate=$_POST['orderdate'];
    $itemid1=$_POST['itemid1'];
    $food=$_POST['food'];
    $quantity1=$_POST['quantity1'];
    $itemid2=$_POST['itemid2'];
    $food2=$_POST['food2'];
    $quantity2=$_POST['quantity2'];
    $itemid3=$_POST['itemid3'];
    $food3=$_POST['food3'];
    $quantity3=$_POST['quantity3'];
    $orderamount=$_POST['orderamount'];

    $sql="delete from patient_canteen_order where order_id=$id";

    if(mysqli_query($conn,$sql))
    {
        header("Location:canteen_order_display.php?admin_name=$login_name&patient_id=$npatientid&treatment_id=$treatment_id");
    }
    else
    {
        echo "<script>alert(Employee not Deleted');"
        . "window.location.href = 'canteen_order_display.php?admin_name=$login_name&patient_id=$npatientid&treatment_id=$treatment_id';</script>";
    }

}