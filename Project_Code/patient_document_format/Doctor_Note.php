<?php
$con_servername = "localhost";
$con_username = "root";
$con_password = "";
$database = "hospital_management_system";

$connection = mysqli_connect($con_servername, $con_username, $con_password, $database);

$patient_id = $_GET["patient_id"];
$treatment_id = $_GET["treatment_id"];

$view_patient = "SELECT patient.Patient_Name , illness_complaint.Reg_date , "
        . "illness_complaint.Reg_time , illness_complaint.Attending_consultant "
        . "FROM patient , illness_complaint "
        . "WHERE patient.Patient_id = $patient_id AND illness_complaint.Treatment_id = $treatment_id";
$result_patient = mysqli_query($connection, $view_patient);
if(mysqli_num_rows($result_patient) > 0)
{
    while ($row_patient = mysqli_fetch_assoc($result_patient)) 
    {
        $patient_name = $row_patient["Patient_Name"];
        $reg_date = $row_patient["Reg_date"];
        $reg_time = $row_patient["Reg_time"];
        $att_consultant_name = $row_patient["Attending_consultant"];
    }
}
$room_select = "SELECT * FROM patient_admission WHERE Treatment_id = $treatment_id";
$result_room = mysqli_query($connection, $room_select);
if(mysqli_num_rows($result_room)>0)
{
    while($row_room= mysqli_fetch_assoc($result_room))
    {
        $room_no = $row_room["Room_no"];
		$bed_no = $row_room["Bed_no"];		
    }
}
$current_date = date("Y-m-d");
date_default_timezone_set("Asia/Kolkata");
$current_time = date("H:i");
if($_GET)
{
    $login_name=$_GET["admin_name"];
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Doctor's Note</title>        
        <style>
        h2 
        { 
            display: flex; 
            flex-direction: row;
        } 
          
        h2:before, 
        h2:after 
        { 
            content: ""; 
            flex: 1 1; 
            border-bottom: 10px solid #000; 
            margin: auto; 
        }
        table
        {
            width: 100%;
            border-collapse: collapse;
            border-spacing: 0;
            padding: 0;
            margin: 0;
            line-height: 2;
            table-layout: auto;
            white-space: nowrap;
        }
        td
        {
            border-spacing: 0;
            border: 1px solid black;
            padding: 0;
            margin: 0;
            white-space: nowrap;
        }
        img
        {
            height: 20%;
            width: 20%;
        }
        input:not([type="submit"])
        {
            border: 0;
            padding-left: 2%;            
        }
        td.bzero
        {
            border: 0;
        }
        textarea
        {
            width: 99%;
            border: 0;
            margin: 0;
        }
        </style>        
    </head>
    <body class="container" style="font-family: Times New Roman;">
        <img src="../images/tattvam_banner.jpg" align='right'/>
        <h2>
            <span style="padding-left: 15px; padding-right: 15px;">
                DOCTOR'S NOTE
            </span>
        </h2>
        <br>
        <div class="justify-content-center" style="padding-top: 2%;">
            <form action="../Doctor_Note_Add.php" method="POST">
                <input type="hidden" value="<?php echo $login_name;?>" name="admin_name">
                <input type="hidden" value="<?php echo $treatment_id;?>" name="treatment_id">
                <input type="hidden" value="<?php echo $patient_id;?>" name="patient_id">                
            <table border="1">
                <tbody>
                    <tr>
                        <td class="bzero">
                            Name of patient:<input type="text" value="<?php echo $patient_name;?>">
                        </td>
                        <td class="bzero">
                            Room:<input type="number"value="<?php echo $room_no;?>" readonly="">
                            Bed No.:<input type="number" name="bedno" value="<?php echo $bed_no;?>" readonly="">
						</td>
                    </tr>
                    <tr>
                        <td class="bzero">
                            Name of attending in house Doctor:<input type="text" value="<?php echo $att_consultant_name;?>">
                        </td>
                        <td class="bzero">
                            Reg Date:<input type="date" value="<?php echo $reg_date;?>">
                            Reg Time:<input type="time" value="<?php echo $reg_time;?>">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input type="date" value="<?php echo $current_date;?>" name="note_date">
                            <input type="time" value="<?php echo $current_time;?>" name="note_time">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2"><textarea rows="10" cols="150" name="note_details" required=""></textarea></td>
                    </tr>					
                    <tr>
                        
                        <td colspan="2">
						<div style="float:right; padding-right: 150px">
                            <span>Sign</span>
						</div>	
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
                <input type="submit" value="Next">
            </form>		
    </body>
</html>
