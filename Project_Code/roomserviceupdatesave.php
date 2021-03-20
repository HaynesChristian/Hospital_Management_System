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
if($_POST)
{
    $login_name=$_POST["admin_name"];
    $act=$_POST['roomid'];
    $roomtype=$_POST['roomtype'];
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
    $fan=$_POST['fan'];
    $ac=$_POST['ac'];
    $tv=$_POST['tv'];
    $refrigerator=$_POST['refrigerator'];
    $roomstatus=$_POST['roomstatus'];

    $sql="Update room_master set room_type='$roomtype',room_charges=$price,"
            . "Fan='$fan',AC='$ac',TV='$tv',Refrigerator='$refrigerator',"
            . "room_status='$roomstatus' where room_id=$act";

        if(mysqli_query($conn,$sql))
        {
            header("Location:room_service_display.php?admin_name=$login_name");
        }
        else
        {
            echo "<script>alert( Room not Updated');"
            . "window.location.href = 'room_service_display.php?admin_name=$login_name';</script>";
        } 
}