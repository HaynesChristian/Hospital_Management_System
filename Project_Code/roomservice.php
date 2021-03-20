<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hospital_management_system";

$conn = mysqli_connect($servername,$username,$password,$dbname);
if($_POST)
{
    $login_name=$_POST["admin_name"];
    $roomid = $_POST['roomid'];
    $roomtype = $_POST['roomtype'];
    if($roomtype == 'General')
    {
        $price = 500;
    }
    if($roomtype == 'Semi')
    {
        $price = 1000;
    }
    if($roomtype == 'Special')
    {
        $price = 2000;
    }
    if($roomtype == 'Deluxe')
    {
        $price = 3000;
    }
    
    $fan = $_POST['fan'];
    $ac = $_POST['ac'];
    $tv = $_POST['tv'];
    $refrigerator = $_POST['refrigerator'];
    $roomstatus = $_POST['roomstatus'];
	$room_allocated_to="None";
    
    $sql = "insert into room_master (room_id,room_type,room_charges,Fan,AC,TV,Refrigerator,room_status,Room_Allocated_to)"            
            . " VALUES ($roomid,'$roomtype',$price,'$fan','$ac','$tv','$refrigerator','$roomstatus','$room_allocated_to')";
    /*echo "insert into room_master (room_id,room_type,room_charges,Fan,AC,TV,Refrigerator,room_status)"            
            . " VALUES ($roomid,'$roomtype',$price,'$fan','$ac','$tv','$refrigerator','$roomstatus')";*/
    if(mysqli_query($conn,$sql))
    {
        echo '<br>done';
        header("Location: room_service_display.php?admin_name=$login_name");
    }
    else
    {
        echo "<script>alert('Room not registerd');"
        . "window.location.href = 'room_service_display.php?admin_name=$login_name';</script>";
    }
}