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
        input:not([type="submit"])
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
        <form action="Update_AH_PA_form4.php" method="POST">
            <input type="hidden" value="<?php echo $login_name;?>" name="admin_name">
            <input type="hidden" value="<?php echo $treatment_id;?>" name="treatment_id">
            <input type="hidden" value="<?php echo $patient_id;?>" name="patient_id">            
        <table border="1">
            <tbody>
                <?php
                $view_ill_sug = "SELECT * FROM illness_suggestion WHERE Treatment_id = $treatment_id";
                $result_ill_sug = mysqli_query($connection, $view_ill_sug);
                if(mysqli_num_rows($result_ill_sug) > 0)
                {
                    while ($row_ill_sug = mysqli_fetch_assoc($result_ill_sug))
                    {
                ?>                
                <tr>
                    <td colspan="3">Provision Diagnosis:</td>
                </tr>
                <tr>
                    <td colspan="3">
                        <textarea rows="1" cols="120" name="Provision_Diagnosis"><?php echo $row_ill_sug["Provisional_Diagnosis"];?></textarea>
                    </td>
                </tr>
                <tr>
                    <td colspan="3">Suggested Investigation:</td>
                </tr>
                <tr>
                    <td colspan="3">
                        <textarea rows="3" cols="120" name="Suggested_Investigation"><?php echo $row_ill_sug["Suggested_Investigation"];?></textarea>
                    </td>
                </tr>
                <tr>
                    <td colspan="3" style="border-bottom:none;">
                        Plan of Care:-<br>
                        <textarea rows="15" cols="120" name="CarePlan"><?php echo $row_ill_sug["Plan_of_Care"];?></textarea>
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
                        <textarea rows="2" cols="120" name="Preventive_Diet"><?php echo $row_ill_sug["Preventive_Diet"];?></textarea>
                    </td>
                </tr>
                <tr>
                    <td>Drugs</td>
                    <td colspan="2">
                        <textarea rows="2" cols="120" name="Preventive_Drugs"><?php echo $row_ill_sug["Preventive_Drugs"];?></textarea>
                    </td>
                </tr>
                <tr>
                    <th colspan="2">Name of RMO/Registrar:
                        <input type="text" name="RMO_Name" value="<?php echo $row_ill_sug["RMO_Name"];?>">
                    </th>
                    <td rowspan="2" class="sign">Signature</td>
                </tr>
                <tr>
                    <td>Date: <input type="date" name="RMO_date" value="<?php echo $row_ill_sug["RMO_Date"];?>"></td>
                    <td>Time: <input type="time" name="RMO_time" value="<?php echo $row_ill_sug["RMO_Time"];?>"></td>
                </tr>
                <tr>
                    <th colspan="2">History Verified by the Consultant
                        <input type="text" name="Consultant_Name" value="<?php echo $row_ill_sug["Consultant_Name"];?>">
                    </th>
                    <td rowspan="2" class="sign">Signature</td>
                </tr>
                <tr>
                    <td style="border-bottom:3px solid black;">
                        Date: <input type="date" name="Consultant_date" value="<?php echo $row_ill_sug["Consultant_Date"];?>">
                    </td>
                    <td style="border-bottom:3px solid black;">
                        Time: <input type="time" name="Consultant_time" value="<?php echo $row_ill_sug["Consultant_Time"];?>">
                    </td>
                </tr>
                <tr>
                    <td colspan="3">
                        <textarea rows="10" cols="120"></textarea>
                    </td>
                </tr>
            </tbody>
            <?php 
                    }
                }
            ?>
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
    </body>
</html>
