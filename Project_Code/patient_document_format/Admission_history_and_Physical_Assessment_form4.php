<?php
$con_servername = "localhost";
$con_username = "root";
$con_password = "";
$database = "hospital_management_system";

$patient_id = $_GET["patient_id"];
$treatment_id = $_GET["treatment_id"];

$connection = mysqli_connect($con_servername, $con_username, $con_password, $database);

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
        <title>Page 4</title>
        <style>
        input
        {
            border: 0;
            border-bottom: 1px none black;
            width: content-box;
            white-space: nowrap;
        }
        .sign
        {
            text-align: center;
            vertical-align: bottom;
            padding: 0;
            border-left: none;
            border-bottom: 3px solid black;
            white-space: nowrap;
        }        
        textarea
        {
            border: none;
            padding: 0;
            white-space: nowrap;
        }
        table
        {
            width: 100%;
            line-height: 2;
            border-collapse: collapse;
            border: 3px solid black;
            border-spacing: 0;
            padding: 0;
            margin: 0;
            table-layout: auto;
            white-space: nowrap;
            text-align: justify;
        }
        td
        {
            border-bottom: 1px dashed black;
            border-left: none;
            border-right: none;            
            white-space: nowrap;
            padding-left: 1%;
            margin: 0;            
            white-space: nowrap;
        }
        th
        {
            border-bottom: 1px dashed black;
            border-top: 3px solid black;
            border-left: none;
            border-right: none;
            padding-left: 1%;
            margin: 0;
            white-space: nowrap;
        }        
        </style>        
    </head>
    <body>
        <form action="../AH_PA_form4_Add.php" method="POST">
            <input type="hidden" value="<?php echo $treatment_id;?>" name="treatment_id">
            <input type="hidden" value="<?php echo $patient_id;?>" name="patient_id">
            <input type="hidden" value="<?php echo $login_name;?>" name="admin_name">
        <table border="1">
            <tbody>
                <tr>
                    <td colspan="3">Provision Diagnosis:</td>
                </tr>
                <tr>
                    <td colspan="3">
                        <textarea rows="1" cols="120" name="Provision_Diagnosis"></textarea>
                    </td>
                </tr>
                <tr>
                    <td colspan="3">Suggested Investigation:</td>
                </tr>
                <tr>
                    <td colspan="3">
                        <textarea rows="3" cols="120" name="Suggested_Investigation"></textarea>
                    </td>
                </tr>
                <tr>
                    <td colspan="3" style="border-bottom:none;">
                        Plan of Care:-<br>
                        <textarea rows="15" cols="120" name="CarePlan"></textarea>
                    </td>
                </tr>
                <tr>
                    <td colspan="3" style="border-top:none; border-bottom:none;">
                        Preventive aspect
                    </td>
                </tr>
                <tr>
                    <td style="border-top:none;">Diet</td>
                    <td colspan="2" style="border-top:none;">
                        <textarea rows="2" cols="120" name="Preventive_Diet"></textarea>
                    </td>
                </tr>
                <tr>
                    <td>Drugs</td>
                    <td colspan="2">
                        <textarea rows="2" cols="120" name="Preventive_Drugs"></textarea>
                    </td>
                </tr>
                <tr>
                    <th colspan="2">Name of RMO/Registrar:<input type="text" name="RMO_Name"></th>
                    <td rowspan="2" class="sign">Signature</td>
                </tr>
                <tr>
                    <td>Date: <input type="date" name="RMO_date"></td>
                    <td>Time: <input type="time" name="RMO_time"></td>
                </tr>
                <tr>
                    <th colspan="2">History Verified by the Consultant
                        <input type="text" name="Consultant_Name">
                    </th>
                    <td rowspan="2" class="sign">Signature</td>
                </tr>
                <tr>
                    <td style="border-bottom:3px solid black;">
                        Date: <input type="date" name="Consultant_date">
                    </td>
                    <td style="border-bottom:3px solid black;">
                        Time: <input type="time" name="Consultant_time">
                    </td>
                </tr>
                <tr>
                    <td colspan="3"><textarea rows="10" cols="120"></textarea></td>
                </tr>
            </tbody>
        </table>
            <input type="submit" value="Next">
        </form>
    </body>
</html>
