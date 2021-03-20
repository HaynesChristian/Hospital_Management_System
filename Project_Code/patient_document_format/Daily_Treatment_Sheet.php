<?php
$con_servername = "localhost";
$con_username = "root";
$con_password = "";
$database = "hospital_management_system";

$connection = mysqli_connect($con_servername, $con_username, $con_password, $database);

$patient_id = $_GET["patient_id"];
$treatment_id = $_GET["treatment_id"];
$admission_time = $_GET["admission_time"];
$admission_date = $_GET["admission_date"];

$view_patient = "SELECT Patient_Age, Patient_Name FROM patient WHERE Patient_id = $patient_id";
$result_patient = mysqli_query($connection, $view_patient);
if(mysqli_num_rows($result_patient) > 0)
{
    while ($row_patient = mysqli_fetch_assoc($result_patient)) 
    {
        $patient_age = $row_patient["Patient_Age"];
		$Patient_Name = $row_patient["Patient_Name"];
    }
}

$room_select = "SELECT * FROM patient_admission WHERE Treatment_id = $treatment_id AND "
        . "Patient_Admission_date = '$admission_date' AND Patient_Admission_time = '$admission_time'";
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
        <title>Daily Treatment Sheet</title>
        <style>
        /*for title*/
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
        img
        {
            height: 20%;
            width: 20%;
        }
        
        /*others*/
        table
        {
            width: 100%;
            border-spacing: 0;
            border-radius: 10px;
            border: 1px solid black;
            padding: 0;
            margin: 0;
            white-space: nowrap;
        }
        table.medict
        {
            width: 100%;
            border-spacing: 0;
            border-collapse: collapse;
            padding: 0;
            margin: 0;
            table-layout: auto;
            white-space: nowrap;
        }        
        td
        {
            border:0;
            border-spacing: 0;
            margin: 0;
			padding: 0;
            white-space: nowrap;
			width: min-content;
        }
		th
		{
			white-space: nowrap;
			width: min-content;
			padding: 0;
		}
        td.medic
        {
            border:1px solid black;
            border-spacing: 0;
            padding: 0;
            margin: 0;
            white-space: nowrap;
        }
        select,input:not([type="submit"])
        {
            border: 0;
            border-bottom: 1px solid black;
            padding-left: 2%;
            width: fit-content;
        }
        input.medicr
        {
            border: 0;
            margin: 0;
            padding: 0;
        }
        input.medictime
        {
            border: 0;
            margin: 0;
            padding: 0;
			width: 50px;
        }		
        textarea
        {
			width: 95%;
            border:0;
			margin: 1%;
        }
        </style>        
    </head>
    <body class="container" style="font-family: Times New Roman;">
        <img src="../images/tattvam_banner.jpg" align='right'>
        <h2>
            <span style="padding-left: 15px; padding-right: 15px;">
                DAILY TREATMENT SHEET
            </span>
        </h2>
        <div class="justify-content-center" style="padding-top: 2%;">
            <form action="../Daily_Treatment_Sheet_Add.php" method="POST" autocomplete="off">
                <input type="hidden" value="<?php echo $login_name;?>" name="admin_name">
                <input type="hidden" value="<?php echo $treatment_id;?>" name="treatment_id">
                <input type="hidden" value="<?php echo $patient_id;?>" name="patient_id">            
            <table style="border:0;">
                <tbody>
                    <tr>
                        <td style="padding: 10px;">
                            <table border="1">
                                <tr>
                                    <td style="padding: 15px">
                                        ROOM NO:<input type="text" value="<?php echo $room_no;?>" readonly=""><br>
                                        BED NO:<input type="number" value="<?php echo $bed_no;?>" readonly=""><br>
                                        DATE:<input type="date" name="daily_date" value="<?php echo $current_date;?>" required=""><br>
                                        DIET:<input type="number" name="diet"><br>
                                        AGE:<input type="number" value="<?php echo $patient_age;?>" readonly=""><br>
                                    </td>
                                    <td style="padding: 15px;border-left: 1px solid black">
                                        CVC:<input type="number" name="cvc"><br>
                                        CATHER:<input type="text" name="cather"><br>
                                        RYLES TUBE:<input type="number" name="ryles_tube"><br>
										Post Opp.Day
										<input type="number" name="opr_day">														  
                                        <!--T.T. DAY:<input type="number" name="tt_day"
                                                        value="<?php //echo $row_patient_dts["TT_day"];?>">--><br>
                                        DRAIN DAY:<input type="number" name="drain_day"><br>
                                    </td>
                                </tr>
                            </table>                            
                        </td>
                        <td style="text-align: right; padding: 10px;">
                            <textarea cols="40" rows="9"  readonly="" style="border: 1px solid black; border-radius: 10px;"><?php echo $Patient_Name;?></textarea>
                        </td>
                    </tr>
                </tbody>
            </table>

            <table border="1" class="medict">
                <thead>
                    <tr>
                        <th>Day</th>
                        <th>Medication</th>
                        <th>Dose</th>
                        <th>Route</th>
                        <th>8am<br>to<br>2pm</th>
                        <th>2pm<br>to<br>8pm</th>
                        <th>8pm<br>to<br>2am</th>
                        <th>2am<br>to<br>8am</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="medic"><input type="number" class="medicr" name="adm_day" style="width:40px;"></td>
                        <td class="medic" colspan="7" style="padding-left: 1%">
                            Injections / Infusion
                        </td>
                    </tr>
                    <tr>
                       <td class="medic"></td>
                       <td class="medic"><input type="text" class="medicr" name="injection_detail[]"></td>
                       <td class="medic"><input type="number" class="medicr" name="injection_dose[]"></td>
                       <td class="medic"><input type="text" class="medicr" name="injection_route[]"></td>
                       <td class="medic"><input type="text" class="medictime" name="injection_time1[]"/></td>
                       <td class="medic"><input type="text" class="medictime" name="injection_time1[]"/></td>
                       <td class="medic"><input type="text" class="medictime" name="injection_time1[]"/></td>
                       <td class="medic"><input type="text" class="medictime" name="injection_time1[]"/></td>
                    </tr>
                    <tr>
                       <td class="medic"></td>                       
                       <td class="medic"><input type="text" class="medicr" name="injection_detail[]"></td>
                       <td class="medic"><input type="number" class="medicr" name="injection_dose[]"></td>
                       <td class="medic"><input type="text" class="medicr" name="injection_route[]"></td>
                       <td class="medic"><input type="text" class="medictime" name="injection_time2[]"/></td>
                       <td class="medic"><input type="text" class="medictime" name="injection_time2[]"/></td>
                       <td class="medic"><input type="text" class="medictime" name="injection_time2[]"/></td>
                       <td class="medic"><input type="text" class="medictime" name="injection_time2[]"/></td>
                    </tr>
                    <tr>
                       <td class="medic"></td>                       
                       <td class="medic"><input type="text" class="medicr" name="injection_detail[]"></td>
                       <td class="medic"><input type="number" class="medicr" name="injection_dose[]"></td>
                       <td class="medic"><input type="text" class="medicr" name="injection_route[]"></td>
                       <td class="medic"><input type="text" class="medictime" name="injection_time3[]"/></td>
                       <td class="medic"><input type="text" class="medictime" name="injection_time3[]"/></td>
                       <td class="medic"><input type="text" class="medictime" name="injection_time3[]"/></td>
                       <td class="medic"><input type="text" class="medictime" name="injection_time3[]"/></td>
                    </tr>
                    <tr>
                       <td class="medic"></td>                       
                       <td class="medic"><input type="text" class="medicr" name="injection_detail[]"></td>
                       <td class="medic"><input type="number" class="medicr" name="injection_dose[]"></td>
                       <td class="medic"><input type="text" class="medicr" name="injection_route[]"></td>
                       <td class="medic"><input type="text" class="medictime" name="injection_time4[]"/></td>
                       <td class="medic"><input type="text" class="medictime" name="injection_time4[]"/></td>
                       <td class="medic"><input type="text" class="medictime" name="injection_time4[]"/></td>
                       <td class="medic"><input type="text" class="medictime" name="injection_time4[]"/></td>
                    </tr>
                    <tr>
                       <td class="medic"></td>                       
                       <td class="medic"><input type="text" class="medicr" name="injection_detail[]"></td>
                       <td class="medic"><input type="number" class="medicr" name="injection_dose[]"></td>
                       <td class="medic"><input type="text" class="medicr" name="injection_route[]"></td>
                       <td class="medic"><input type="text" class="medictime" name="injection_time5[]"/></td>
                       <td class="medic"><input type="text" class="medictime" name="injection_time5[]"/></td>
                       <td class="medic"><input type="text" class="medictime" name="injection_time5[]"/></td>
                       <td class="medic"><input type="text" class="medictime" name="injection_time5[]"/></td>
                    </tr>
                    <tr>
                       <td class="medic"></td>                       
                       <td class="medic"><input type="text" class="medicr" name="injection_detail[]"></td>
                       <td class="medic"><input type="number" class="medicr" name="injection_dose[]"></td>
                       <td class="medic"><input type="text" class="medicr" name="injection_route[]"></td>
                       <td class="medic"><input type="text" class="medictime" name="injection_time6[]"/></td>
                       <td class="medic"><input type="text" class="medictime" name="injection_time6[]"/></td>
                       <td class="medic"><input type="text" class="medictime" name="injection_time6[]"/></td>
                       <td class="medic"><input type="text" class="medictime" name="injection_time6[]"/></td>
                    </tr>
                    <tr>
                       <td class="medic"></td>                       
                       <td class="medic"><input type="text" class="medicr" name="injection_detail[]"></td>
                       <td class="medic"><input type="number" class="medicr" name="injection_dose[]"></td>
                       <td class="medic"><input type="text" class="medicr" name="injection_route[]"></td>
                       <td class="medic"><input type="text" class="medictime" name="injection_time7[]"/></td>
                       <td class="medic"><input type="text" class="medictime" name="injection_time7[]"/></td>
                       <td class="medic"><input type="text" class="medictime" name="injection_time7[]"/></td>
                       <td class="medic"><input type="text" class="medictime" name="injection_time7[]"/></td>
                    </tr>
                    <tr>
                       <td class="medic"></td>                       
                       <td class="medic"><input type="text" class="medicr" name="injection_detail[]"></td>
                       <td class="medic"><input type="number" class="medicr" name="injection_dose[]"></td>
                       <td class="medic"><input type="text" class="medicr" name="injection_route[]"></td>
                       <td class="medic"><input type="text" class="medictime" name="injection_time8[]"/></td>
                       <td class="medic"><input type="text" class="medictime" name="injection_time8[]"/></td>
                       <td class="medic"><input type="text" class="medictime" name="injection_time8[]"/></td>
                       <td class="medic"><input type="text" class="medictime" name="injection_time8[]"/></td>
                    </tr>                    
                    <tr>
						<td></td>
						<td class="medic" colspan="8" style="padding-left: 1%">Tab / Cap / Liq. / Inhalation</td>
                    </tr>
                    <tr>
                       <td class="medic"></td>                       
                       <td class="medic"><input type="text" class="medicr" name="tabcap_detail[]"></td>
                       <td class="medic"><input type="number" class="medicr" name="tabcap_dose[]"></td>
                       <td class="medic"><input type="text" class="medicr" name="tabcap_route[]"></td>
                       <td class="medic"><input type="text" class="medictime" name="tabcap_time1[]"/></td>
                       <td class="medic"><input type="text" class="medictime" name="tabcap_time1[]"/></td>
                       <td class="medic"><input type="text" class="medictime" name="tabcap_time1[]"/></td>
                       <td class="medic"><input type="text" class="medictime" name="tabcap_time1[]"/></td>
                    </tr>
                    <tr>
                       <td class="medic"></td>                       
                       <td class="medic"><input type="text" class="medicr" name="tabcap_detail[]"></td>
                       <td class="medic"><input type="number" class="medicr" name="tabcap_dose[]"></td>
                       <td class="medic"><input type="text" class="medicr" name="tabcap_route[]"></td>
                       <td class="medic"><input type="text" class="medictime" name="tabcap_time2[]"/></td>
                       <td class="medic"><input type="text" class="medictime" name="tabcap_time2[]"/></td>
                       <td class="medic"><input type="text" class="medictime" name="tabcap_time2[]"/></td>
                       <td class="medic"><input type="text" class="medictime" name="tabcap_time2[]"/></td>
                    </tr>
                    <tr>
                       <td class="medic"></td>                       
                       <td class="medic"><input type="text" class="medicr" name="tabcap_detail[]"></td>
                       <td class="medic"><input type="number" class="medicr" name="tabcap_dose[]"></td>
                       <td class="medic"><input type="text" class="medicr" name="tabcap_route[]"></td>
                       <td class="medic"><input type="text" class="medictime" name="tabcap_time3[]"/></td>
                       <td class="medic"><input type="text" class="medictime" name="tabcap_time3[]"/></td>
                       <td class="medic"><input type="text" class="medictime" name="tabcap_time3[]"/></td>
                       <td class="medic"><input type="text" class="medictime" name="tabcap_time3[]"/></td>
                    </tr>
                    <tr>
                       <td class="medic"></td>                       
                       <td class="medic"><input type="text" class="medicr" name="tabcap_detail[]"></td>
                       <td class="medic"><input type="number" class="medicr" name="tabcap_dose[]"></td>
                       <td class="medic"><input type="text" class="medicr" name="tabcap_route[]"></td>
                       <td class="medic"><input type="text" class="medictime" name="tabcap_time4[]"/></td>
                       <td class="medic"><input type="text" class="medictime" name="tabcap_time4[]"/></td>
                       <td class="medic"><input type="text" class="medictime" name="tabcap_time4[]"/></td>
                       <td class="medic"><input type="text" class="medictime" name="tabcap_time4[]"/></td>
                    </tr>
                    <tr>
                       <td class="medic"></td>                       
                       <td class="medic"><input type="text" class="medicr" name="tabcap_detail[]"></td>
                       <td class="medic"><input type="number" class="medicr" name="tabcap_dose[]"></td>
                       <td class="medic"><input type="text" class="medicr" name="tabcap_route[]"></td>
                       <td class="medic"><input type="text" class="medictime" name="tabcap_time5[]"/></td>
                       <td class="medic"><input type="text" class="medictime" name="tabcap_time5[]"/></td>
                       <td class="medic"><input type="text" class="medictime" name="tabcap_time5[]"/></td>
                       <td class="medic"><input type="text" class="medictime" name="tabcap_time5[]"/></td>
                    </tr>
                    <tr>
                       <td class="medic"></td>                       
                       <td class="medic"><input type="text" class="medicr" name="tabcap_detail[]"></td>
                       <td class="medic"><input type="number" class="medicr" name="tabcap_dose[]"></td>
                       <td class="medic"><input type="text" class="medicr" name="tabcap_route[]"></td>
                       <td class="medic"><input type="text" class="medictime" name="tabcap_time6[]"/></td>
                       <td class="medic"><input type="text" class="medictime" name="tabcap_time6[]"/></td>
                       <td class="medic"><input type="text" class="medictime" name="tabcap_time6[]"/></td>
                       <td class="medic"><input type="text" class="medictime" name="tabcap_time6[]"/></td>
                    </tr>
                    <tr>
                       <td class="medic"></td>                       
                       <td class="medic"><input type="text" class="medicr" name="tabcap_detail[]"></td>
                       <td class="medic"><input type="number" class="medicr" name="tabcap_dose[]"></td>
                       <td class="medic"><input type="text" class="medicr" name="tabcap_route[]"></td>
                       <td class="medic"><input type="text" class="medictime" name="tabcap_time7[]"/></td>
                       <td class="medic"><input type="text" class="medictime" name="tabcap_time7[]"/></td>
                       <td class="medic"><input type="text" class="medictime" name="tabcap_time7[]"/></td>
                       <td class="medic"><input type="text" class="medictime" name="tabcap_time7[]"/></td>
                    </tr>
                    <tr>
                       <td class="medic"></td>                       
                       <td class="medic"><input type="text" class="medicr" name="tabcap_detail[]"></td>
                       <td class="medic"><input type="number" class="medicr" name="tabcap_dose[]"></td>
                       <td class="medic"><input type="text" class="medicr" name="tabcap_route[]"></td>
                       <td class="medic"><input type="text" class="medictime" name="tabcap_time8[]"/></td>
                       <td class="medic"><input type="text" class="medictime" name="tabcap_time8[]"/></td>
                       <td class="medic"><input type="text" class="medictime" name="tabcap_time8[]"/></td>
                       <td class="medic"><input type="text" class="medictime" name="tabcap_time8[]"/></td>
                    </tr>
                    <tr>
                       <td class="medic"></td>                       
                       <td class="medic"><input type="text" class="medicr" name="tabcap_detail[]"></td>
                       <td class="medic"><input type="number" class="medicr" name="tabcap_dose[]"></td>
                       <td class="medic"><input type="text" class="medicr" name="tabcap_route[]"></td>
                       <td class="medic"><input type="text" class="medictime" name="tabcap_time9[]"/></td>
                       <td class="medic"><input type="text" class="medictime" name="tabcap_time9[]"/></td>
                       <td class="medic"><input type="text" class="medictime" name="tabcap_time9[]"/></td>
                       <td class="medic"><input type="text" class="medictime" name="tabcap_time9[]"/></td>
                    </tr>
                    <tr>
                       <td class="medic"></td>                       
                       <td class="medic"><input type="text" class="medicr" name="tabcap_detail[]"></td>
                       <td class="medic"><input type="number" class="medicr" name="tabcap_dose[]"></td>
                       <td class="medic"><input type="text" class="medicr" name="tabcap_route[]"></td>
                       <td class="medic"><input type="text" class="medictime" name="tabcap_time10[]"/></td>
                       <td class="medic"><input type="text" class="medictime" name="tabcap_time10[]"/></td>
                       <td class="medic"><input type="text" class="medictime" name="tabcap_time10[]"/></td>
                       <td class="medic"><input type="text" class="medictime" name="tabcap_time10[]"/></td>
                    </tr>
                    <tr>
                       <td class="medic"></td>                       
                       <td class="medic"><input type="text" class="medicr" name="tabcap_detail[]"></td>
                       <td class="medic"><input type="number" class="medicr" name="tabcap_dose[]"></td>
                       <td class="medic"><input type="text" class="medicr" name="tabcap_route[]"></td>
                       <td class="medic"><input type="text" class="medictime" name="tabcap_time11[]"/></td>
                       <td class="medic"><input type="text" class="medictime" name="tabcap_time11[]"/></td>
                       <td class="medic"><input type="text" class="medictime" name="tabcap_time11[]"/></td>
                       <td class="medic"><input type="text" class="medictime" name="tabcap_time11[]"/></td>
                    </tr>
                </tbody>
            </table>
            <br>
            
            <table border="1" class="medict">
                <tbody>
                    <tr>
                        <td class="medic" colspan="3">Plan for Today/Ref:-</td>
                    </tr>
                    <tr>
                        <td class="medic" colspan="3">
                            <textarea rows="5" cols="160" name="today_plan" required=""></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td class="medic">Plan for Tomorrow</td>
                        <td class="medic">Name,Sign of RMO<br>Date & Time</td>
                        <td class="medic">Name,Sign of Staff Nurse<br>Date & Time</td>
                    </tr>
                    <tr>
                        <td class="medic">
                            <textarea rows="5" cols="120" name="tmr_plan" required=""></textarea>
                        </td>
                        <td class="medic">
                            <textarea rows="5" cols="20" readonly=""></textarea>
                        </td>
                        <td class="medic">
                            <textarea rows="5" cols="20" readonly=""></textarea>
                        </td>
                    </tr>
                </tbody>
            </table>
            <input type="submit" value="Next">
            </form>
        </div>
    </body>
</html>
