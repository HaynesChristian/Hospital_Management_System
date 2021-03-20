<?php
$con_servername = "localhost";
$con_username = "root";
$con_password = "";
$database = "hospital_management_system";

$connection = mysqli_connect($con_servername, $con_username, $con_password, $database);

$patient_id = $_GET["patient_id"];
$treatment_id = $_GET["treatment_id"];
$treatment_surgery_id = $_GET["treatment_surgery_id"];

$current_date = date("Y-m-d");
date_default_timezone_set("Asia/Kolkata");
$current_time = date("H:i");

if($_GET)
{   
    $login_name=$_GET["admin_name"];
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
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Pre Anaesthesia Evalution</title>
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
        input[type="text"],input[type="number"],textarea
        {
            border: 0;
            width: auto;
            padding-left: 2%;
        }        
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
        td.greybg
        {
            background-color:lightgray;
            text-align: center;
        }
        td.lr
        {
            vertical-align: top;
            text-align: center;
            font-weight: bold;
        }
        td.lr2
        {
            vertical-align: top;
            text-align: center;
        }        
        </style>
    </head>
    <body class="container" style="font-family: Times New Roman;">
        <img src="../images/tattvam_banner.jpg" align='right'>
        <h2>
            <span style="padding-left: 15px; padding-right: 15px;">
                Pre Anaesthesia Evalution
            </span>
        </h2>
        <?php
        $view_patient_ts = "SELECT * FROM patient, treatment_surgery "
                . "WHERE Patient_id = $patient_id AND Treatment_id = $treatment_id "
                . "AND Treatment_Surgery_id = $treatment_surgery_id";
        $result_patient_ts = mysqli_query($connection, $view_patient_ts);
        if(mysqli_num_rows($result_patient_ts) > 0)
        {
            while ($row_patient_ts = mysqli_fetch_assoc($result_patient_ts))
            {
        ?>
        <form action="Update_Pre_Anaesthesia.php" method="POST">
            <input type="hidden" value="<?php echo $login_name;?>" name="admin_name">
            <input type="hidden" value="<?php echo $treatment_id;?>" name="treatment_id">
            <input type="hidden" value="<?php echo $patient_id;?>" name="patient_id">
            <input type="hidden" value="<?php echo $treatment_surgery_id;?>" name="Treatment_Surgery_id">
        <div class="justify-content-center" style="padding-top: 3%;">
            <table border="0">
                </thead>
                <tbody>
                    <tr>
                        <td colspan="3">NAME:
                            <input type="text" value="<?php echo $row_patient_ts["Patient_Name"];?>" readonly="">
                        </td>
                        <td>IPD no:<input type="number" readonly="" value="<?php echo $treatment_id;?>">
                        </td>
                    </tr>
                    <tr>
                        <td>Room No:<input type="number" value="<?php echo $room_no;?>" readonly=""></td>
                        <td>Bed No:<input type="number" name="bedno" value="<?php echo $bed_no;?>"></td>
                        <td>Age:
                            <input type="number" value="<?php echo $row_patient_ts["Patient_Age"];?>" readonly="">
                        </td>
                        <td>Sex:
                            <input type="text" value="<?php echo $row_patient_ts["Patient_Gender"];?>" readonly="">
                        </td>
                    </tr>
                </tbody>
            </table>
            <br>
            <table border="1">
                <tbody>
                    <tr>
                        <td colspan="2" class="lr2">
                            Pre Operative Diagnosis<br>
                            <textarea name="pre_opr_diag"><?php echo $row_patient_ts["Pre_operative_diagnosis"];?></textarea>
                        </td>
                        <td class="lr2">
                            Procedure Planned<br>
                            <textarea name="proc_plan"><?php echo $row_patient_ts["Procedure_planned"];?></textarea> 
                        </td>
                        <td colspan="2">
                            Physical Status (A.S.A Risk)<br>
                            <input type="radio" name="Physical_status" value="1"
                                   <?php if($row_patient_ts["Pre_Anae_Physical_status"] == "1"){echo 'checked="checked"';}?>/>1
                            <input type="radio" name="Physical_status" value="2" 
                                   <?php if($row_patient_ts["Pre_Anae_Physical_status"] == "2"){echo 'checked="checked"';}?>/>2
                            <input type="radio" name="Physical_status" value="3" 
                                   <?php if($row_patient_ts["Pre_Anae_Physical_status"] == "3"){echo 'checked="checked"';}?>/>3
                            <input type="radio" name="Physical_status" value="4" 
                                   <?php if($row_patient_ts["Pre_Anae_Physical_status"] == "4"){echo 'checked="checked"';}?>/>4
                            <input type="radio" name="Physical_status" value="5" 
                                   <?php if($row_patient_ts["Pre_Anae_Physical_status"] == "5"){echo 'checked="checked"';}?>/>5
                            <input type="radio" name="Physical_status" value="6" 
                                   <?php if($row_patient_ts["Pre_Anae_Physical_status"] == "6"){echo 'checked="checked"';}?>/>6
                            <input type="radio" name="Physical_status" value="E" 
                                   <?php if($row_patient_ts["Pre_Anae_Physical_status"] == "E"){echo 'checked="checked"';}?>/>E
                            <input type="radio" name="Physical_status" value="T" 
                                   <?php if($row_patient_ts["Pre_Anae_Physical_status"] == "T"){echo 'checked="checked"';}?>/>T
                            
                            <span style="float: right; text-align: right;">
                            Weight
                            <input type="number" value="<?php echo $row_patient_ts["Patient_Weight"];?>"><br>
                            Height
                            <input type="number" value="<?php echo $row_patient_ts["Patient_Height"];?>">
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" class="lr2">HISTORY</td>
                        <td class="lr2">COMMENTS</td>
                        <td class="lr2">CLINICAL EXAMINATIONS</td>
                        <td class="lr2">INVESTIGATIONS</td>
                    </tr>
                    <?php
                    $cardio_history = explode(",",$row_patient_ts["Cardiovasculary_history"]);
                    $resp_history = explode(",",$row_patient_ts["Respiratory_history"]);
                    $gi_history = explode(",",$row_patient_ts["GI_history"]);
                    $renal_history = explode(",",$row_patient_ts["Renal_Endocrine_history"]);
                    $neuro_history = explode(",",$row_patient_ts["Neuro_history"]);
                    $other_history = explode(",",$row_patient_ts["Other_history"]);
                    $airway_history = explode(",",$row_patient_ts["Airway_history"]);
                    ?>
                    <tr>
                        <td colspan="4" class="greybg">CARDIOVASCULARY SYSTEM</td>
                        <td rowspan="14" style="vertical-align: top">
                            ECG
                            <br><input type="text" name="inv_ecg" 
                                       value="<?php echo $row_patient_ts["Inv_ECG"];?>"><br>
                            ECHO
                            <br><input type="text" name="inv_echo"
                                       value="<?php echo $row_patient_ts["Inv_Echo"];?>"><br>
                            CXR
                            <br><input type="text" name="inv_cxr"
                                       value="<?php echo $row_patient_ts["Inv_CXR"];?>"><br>
                            LFT
                            <br><input type="text" name="inv_lft"
                                       value="<?php echo $row_patient_ts["Inv_LFT"];?>"><br>
                            BIOHAZARDS
                            <br><input type="text" name="inv_biohz"
                                       value="<?php echo $row_patient_ts["Inv_Biohazards"];?>"><br>
                            UREA
                            <br><input type="text" name="inv_urea"
                                       value="<?php echo $row_patient_ts["Inv_Urea"];?>"><br>
                            CREATININE
                            <br><input type="text" name="inv_creatinine"
                                       value="<?php echo $row_patient_ts["Inv_Creatinine"];?>"><br>
                            ELECTROLYTES
                            <br><input type="text" name="inv_electro"
                                       value="<?php echo $row_patient_ts["Inv_Electrolytes"];?>"><br>
                            PLASMA GLUCOSE
                            <br><input type="text" name="inv_plasma"
                                       value="<?php echo $row_patient_ts["Inv_Plasma"];?>"><br>
                            RADIOLOGY
                            <br><input type="text" name="inv_radiology"
                                       value="<?php echo $row_patient_ts["Inv_Radiology"];?>"><br>
                            Hb / PCV
                            <br><input type="text" name="inv_hb"
                                       value="<?php echo $row_patient_ts["Inv_Hb"];?>"><br>
                            PT
                            <br><input type="text" name="inv_pt"
                                       value="<?php echo $row_patient_ts["Inv_PT"];?>"><br>
                            PTT
                            <br><input type="text" name="inv_ptt"
                                       value="<?php echo $row_patient_ts["Inv_PTT"];?>"><br>
                            BLOOD GROUP
                            <br><input type="text" name="inv_bg"
                                       value="<?php echo $row_patient_ts["Inv_Bloodgroup"];?>"><br>
                            OTHERS
                            <br><input type="text" name="inv_others"
                                       value="<?php echo $row_patient_ts["Inv_Others"];?>"><br>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="checkbox" name="cardio_history[]" value="HYPERTENSION"
                                   <?php if(in_array("HYPERTENSION", $cardio_history)){echo 'checked="checked"';}?>>
                            HYPERTENSION<br>
                            <input type="checkbox" name="cardio_history[]" value="ANGINA"
                                   <?php if(in_array("ANGINA", $cardio_history)){echo 'checked="checked"';}?>>
                            ANGINA<br>
                            <input type="checkbox" name="cardio_history[]" value="MYO INFARCT"
                                   <?php if(in_array("MYO INFARCT", $cardio_history)){echo 'checked="checked"';}?>>
                            MYO INFARCT<br>
                            <input type="checkbox" name="cardio_history[]" value="DYSTHYMIA"
                                   <?php if(in_array("DYSTHYMIA", $cardio_history)){echo 'checked="checked"';}?>>
                            DYSTHYMIA<br>
                        </td>
                        <td>
                            <input type="checkbox" name="cardio_history[]" value="VALV H.D."
                                   <?php if(in_array("VALV H.D.", $cardio_history)){echo 'checked="checked"';}?>>
                            VALV H.D.<br>
                            <input type="checkbox" name="cardio_history[]" value="C.H.F"
                                   <?php if(in_array("C.H.F", $cardio_history)){echo 'checked="checked"';}?>>
                            C.H.F<br>
                            <input type="checkbox" name="cardio_history[]" value="PERIPH BASIC DIS"
                                   <?php if(in_array("PERIPH BASIC DIS", $cardio_history)){echo 'checked="checked"';}?>>
                            PERIPH BASIC DIS<br>
                            <input type="checkbox" name="cardio_history[]" value="OTHERS"
                                   <?php if(in_array("OTHERS", $cardio_history)){echo 'checked="checked"';}?>>
                            OTHERS<br>
                        </td>
                        <td class="lr2">
                            <textarea cols="20" rows="4" name="cardio_comments"><?php echo $row_patient_ts["Cardiovasculary_comments"];?></textarea><br>
                            EXERCISE TOLERANCE
                        </td>
                        <td>
                            PULSE<input type="number" name="ce_pulse" 
                                        value="<?php echo $row_patient_ts["CE_Pulse"];?>"><br>
                            B.P.<input type="text" name="ce_bp"
                                       value="<?php echo $row_patient_ts["CE_BP"];?>"><br>
                            HEART<input type="number" name="ce_heart"
                                        value="<?php echo $row_patient_ts["CE_Heart"];?>"><br>
                            PERIPH | PULSES<input type="number" name="ce_periph"
                                                  value="<?php echo $row_patient_ts["CE_Periph"];?>"><br>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="4" class="greybg">RESPIRATORY SYSTEM</td>
                    </tr>
                    <tr>
                        <td>
                            <input type="checkbox" name="resp_history[]" value="RECENT URI"
                                   <?php if(in_array("RECENT URI", $resp_history)){echo 'checked="checked"';}?>>
                            RECENT URI<br>
                            <input type="checkbox" name="resp_history[]" value="TUBERCULOSES"
                                   <?php if(in_array("TUBERCULOSES", $resp_history)){echo 'checked="checked"';}?>>
                            TUBERCULOSES<br>
                            <input type="checkbox" name="resp_history[]" value="ASTHMA"
                                   <?php if(in_array("ASTHMA", $resp_history)){echo 'checked="checked"';}?>>
                            ASTHMA<br>
                            <input type="checkbox" name="resp_history[]" value="COPD"
                                   <?php if(in_array("COPD", $resp_history)){echo 'checked="checked"';}?>>
                            COPD<br>
                        </td>
                        <td>
                            <input type="checkbox" name="resp_history[]" value="PROD. COUGH"
                                   <?php if(in_array("PROD. COUGH", $resp_history)){echo 'checked="checked"';}?>>
                            PROD. COUGH<br>
                            <input type="checkbox" name="resp_history[]" value="DYSPNEA"
                                   <?php if(in_array("DYSPNEA", $resp_history)){echo 'checked="checked"';}?>>
                            DYSPNEA<br>
                            <input type="checkbox" name="resp_history[]" value="TOBACCO USE"
                                   <?php if(in_array("TOBACCO USE", $resp_history)){echo 'checked="checked"';}?>>
                            TOBACCO USE<br>
                            <input type="checkbox" name="resp_history[]" value="OTHERS"
                                   <?php if(in_array("OTHERS", $resp_history)){echo 'checked="checked"';}?>>
                            OTHERS<br>
                        </td>
                        <td class="lr2">
                            <textarea cols="20" rows="4" name="resp_comments"><?php echo $row_patient_ts["Respiratory_comments"];?></textarea><br>
                        </td>
                        <td>
                            NOSE<input type="text" name="ce_nose"
                                       value="<?php echo $row_patient_ts["CE_Nose"];?>"><br>
                            CHEST<input type="text" name="ce_chest"
                                        value="<?php echo $row_patient_ts["CE_Chest"];?>"><br>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="4" class="greybg">GI SYSTEM</td>
                    </tr>
                    <tr>
                        <td>
                            <input type="checkbox" name="gi_history[]" value="GEREFLUX"
                                   <?php if(in_array("GEREFLUX", $gi_history)){echo 'checked="checked"';}?>>
                            GEREFLUX<br>
                            <input type="checkbox" name="gi_history[]" value="HEPATITIS"
                                   <?php if(in_array("HEPATITIS", $gi_history)){echo 'checked="checked"';}?>>
                            HEPATITIS<br>
                            <input type="checkbox" name="gi_history[]" value="CIRRHOSIS"
                                   <?php if(in_array("CIRRHOSIS", $gi_history)){echo 'checked="checked"';}?>>
                            CIRRHOSIS<br>
                        </td>
                        <td>
                            <input type="checkbox" name="gi_history[]" value="ULCERS"
                                   <?php if(in_array("ULCERS", $gi_history)){echo 'checked="checked"';}?>>
                            ULCERS<br>
                            <input type="checkbox" name="gi_history[]" value="ALCOHOL USE"
                                   <?php if(in_array("ALCOHOL USE", $gi_history)){echo 'checked="checked"';}?>>
                            ALCOHOL USE<br>
                            <input type="checkbox" name="gi_history[]" value="OTHERS"
                                   <?php if(in_array("OTHERS", $gi_history)){echo 'checked="checked"';}?>>
                            OTHERS<br>
                        </td>
                        <td class="lr2">
                            <textarea cols="20" rows="4" name="gi_comments"><?php echo $row_patient_ts["GI_comments"];?></textarea><br>
                        </td>
                        <td>
                            ICETERUS<input type="text" name="ce_iceterus"
                                           value="<?php echo $row_patient_ts["CE_Iceterus"];?>"><br>
                            LIVER<input type="text" name="ce_liver"
                                        value="<?php echo $row_patient_ts["CE_Liver"];?>"><br>
                            SPLEEN<input type="text" name="ce_spleen"
                                         value="<?php echo $row_patient_ts["CE_Spleen"];?>"><br>
                            ASCITES<input type="text" name="ce_ascites"
                                          value="<?php echo $row_patient_ts["CE_Ascites"];?>"><br>
                            NUTRITION<input type="text" name="ce_nutrition"
                                            value="<?php echo $row_patient_ts["CE_Nutrition"];?>"><br>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="4" class="greybg">RENAL ENDOCRINE SYSTEM</td>
                    </tr>
                    <tr>
                        <td>
                            <input type="checkbox" name="renal_history[]" value="RENAL FAILURE/DIALYSES"
                                   <?php if(in_array("RENAL FAILURE/DIALYSES", $renal_history)){echo 'checked="checked"';}?>>
                            RENAL FAILURE<br>/DIALYSES<br>
                            <input type="checkbox" name="renal_history[]" value="OBESITY"
                                   <?php if(in_array("OBESITY", $renal_history)){echo 'checked="checked"';}?>>
                            OBESITY<br>
                            <input type="checkbox" name="renal_history[]" value="THYROIDS DIS"
                                   <?php if(in_array("THYROIDS DIS", $renal_history)){echo 'checked="checked"';}?>>
                            THYROIDS DIS<br>
                        </td>
                        <td>
                            <input type="checkbox" name="renal_history[]" value="DIABETES MELLITUS"
                                   <?php if(in_array("DIABETES MELLITUS", $renal_history)){echo 'checked="checked"';}?>>
                            DIABETES<br>MELLITUS<br>
                            <input type="checkbox" name="renal_history[]" value="STEROIDS USE"
                                   <?php if(in_array("STEROIDS USE", $renal_history)){echo 'checked="checked"';}?>>
                            STEROIDS USE<br>
                            <input type="checkbox" name="renal_history[]" value="OTHERS"
                                   <?php if(in_array("OTHERS", $renal_history)){echo 'checked="checked"';}?>>
                            OTHERS<br>
                        </td>
                        <td class="lr2">
                            <textarea cols="20" rows="4" name="renal_comments"><?php echo $row_patient_ts["Renal_Endocrine_comments"];?></textarea><br>
                        </td>
                        <td>
                            FISTULAE / SHUNTS<br><input type="text" name="ce_shunts"
                                                        value="<?php echo $row_patient_ts["CE_Shunts"];?>"><br>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="4" class="greybg">NEUROMUSCULOSKELETAL SYSTEM</td>
                    </tr>
                    <tr>
                        <td>
                            <input type="checkbox" name="neuro_history[]" value="ELEVATED ICP"
                                   <?php if(in_array("ELEVATED ICP", $neuro_history)){echo 'checked="checked"';}?>>
                            ELEVATED ICP<br>
                            <input type="checkbox" name="neuro_history[]" value="SEIZURES"
                                   <?php if(in_array("SEIZURES", $neuro_history)){echo 'checked="checked"';}?>>
                            SEIZURES<br>
                            <input type="checkbox" name="neuro_history[]" value="SYNCOPE"
                                   <?php if(in_array("SYNCOPE", $neuro_history)){echo 'checked="checked"';}?>>
                            SYNCOPE<br>
                            <input type="checkbox" name="neuro_history[]" value="CVA / TIA"
                                   <?php if(in_array("CVA / TIA", $neuro_history)){echo 'checked="checked"';}?>>
                            CVA / TIA<br>
                        </td>
                        <td>
                            <input type="checkbox" name="neuro_history[]" value="NEURO USE"
                                   <?php if(in_array("NEURO USE", $neuro_history)){echo 'checked="checked"';}?>>
                            NEURO USE<br>
                            <input type="checkbox" name="neuro_history[]" value="DISEASE"
                                   <?php if(in_array("DISEASE", $neuro_history)){echo 'checked="checked"';}?>>
                            DISEASE<br>
                            <input type="checkbox" name="neuro_history[]" value="ARTHRITIS"
                                   <?php if(in_array("ARTHRITIS", $neuro_history)){echo 'checked="checked"';}?>>
                            ARTHRITIS<br>
                            <input type="checkbox" name="neuro_history[]" value="OTHERS"
                                   <?php if(in_array("OTHERS", $neuro_history)){echo 'checked="checked"';}?>>
                            OTHERS<br>
                        </td>
                        <td class="lr2">
                            <textarea cols="20" rows="4" name="neuro_comments"><?php echo $row_patient_ts["Neuro_comments"];?></textarea><br>
                        </td>
                        <td>
                            Gc5<input type="text" name="ce_gc"
                                      value="<?php echo $row_patient_ts["CE_GC"];?>"><br>
                            SENSORIMOTOR<input type="text" name="ce_sensorimotor"
                                               value="<?php echo $row_patient_ts["CE_Sensorimotor"];?>"><br>
                            DEFICITS<input type="text" name="ce_deficits"
                                           value="<?php echo $row_patient_ts["CE_Deficits"];?>"><br>
                            LUMBOSACRAL SPINE<input type="text" name="ce_lspine"
                                                    value="<?php echo $row_patient_ts["CE_LSpine"];?>"><br>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="4" class="greybg">OTHERS</td>
                    </tr>
                    <tr>
                        <td>
                            <input type="checkbox" name="other_history[]" value="ANEMIA"
                                   <?php if(in_array("ANEMIA", $other_history)){echo 'checked="checked"';}?>>
                            ANEMIA<br>
                            <input type="checkbox" name="other_history[]" value="BLEEDING DIS."
                                   <?php if(in_array("BLEEDING DIS.", $other_history)){echo 'checked="checked"';}?>>
                            BLEEDING DIS.<br>
                            <input type="checkbox" name="other_history[]" value="DVT"
                                   <?php if(in_array("DVT", $other_history)){echo 'checked="checked"';}?>>
                            DVT.<br>
                            <input type="checkbox" name="other_history[]" value="TRANSFUSIONS"
                                   <?php if(in_array("TRANSFUSIONS", $other_history)){echo 'checked="checked"';}?>>
                            TRANSFUSIONS<br>
                        </td>
                        <td>
                            <input type="checkbox" name="other_history[]" value="PREGNANT"
                                   <?php if(in_array("PREGNANT", $other_history)){echo 'checked="checked"';}?>>
                            PREGNANT<br>
                            <input type="checkbox" name="other_history[]" value="ALLERGIES"
                                   <?php if(in_array("ALLERGIES", $other_history)){echo 'checked="checked"';}?>>
                            ALLERGIES<br>
                            <input type="checkbox" name="other_history[]" value="PREVIOUS ANAESTHETICS"
                                   <?php if(in_array("PREVIOUS ANAESTHETICS", $other_history)){echo 'checked="checked"';}?>>
                            PREVIOUS<br>ANAESTHETICS<br>
                            <input type="checkbox" name="other_history[]" value="OTHERS"
                                   <?php if(in_array("OTHERS", $other_history)){echo 'checked="checked"';}?>>
                            OTHERS<br>
                        </td>
                        <td class="lr2">
                            <textarea cols="20" rows="4" name="other_comments"><?php echo $row_patient_ts["Other_comments"];?></textarea><br>
                        </td>
                        <td>
                            PALLOR<input type="text" name="ce_pallor"
                                         value="<?php echo $row_patient_ts["CE_Pallor"];?>"><br>
                            CYAMPOSIS<input type="text" name="ce_cyamposis"
                                            value="<?php echo $row_patient_ts["CE_Cyamopsis"];?>"><br>
                            LMP<input type="text" name="ce_lmp"
                                      value="<?php echo $row_patient_ts["CE_LMP"];?>"><br>
                            PREMATURITY<input type="text" name="ce_prematurity"
                                              value="<?php echo $row_patient_ts["CE_Prematurity"];?>"><br>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="4" class="greybg">AIRWAY</td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input type="checkbox" name="airway_history[]" value="PAST DIFFICULT INCUBATION"
                                   <?php if(in_array("PAST DIFFICULT INCUBATION", $airway_history)){echo 'checked="checked"';}?>>
                            PAST DIFFICULT INCUBATION<br>
                            <input type="checkbox" name="airway_history[]" value="OBSTRUCTIVE SLEEP APNEA"
                                   <?php if(in_array("OBSTRUCTIVE SLEEP APNEA", $airway_history)){echo 'checked="checked"';}?>>
                            OBSTRUCTIVE SLEEP APNEA<br>
                            <input type="checkbox" name="airway_history[]" value="OTHERS"
                                   <?php if(in_array("OTHERS", $airway_history)){echo 'checked="checked"';}?>>
                            OTHERS<br>
                        </td>
                        <td class="lr2">
                            <textarea cols="20" rows="4" name="airway_comments"><?php echo $row_patient_ts["Airway_comments"];?></textarea><br>
                        </td>
                        <td>
                            DEMOTATON<input type="text" name="ce_demotaton"
                                            value="<?php echo $row_patient_ts["CE_Demotaton"];?>"><br>
                            MALLOAMPATI CLASS<input type="text" name="ce_mclass"
                                                    value="<?php echo $row_patient_ts["CE_Mclass"];?>"><br>
                            JAW MOVTS<input type="text" name="ce_jawmovts"
                                            value="<?php echo $row_patient_ts["CE_Jawmovts"];?>"><br>
                            CERVICAL SPINE<input type="text" name="ce_cspine"
                                                 value="<?php echo $row_patient_ts["CE_CSpine"];?>"><br>
                        </td>
                    </tr>
                        <td colspan="2" class="lr">
                            MEDICATIONS<br>
                            <textarea cols="20" rows="4" name="medications"><?php echo $row_patient_ts["Medications"];?></textarea><br>
                        </td>
                        <td class="lr">
                            PRE-ANESTHETIC INSTRUCTIONS<br>
                            <textarea cols="20" rows="4" name="pre_anes_instr"><?php echo $row_patient_ts["Pre_Anes_instructions"];?></textarea><br>
                        </td>
                        <td colspan="2">
                            <table border="0">
                                <thead>
                                    <tr>
                                        <th colspan="2">ANESTHESIA PLAN</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>PROCEDURE & RISKS EXPLAINED TO PATIENT</td>
                                        <td style="float: right">
                                            <input type="radio" name="risks_explained" value="yes"
                                                   <?php if($row_patient_ts["Risks_explained"] == "yes"){echo 'checked="checked"';}?>/>YES
                                            <input type="radio" name="risks_explained" value="no"
                                                   <?php if($row_patient_ts["Risks_explained"] == "no"){echo 'checked="checked"';}?>/>NO
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>CONSULTANT OBTAINED</td>
                                        <td style="float: right">
                                            <input type="radio" name="consultant_obt" value="yes"
                                                   <?php if($row_patient_ts["Consultant_obtained"] == "yes"){echo 'checked="checked"';}?>/>YES
                                            <input type="radio" name="consultant_obt" value="no"
                                                   <?php if($row_patient_ts["Consultant_obtained"] == "no"){echo 'checked="checked"';}?>/>NO
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            REMARKS<br>
                                            <textarea rows="3" cols="15" name="anes_remarks"><?php echo $row_patient_ts["Anesthesia_Remarks"];?></textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Date<input type="text" readonly=""></td>
                                        <td>
                                            <input type="text"><br>
                                            Name & Sign of Anesthsiologist</td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
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
    </body>
</html>
