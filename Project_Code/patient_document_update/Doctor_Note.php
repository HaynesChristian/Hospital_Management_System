<?php
$con_servername = "localhost";
$con_username = "root";
$con_password = "";
$database = "hospital_management_system";

$connection = mysqli_connect($con_servername, $con_username, $con_password, $database);

$patient_id = $_GET["patient_id"];
$treatment_id = $_GET["treatment_id"];
$Doctor_Note_id = $_GET["Doctor_Note_id"];

$current_date = date("Y-m-d");
date_default_timezone_set("Asia/Kolkata");
$current_time = date("H:i");

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
            width: auto;
        }
        td.bzero
        {
            border: 0;
        }
        textarea
        {
            border: 0;
            margin: 0;
            width: 99%;
        }
        </style>        
    </head>
    <body class="container" style="font-family: Times New Roman;">
        <img src="../images/tattvam_banner.jpg" align='right'>
        <h2>
            <span style="padding-left: 15px; padding-right: 15px;">
                DOCTOR'S NOTE
            </span>
        </h2>
        <?php
            $view_patient_dn = "SELECT patient.Patient_Name , illness_complaint.Reg_date , treatment_doctor_note.* , "
                    . "illness_complaint.Reg_time , illness_complaint.Attending_consultant "
                    . "FROM patient , illness_complaint , treatment_doctor_note "
                    . "WHERE patient.Patient_id = $patient_id AND illness_complaint.Treatment_id = $treatment_id "
                    . "AND treatment_doctor_note.Doctor_Note_id = $Doctor_Note_id";
            $result_patient_dn = mysqli_query($connection, $view_patient_dn);
            if(mysqli_num_rows($result_patient_dn) > 0)
            {
                while ($row_patient_dn = mysqli_fetch_assoc($result_patient_dn)) 
                {        
        ?>
        <br>
        <div class="justify-content-center" style="padding-top: 2%;">
            <form action="Update_Doctor_Note.php" method="POST">
                <input type="hidden" value="<?php echo $login_name;?>" name="admin_name">
                <input type="hidden" value="<?php echo $treatment_id;?>" name="treatment_id">
                <input type="hidden" value="<?php echo $patient_id;?>" name="patient_id">
                <input type="hidden" value="<?php echo $Doctor_Note_id;?>" name="Doctor_Note_id">                
            <table border="1">
                <tbody>
                    <tr>
                        <td class="bzero">
                            Name of patient:
                            <input type="text" value="<?php echo $row_patient_dn["Patient_Name"];?>" readonly="">
                        </td>
                        <td class="bzero">
                            Room:<input type="number"value="<?php echo $room_no;?>" readonly="">
                            Bed No.:<input type="number" name="bedno" value="<?php echo $bed_no;?>" readonly="">
						</td>
                    </tr>
                    <tr>
                        <td class="bzero">
                            Name of attending in house Doctor:
                            <input type="text" 
                                   value="<?php echo $row_patient_dn["Attending_consultant"];?>" readonly="">
                        </td>
                        <td class="bzero">
                            Reg Date:<input type="date" value="<?php echo $row_patient_dn["Reg_date"];?>" readonly="">
                            Reg Time:<input type="time" value="<?php echo $row_patient_dn["Reg_time"];?>" readonly="">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input type="date" value="<?php echo $row_patient_dn["Doctor_Note_date"];?>" name="note_date">
                            <input type="time" value="<?php echo $row_patient_dn["Doctor_Note_time"];?>" name="note_time">
                        </td>
					</tr>
					<tr>
                        <td colspan="2">
                            <textarea rows="10" cols="125"  name="note_details" required=""><?php echo $row_patient_dn["Doctor_Note_details"];?></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <span style="float:right; padding-right: 100px">Sign</span>	
                        </td>
                    </tr>
                </tbody>
            </table>
            <input type="submit" value="Update"id="updbtn">
            <button onclick="printdoc()" id="prtbtn">Print</button>
            <script>
                function printdoc()
                {
                    document.getElementById('updbtn').style.display = "none";
                    document.getElementById('prtbtn').style.display = "none";                
                    window.print();                
                }            
            </script>
            </form>
            <?php
                }
            }            
            ?>
        </div>
    </body>
</html>
