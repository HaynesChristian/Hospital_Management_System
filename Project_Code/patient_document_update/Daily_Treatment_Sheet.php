<?php
$con_servername = "localhost";
$con_username = "root";
$con_password = "";
$database = "hospital_management_system";

$connection = mysqli_connect($con_servername, $con_username, $con_password, $database);

$patient_id = $_GET["patient_id"];
$treatment_id = $_GET["treatment_id"];
$Daily_Treatment_id = $_GET["Daily_Treatment_id"];
$admission_time = $_GET["admission_time"];
$admission_date = $_GET["admission_date"];

$current_date = date("Y-m-d");
date_default_timezone_set("Asia/Kolkata");
$current_time = date("H:i");

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
            text-align: justify;
            border:0;
            border-spacing: 0;
            margin: 0;
            white-space: nowrap;
			width: min-content;
        }
		th
		{
			white-space: nowrap;
			width: min-content;
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
			width: fit-content;
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
            <?php
                $view_patient_dts = "SELECT patient.Patient_Name , patient.Patient_Age , treatment_patient_dailytreatment.* "
                        . "FROM patient, treatment_patient_dailytreatment "
                        . "WHERE patient.Patient_id = $patient_id AND "
                        . "treatment_patient_dailytreatment.Daily_Treatment_id = $Daily_Treatment_id";
                $result_patient_dts = mysqli_query($connection, $view_patient_dts);
                if(mysqli_num_rows($result_patient_dts) > 0)
                {
                    while ($row_patient_dts = mysqli_fetch_assoc($result_patient_dts)) 
                    {           
            ?>
            <form action="Update_Daily_Treatment_Sheet.php" method="POST" autocomplete="off">
                <input type="hidden" value="<?php echo $login_name;?>" name="admin_name">
                <input type="hidden" value="<?php echo $treatment_id;?>" name="treatment_id">
                <input type="hidden" value="<?php echo $patient_id;?>" name="patient_id">
                <input type="hidden" value="<?php echo $admission_time;?>" name="admission_time">
                <input type="hidden" value="<?php echo $admission_date;?>" name="admission_date">
                <input type="hidden" value="<?php echo $Daily_Treatment_id;?>" name="Daily_Treatment_id">
            <table style="border:0;">
                <tbody>
                    <tr>
                        <td style="padding: 10px;">
                            <table border="1">
                                <tr>
                                    <td style="padding: 15px">
                                        ROOM NO:<input type="hidden" value="<?php echo $room_no;?>" name="previous_room">
                                        <select name="room_no">
                                            <option value="<?php echo $room_no;?>"><?php echo $room_no;?> (selected) </option>
                                        <?php 
                                            $room_select = "SELECT * FROM room_master WHERE room_status = 'Available'";
                                            $result_room = mysqli_query($connection, $room_select);
                                            if(mysqli_num_rows($result_room)>0)
                                            {
                                                while($row_room= mysqli_fetch_assoc($result_room))
                                                {
                                        ?>
                                            <option value="<?php echo $row_room["room_id"];?>">
                                                <?php echo $row_room["room_id"];?>
                                            </option>
                                        <?php
                                                }
                                            }
                                        ?>
                                        </select>
                                        <br>
                                        BED NO:<input type="number" value="<?php echo $bed_no;?>" readonly=""><br>
                                        DATE:<input type="date" name="daily_date" 
                                                    value="<?php echo $row_patient_dts["Daily_Treatment_date"];?>"><br>
                                        DIET:<input type="number" name="diet"
                                                    value="<?php echo $row_patient_dts["Diet"];?>"><br>
                                        AGE:<input type="number" 
                                                   value="<?php echo $row_patient_dts["Patient_Age"];?>" readonly=""><br>
                                    </td>
                                    <td style="padding: 15px;border-left: 1px solid black">
                                        CVC:<input type="number" name="cvc"
                                                   value="<?php echo $row_patient_dts["CVC"];?>"><br>
                                        CATHER:<input type="text" name="cather"
                                                      value="<?php echo $row_patient_dts["Cather"];?>"><br>
                                        RYLES TUBE:<input type="number" name="ryles_tube"
                                                          value="<?php echo $row_patient_dts["Ryles_Tube"];?>"><br>
										Post Opp.Day
										<input type="number" name="opr_day" value="<?php echo $row_patient_dts["Day_after_operation"];?>">														  
                                        <!--T.T. DAY:<input type="number" name="tt_day"
                                                        value="<?php //echo $row_patient_dts["TT_day"];?>">--><br>
                                        DRAIN DAY:<input type="number" name="drain_day"
                                                         value="<?php echo $row_patient_dts["Drain_day"];?>"><br>
                                    </td>
                                </tr>
                            </table>                            
                        </td>
                        <td style="text-align: right; padding: 10px;">
                            <textarea cols="40" rows="9" style="border: 1px solid black; border-radius: 10px;"><?php echo $row_patient_dts["Patient_Name"];?></textarea>
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
                        <th>8am<br>to<br>2pm<br></th>
                        <th>2pm<br>to<br>8pm</th>
                        <th>8pm<br>to<br>2am</th>
                        <th>2am<br>to<br>8am</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
						<td><input type="number" class="medicr" name="adm_day" style="width:40px;" value="<?php echo $row_patient_dts["Day_after_admission"];?>"></td>
                        <td class="medic" colspan="7" style="padding-left: 2%">Injections / Infusion</td>
                    </tr>
                    <?php
                    $injno=0;
                    $dt_id = $row_patient_dts['Daily_Treatment_id'];
                    $view_patient_dm = "SELECT * FROM treatment_patient_dailymedications "
                            . "WHERE Daily_Treatment_id = $dt_id";
                    $result_patient_dm = mysqli_query($connection, $view_patient_dm);
                    if(mysqli_num_rows($result_patient_dm) > 0)
                    {
                        while ($row_patient_dm = mysqli_fetch_assoc($result_patient_dm)) 
                        {
                            $injno++;
							if($row_patient_dm["Injection_details"] != "")
							{
                    ?>
                    <tr>
                       <td class="medic"></td>
                       <td class="medic">
                           <input type="text" class="medicr" name="injection_detail[]"
                                  value="<?php echo $row_patient_dm["Injection_details"];?>">
                       </td>
                       <td class="medic">
                           <input type="number" class="medicr" name="injection_dose[]"
                                  value="<?php echo $row_patient_dm["Injection_dose"];?>">
                       </td>
                       <td class="medic">
                           <input type="text" class="medicr" name="injection_route[]"
                                  value="<?php echo $row_patient_dm["Injection_route"];?>">
                       </td>
							<?php
							$injec_time = explode(",",ltrim($row_patient_dm["Injection_time"],","));
							//print_r ($injec_time);
							?>					   
                       <td class="medic">
                           <input type="text" class="medictime" name="injection_time<?php echo $injno?>[]" value="<?php print_r ($injec_time[0]);?>"/>
                       </td>
                       <td class="medic">
                           <input type="text" class="medictime" name="injection_time<?php echo $injno?>[]" value="<?php print_r ($injec_time[1]);?>"/>
                       </td>
                       <td class="medic">
                           <input type="text" class="medictime" name="injection_time<?php echo $injno?>[]" value="<?php print_r ($injec_time[2]);?>"/>
                       </td>
                       <td class="medic">
                           <input type="text" class="medictime" name="injection_time<?php echo $injno?>[]" value="<?php print_r ($injec_time[3]);?>"/>
                       </td>
                    </tr>
                    <?php
							}
                        }
                    }                    
                    ?>
                    <tr>
                       <td class="medic"><?php $injno++?></td>
                       <td class="medic"><input type="text" class="medicr" name="injection_detail[]"></td>
                       <td class="medic"><input type="number" class="medicr" name="injection_dose[]"></td>
                       <td class="medic"><input type="text" class="medicr" name="injection_route[]"></td>
                       <td class="medic"><input type="text" class="medictime" name="injection_time<?php echo $injno?>[]" /></td>
                       <td class="medic"><input type="text" class="medictime" name="injection_time<?php echo $injno?>[]" /></td>
                       <td class="medic"><input type="text" class="medictime" name="injection_time<?php echo $injno?>[]"/></td>
                       <td class="medic"><input type="text" class="medictime" name="injection_time<?php echo $injno?>[]"/></td>
                    </tr>
                    <tr>
                       <td class="medic"><?php $injno++?></td>                       
                       <td class="medic"><input type="text" class="medicr" name="injection_detail[]"></td>
                       <td class="medic"><input type="number" class="medicr" name="injection_dose[]"></td>
                       <td class="medic"><input type="text" class="medicr" name="injection_route[]"></td>
                       <td class="medic"><input type="text" class="medictime" name="injection_time<?php echo $injno?>[]" /></td>
                       <td class="medic"><input type="text" class="medictime" name="injection_time<?php echo $injno?>[]" /></td>
                       <td class="medic"><input type="text" class="medictime" name="injection_time<?php echo $injno?>[]"/></td>
                       <td class="medic"><input type="text" class="medictime" name="injection_time<?php echo $injno?>[]"/></td>
                    </tr>
                    <tr>
                       <td class="medic"><?php $injno++?></td>                       
                       <td class="medic"><input type="text" class="medicr" name="injection_detail[]"></td>
                       <td class="medic"><input type="number" class="medicr" name="injection_dose[]"></td>
                       <td class="medic"><input type="text" class="medicr" name="injection_route[]"></td>
                       <td class="medic"><input type="text" class="medictime" name="injection_time<?php echo $injno?>[]" /></td>
                       <td class="medic"><input type="text" class="medictime" name="injection_time<?php echo $injno?>[]" /></td>
                       <td class="medic"><input type="text" class="medictime" name="injection_time<?php echo $injno?>[]"/></td>
                       <td class="medic"><input type="text" class="medictime" name="injection_time<?php echo $injno?>[]"/></td>
                    </tr>
                    <tr>
                       <td class="medic"><?php $injno++?></td>                       
                       <td class="medic"><input type="text" class="medicr" name="injection_detail[]"></td>
                       <td class="medic"><input type="number" class="medicr" name="injection_dose[]"></td>
                       <td class="medic"><input type="text" class="medicr" name="injection_route[]"></td>
                       <td class="medic"><input type="text" class="medictime" name="injection_time<?php echo $injno?>[]" /></td>
                       <td class="medic"><input type="text" class="medictime" name="injection_time<?php echo $injno?>[]" /></td>
                       <td class="medic"><input type="text" class="medictime" name="injection_time<?php echo $injno?>[]"/></td>
                       <td class="medic"><input type="text" class="medictime" name="injection_time<?php echo $injno?>[]"/></td>
                    </tr>
                    <tr>
                       <td class="medic"><?php $injno++?></td>                       
                       <td class="medic"><input type="text" class="medicr" name="injection_detail[]"></td>
                       <td class="medic"><input type="number" class="medicr" name="injection_dose[]"></td>
                       <td class="medic"><input type="text" class="medicr" name="injection_route[]"></td>
                       <td class="medic"><input type="text" class="medictime" name="injection_time<?php echo $injno?>[]" /></td>
                       <td class="medic"><input type="text" class="medictime" name="injection_time<?php echo $injno?>[]" /></td>
                       <td class="medic"><input type="text" class="medictime" name="injection_time<?php echo $injno?>[]"/></td>
                       <td class="medic"><input type="text" class="medictime" name="injection_time<?php echo $injno?>[]"/></td>
                    </tr>
                    <tr>
                       <td class="medic"><?php $injno++?></td>                       
                       <td class="medic"><input type="text" class="medicr" name="injection_detail[]"></td>
                       <td class="medic"><input type="number" class="medicr" name="injection_dose[]"></td>
                       <td class="medic"><input type="text" class="medicr" name="injection_route[]"></td>
                       <td class="medic"><input type="text" class="medictime" name="injection_time<?php echo $injno?>[]" /></td>
                       <td class="medic"><input type="text" class="medictime" name="injection_time<?php echo $injno?>[]" /></td>
                       <td class="medic"><input type="text" class="medictime" name="injection_time<?php echo $injno?>[]"/></td>
                       <td class="medic"><input type="text" class="medictime" name="injection_time<?php echo $injno?>[]"/></td>
                    </tr>
                    <tr>
                       <td class="medic"><?php $injno++?></td>                       
                       <td class="medic"><input type="text" class="medicr" name="injection_detail[]"></td>
                       <td class="medic"><input type="number" class="medicr" name="injection_dose[]"></td>
                       <td class="medic"><input type="text" class="medicr" name="injection_route[]"></td>
                       <td class="medic"><input type="text" class="medictime" name="injection_time<?php echo $injno?>[]" /></td>
                       <td class="medic"><input type="text" class="medictime" name="injection_time<?php echo $injno?>[]" /></td>
                       <td class="medic"><input type="text" class="medictime" name="injection_time<?php echo $injno?>[]"/></td>
                       <td class="medic"><input type="text" class="medictime" name="injection_time<?php echo $injno?>[]"/></td>
                    </tr>
                    <tr>
						<td></td>
						<td class="medic" colspan="8" style="padding-left: 2%">Tab / Cap / Liq. / Inhalation</td>
                    </tr>
                    <?php
                    $tcno=0;
                    $view_patient_dm = "SELECT * FROM treatment_patient_dailymedications "
                            . "WHERE Daily_Treatment_id = $dt_id";
                    $result_patient_dm2 = mysqli_query($connection, $view_patient_dm);
                    if(mysqli_num_rows($result_patient_dm2) > 0)
                    {
                        while ($row_patient_dm = mysqli_fetch_assoc($result_patient_dm2)) 
                        {
                            $tcno++;
							if($row_patient_dm["Tab_Cap_details"] != "")
							{							
                    ?>                    
                    <tr>
                       <td class="medic"></td>                       
                       <td class="medic">
                           <input type="text" class="medicr" name="tabcap_detail[]"
                                  value="<?php echo $row_patient_dm["Tab_Cap_details"];?>">
                       </td>
                       <td class="medic">
                           <input type="number" class="medicr" name="tabcap_dose[]"
                                  value="<?php echo $row_patient_dm["Tab_Cap_dose"];?>">
                       </td>
                       <td class="medic">
                           <input type="text" class="medicr" name="tabcap_route[]"
                                  value="<?php echo $row_patient_dm["Tab_Cap_route"];?>">
                       </td>
							<?php
							$tc_time = explode(",",ltrim($row_patient_dm["Tab_Cap_time"],","));
							//echo $row_patient_dm["Injection_time"];
							//print_r ($tc_time);
							?>					   
                       <td class="medic">
                           <input type="text" class="medictime" name="tabcap_time<?php echo $tcno?>[]" value="<?php print_r ($tc_time[0]);?>"/>
                       </td>
                       <td class="medic">
                           <input type="text" class="medictime" name="tabcap_time<?php echo $tcno?>[]" value="<?php print_r ($tc_time[1]);?>"/>
                       </td>
                       <td class="medic">
                           <input type="text" class="medictime" name="tabcap_time<?php echo $tcno?>[]" value="<?php print_r ($tc_time[2]);?>"/>
                       </td>
                       <td class="medic">
                           <input type="text" class="medictime" name="tabcap_time<?php echo $tcno?>[]" value="<?php print_r ($tc_time[3]);?>"/>
                       </td>
                    </tr>
                    <?php
							}
                        }
                    }                    
                    ?>                    
                    <tr>
                       <td class="medic"><?php $tcno++?></td>                       
                       <td class="medic"><input type="text" class="medicr" name="tabcap_detail[]"></td>
                       <td class="medic"><input type="number" class="medicr" name="tabcap_dose[]"></td>
                       <td class="medic"><input type="text" class="medicr" name="tabcap_route[]"></td>
                       <td class="medic"><input type="text" class="medictime" name="tabcap_time<?php echo $tcno?>[]" /></td>
                       <td class="medic"><input type="text" class="medictime" name="tabcap_time<?php echo $tcno?>[]" /></td>
                       <td class="medic"><input type="text" class="medictime" name="tabcap_time<?php echo $tcno?>[]"/></td>
                       <td class="medic"><input type="text" class="medictime" name="tabcap_time<?php echo $tcno?>[]"/></td>
                    </tr>
                    <tr>
                       <td class="medic"><?php $tcno++?></td>                       
                       <td class="medic"><input type="text" class="medicr" name="tabcap_detail[]"></td>
                       <td class="medic"><input type="number" class="medicr" name="tabcap_dose[]"></td>
                       <td class="medic"><input type="text" class="medicr" name="tabcap_route[]"></td>
                       <td class="medic"><input type="text" class="medictime" name="tabcap_time<?php echo $tcno?>[]" /></td>
                       <td class="medic"><input type="text" class="medictime" name="tabcap_time<?php echo $tcno?>[]" /></td>
                       <td class="medic"><input type="text" class="medictime" name="tabcap_time<?php echo $tcno?>[]"/></td>
                       <td class="medic"><input type="text" class="medictime" name="tabcap_time<?php echo $tcno?>[]"/></td>
                    </tr>
                    <tr>
                       <td class="medic"><?php $tcno++?></td>                       
                       <td class="medic"><input type="text" class="medicr" name="tabcap_detail[]"></td>
                       <td class="medic"><input type="number" class="medicr" name="tabcap_dose[]"></td>
                       <td class="medic"><input type="text" class="medicr" name="tabcap_route[]"></td>
                       <td class="medic"><input type="text" class="medictime" name="tabcap_time<?php echo $tcno?>[]" /></td>
                       <td class="medic"><input type="text" class="medictime" name="tabcap_time<?php echo $tcno?>[]" /></td>
                       <td class="medic"><input type="text" class="medictime" name="tabcap_time<?php echo $tcno?>[]"/></td>
                       <td class="medic"><input type="text" class="medictime" name="tabcap_time<?php echo $tcno?>[]"/></td>
                    </tr>
                    <tr>
                       <td class="medic"><?php $tcno++?></td>                       
                       <td class="medic"><input type="text" class="medicr" name="tabcap_detail[]"></td>
                       <td class="medic"><input type="number" class="medicr" name="tabcap_dose[]"></td>
                       <td class="medic"><input type="text" class="medicr" name="tabcap_route[]"></td>
                       <td class="medic"><input type="text" class="medictime" name="tabcap_time<?php echo $tcno?>[]" /></td>
                       <td class="medic"><input type="text" class="medictime" name="tabcap_time<?php echo $tcno?>[]" /></td>
                       <td class="medic"><input type="text" class="medictime" name="tabcap_time<?php echo $tcno?>[]"/></td>
                       <td class="medic"><input type="text" class="medictime" name="tabcap_time<?php echo $tcno?>[]"/></td>
                    </tr>
                    <tr>
                       <td class="medic"><?php $tcno++?></td>                       
                       <td class="medic"><input type="text" class="medicr" name="tabcap_detail[]"></td>
                       <td class="medic"><input type="number" class="medicr" name="tabcap_dose[]"></td>
                       <td class="medic"><input type="text" class="medicr" name="tabcap_route[]"></td>
                       <td class="medic"><input type="text" class="medictime" name="tabcap_time<?php echo $tcno?>[]" /></td>
                       <td class="medic"><input type="text" class="medictime" name="tabcap_time<?php echo $tcno?>[]" /></td>
                       <td class="medic"><input type="text" class="medictime" name="tabcap_time<?php echo $tcno?>[]"/></td>
                       <td class="medic"><input type="text" class="medictime" name="tabcap_time<?php echo $tcno?>[]"/></td>
                    </tr>
                    <tr>
                       <td class="medic"><?php $tcno++?></td>                       
                       <td class="medic"><input type="text" class="medicr" name="tabcap_detail[]"></td>
                       <td class="medic"><input type="number" class="medicr" name="tabcap_dose[]"></td>
                       <td class="medic"><input type="text" class="medicr" name="tabcap_route[]"></td>
                       <td class="medic"><input type="text" class="medictime" name="tabcap_time<?php echo $tcno?>[]" /></td>
                       <td class="medic"><input type="text" class="medictime" name="tabcap_time<?php echo $tcno?>[]" /></td>
                       <td class="medic"><input type="text" class="medictime" name="tabcap_time<?php echo $tcno?>[]"/></td>
                       <td class="medic"><input type="text" class="medictime" name="tabcap_time<?php echo $tcno?>[]"/></td>
                    </tr>
                    <tr>
                       <td class="medic"><?php $injno++?></td>                       
                       <td class="medic"><input type="text" class="medicr" name="tabcap_detail[]"></td>
                       <td class="medic"><input type="number" class="medicr" name="tabcap_dose[]"></td>
                       <td class="medic"><input type="text" class="medicr" name="tabcap_route[]"></td>
                       <td class="medic"><input type="text" class="medictime" name="tabcap_time<?php echo $tcno?>[]" /></td>
                       <td class="medic"><input type="text" class="medictime" name="tabcap_time<?php echo $tcno?>[]" /></td>
                       <td class="medic"><input type="text" class="medictime" name="tabcap_time<?php echo $tcno?>[]"/></td>
                       <td class="medic"><input type="text" class="medictime" name="tabcap_time<?php echo $tcno?>[]"/></td>
                    </tr>
                    <tr>
                       <td class="medic"><?php $tcno++?></td>                       
                       <td class="medic"><input type="text" class="medicr" name="tabcap_detail[]"></td>
                       <td class="medic"><input type="number" class="medicr" name="tabcap_dose[]"></td>
                       <td class="medic"><input type="text" class="medicr" name="tabcap_route[]"></td>
                       <td class="medic"><input type="text" class="medictime" name="tabcap_time<?php echo $tcno?>[]" /></td>
                       <td class="medic"><input type="text" class="medictime" name="tabcap_time<?php echo $tcno?>[]" /></td>
                       <td class="medic"><input type="text" class="medictime" name="tabcap_time<?php echo $tcno?>[]"/></td>
                       <td class="medic"><input type="text" class="medictime" name="tabcap_time<?php echo $tcno?>[]"/></td>
                    </tr>
                    <tr>
                       <td class="medic"><?php $tcno++?></td>                       
                       <td class="medic"><input type="text" class="medicr" name="tabcap_detail[]"></td>
                       <td class="medic"><input type="number" class="medicr" name="tabcap_dose[]"></td>
                       <td class="medic"><input type="text" class="medicr" name="tabcap_route[]"></td>
                       <td class="medic"><input type="text" class="medictime" name="tabcap_time<?php echo $tcno?>[]" /></td>
                       <td class="medic"><input type="text" class="medictime" name="tabcap_time<?php echo $tcno?>[]" /></td>
                       <td class="medic"><input type="text" class="medictime" name="tabcap_time<?php echo $tcno?>[]"/></td>
                       <td class="medic"><input type="text" class="medictime" name="tabcap_time<?php echo $tcno?>[]"/></td>
                    </tr>
                    <tr>
                       <td class="medic"><?php $tcno++?></td>                       
                       <td class="medic"><input type="text" class="medicr" name="tabcap_detail[]"></td>
                       <td class="medic"><input type="number" class="medicr" name="tabcap_dose[]"></td>
                       <td class="medic"><input type="text" class="medicr" name="tabcap_route[]"></td>
                       <td class="medic"><input type="text" class="medictime" name="tabcap_time<?php echo $tcno?>[]" /></td>
                       <td class="medic"><input type="text" class="medictime" name="tabcap_time<?php echo $tcno?>[]" /></td>
                       <td class="medic"><input type="text" class="medictime" name="tabcap_time<?php echo $tcno?>[]"/></td>
                       <td class="medic"><input type="text" class="medictime" name="tabcap_time<?php echo $tcno?>[]"/></td>
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
                            <textarea rows="5" cols="160" name="today_plan"><?php echo $row_patient_dts["Plan_for_today"];?></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td class="medic">Plan for Tomorrow</td>
                        <td class="medic">Name,Sign of RMO<br>Date & Time</td>
                        <td class="medic">Name,Sign of Staff Nurse<br>Date & Time</td>
                    </tr>
                    <tr>
                        <td class="medic">
                            <textarea rows="5" cols="120" name="tmr_plan"><?php echo $row_patient_dts["Plan_for_tomorrow"];?></textarea>
                        </td>
                        <td class="medic"><textarea rows="5" cols="20" readonly=""></textarea></td>
                        <td class="medic"><textarea rows="5" cols="20" readonly=""></textarea></td>
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
