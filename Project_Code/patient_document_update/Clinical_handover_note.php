<?php
$con_servername = "localhost";
$con_username = "root";
$con_password = "";
$database = "hospital_management_system";

$connection = mysqli_connect($con_servername, $con_username, $con_password, $database);

$patient_id = $_GET["patient_id"];
$treatment_id = $_GET["treatment_id"];
$Clinical_handover_id = $_GET["Clinical_handover_id"];

$current_date = date("Y-m-d");
date_default_timezone_set("Asia/Kolkata");
$current_time = date("H:i");

if($_GET)
{   
    $login_name=$_GET["admin_name"];
}

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
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Clinical Hand-Over Note</title>
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
        /*title ends*/
        table
        {
            width: 100%;
            border-spacing: 0;
            border-collapse: collapse;
            padding: 0;
            margin: 0;
            line-height: 2;
            table-layout: auto;
            white-space: nowrap;
        }
        input:not([type="submit"])
        {
            border: 0;
            padding-left: 2%;
            width: 95%;
        }
        textarea
        {
            border: 0;
            text-decoration: underline;
        }
        </style>
    </head>
    <body class="container" style="font-family: Times New Roman;">
        <img src="../images/tattvam_banner.jpg" align='right'>
        <h2>
            <span style="padding-left: 15px; padding-right: 15px; text-decoration: underline; font-weight: bold;">
                CLINICAL HAND-OVER NOTE
            </span>
        </h2>
            <?php
                $view_patient_ch = "SELECT * FROM treatment_clinical_handover "
                        . "WHERE Clinical_handover_id = $Clinical_handover_id";
                $result_patient_ch = mysqli_query($connection, $view_patient_ch);
                if(mysqli_num_rows($result_patient_ch) > 0)
                {
                    while ($row_patient_ch = mysqli_fetch_assoc($result_patient_ch))
                    {
						$patient_adm_date = date('d/m/Y', strtotime($row_patient_ch["Handover_date"]));		
            ?>
        <div class="justify-content-center" style="padding-top: 3%;">
            Patient Summary  
			<span style="padding-left:35%"><?php echo $Patient_Name;?></span>  
			<span style="float:right;"><?php echo $patient_adm_date;?></span>
			<br><br>			
            <form action="Update_Clinical_handover_note.php" method="POST" autocomplete="off">
                <input type="hidden" value="<?php echo $login_name;?>" name="admin_name">
                <input type="hidden" value="<?php echo $treatment_id;?>" name="treatment_id">
                <input type="hidden" value="<?php echo $patient_id;?>" name="patient_id">
                <input type="hidden" value="<?php echo $Clinical_handover_id;?>" name="Clinical_handover_id">
                <input type="hidden" value="<?php echo $row_patient_ch["Handover_date"];?>" name="handover_date">
            <table border="1">
                <thead>
                    <tr>
                        <th>Activities</th>
                        <th>Night Shift (8 pm)</th>
                        <th>Morning Shift (8 am)</th>
                        <th>Evening Shift (8 pm)</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Illness Description</td>
                        <td>
                            <input type="text" name="ill_desc_night" 
                                   value="<?php echo $row_patient_ch["Night_Illness_description"];?>">
                        </td>
                        <td>
                            <input type="text" name="ill_desc_morning"
                                   value="<?php echo $row_patient_ch["Morning_Illness_description"];?>">
                        </td>
                        <td>
                            <input type="text" name="ill_desc_eve" 
                                   value="<?php echo $row_patient_ch["Evening_Illness_description"];?>">
                        </td>
                    </tr>
                    <tr>
                        <td>Action List</td>
                        <td>
                            <input type="text" name="action_night"
                                   value="<?php echo $row_patient_ch["Night_Action_list"];?>">
                        </td>
                        <td>
                            <input type="text" name="action_morning"
                                   value="<?php echo $row_patient_ch["Morning_Action_list"];?>">
                        </td>
                        <td>
                            <input type="text" name="action_eve"
                                   value="<?php echo $row_patient_ch["Evening_Action_list"];?>">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Situation<br>
                            Awareness<br>
                            Contingency<br>
                            Planning<br>
                        </td>
                        <td>
                            <input type="text" name="situation_night"
                                   value="<?php echo $row_patient_ch["Night_Situation"];?>"><br>
                            <input type="text" name="awareness_night"
                                   value="<?php echo $row_patient_ch["Night_Awareness"];?>"><br>
                            <input type="text" name="contingency_night"
                                   value="<?php echo $row_patient_ch["Night_Contingency"];?>"><br>
                            <input type="text" name="planning_night"
                                   value="<?php echo $row_patient_ch["Night_Planning"];?>"><br>
                        </td>
                        <td>
                            <input type="text" name="situation_morning"
                                   value="<?php echo $row_patient_ch["Morning_Situation"];?>"><br>
                            <input type="text" name="awareness_morning"
                                   value="<?php echo $row_patient_ch["Morning_Awareness"];?>"><br>
                            <input type="text" name="contingency_morning"
                                   value="<?php echo $row_patient_ch["Morning_Contingency"];?>"><br>
                            <input type="text" name="planning_morning"
                                   value="<?php echo $row_patient_ch["Morning_Planning"];?>"><br>
                        </td>
                        <td>
                            <input type="text" name="situation_eve"
                                   value="<?php echo $row_patient_ch["Evening_Situation"];?>"><br>
                            <input type="text" name="awareness_eve"
                                   value="<?php echo $row_patient_ch["Evening_Awareness"];?>"><br>
                            <input type="text" name="contingency_eve"
                                   value="<?php echo $row_patient_ch["Evening_Contingency"];?>"><br>
                            <input type="text" name="planning_eve"
                                   value="<?php echo $row_patient_ch["Evening_Planning"];?>"><br>
                        </td>
                    </tr>
                    <tr>
                        <td>Handling Over By</td>
                        <td><input type="text" name="handover_night" required="" 
                                   value="<?php echo $row_patient_ch["Night_Handling_Overby"];?>"></td>
                        <td><input type="text" name="handover_morning" required="" 
                                   value="<?php echo $row_patient_ch["Morning_Handling_Overby"];?>"></td>
                        <td><input type="text" name="handover_eve" required="" 
                                   value="<?php echo $row_patient_ch["Evening_Handling_Overby"];?>"></td>
                    </tr>
                    <tr>
                        <td>Handling Over Taken By</td>
                        <td><input type="text" name="overtaken_night" required="" 
                                   value="<?php echo $row_patient_ch["Night_Handling_Takenby"];?>"></td>
                        <td><input type="text" name="overtaken_morning" required="" 
                                   value="<?php echo $row_patient_ch["Morning_Handling_Takenby"];?>"></td>
                        <td><input type="text" name="overtaken_eve" required="" 
                                   value="<?php echo $row_patient_ch["Evening_Handling_Takenby"];?>"></td>
                    </tr>
                </tbody>
            </table>
            <br><br>
            <span>Verbal order(if any):</span><br>
            <textarea rows="7" cols="180" name="verbal_order"><?php echo $row_patient_ch["Verbal_order"];?></textarea><br>
            <?php
                    }
                }            
            ?>            
            <table border="1">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Pulse /min</th>
                        <th>SPO<sub>2</sub> /%</th>
                        <th>B.P</th>
                        <th>Temp.</th>
                        <th>IV Fluid</th>
                        <th>Urine Output</th>
                        <th>Stool</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    $view_patient_asmt = "SELECT * FROM treatment_patient_assessment "
                            . "WHERE Treatment_id = $treatment_id";
                    $result_patient_asmt = mysqli_query($connection, $view_patient_asmt);
                    if(mysqli_num_rows($result_patient_asmt) > 0)
                    {
                        while ($row_patient_asmt = mysqli_fetch_assoc($result_patient_asmt))
                        {
                ?>                    
                    <tr>
                        <td>
                            <input type="date" name="asmt_date[]"
                                   value="<?php echo $row_patient_asmt["Patient_Assessment_date"];?>">
                        </td>
                        <td>
                            <input type="time" name="asmt_time[]"
                                   value="<?php echo $row_patient_asmt["Patient_Assessment_time"];?>">
                        </td>
                        <td>
                            <input type="number" name="asmt_pulse[]"
                                   value="<?php echo $row_patient_asmt["Patient_Assessment_pulse"];?>">
                        </td>
                        <td>
                            <input type="number" name="asmt_spo[]"
                                   value="<?php echo $row_patient_asmt["Patient_Assessment_SPO"];?>">
                        </td>
                        <td>
                            <input type="text" name="asmt_bp[]"
                                   value="<?php echo $row_patient_asmt["Patient_Assessment_BP"];?>">
                        </td>
                        <td>
                            <input type="float" name="asmt_temp[]"
                                   value="<?php echo $row_patient_asmt["Patient_Assessment_temp"];?>">
                        </td>
                        <td>
                            <input type="text" name="asmt_ivf[]"
                                   value="<?php echo $row_patient_asmt["Patient_Assessment_IVfluid"];?>">
                        </td>
                        <td>
                            <input type="number" name="asmt_urine[]"
                                   value="<?php echo $row_patient_asmt["Patient_Assessment_UrineOutput"];?>">
                        </td>
                        <td>
                            <input type="text" name="asmt_stool[]"
                                   value="<?php echo $row_patient_asmt["Patient_Assessment_Stool"];?>">
                        </td>
                    </tr>
                <?php
                        }
                    }            
                ?>                    
                    <tr>
                        <td><input type="date" name="asmt_date[]"></td>
                        <td><input type="time" name="asmt_time[]"></td>
                        <td><input type="number" name="asmt_pulse[]"></td>
                        <td><input type="number" name="asmt_spo[]"></td>
                        <td><input type="text" name="asmt_bp[]"></td>
                        <td><input type="float" name="asmt_temp[]"></td>
                        <td><input type="text" name="asmt_ivf[]"></td>
                        <td><input type="number" name="asmt_urine[]"></td>
                        <td><input type="text" name="asmt_stool[]"></td>
                    </tr>
                    <tr>
                        <td><input type="date" name="asmt_date[]"></td>
                        <td><input type="time" name="asmt_time[]"></td>
                        <td><input type="number" name="asmt_pulse[]"></td>
                        <td><input type="number" name="asmt_spo[]"></td>
                        <td><input type="text" name="asmt_bp[]"></td>
                        <td><input type="float" name="asmt_temp[]"></td>
                        <td><input type="text" name="asmt_ivf[]"></td>
                        <td><input type="number" name="asmt_urine[]"></td>
                        <td><input type="text" name="asmt_stool[]"></td>
                    </tr>
                    <tr>
                        <td><input type="date" name="asmt_date[]"></td>
                        <td><input type="time" name="asmt_time[]"></td>
                        <td><input type="number" name="asmt_pulse[]"></td>
                        <td><input type="number" name="asmt_spo[]"></td>
                        <td><input type="text" name="asmt_bp[]"></td>
                        <td><input type="float" name="asmt_temp[]"></td>
                        <td><input type="text" name="asmt_ivf[]"></td>
                        <td><input type="number" name="asmt_urine[]"></td>
                        <td><input type="text" name="asmt_stool[]"></td>
                    </tr>
                    <tr>
                        <td><input type="date" name="asmt_date[]"></td>
                        <td><input type="time" name="asmt_time[]"></td>
                        <td><input type="number" name="asmt_pulse[]"></td>
                        <td><input type="number" name="asmt_spo[]"></td>
                        <td><input type="text" name="asmt_bp[]"></td>
                        <td><input type="float" name="asmt_temp[]"></td>
                        <td><input type="text" name="asmt_ivf[]"></td>
                        <td><input type="number" name="asmt_urine[]"></td>
                        <td><input type="text" name="asmt_stool[]"></td>
                    </tr>
                    <tr>
                        <td><input type="date" name="asmt_date[]"></td>
                        <td><input type="time" name="asmt_time[]"></td>
                        <td><input type="number" name="asmt_pulse[]"></td>
                        <td><input type="number" name="asmt_spo[]"></td>
                        <td><input type="text" name="asmt_bp[]"></td>
                        <td><input type="float" name="asmt_temp[]"></td>
                        <td><input type="text" name="asmt_ivf[]"></td>
                        <td><input type="number" name="asmt_urine[]"></td>
                        <td><input type="text" name="asmt_stool[]"></td>
                    </tr>
                    <tr>
                        <td><input type="date" name="asmt_date[]"></td>
                        <td><input type="time" name="asmt_time[]"></td>
                        <td><input type="number" name="asmt_pulse[]"></td>
                        <td><input type="number" name="asmt_spo[]"></td>
                        <td><input type="text" name="asmt_bp[]"></td>
                        <td><input type="float" name="asmt_temp[]"></td>
                        <td><input type="text" name="asmt_ivf[]"></td>
                        <td><input type="number" name="asmt_urine[]"></td>
                        <td><input type="text" name="asmt_stool[]"></td>
                    </tr>
                    <tr>
                        <td><input type="date" name="asmt_date[]"></td>
                        <td><input type="time" name="asmt_time[]"></td>
                        <td><input type="number" name="asmt_pulse[]"></td>
                        <td><input type="number" name="asmt_spo[]"></td>
                        <td><input type="text" name="asmt_bp[]"></td>
                        <td><input type="float" name="asmt_temp[]"></td>
                        <td><input type="text" name="asmt_ivf[]"></td>
                        <td><input type="number" name="asmt_urine[]"></td>
                        <td><input type="text" name="asmt_stool[]"></td>
                    </tr>
                    <tr>
                        <td><input type="date" name="asmt_date[]"></td>
                        <td><input type="time" name="asmt_time[]"></td>
                        <td><input type="number" name="asmt_pulse[]"></td>
                        <td><input type="number" name="asmt_spo[]"></td>
                        <td><input type="text" name="asmt_bp[]"></td>
                        <td><input type="float" name="asmt_temp[]"></td>
                        <td><input type="text" name="asmt_ivf[]"></td>
                        <td><input type="number" name="asmt_urine[]"></td>
                        <td><input type="text" name="asmt_stool[]"></td>
                    </tr>
                    <tr>
                        <td><input type="date" name="asmt_date[]"></td>
                        <td><input type="time" name="asmt_time[]"></td>
                        <td><input type="number" name="asmt_pulse[]"></td>
                        <td><input type="number" name="asmt_spo[]"></td>
                        <td><input type="text" name="asmt_bp[]"></td>
                        <td><input type="float" name="asmt_temp[]"></td>
                        <td><input type="text" name="asmt_ivf[]"></td>
                        <td><input type="number" name="asmt_urine[]"></td>
                        <td><input type="text" name="asmt_stool[]"></td>
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
        </div>
    </body>
</html>
