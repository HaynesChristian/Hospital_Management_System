<?php
$con_servername = "localhost";
$con_username = "root";
$con_password = "";
$database = "hospital_management_system";

$connection = mysqli_connect($con_servername, $con_username, $con_password, $database);

$patient_id = $_GET["patient_id"];
$treatment_id = $_GET["treatment_id"];
$Treatment_Surgery_id = $_GET["Treatment_Surgery_id"];

$view_patient = "SELECT * FROM patient WHERE Patient_id = $patient_id ";
$result_patient = mysqli_query($connection, $view_patient);
if(mysqli_num_rows($result_patient) > 0)
{
    while ($row_patient = mysqli_fetch_assoc($result_patient))
    {
        $patient_name = $row_patient["Patient_Name"];
        $patient_age = $row_patient["Patient_Age"];
        $patient_gender = $row_patient["Patient_Gender"];
        $patient_height = $row_patient["Patient_Height"];
        $patient_weight = $row_patient["Patient_Weight"];
    }
}

$room_select = "SELECT * FROM patient_admission WHERE Treatment_id = $treatment_id";
$result_room = mysqli_query($connection, $room_select);
if(mysqli_num_rows($result_room)>0)
{
    while($row_room= mysqli_fetch_assoc($result_room))
    {
        $room_no = $row_room["Room_no"];                        
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
        <form action="../Pre_Anaesthesia_Add.php" method="POST">
            <input type="hidden" value="<?php echo $login_name;?>" name="admin_name">
            <input type="hidden" value="<?php echo $treatment_id;?>" name="treatment_id">
            <input type="hidden" value="<?php echo $patient_id;?>" name="patient_id">
            <input type="hidden" value="<?php echo $Treatment_Surgery_id;?>" name="Treatment_Surgery_id">
        <div class="justify-content-center" style="padding-top: 3%;">
            <table border="0">
                </thead>
                <tbody>
                    <tr>
                        <td colspan="3">NAME:
                            <input type="text" value="<?php echo $patient_name;?>" readonly="">
                        </td>
                        <td>IPD no:<input type="number" readonly="" value="<?php echo $treatment_id;?>">
                        </td>
                    </tr>
                    <tr>
                        <td>Room No:<input type="number" value="<?php echo $room_no;?>" readonly=""></td>
                        <td>Bed No:<input type="number" name="bedno"></td>
                        <td>Age:
                            <input type="number" value="<?php echo $patient_age;?>" readonly="">
                        </td>
                        <td>Sex:
                            <input type="text" value="<?php echo $patient_gender;?>" readonly="">
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
                            <textarea name="pre_opr_diag"></textarea>
                        </td>
                        <td class="lr2">
                            Procedure Planned<br>
                            <textarea name="proc_plan"></textarea> 
                        </td>
                        <td colspan="2">
                            Physical Status (A.S.A Risk)<br>
                            <input type="radio" name="Physical_status" value="1" required=""/>1
                            <input type="radio" name="Physical_status" value="2" required="" />2
                            <input type="radio" name="Physical_status" value="3" required="" />3
                            <input type="radio" name="Physical_status" value="4" required="" />4
                            <input type="radio" name="Physical_status" value="5" required="" />5
                            <input type="radio" name="Physical_status" value="6" required="" />6
                            <input type="radio" name="Physical_status" value="E" required="" />E
                            <input type="radio" name="Physical_status" value="T" required="" />T
                            
                            <span style="float: right; text-align: right;">
                            Weight
                            <input type="number"  value="<?php echo $patient_weight;?>"><br>
                            Height
                            <input type="number"  value="<?php echo $patient_height;?>">
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" class="lr2">HISTORY</td>
                        <td class="lr2">COMMENTS</td>
                        <td class="lr2">CLINICAL EXAMINATIONS</td>
                        <td class="lr2">INVESTIGATIONS</td>
                    </tr>
                    <tr>
                        <td colspan="4" class="greybg">CARDIOVASCULARY SYSTEM</td>
                        <td rowspan="14" style="vertical-align: top">
                            ECG
                            <br><input type="text" name="inv_ecg"><br>
                            ECHO
                            <br><input type="text" name="inv_echo"><br>
                            CXR
                            <br><input type="text" name="inv_cxr"><br>
                            LFT
                            <br><input type="text" name="inv_lft"><br>
                            BIOHAZARDS
                            <br><input type="text" name="inv_biohz"><br>
                            UREA
                            <br><input type="text" name="inv_urea"><br>
                            CREATININE
                            <br><input type="text" name="inv_creatinine"><br>
                            ELECTROLYTES
                            <br><input type="text" name="inv_electro"><br>
                            PLASMA GLUCOSE
                            <br><input type="text" name="inv_plasma"><br>
                            RADIOLOGY
                            <br><input type="text" name="inv_radiology"><br>
                            Hb / PCV
                            <br><input type="text" name="inv_hb"><br>
                            PT
                            <br><input type="text" name="inv_pt"><br>
                            PTT
                            <br><input type="text" name="inv_ptt"><br>
                            BLOOD GROUP
                            <br><input type="text" name="inv_bg"><br>
                            OTHERS
                            <br><input type="text" name="inv_others"><br>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="checkbox" name="cardio_history[]" value="HYPERTENSION">
                            HYPERTENSION<br>
                            <input type="checkbox" name="cardio_history[]" value="ANGINA">
                            ANGINA<br>
                            <input type="checkbox" name="cardio_history[]" value="MYO INFARCT">
                            MYO INFARCT<br>
                            <input type="checkbox" name="cardio_history[]" value="DYSTHYMIA">
                            DYSTHYMIA<br>
                        </td>
                        <td>
                            <input type="checkbox" name="cardio_history[]" value="VALV H.D.">
                            VALV H.D.<br>
                            <input type="checkbox" name="cardio_history[]" value="C.H.F">
                            C.H.F<br>
                            <input type="checkbox" name="cardio_history[]" value="PERIPH BASIC DIS">
                            PERIPH BASIC DIS<br>
                            <input type="checkbox" name="cardio_history[]" value="OTHERS">
                            OTHERS
                            <input type="checkbox" name="cardio_history[]" value="NONE" checked="">
                            NONE<br>							
                        </td>
                        <td class="lr2">
                            <textarea cols="20" rows="4" name="cardio_comments"></textarea><br>
                            EXERCISE TOLERANCE
                        </td>
                        <td>
                            PULSE<input type="number" name="ce_pulse"><br>
                            B.P.<input type="text" name="ce_bp"><br>
                            HEART<input type="number" name="ce_heart"><br>
                            PERIPH | PULSES<input type="number" name="ce_periph"><br>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="4" class="greybg">RESPIRATORY SYSTEM</td>
                    </tr>
                    <tr>
                        <td>
                            <input type="checkbox" name="resp_history[]" value="RECENT URI">
                            RECENT URI<br>
                            <input type="checkbox" name="resp_history[]" value="TUBERCULOSES">
                            TUBERCULOSES<br>
                            <input type="checkbox" name="resp_history[]" value="ASTHMA">
                            ASTHMA<br>
                            <input type="checkbox" name="resp_history[]" value="COPD">
                            COPD<br>
                        </td>
                        <td>
                            <input type="checkbox" name="resp_history[]" value="PROD. COUGH">
                            PROD. COUGH<br>
                            <input type="checkbox" name="resp_history[]" value="DYSPNEA">
                            DYSPNEA<br>
                            <input type="checkbox" name="resp_history[]" value="TOBACCO USE">
                            TOBACCO USE<br>
                            <input type="checkbox" name="resp_history[]" value="OTHERS">
                            OTHERS
                            <input type="checkbox" name="resp_history[]" value="NONE" checked="">
                            NONE<br>							
                        </td>
                        <td class="lr2">
                            <textarea cols="20" rows="4" name="resp_comments"></textarea><br>
                        </td>
                        <td>
                            NOSE<input type="text" name="ce_nose"><br>
                            CHEST<input type="text" name="ce_chest"><br>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="4" class="greybg">GI SYSTEM</td>
                    </tr>
                    <tr>
                        <td>
                            <input type="checkbox" name="gi_history[]" value="GEREFLUX">
                            GEREFLUX<br>
                            <input type="checkbox" name="gi_history[]" value="HEPATITIS">
                            HEPATITIS<br>
                            <input type="checkbox" name="gi_history[]" value="CIRRHOSIS">
                            CIRRHOSIS<br>
                        </td>
                        <td>
                            <input type="checkbox" name="gi_history[]" value="ULCERS">
                            ULCERS<br>
                            <input type="checkbox" name="gi_history[]" value="ALCOHOL USE">
                            ALCOHOL USE<br>
                            <input type="checkbox" name="gi_history[]" value="OTHERS">
                            OTHERS
                            <input type="checkbox" name="gi_history[]" value="NONE" checked="">
                            NONE<br>							
                        </td>
                        <td class="lr2">
                            <textarea cols="20" rows="4" name="gi_comments"></textarea><br>
                        </td>
                        <td>
                            ICETERUS<input type="text" name="ce_iceterus"><br>
                            LIVER<input type="text" name="ce_liver"><br>
                            SPLEEN<input type="text" name="ce_spleen"><br>
                            ASCITES<input type="text" name="ce_ascites"><br>
                            NUTRITION<input type="text" name="ce_nutrition"><br>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="4" class="greybg">RENAL ENDOCRINE SYSTEM</td>
                    </tr>
                    <tr>
                        <td>
                            <input type="checkbox" name="renal_history[]" value="RENAL FAILURE/DIALYSES">
                            RENAL FAILURE<br>/DIALYSES<br>
                            <input type="checkbox" name="renal_history[]" value="OBESITY">
                            OBESITY<br>
                            <input type="checkbox" name="renal_history[]" value="THYROIDS DIS">
                            THYROIDS DIS<br>
                        </td>
                        <td>
                            <input type="checkbox" name="renal_history[]" value="DIABETES MELLITUS">
                            DIABETES<br>MELLITUS<br>
                            <input type="checkbox" name="renal_history[]" value="STEROIDS USE">
                            STEROIDS USE<br>
                            <input type="checkbox" name="renal_history[]" value="OTHERS">
                            OTHERS
                            <input type="checkbox" name="renal_history[]" value="NONE" checked="">
                            NONE<br>							
                        </td>
                        <td class="lr2">
                            <textarea cols="20" rows="4" name="renal_comments"></textarea><br>
                        </td>
                        <td>
                            FISTULAE / SHUNTS<br><input type="text" name="ce_shunts"><br>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="4" class="greybg">NEUROMUSCULOSKELETAL SYSTEM</td>
                    </tr>
                    <tr>
                        <td>
                            <input type="checkbox" name="neuro_history[]" value="ELEVATED ICP">
                            ELEVATED ICP<br>
                            <input type="checkbox" name="neuro_history[]" value="SEIZURES">
                            SEIZURES<br>
                            <input type="checkbox" name="neuro_history[]" value="SYNCOPE">
                            SYNCOPE<br>
                            <input type="checkbox" name="neuro_history[]" value="CVA / TIA">
                            CVA / TIA<br>
                        </td>
                        <td>
                            <input type="checkbox" name="neuro_history[]" value="NEURO USE">
                            NEURO USE<br>
                            <input type="checkbox" name="neuro_history[]" value="DISEASE">
                            DISEASE<br>
                            <input type="checkbox" name="neuro_history[]" value="ARTHRITIS">
                            ARTHRITIS<br>
                            <input type="checkbox" name="neuro_history[]" value="OTHERS">
                            OTHERS
                            <input type="checkbox" name="neuro_history[]" value="NONE" checked="">
                            NONE<br>							
                        </td>
                        <td class="lr2">
                            <textarea cols="20" rows="4" name="neuro_comments"></textarea><br>
                        </td>
                        <td>
                            Gc5<input type="text" name="ce_gc"><br>
                            SENSORIMOTOR<input type="text" name="ce_sensorimotor"><br>
                            DEFICITS<input type="text" name="ce_deficits"><br>
                            LUMBOSACRAL SPINE<input type="text" name="ce_lspine"><br>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="4" class="greybg">OTHERS</td>
                    </tr>
                    <tr>
                        <td>
                            <input type="checkbox" name="other_history[]" value="ANEMIA">
                            ANEMIA<br>
                            <input type="checkbox" name="other_history[]" value="BLEEDING DIS.">
                            BLEEDING DIS.<br>
                            <input type="checkbox" name="other_history[]" value="DVT">
                            DVT.<br>
                            <input type="checkbox" name="other_history[]" value="TRANSFUSIONS">
                            TRANSFUSIONS<br>
                        </td>
                        <td>
                            <input type="checkbox" name="other_history[]" value="PREGNANT">
                            PREGNANT<br>
                            <input type="checkbox" name="other_history[]" value="ALLERGIES">
                            ALLERGIES<br>
                            <input type="checkbox" name="other_history[]" value="PREVIOUS ANAESTHETICS">
                            PREVIOUS<br>ANAESTHETICS<br>
                            <input type="checkbox" name="other_history[]" value="OTHERS">
                            OTHERS
                            <input type="checkbox" name="other_history[]" value="NONE" checked="">
                            NONE<br>							
                        </td>
                        <td class="lr2">
                            <textarea cols="20" rows="4" name="other_comments"></textarea><br>
                        </td>
                        <td>
                            PALLOR<input type="text" name="ce_pallor"><br>
                            CYAMPOSIS<input type="text" name="ce_cyamposis"><br>
                            LMP<input type="text" name="ce_lmp"><br>
                            PREMATURITY<input type="text" name="ce_prematurity"><br>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="4" class="greybg">AIRWAY</td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input type="checkbox" name="airway_history[]" value="PAST DIFFICULT INCUBATION">
                            PAST DIFFICULT INCUBATION<br>
                            <input type="checkbox" name="airway_history[]" value="OBSTRUCTIVE SLEEP APNEA">
                            OBSTRUCTIVE SLEEP APNEA<br>
                            <input type="checkbox" name="airway_history[]" value="OTHERS">
                            OTHERS<br>
                            <input type="checkbox" name="airway_history[]" value="NONE" checked="">
                            NONE<br>							
                        </td>
                        <td class="lr2">
                            <textarea cols="20" rows="4" name="airway_comments"></textarea><br>
                        </td>
                        <td>
                            DEMOTATON<input type="text" name="ce_demotaton"><br>
                            MALLOAMPATI CLASS<input type="text" name="ce_mclass"><br>
                            JAW MOVTS<input type="text" name="ce_jawmovts"><br>
                            CERVICAL SPINE<input type="text" name="ce_cspine"><br>
                        </td>
                    </tr>
                        <td colspan="2" class="lr">
                            MEDICATIONS<br>
                            <textarea cols="20" rows="4" name="medications"></textarea><br>
                        </td>
                        <td class="lr">
                            PRE-ANESTHETIC INSTRUCTIONS<br>
                            <textarea cols="20" rows="4" name="pre_anes_instr"></textarea><br>
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
                                            <input type="radio" name="risks_explained" value="yes" required=""/>YES
                                            <input type="radio" name="risks_explained" value="no" required=""/>NO
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>CONSULTANT OBTAINED</td>
                                        <td style="float: right">
                                            <input type="radio" name="consultant_obt" value="yes" required=""/>YES
                                            <input type="radio" name="consultant_obt" value="no" required=""/>NO
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            REMARKS<br>
                                            <textarea rows="3" cols="15" name="anes_remarks"></textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Date<input type="text" readonly=""></td>
                                        <td>
                                            <input type="text" readonly="" style="display:none"><br>
                                            Name & Sign of Anesthsiologist</td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
            <input type="submit" value="Next">
        </form>
    </body>
</html>
