<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hospital_management_system";

$conn = mysqli_connect($servername,$username,$password,$dbname);
if($_POST)
{
    $login_name=$_POST["admin_name"];
    $act=$_POST['roomid'];
    $roomtype=$_POST['roomtype'];
    $price=$_POST['price'];
    $fan=$_POST['fan'];
    $ac=$_POST['ac'];
    $tv=$_POST['tv'];
    $refrigerator=$_POST['refrigerator'];
    $roomstatus=$_POST['roomstatus'];

    $sql="delete from room_master where room_id=$act";
    $remove_room = "UPDATE patient_admission SET Room_no = 0 WHERE Room_no = $act";
    if(mysqli_query($conn,$sql) && mysqli_query($conn,$remove_room))
    {
        header("Location:room_service_display.php?admin_name=$login_name");
    }
    else
    {
        echo "<script>alert( Room not Updated');"
        . "window.location.href = 'room_service_display.php?admin_name=$login_name';</script>";
    }
}