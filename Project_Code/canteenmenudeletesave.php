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
 
$act=$_POST['itemid'];
//$itemid=$_POST['itemid'];
$item=$_POST['item'];
$charges=$_POST['charges'];

$sql="delete from canteen_menu where Food_Item_Id=$act";

if(mysqli_query($conn,$sql))
    {
            header("Location:canteen_menu_display.php?admin_name=$login_name");
        }
        else
        {
            echo "<script>alert(Canteen Menu not Deleted');"
            . "window.location.href = 'canteen_menu_display.php?admin_name=$login_name';</script>";
        }
    