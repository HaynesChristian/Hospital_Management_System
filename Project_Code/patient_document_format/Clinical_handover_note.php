<?php
$con_servername = "localhost";
$con_username = "root";
$con_password = "";
$database = "hospital_management_system";

$connection = mysqli_connect($con_servername, $con_username, $con_password, $database);

$patient_id = $_GET["patient_id"];
$treatment_id = $_GET["treatment_id"];

$view_patient = "SELECT * FROM patient WHERE Patient_id = $patient_id";
$result_patient = mysqli_query($connection, $view_patient);
if(mysqli_num_rows($result_patient) > 0)
{
    while ($row_patient = mysqli_fetch_assoc($result_patient)) 
    {
        $patient_name = $row_patient["Patient_Name"];
    }
}
$current_date = date("Y-m-d");
date_default_timezone_set("Asia/Kolkata");
$current_time = date("H:i");
$patient_adm_date = date('d/m/Y', strtotime($current_date));
if($_GET)
{
    $login_name=$_GET["admin_name"];
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
        <div class="justify-content-center" style="padding-top: 3%;">
            Patient Summary  
			<span style="padding-left:35%"><?php echo $patient_name;?></span>  
			<span style="float:right;"><?php echo $patient_adm_date;?></span>
			<br><br>
            <form action="../Clinical_handover_note_Add.php" method="POST" autocomplete="off">
                <input type="hidden" value="<?php echo $login_name;?>" name="admin_name">
                <input type="hidden" value="<?php echo $treatment_id;?>" name="treatment_id">
                <input type="hidden" value="<?php echo $patient_id;?>" name="patient_id">
                <input type="hidden" value="<?php echo $current_date;?>" name="handover_date">
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
                        <td><input type="text" name="ill_desc_night"></td>
                        <td><input type="text" name="ill_desc_morning"></td>
                        <td><input type="text" name="ill_desc_eve"></td>
                    </tr>
                    <tr>
                        <td>Action List</td>
                        <td><input type="text" name="action_night"></td>
                        <td><input type="text" name="action_morning"></td>
                        <td><input type="text" name="action_eve"></td>
                    </tr>
                    <tr>
                        <td>
                            Situation<br>
                            Awareness<br>
                            Contingency<br>
                            Planning<br>
                        </td>
                        <td>
                            <input type="text" name="situation_night"><br>
                            <input type="text" name="awareness_night"><br>
                            <input type="text" name="contingency_night"><br>
                            <input type="text" name="planning_night"><br>
                        </td>
                        <td>
                            <input type="text" name="situation_morning"><br>
                            <input type="text" name="awareness_morning"><br>
                            <input type="text" name="contingency_morning"><br>
                            <input type="text" name="planning_morning"><br>
                        </td>
                        <td>
                            <input type="text" name="situation_eve"><br>
                            <input type="text" name="awareness_eve"><br>
                            <input type="text" name="contingency_eve"><br>
                            <input type="text" name="planning_eve"><br>
                        </td>
                    </tr>
                    <tr>
                        <td>Handling Over By</td>
                        <td><input type="text" name="handover_night" required="" ></td>
                        <td><input type="text" name="handover_morning" required="" ></td>
                        <td><input type="text" name="handover_eve" required="" ></td>
                    </tr>
                    <tr>
                        <td>Handling Over Taken By</td>
                        <td><input type="text" name="overtaken_night" required="" ></td>
                        <td><input type="text" name="overtaken_morning" required="" ></td>
                        <td><input type="text" name="overtaken_eve" required="" ></td>
                    </tr>
                </tbody>
            </table>
            <br><br>
            <span>Verbal order(if any):</span><br>
            <textarea rows="7" cols="180" name="verbal_order"></textarea><br>
            
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
            <input type="submit" value="Next">
            </form>
        </div>
    </body>
</html>
