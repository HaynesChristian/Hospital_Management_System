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
$treatment_id = $_POST['treatment_id'];
$npatientid=$_POST['npatientid'];
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

//$orderamount=$_POST['orderamount'];

    $displaydata1 = "select * from canteen_menu where Food_Item_Id = $itemid1 ";
    //echo "select * from canteen_menu where Food_Item_Id = $itemid1 <br>";
    $result1 = mysqli_query($conn, $displaydata1);
    if(mysqli_num_rows($result1)>0)
    {
        while ($row = mysqli_fetch_assoc($result1))
        {
            $itemcharge=$row["Food_Item_Charges"];
        }
        $orderamount1 = ($quantity1 * $itemcharge);
    }
        
   $displaydata2 = "select * from canteen_menu where Food_Item_Id = $itemid2 ";
   //echo "select * from canteen_menu where Food_Item_Id = $itemid2 <br>";
   $result2 = mysqli_query($conn, $displaydata2);
   if(mysqli_num_rows($result2)>0)
   {
        while ($row = mysqli_fetch_assoc($result2))
        {
            $itemcharge2=$row["Food_Item_Charges"];
        }     
        $orderamount2 = ($quantity2 * $itemcharge2);
   }
         
   $displaydata3 = "select * from canteen_menu where Food_Item_Id = $itemid3 ";
   //echo "select * from canteen_menu where Food_Item_Id = $itemid3 <br>";
   $result = mysqli_query($conn, $displaydata3);
   if(mysqli_num_rows($result)>0)
   {
        while ($row = mysqli_fetch_assoc($result))
        {
            $itemcharge3=$row["Food_Item_Charges"];
        }     
        $orderamount3 = ($quantity3 * $itemcharge3);
   }
   
   $orderamount = $orderamount1 + $orderamount2 + $orderamount3;


$sql="update patient_canteen_order set Patient_Id=$npatientid,Order_Date='$orderdate',"
        . "Item_Id1=$itemid1,Description1='$food',Quantity1=$quantity1,"
        . "Item_Id2=$itemid2,Description2='$food2',Quantity2=$quantity2,"
        . "Item_Id3=$itemid3,Description3='$food3',Quantity3=$quantity3,"
        . "Order_Amount=$orderamount where order_id=$id";
echo "update patient_canteen_order set Patient_Id=$npatientid,Order_Date='$orderdate',"
        . "Item_Id1=$itemid1,Description1='$food',Quantity1=$quantity1,"
        . "Item_Id2=$itemid2,Description2='$food2',Quantity2=$quantity2,"
        . "Item_Id3=$itemid3,Description3='$food3',Quantity3=$quantity3,"
        . "Order_Amount=$orderamount where order_id=$id";
if(mysqli_query($conn,$sql))
    {
        header("Location:canteen_order_display.php?admin_name=$login_name&patient_id=$npatientid&treatment_id=$treatment_id");
    }
    else
    {
        echo "<script>alert('Canteen Order not Updated');"
        . "window.location.href = 'canteen_order_display.php?admin_name=$login_name&patient_id=$npatientid&treatment_id=$treatment_id';</script>";
    }
}      
        
