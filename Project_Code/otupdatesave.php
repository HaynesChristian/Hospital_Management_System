<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hospital";

$conn = mysqli_connect($servername,$username,$password,$dbname);
if($conn)
{
    echo "connection successful<br>";
}
 else 
{
    echo "connection not successfu<br>";   
}

$login_name=$_POST["admin_name"];
$act=$_POST['save'];
$month=$_POST['month'];
$cyear=$_POST['cyear'];
$count=$_POST['count'];
$cdate=$_POST['cdate'];
echo $month;
echo $act;
$sql="Update ot_room_cleaning set Cleaning_Month='$month',Cleaning_Year=$cyear,Cliening_Count=$count,"
        . "Last_Cleaning_Date='$cdate' "
        . "where OT_Room_Cleaning_ID=$act";

if(mysqli_query($conn,$sql))
    {
            header("Location:otdisplay.php?admin_name=$login_name");
        }
        else
        {
            echo "<script>alert( Canteen Menu not Updated');"
            . "window.location.href = 'otdisplay.php.php?admin_name=$login_name';</script>";
        }
header("Location:otdisplay.php");
?>