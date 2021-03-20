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
$sql="delete from ot_room_cleaning where OT_Room_Cleaning_ID=$act";

if(mysqli_query($conn,$sql))
    {
            header("Location:ot_cleaning.php?admin_name=$login_name");
        }
        else
        {
            echo "<script>alert(OT Room not Deleted');"
            . "window.location.href = 'ot_cleaning.php?admin_name=$login_name';</script>";
        }

mysqli_query($conn,$sql);
echo  "Record Deleted Successfull";
mysqli_close($conn);
header("Location:ot_cleaning.php");
?>