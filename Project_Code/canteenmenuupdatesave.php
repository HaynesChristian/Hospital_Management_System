<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hospital_management_system";

$conn = mysqli_connect($servername,$username,$password,$dbname);

if($_POST)
{
    $login_name=$_POST["admin_name"];
    $act=$_POST['itemid'];
    $item=$_POST['item'];
    $charges=$_POST['charges'];

    $sql="Update canteen_menu set Food_Item_Name='$item',Food_Item_Charges=$charges where Food_Item_Id=$act";
    $d1="UPDATE patient_canteen_order SET Description1 = '$item' WHERE Item_Id1 = $act";
    $d2="UPDATE patient_canteen_order SET Description2 = '$item' WHERE Item_Id2 = $act";
    $d3="UPDATE patient_canteen_order SET Description3 = '$item' WHERE Item_Id3 = $act";
//    $patient_order = "UPDATE patient_canteen_order set Description1 = IF (Item_Id1=$act,'$item') , "
//            . "Description2 = IF (Item_Id2=$act,'$item') , Description3 = IF (Item_Id3=$act,'$item')";
    if(mysqli_query($conn,$sql) && mysqli_query($conn,$d1) &&  mysqli_query($conn,$d2) &&  mysqli_query($conn,$d3))
    {
       header("Location:canteen_menu_display.php?admin_name=$login_name");
    }
    else
    {
        echo "<script>alert( Canteen Menu not Updated');"
        . "window.location.href = 'canteen_menu_display.php?admin_name=$login_name';</script>";
    }
}