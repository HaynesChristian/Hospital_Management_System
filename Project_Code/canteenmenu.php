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
    $itemiid=$_POST['itemiid'];
    $item = $_POST['item'];
    $charges = $_POST['charges'];
    
    echo $itemiid."<br>";    
    echo $item."<br>";    
    echo $charges."<br>";
    
    $sql = "insert into canteen_menu (Food_Item_Id,Food_Item_Name,Food_Item_Charges)"
            
            . " VALUES ($itemiid,'$item',$charges)";
    
    if(mysqli_query($conn,$sql))
    {
            header("Location: canteen_menu_display.php?admin_name=$login_name");
        }
        else
        {
            echo "<script>alert(Canteen Menu not registerd');"
            . "window.location.href = 'canteen_menu_display.php?admin_name=$login_name';</script>";
        }
    }