<?php
$con_servername = "localhost";
$con_username = "root";
$con_password = "";
$database = "hospital_management_system";

$connection = mysqli_connect($con_servername, $con_username, $con_password, $database);

$patient_id = $_GET["patient_id"];
$treatment_id = $_GET["treatment_id"];

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
        <title>Page 3</title>
        <style>
        input:not([type="submit"])
        {
            border: 0;
            border-bottom: 1px none black;
            width: content-box;
            white-space: nowrap;
        }
        input[type="checkbox"]
        {
            border-radius: 20%;
            border: 1px solid black;
            background: transparent;
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
            border-bottom: 1px none black;
            white-space: nowrap;
            padding-left: 1%;
            white-space: nowrap;
        }
        th,td.bb
        {
            border-bottom: 3px solid black;
            white-space: nowrap;
        }
        td.bl,td.br
        {
            border-left: none;
            border-right: none;
            white-space: nowrap;
        }
        td.nbb
        {
            border-bottom: none;
            white-space: nowrap;            
        }
        td.db
        {
            border-bottom: 1px dashed black;
            white-space: nowrap;            
        }        
        td.nbt
        {
            border-top: none;
            white-space: nowrap;            
        }        
        </style>        
    </head>
    <body>
        <form action="Update_AH_PA_form3.php" method="POST">
            <input type="hidden" value="<?php echo $login_name;?>" name="admin_name">
            <input type="hidden" value="<?php echo $treatment_id;?>" name="treatment_id">
            <input type="hidden" value="<?php echo $patient_id;?>" name="patient_id">              
        <table border="1">
            <thead>
                <tr>
                    <th colspan="6">Physical Examination</th>
                </tr>
            </thead>
            <tbody>
                    <?php 
                    $view_phy_exam = "SELECT * FROM illness_complaint "
                            . "WHERE Treatment_id = $treatment_id";
                    $result_phy_exam = mysqli_query($connection, $view_phy_exam);
                    if(mysqli_num_rows($result_phy_exam) > 0)
                    {
                        while ($row_phy_exam = mysqli_fetch_assoc($result_phy_exam))
                        {
                    ?>                
                <tr>
                    <td class="br db">Vital Signs</td>
                    <td class="bl db">Temp:<input type="number" name="Temp" 
                                                  value="<?php echo $row_phy_exam["Illness_body_temperature"]?>">&#8457</td>
                    <td class="br db">Pulse:<input type="number" name="Pulse"
                                                   value="<?php echo $row_phy_exam["Illness_pulserate"];?>">/min</td>
                    <td class="bl db">B.P.:<input type="text" name="BP"
                                                  value="<?php echo $row_phy_exam["Illness_BP"];?>"></td>
                    <td class="br db" colspan="2">mm Hg</td>
                </tr>
                <tr>
                    <td colspan="2" class="bl nbt">Pain Score
                        <input type="number" name="painscore" value="<?php echo $row_phy_exam["Illness_PainScore"];?>"></td>
                    <td colspan="2" class="br nbt">(on Visual Analogue Scale)</td>
                    <td colspan="2" class="bl nbt">RR
                        <input type="number" name="RR" value="<?php echo $row_phy_exam["Illness_RR"];?>"></td>
                </tr>
                <tr>
                    <td class="bl">Gen. Examination:</td>
                    <?php
                    $gen_exam_arr = explode(",",$row_phy_exam["Gen_examination"]);
                    ?>
                    <td class="br">
						<input type="checkbox" name="gen_exam[]" value="None"
						<?php if(in_array("None", $gen_exam_arr)) {echo 'checked="checked"';}?>>None
                        <input type="checkbox" name="gen_exam[]" id="gen_exam" value="Anemia" 
                               <?php if(in_array("Anemia", $gen_exam_arr)) {echo 'checked="checked"';}?>>Anemia
                    </td>
                    <td class="bl br" colspan="3">
                        <input type="checkbox" name="gen_exam[]" id="gen_exam" value="Cyanosis" 
                               <?php if(in_array("Cyanosis", $gen_exam_arr)) {echo 'checked="checked"';}?>>Cyanosis
                        <input type="checkbox" name="gen_exam[]" id="gen_exam" value="Jaundice"
                               <?php if(in_array("Jaundice", $gen_exam_arr)) {echo 'checked="checked"';}?>>Jaundice

                        <input type="checkbox" name="gen_exam[]" id="gen_exam" 
                               value="Generalized Lymphadenopathy"
                               <?php if(in_array("Generalized Lymphadenopathy", $gen_exam_arr)) {echo 'checked="checked"';}?>>Generalized Lymphadenopathy
                    </td>
                    <td class="br">
                        <input type="checkbox" name="gen_exam[]" id="gen_exam" value="Pedal Oedema"
                               <?php if(in_array("Pedal Oedema", $gen_exam_arr)) {echo 'checked="checked"';}?>>Pedal Oedema
                    </td>
                </tr>
                <tr>
                    <td colspan="6" class="nbb">Gen. Examination: Head / Eyes / Ears / Nose / Throat /Neck<br>
                        <textarea rows="10" cols="150" name="physical_gen_exam"><?php echo $row_phy_exam["Physical_Gen_examination"]?></textarea>
                    </td>
                </tr>
                <tr>
                    <td colspan="6" class="nbb nbt">Systemic Examination:</td>
                </tr>
                <tr>
                    <td colspan="6" class="nbb nbt">1) Respiratory System <br> 
                        <textarea rows="10" cols="150" name="SE_Respiratory"><?php echo $row_phy_exam["SE_Respiratory"]?></textarea>
                    </td>   
                </tr>
                <tr>
                    <td colspan="6" class="nbb nbt">2) Cardiovascular System <br> 
                        <textarea rows="10" cols="150" name="SE_Cardiovascular"><?php echo $row_phy_exam["SE_Cardiovascular"]?></textarea>
                    </td>
                </tr>
                <tr class="nbb">
                    <td colspan="6" class="nbb nbt">3) Neuromuscular System <br> 
                        <textarea rows="10" cols="150" name="SE_Neuromuscular"><?php echo $row_phy_exam["SE_Neuromuscular"]?></textarea>
                    </td>
                </tr>
                <tr>
                    <td colspan="6" class="nbb nbt">4) Abdomen & Alimentry System <br> 
                        <textarea rows="10" cols="150" name="SE_Abdomen_Alimentry"><?php echo $row_phy_exam["SE_Abdomen_Alimentary"]?></textarea>
                    </td>
                </tr>
                <tr>
                    <td colspan="6" class="nbb nbt">5) Extremities /Spine: <br> 
                        <textarea rows="10" cols="150" name="SE_Spine"><?php echo $row_phy_exam["SE_Spine"]?></textarea>
                    </td>
                </tr>
                <tr>
                    <td colspan="6" class="nbt">6) Local Examination: <br> 
                        <textarea rows="10" cols="150" name="SE_Local"><?php echo $row_phy_exam["SE_Local"]?></textarea>
                    </td>
                </tr>
                <?php 
                        }
                    }
                ?>                
            </tbody>
        </table>
            <input type="submit" value="Update"id="updbtn">
            <button onclick="printdoc()" id="prtbtn">Print</button>
        </form>
        <script>
            function printdoc()
            {
                document.getElementById('updbtn').style.display = "none";
                document.getElementById('prtbtn').style.display = "none";                
                window.print();                
            }            
        </script>        
    </body>
</html>
