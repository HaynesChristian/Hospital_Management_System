<?php
$con_servername = "localhost";
$con_username = "root";
$con_password = "";
$database = "hospital_management_system";

$connection = mysqli_connect($con_servername, $con_username, $con_password, $database);

$patient_id = $_GET["patient_id"];
$treatment_id = $_GET["treatment_id"];

$view_patient = "SELECT Anaesthetist_Name , Surgeon_name , Anaesthesia_Type "
        . "FROM treatment_surgery WHERE Treatment_id = $treatment_id ";
$result_patient = mysqli_query($connection, $view_patient);
if(mysqli_num_rows($result_patient) > 0)
{
    while ($row_patient = mysqli_fetch_assoc($result_patient))
    {
        $anaesthetist_name = $row_patient["Anaesthetist_Name"];
        $surgeon_name = $row_patient["Surgeon_name"];
        $anaesthesia_type = $row_patient["Anaesthesia_Type"];
    }
}

$current_date = date("Y-m-d");
date_default_timezone_set("Asia/Kolkata");
$current_time = date("H:i");
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Anesthesia Record</title>
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
                table-layout: auto;
                white-space: nowrap;
            }
            td.hwrite
            {
                width: 20px;
                height: 20px;
                font-weight: bold;
                text-align: center;
                padding: 0;
                margin: 0;
            }
            td
            {
                padding: 0; margin: 0; white-space: nowrap;
            }            
            input[type="text"]
            {
                border: 0;
                border-bottom: 1px solid black;
                padding-left: 2%;
            }
            input:not([type="text"])
            {
                border:0;
            }
            td.bzero,th.bzero
            {
                border:0;
                border-bottom: 1px solid black;
            }            
        </style>        
    </head>
    <body class="container" style="font-family: Times New Roman;">
        <img src="../images/tattvam_banner.jpg" align='right'>
        <h2>
            <span style="padding-left: 15px; padding-right: 15px;">
                ANESTHESIA RECORDS
            </span>
        </h2>
        <div class="justify-content-center" style="padding-top: 3%;">
            <table border="0">
                <tbody>
                    <tr>
                        <td>Date:<input type="date" value="<?php echo $current_date;?>"></td>
                        <td>O.R. No.:<input type="number" style="border-bottom: 1px solid black;"></td>
                    </tr>
                    <tr>
                        <td>NPO Status:<input type="text"></td>
                        <td>
                            Anesthesiologist:<input type="text" value="<?php echo $anaesthetist_name;?>">
                        </td>
                    </tr>
                    <tr>
                        <td>Premedication:<input type="text"></td>
                        <td>Anesth Assistant:<input type="text"></td>
                    </tr>
                    <tr>
                        <td>
                            Physical Status:
                            <input type="radio" name="Physical_status" value="1" />1
                            <input type="radio" name="Physical_status" value="2" />2
                            <input type="radio" name="Physical_status" value="3" />3
                            <input type="radio" name="Physical_status" value="4" />4
                            <input type="radio" name="Physical_status" value="5" />5
                            <input type="radio" name="Physical_status" value="6" />6
                            <input type="radio" name="Physical_status" value="E" />E
                            <input type="radio" name="Physical_status" value="T" />T                            
                        </td>
                        <td>Surgeon:<input type="text" value="<?php echo $surgeon_name;?>"></td>
                    </tr>
                    <tr>
                        <td>Procedure:<input type="text"></td>
                        <td>Anesthesia:<input type="text" value="<?php echo $anaesthesia_type;?>"></td>
                    </tr>
                </tbody>
            </table>
            <br>
            
            <table border="1">
                <thead>
                    <tr>
                        <th colspan="3" style="text-align: left">Time<input type="time"></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td rowspan="10" class="hwrite">
                            A<br>G<br>E<br>N<br>T<br>S
                        </td>
                        <td>Oxygen <span style="text-align: right; float: right">L/min</span></td>
                        <td><input type="number"></td>
                    </tr>
                    <tr>
                        <td><div contenteditable=""></div></td>
                        <td><input type="number"></td>
                    </tr>
                    <tr>
                        <td><div contenteditable=""></div></td>
                        <td><input type="number"></td>
                    </tr>
                    <tr>
                        <td><div contenteditable=""></div></td>
                        <td><input type="number"></td>
                    </tr>
                    <tr>
                        <td><div contenteditable=""></div></td>
                        <td><input type="number"></td>
                    </tr>
                    <tr>
                        <td><div contenteditable=""></div></td>
                        <td><input type="number"></td>
                    </tr>
                    <tr>
                        <td><div contenteditable=""></div></td>
                        <td><input type="number"></td>
                    </tr>
                    <tr>
                        <td><div contenteditable=""></div></td>
                        <td><input type="number"></td>
                    </tr>
                    <tr>
                        <td><div contenteditable=""></div></td>
                        <td><input type="number"></td>
                    </tr>
                    <tr>
                        <td><div contenteditable=""></div></td>
                        <td><input type="number"></td>
                    </tr>
                    <tr>
                        <td rowspan="10"></td>
                        <td>Incision</td>
                        <td><input type="number"></td>
                    </tr>
                    <tr>
                        <td>Closure</td>
                        <td><input type="number"></td>
                    </tr>
                    <tr>
                        <td>ECG</td>
                        <td><input type="number"></td>
                    </tr>
                    <tr>
                        <td>NIBP Syst V</td>
                        <td><input type="number"></td>
                    </tr>
                    <tr>
                        <td>Art BP</td>
                        <td><input type="number"></td>
                    </tr>
                    <tr>
                        <td>Pulse</td>
                        <td><input type="number"></td>
                    </tr>
                    <tr>
                        <td>PNS</td>
                        <td><input type="number"></td>
                    </tr>
                    <tr>
                        <td>Ventilator</td>
                        <td><input type="number"></td>
                    </tr>
                    <tr>
                        <td>Tidal Volume</td>
                        <td><input type="number"></td>
                    </tr>
                    <tr>
                        <td>Frequency</td>
                        <td><input type="number"></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Position</td>
                        <td><input type="number"></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Fluids</td>
                        <td><input type="number"></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Urine Output</td>
                        <td><input type="number"></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Temperature</td>
                        <td><input type="number"></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Spa 2</td>
                        <td><input type="number"></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Etca 2</td>
                        <td><input type="number"></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Respiration</td>
                        <td><input type="number"></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Airway Pressure</td>
                        <td><input type="number"></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>CVP</td>
                        <td><input type="number"></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Tourniquet</td>
                        <td><input type="number"></td>
                    </tr>
            </table>
            
            <table>
                    <tr>
                        <td class="bzero">
                            <table border="1">
                                <tbody>
                                    <tr>
                                        <td class="bzero">Airway</td>
                                        <td class="bzero"><div contenteditable=""></div></td>
                                    </tr>
                                    <tr>
                                        <td class="bzero">ETT</td>
                                        <td class="bzero"><input type="radio">Oral<input type="radio">Nasal</td>
                                    </tr>
                                    <tr>
                                        <td class="bzero">LENGTH (Tube Tie)</td>
                                        <td class="bzero"><div contenteditable=""></div></td>
                                    </tr>
                                    <tr>
                                        <td class="bzero">LMA</td>
                                        <td class="bzero"><div contenteditable=""></div></td>
                                    </tr>
                                    <tr>
                                        <td class="bzero">Tracheolomy Tube</td>
                                        <td class="bzero"><div contenteditable=""></div></td>
                                    </tr>
                                    <tr>
                                        <td class="bzero">Double Lumen Tube</td>
                                        <td class="bzero"><div contenteditable=""></div></td>
                                    </tr>
                                    <tr>
                                        <td class="bzero">Laryngoscope Grade</td>
                                        <td class="bzero"><div contenteditable=""></div></td>
                                    </tr>
                                    <tr>
                                        <td class="bzero">Pack On<div contenteditable=""></div></td>
                                        <td class="bzero">Off.:<div contenteditable=""></div></td>
                                    </tr>
                                    <tr>
                                        <td class="bzero">Esto, Ated Blood Loss</td>
                                        <td class="bzero"><div contenteditable=""></div></td>
                                    </tr>                                    
                                </tbody>
                            </table>

                        </td>
                        <td>
                            <table border="1">
                                <thead>
                                    <tr>
                                        <th colspan="3" class="bzero">IV Access & Fluids</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th class="bzero">A</th>
                                        <th class="bzero">B</th>
                                        <th class="bzero">C</th>
                                    </tr>
                                    <tr>
                                        <td class="bzero"><div contenteditable=""></div></td>
                                        <td class="bzero"><div contenteditable=""></div></td>
                                        <td class="bzero"><div contenteditable=""></div></td>
                                    </tr>
                                    <tr>
                                        <td class="bzero"><div contenteditable=""></div></td>
                                        <td class="bzero"><div contenteditable=""></div></td>
                                        <td class="bzero"><div contenteditable=""></div></td>
                                    </tr>
                                    <tr>
                                        <td class="bzero"><div contenteditable=""></div></td>
                                        <td class="bzero"><div contenteditable=""></div></td>
                                        <td class="bzero"><div contenteditable=""></div></td>
                                    </tr>
                                    <tr>
                                        <td class="bzero"><div contenteditable=""></div></td>
                                        <td class="bzero"><div contenteditable=""></div></td>
                                        <td class="bzero"><div contenteditable=""></div></td>
                                    </tr>
                                    <tr>
                                        <td class="bzero"><div contenteditable=""></div></td>
                                        <td class="bzero"><div contenteditable=""></div></td>
                                        <td class="bzero"><div contenteditable=""></div></td>                                    </tr>
                                    <tr>
                                        <td class="bzero"><div contenteditable=""></div></td>
                                        <td class="bzero"><div contenteditable=""></div></td>
                                        <td class="bzero"><div contenteditable=""></div></td>                                    </tr>
                                    <tr>
                                        <td class="bzero"><div contenteditable=""></div></td>
                                        <td class="bzero"><div contenteditable=""></div></td>
                                        <td class="bzero"><div contenteditable=""></div></td>
                                    </tr>
                                    <tr>
                                        <td colspan="3">
                                            Duration of Surgery:<div contenteditable=""></div>
                                        </td>
                                    </tr>
                                </tbody>    
                            </table>
                        </td>
                        <td>
                            <table border="1">
                                <tbody>
                                    <tr>
                                        <th colspan="3">Regional Anesthesia</th>
                                    </tr>
                                    <tr>
                                        <th class="bzero">Technique</th>
                                        <th class="bzero">Medications</th>
                                    </tr>
                                    <tr>
                                        <td class="bzero">
                                            <input type="checkbox">Inflation<br>
                                            <input type="checkbox">Spinal<br>
                                            <input type="checkbox">Epidermal<br>
                                            <input type="checkbox">Caudal<br>
                                            <input type="checkbox">Nerve Block<br>
                                        </td>
                                        <td class="bzero">
                                            <input type="checkbox">Bupivacaina<br>
                                            <input type="checkbox">Lignacaine<br>
                                            <input type="checkbox">Adrenalina<br>
                                            <input type="checkbox">Opioids<br>
                                            <input type="checkbox">Others<br>                                            
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" class="bzero">Details:</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <div contenteditable=""></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" class="bzero">
                                            Duration of Anesthesia:<div contenteditable=""></div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>                            
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </body>
</html>
