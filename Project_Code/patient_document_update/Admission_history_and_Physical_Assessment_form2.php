<?php
$con_servername = "localhost";
$con_username = "root";
$con_password = "";
$database = "hospital_management_system";

$connection = mysqli_connect($con_servername, $con_username, $con_password, $database);

$current_date = date("Y-m-d");
date_default_timezone_set("Asia/Kolkata");
$current_time = date("H:i");

$patient_id = $_GET["patient_id"];
$treatment_id = $_GET["treatment_id"];

$informant = "SELECT Patient_Relative_name,Patient_Relative_Relation,Patient_Gender FROM patient "
        . "WHERE Patient_id = $patient_id";
$informant_result = mysqli_query($connection, $informant);
if(mysqli_num_rows($informant_result) > 0)
{
    while($inf_row = mysqli_fetch_assoc($informant_result))
    {
        $informant_name = $inf_row["Patient_Relative_name"];
        $informant_rel = $inf_row["Patient_Relative_Relation"];
        $gender = $inf_row["Patient_Gender"];
    }
}

if($_GET)
{   
    $login_name=$_GET["admin_name"];
}
?>
<!DOCTYPE html>
<html class="notranslate">
    <head>
        <meta charset="UTF-8">
        <title>Page 2</title>
        <style>
        input:not([type="submit"])
        {
            border: 0;
            border-bottom: 1px none black;
            width: content-box;
        }        
        input[type="radio"]
        {
            border-radius: 20%;
            border: 1px solid black;
            background: transparent;
        }
        input[type="checkbox"]
        {
            border-radius: 20%;
            border: 1px solid black;
            background: transparent;
            float: right;
        }        
        textarea
        {
            border: none;
            padding: 0;
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
            text-align: justify
        }
        td
        {
            border-bottom: 1px dashed black;
            white-space: nowrap;
        }
        th,td.bb
        {
            border-bottom: 3px solid black;
        }
        td.bl,td.br
        {
            border-left: none;
            border-right: none;
        }
        </style>        
    </head>
    <body class="container" style="font-family: Times New Roman; font-size: 16px;" 
          onbeforeprint="lang_disappear()" onafterprint="lang_appear()">
        <form action="Update_AH_PA_form2.php" method="POST">
            <input type="hidden" value="<?php echo $login_name;?>" name="admin_name">
            <input type="hidden" value="<?php echo $treatment_id;?>" name="treatment_id">
            <input type="hidden" value="<?php echo $patient_id;?>" name="patient_id">            
        <table border="1">
            <thead>
                <tr>
                    <th>Past History</th>
                    <th>Duration</th>
                    <th colspan="3">Medication</th>
                    <th colspan="2">Duration</th>
                </tr>
            </thead>
            <tbody>
                    <?php 
                    $view_phy_exam = "SELECT * FROM patient_pasthistory , illness_complaint , patient_addiction "
                            . "WHERE patient_pasthistory.Patient_id = $patient_id "
                            . "AND patient_addiction.Patient_id = $patient_id "
                            . "AND illness_complaint.Treatment_id = $treatment_id";
                    $result_phy_exam = mysqli_query($connection, $view_phy_exam);
                    if(mysqli_num_rows($result_phy_exam) > 0)
                    {
                        while ($row_phy_exam = mysqli_fetch_assoc($result_phy_exam))
                        {
                    ?>                
                <tr>
                    <?php
                    $illness_name = $illness_duration = $illness_medication = $illness_medication_duration = array();
                    $illness_name_view = "SELECT * FROM patient_illness_pasthistory WHERE Patient_id = $patient_id";
                    $illness_name_res = mysqli_query($connection,$illness_name_view);
                    if(mysqli_num_rows($illness_name_res) > 0)
                    {
                        while ($illn_row = mysqli_fetch_assoc($illness_name_res))
                        {
                            array_push($illness_name, $illn_row["PastHistory_Illness_Name"]);
                            array_push($illness_duration, $illn_row["PastHistory_Illness_Duration"]);
                            array_push($illness_medication, $illn_row["PastHistory_Illness_Medication"]);
                            array_push($illness_medication_duration, $illn_row["PastHistory_Illness_Medication_duration"]);
                        }
                    }
                    ?>                    
                    <td>Diabetes 
                        <input type="checkbox" name="illness_name[]" value="Diabetes"
                               <?php if(in_array("Diabetes", $illness_name)) {echo 'checked="checked"';}?>>
                    </td>
                    <td>
                        <input type="text" name="illness_duration[]"      
                               <?php if(in_array("Diabetes", $illness_name)) 
                                       {$ill_d_ino = array_search("Diabetes", $illness_name);
                                       echo "value='$illness_duration[$ill_d_ino]'";}?>>
                    </td>
                    <td colspan="3">
                        <input type="text" placeholder="1)" name="illness_medication[]" 
                               <?php if(in_array("Diabetes", $illness_name)) 
                                       {$ill_m_ino = array_search("Diabetes", $illness_name);
                                       echo "value='$illness_medication[$ill_m_ino]'";}?>>
                    </td>
                    <td colspan="2">
                        <input type="text" name="illness_medication_duration[]"
                               <?php if(in_array("Diabetes", $illness_name))
                                       {$ill_md_ino = array_search("Diabetes", $illness_name);
                                       echo "value='$illness_medication_duration[$ill_md_ino]'";}?>>
                    </td>
                </tr>
                <tr>
                    <td>Ischemic Heart Disease 
                        <input type="checkbox" name="illness_name[]" value="Ischemic_Heart_Disease"
                               <?php if(in_array("Ischemic_Heart_Disease", $illness_name)) {echo 'checked="checked"';}?>>
                    </td>
                    <td>
                        <input type="text" name="illness_duration[]" 
                            <?php if(in_array("Ischemic_Heart_Disease", $illness_name)) 
                               {$ill_d_ino = array_search("Ischemic_Heart_Disease", $illness_name);
                               echo "value='$illness_duration[$ill_d_ino]'";}?>>
                    </td>
                    <td colspan="3">
                        <input type="text" placeholder="2)" name="illness_medication[]" 
                        <?php if(in_array("Ischemic_Heart_Disease", $illness_name)) 
                               {$ill_m_ino = array_search("Ischemic_Heart_Disease", $illness_name);
                               echo "value='$illness_medication[$ill_m_ino]'";}?>>
                    </td>
                    <td colspan="2">
                        <input type="text" name="illness_medication_duration[]" 
                        <?php if(in_array("Ischemic_Heart_Disease", $illness_name)) 
                                {$ill_md_ino = array_search("Ischemic_Heart_Disease", $illness_name);
                                echo "value='$illness_medication_duration[$ill_md_ino]'";}?>>
                    </td>
                </tr>
                <tr>
                    <td>Hypertension 
                        <input type="checkbox" name="illness_name[]" value="Hypertension"
                               <?php if(in_array("Hypertension", $illness_name)) {echo 'checked="checked"';}?>>
                    </td>
                    <td>
                        <input type="text" name="illness_duration[]" 
                        <?php if(in_array("Hypertension", $illness_name)) 
                                {$ill_d_ino = array_search("Hypertension", $illness_name);
                                echo "value='$illness_duration[$ill_d_ino]'";}?>>
                    </td>
                    <td colspan="3">
                        <input type="text" placeholder="3)" name="illness_medication[]" 
                        <?php if(in_array("Hypertension", $illness_name)) 
                                {$ill_m_ino = array_search("Hypertension", $illness_name);
                                echo "value='$illness_medication[$ill_m_ino]'";}?>>
                    </td>
                    <td colspan="2">
                        <input type="text" name="illness_medication_duration[]" 
                        <?php if(in_array("Hypertension", $illness_name)) 
                                { $ill_md_ino = array_search("Hypertension", $illness_name);
                                echo "value='$illness_medication_duration[$ill_md_ino]'";}?>>
                    </td>                
                </tr>
                <tr>
                    <td>COPD /Asthma 
                        <input type="checkbox" name="illness_name[]" value="COPD/Asthma" 
                               <?php if(in_array("COPD/Asthma", $illness_name)) {echo 'checked="checked"';}?>>
                    </td>
                    <td>
                        <input type="text" name="illness_duration[]" 
                            <?php if(in_array("COPD/Asthma", $illness_name)) 
                                    {$ill_d_ino = array_search("COPD/Asthma", $illness_name);
                                    echo "value='$illness_duration[$ill_d_ino]'";}?>>
                    </td>
                    <td colspan="3">
                        <input type="text" placeholder="4)" name="illness_medication[]" 
                            <?php if(in_array("COPD/Asthma", $illness_name)) 
                                    {$ill_m_ino = array_search("COPD/Asthma", $illness_name);
                                    echo "value='$illness_medication[$ill_m_ino]'";}?>>
                    </td>
                    <td colspan="2">
                        <input type="text" name="illness_medication_duration[]" 
                            <?php if(in_array("COPD/Asthma", $illness_name)) 
                                    {$ill_md_ino = array_search("COPD/Asthma", $illness_name);
                                    echo "value='$illness_medication_duration[$ill_md_ino]'";}?>>
                    </td>
                </tr>
                <tr>
                    <td>CKD 
                        <input type="checkbox" name="illness_name[]" value="CKD"
                               <?php if(in_array("CKD", $illness_name)) {echo 'checked="checked"';}?>>
                    </td>
                    <td>
                        <input type="text" name="illness_duration[]" 
                        <?php if(in_array("CKD", $illness_name)) 
                                {$ill_d_ino = array_search("CKD", $illness_name);
                                echo "value='$illness_duration[$ill_d_ino]'";}?>>
                    </td>
                    <td colspan="3">
                        <input type="text" placeholder="5)" name="illness_medication[]" 
                            <?php if(in_array("CKD", $illness_name)) 
                                    {$ill_m_ino = array_search("CKD", $illness_name);
                                    echo "value='$illness_medication[$ill_m_ino]'";}?>>
                    </td>
                    <td colspan="2">
                        <input type="text" name="illness_medication_duration[]" 
                            <?php if(in_array("CKD", $illness_name)) 
                                    {$ill_md_ino = array_search("CKD", $illness_name);
                                    echo "value='$illness_medication_duration[$ill_md_ino]'";}?>>
                    </td>
                </tr>
                <tr>
                    <td>Tuberculosis 
                        <input type="checkbox" name="illness_name[]" value="Tuberculosis"
                               <?php if(in_array("Tuberculosis", $illness_name)) {echo 'checked="checked"';}?>>
                    </td>
                    <td>
                        <input type="text" name="illness_duration[]" 
                            <?php if(in_array("Tuberculosis", $illness_name)) 
                                    {$ill_d_ino = array_search("Tuberculosis", $illness_name);
                                    echo "value='$illness_duration[$ill_d_ino]'";}?>>
                    </td>
                    <td colspan="3">
                        <input type="text" placeholder="6)" name="illness_medication[]" 
                            <?php if(in_array("Tuberculosis", $illness_name)) 
                                    {$ill_m_ino = array_search("Tuberculosis", $illness_name);
                                    echo "value='$illness_medication[$ill_m_ino]'";}?>>
                    </td>
                    <td colspan="2">
                        <input type="text" name="illness_medication_duration[]" 
                            <?php if(in_array("Tuberculosis", $illness_name)) 
                                    { $ill_md_ino = array_search("Tuberculosis", $illness_name);
                                    echo "value='$illness_medication_duration[$ill_md_ino]'";}?>>
                    </td>
                </tr>
                <tr>
                    <td>Cirshosis of Liver 
                        <input type="checkbox" name="illness_name[]" value="Cirshosis_of_Liver"
                               <?php if(in_array("Cirshosis_of_Liver", $illness_name)) {echo 'checked="checked"';}?>>
                    </td>
                    <td>
                        <input type="text" name="illness_duration[]" 
                            <?php if(in_array("Cirshosis_of_Liver", $illness_name)) 
                                    {$ill_d_ino = array_search("Cirshosis_of_Liver", $illness_name);
                                    echo "value='$illness_duration[$ill_d_ino]'";}?>>
                    </td>
                    <td colspan="3">
                        <input type="text" placeholder="7)" name="illness_medication[]" 
                            <?php if(in_array("Cirshosis_of_Liver", $illness_name)) 
                                    {$ill_m_ino = array_search("Cirshosis_of_Liver", $illness_name);
                                    echo "value='$illness_medication[$ill_m_ino]'";}?>>
                    </td>
                    <td colspan="2">
                        <input type="text" name="illness_medication_duration[]" 
                            <?php if(in_array("Cirshosis_of_Liver", $illness_name)) 
                                    {$ill_md_ino = array_search("Cirshosis_of_Liver", $illness_name);
                                    echo "value='$illness_medication_duration[$ill_md_ino]'";}?>>
                    </td>
                </tr>
                <tr>
                    <td>Thyroid Illness 
                        <input type="checkbox" name="illness_name[]" value="Thyroid_Illness"
                               <?php if(in_array("Thyroid_Illness", $illness_name)) {echo 'checked="checked"';}?>>
                    </td>
                    <td><input type="text" name="illness_duration[]" 
                        <?php if(in_array("Thyroid_Illness", $illness_name)) 
                                {$ill_d_ino = array_search("Thyroid_Illness", $illness_name);
                                echo "value='$illness_duration[$ill_d_ino]'";}?>>
                    </td>
                    <td colspan="3"><input type="text" placeholder="8)" name="illness_medication[]" 
                        <?php if(in_array("Thyroid_Illness", $illness_name)) 
                                {$ill_m_ino = array_search("Thyroid_Illness", $illness_name);
                                echo "value='$illness_medication[$ill_m_ino]'";}?>>
                    </td>
                    <td colspan="2">
                        <input type="text" name="illness_medication_duration[]" 
                            <?php if(in_array("Thyroid_Illness", $illness_name)) 
                                    { $ill_md_ino = array_search("Thyroid_Illness", $illness_name);
                                    echo "value='$illness_medication_duration[$ill_md_ino]'";}?>>
                    </td>
                </tr>
                <tr>
                    <td>Stroke / Seizure Disorder 
                        <input type="checkbox" name="illness_name[]" value="Stroke/Seizure Disorder"
                               <?php if(in_array("Stroke/Seizure Disorder", $illness_name)) {echo 'checked="checked"';}?>>
                    </td>
                    <td>
                        <input type="text" name="illness_duration[]" 
                            <?php if(in_array("Stroke/Seizure Disorder", $illness_name)) 
                                    {$ill_d_ino = array_search("Stroke/Seizure Disorder", $illness_name);
                                    echo "value='$illness_duration[$ill_d_ino]'";}?>>
                    </td>
                    <td colspan="3">
                        <input type="text" placeholder="9)" name="illness_medication[]" 
                            <?php if(in_array("Stroke/Seizure Disorder", $illness_name)) 
                                    {$ill_m_ino = array_search("Stroke/Seizure Disorder", $illness_name);
                                    echo "value='$illness_medication[$ill_m_ino]'";}?>>
                    </td>
                    <td colspan="2">
                        <input type="text" name="illness_medication_duration[]" 
                            <?php if(in_array("Stroke/Seizure Disorder", $illness_name)) 
                                    { $ill_md_ino = array_search("Stroke/Seizure Disorder", $illness_name);
                                    echo "value='$illness_medication_duration[$ill_md_ino]'";}?>>
                    </td>
                </tr>
                <tr>
                    <td>Arthritis / Gout 
                        <input type="checkbox" name="illness_name[]" value="Arthritis/Gout"
                               <?php if(in_array("Arthritis/Gout", $illness_name)) {echo 'checked="checked"';}?>>
                    </td>
                    <td>
                        <input type="text" name="illness_duration[]" 
                            <?php if(in_array("Arthritis/Gout", $illness_name)) 
                                    {$ill_d_ino = array_search("Arthritis/Gout", $illness_name);
                                    echo "value='$illness_duration[$ill_d_ino]'";}?>>
                    </td>
                    <td colspan="3">
                        <input type="text" placeholder="10)" name="illness_medication[]" 
                            <?php if(in_array("Arthritis/Gout", $illness_name)) 
                                    {$ill_m_ino = array_search("Arthritis/Gout", $illness_name);
                                    echo "value='$illness_medication[$ill_m_ino]'";}?>>
                    </td>
                    <td colspan="2">
                        <input type="text" name="illness_medication_duration[]" 
                            <?php if(in_array("Arthritis/Gout", $illness_name)) 
                                    { $ill_md_ino = array_search("Arthritis/Gout", $illness_name);
                                    echo "value='$illness_medication_duration[$ill_md_ino]'";}?>>
                    </td>
                </tr>
                <tr>
                    <td>Any Malignancy 
                        <input type="checkbox" name="illness_name[]" value="Malignancy"
                               <?php if(in_array("Malignancy", $illness_name)) {echo 'checked="checked"';}?>>
                    </td>
                    <td>
                        <input type="text" name="illness_duration[]" 
                            <?php if(in_array("Malignancy", $illness_name)) 
                                    {$ill_d_ino = array_search("Malignancy", $illness_name);
                                    echo "value='$illness_duration[$ill_d_ino]'";}?>>
                    </td>
                    <td colspan="3">
                        <input type="text" placeholder="11)" name="illness_medication[]" 
                            <?php if(in_array("Malignancy", $illness_name)) 
                                    {$ill_m_ino = array_search("Malignancy", $illness_name);
                                    echo "value='$illness_medication[$ill_m_ino]'";}?>>
                    </td>
                    <td colspan="2">
                        <input type="text" name="illness_medication_duration[]" 
                            <?php if(in_array("Malignancy", $illness_name)) 
                                    {$ill_md_ino = array_search("Malignancy", $illness_name);
                                    echo "value='$illness_medication_duration[$ill_md_ino]'";} ?>>
                    </td>
                </tr>
                <tr>
					<td class="bb">None
						<input type="checkbox" name="illness_name[]" value="None"
						<?php if(in_array("None", $illness_name)) {echo 'checked="checked"';}?>>
					</td>
                    <td class="bb">
                        <input type="text" name="illness_duration[]">                   
                    </td>
                    <td colspan="3" class="bb">
                        <input type="text" placeholder="12)" name="illness_medication[]">
                    </td>
                    <td colspan="2" class="bb">
                        <input type="text" name="illness_medication_duration[]">
                    </td>
                </tr>
                <tr>
                    <th colspan="2">Past H/o Operation / Hospitalisation</th>
                    <th colspan="5">Family History:</th>
                    <?php
                    $fam_hist_arr = explode(",",$row_phy_exam["Patient_FamilyHistory"]);
                    ?>                    
                </tr>
                <tr>
                    <td colspan="2" rowspan="5" class="bb">
                        <textarea cols="70" rows="11" name="Past_Hospitalisation"><?php echo $row_phy_exam["Patient_Past_Hospitalisation"];?></textarea>
                    </td>
                    <td colspan="2">Asthma</td>
                    <td>
                        <label>Yes/No</label>
                        <input type="checkbox" name="fam_history[]" value="Asthma" 
                               <?php if(in_array("Asthma", $fam_hist_arr)) {echo 'checked="checked"';}?>/> 
                    </td>
                    <td class="br">Hypertension</td>
                    <td class="bl">
                        <label>Yes/No</label>
                        <input type="checkbox" name="fam_history[]" value="Hypertension" 
                               <?php if(in_array("Hypertension", $fam_hist_arr)) {echo 'checked="checked"';}?>/>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">Stroke</td>
                    <td>
                        <label>Yes/No</label>
                        <input type="checkbox" name="fam_history[]" value="Stroke" 
                               <?php if(in_array("Stroke", $fam_hist_arr)) {echo 'checked="checked"';}?>/>
                    </td>
                    <td class="br">Heart Disease</td>
                    <td class="bl">
                        <label>Yes/No</label>
                        <input type="checkbox" name="fam_history[]" value="Heart Disease" 
                               <?php if(in_array("Heart Disease", $fam_hist_arr)) {echo 'checked="checked"';}?>/>
                    </td>                
                </tr>
                <tr>
                    <td colspan="2">Arthritis / Gout</td>
                    <td>
                        <label>Yes/No</label>
                        <input type="checkbox" name="fam_history[]" value="Arthritis / Gout" 
                               <?php if(in_array("Arthritis / Gout", $fam_hist_arr)) {echo 'checked="checked"';}?>/>
                    </td>
                    <td class="br">Diabetes</td>
                    <td class="bl">
                        <label>Yes/No</label>
                        <input type="checkbox" name="fam_history[]" value="Diabetes" 
                               <?php if(in_array("Diabetes", $fam_hist_arr)) {echo 'checked="checked"';}?>/>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">Cancer</td>
                    <td>
                        <label>Yes/No</label>
                        <input type="checkbox" name="fam_history[]" value="Cancer" 
                               <?php if(in_array("Cancer", $fam_hist_arr)) {echo 'checked="checked"';}?>/>
                    </td>
                    <td class="br">Tuberculosis</td>
                    <td class="bl">
                        <label>Yes/No</label>
                        <input type="checkbox" name="fam_history[]" value="Tuberculosis" 
                               <?php if(in_array("Tuberculosis", $fam_hist_arr)) {echo 'checked="checked"';}?>/>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" class="bb">Other Chronic Disease</td>
                    <td class="bb">
                        <label>Yes/No</label>
                        <input type="checkbox" name="fam_history[]" value="Other Chronic Disease" 
                               <?php if(in_array("Other Chronic Disease", $fam_hist_arr)) {echo 'checked="checked"';}?>/>
                    </td>
                    <td class="bb br">Epilepsy</td>
                    <td class="bb bl">
                        <label>Yes/No</label>
                        <input type="checkbox" name="fam_history[]" value="Epilepsy" 
                               <?php if(in_array("Epilepsy", $fam_hist_arr)) {echo 'checked="checked"';}?>/>
                    </td>
                </tr>
                <tr>
                    <th colspan="7" align="left">Personal History:</th>
                </tr>
                <tr>
                    <td>Diet</td>
                    <td colspan="2">
                        <input type="text" name="Diet" 
                               value="<?php echo $row_phy_exam["PH_Diet"];?>">
                    </td>
                    <td>Smoking</td>
                    <td>
                        <label>Yes/No</label>
                        <input type="checkbox" name="addiction[]" value="Smoking" 
                               <?php if($row_phy_exam["Smoking_since"] != "") {echo 'checked="checked"';}?>/>
                    </td>
                    <td class="br">Since 
                        <input type="text" name="Smoking_since" 
                               value="<?php echo $row_phy_exam["Smoking_since"];?>"> / </td>
                    <td class="bl">
                        <input type="text" name="Smoking_perday" 
                               value="<?php echo $row_phy_exam["Smoking_perday"];?>"> per day</td>
                </tr>
                <tr>
                    <td>Appetite</td>
                    <td colspan="2">
                        <input type="text" name="Appetite" 
                               value="<?php echo $row_phy_exam["PH_Appetite"];?>">
                    </td>
                    <td>Alcohol</td>
                    <td>
                        <label>Yes/No</label>
                        <input type="checkbox" name="addiction[]" value="Alcohol" 
                               <?php if($row_phy_exam["Alcohol_since"] != "") {echo 'checked="checked"';}?>/>
                    </td>
                    <td class="br">Since 
                        <input type="text" name="Alcohol_since" 
                               value="<?php echo $row_phy_exam["Alcohol_since"];?>"> / </td>
                    <td class="bl">
                        <input type="text" name="Alcohol_freq" 
                               value="<?php echo $row_phy_exam["Alcohol_freq"];?>"> (freq.)</td>
                </tr>
                <tr>
                    <td>Sleep</td>
                    <td colspan="2">
                        <input type="text" name="Sleep" 
                               value="<?php echo $row_phy_exam["PH_Sleep"];?>">
                    </td>
                    <td>Drugs</td>
                    <td>
                        <label>Yes/No</label>
                        <input type="checkbox" name="addiction[]" value="Drugs" 
                               <?php if($row_phy_exam["Drugs_since"] != "") {echo 'checked="checked"';}?>/>
                    </td>
                    <td class="br">Since 
                        <input type="text" name="Drugs_since"
                               value="<?php echo $row_phy_exam["Drugs_since"];?>"> / </td>
                    <td class="bl">
                        <input type="text" name="Drugs_freq"
                               value="<?php echo $row_phy_exam["Drugs_freq"];?>"> (freq.)</td>
                </tr>
                <tr>
                    <td>Mictrition</td>
                    <td colspan="2">
                        <input type="text" name="Mictrition" 
                               value="<?php echo $row_phy_exam["PH_Micturition"];?>">
                    </td>
                    <td>Tobacco</td>
                    <td>
                        <label>Yes/No</label>
                        <input type="checkbox" name="addiction[]" value="Tobacco" 
                               <?php if($row_phy_exam["Tobacco_since"] != "") {echo 'checked="checked"';}?>/>
                    </td>
                    <td  class="br">Since 
                        <input type="text" name="Tobacco_since"
                               value="<?php echo $row_phy_exam["Tobacco_since"];?>"> / </td>
                    <td class="bl">
                        <input type="text" name="Tobacco_freq" 
                               value="<?php echo $row_phy_exam["Tobacco_freq"];?>"> (freq.)</td>
                </tr>
                <tr>
                    <td class="bb">Bowel Habits</td>
                    <td colspan="2" class="bb">
                        <input type="text" name="BowelHabits" 
                               value="<?php echo $row_phy_exam["PH_Bowel_Habits"];?>">
                    </td>
                    <td colspan="3" class="bb br">
                        Any other habit
                        <input type="text" name="other_addiction" value="<?php echo $row_phy_exam["Other_habit"];?>">
                    </td>
                    <td class="bb bl"><input type="text" name="other_addiction_freq"
                                             value="<?php echo $row_phy_exam["Other_habit_freq"];?>"> (freq.)</td>
                </tr>
                <?php 
                if($gender == "Female")
                {
                ?>
                <tr>
                    <th colspan="7">For Females :</th>
                </tr>
                <tr>
                    <td class="br">Menstrual history:</td>
                    <td class="bl" colspan="2">L.M.P .Dt: 
                        <input type="date" name="lmpdate" value="<?php echo $row_phy_exam["LMP_date"];?>">
                    </td>
                    <td  class="br">
                        <input type="radio" name="abortion_type" value="none"
                               <?php if($row_phy_exam["Abortion_Type"] == "none") {echo 'checked="checked"';}?>/>
                        None
                    </td>                    
                    <td  class="bl">
                        <input type="radio" name="abortion_type" value="regular" 
                               <?php if($row_phy_exam["Abortion_Type"] == "regular") {echo 'checked="checked"';}?>/>
                        Regular
                    </td>
                    <td  class="br">
                        <input type="radio" name="abortion_type" value="irregular" 
                              <?php if($row_phy_exam["Abortion_Type"] == "irregular") {echo 'checked="checked"';}?> /> 
                        Irregular Abortion:
                    </td>                    
                    <td  class="bl"><input type="text"></td>
                </tr>
                <tr>
                    <td class="bb br">Obstetric History:</td>
                    <td class="bb bl" colspan="2">L.D. 
                        <input type="date" name="Obstetric_lastdate" value="<?php echo $row_phy_exam["Obstetric_Lastdate"];?>"></td>
                    <td class="bb bl">Others:</td>
                    <td colspan="3" class="bl">
                        <input type="text" name="other_female_prb" value="<?php echo $row_phy_exam["Other_female_problems"];?>"></td>
                </tr>
                <?php
                }
                else
                {
                ?>
                <tr>
                    <th colspan="7">For Females :</th>
                </tr>
                <tr>
                    <td class="br">Menstrual history:</td>
                    <td class="bl" colspan="2">L.M.P .Dt: <input type="date" name="lmpdate" readonly=""></td>
                    <td  class="br" colspan="3">
                        <input type="radio" name="abortion_type" value="none" checked=""  readonly=""/> None
                    </td>                    
                    <td  class="bl"><input type="text"  readonly=""></td>
                </tr>
                <tr>
                    <td class="bb br">Obstetric History:</td>
                    <td class="bb bl" colspan="2">L.D. <input type="date" name="Obstetric_lastdate" readonly=""></td>
                    <td class="bb bl">Others:</td>
                    <td colspan="3" class="bl"><input type="text" name="other_female_prb" readonly=""></td>
                </tr>                
                <?php
                }
                ?>                
                <tr>
                    <td colspan="3" style="font-weight: bold"  class="bb">
                        Declaration by the information (Patient/Relative/<br>
                        Accompanying person)<br>
                        i hereby declare that facts recorded above are based<br>
                        on my narration and are accurate to the best of my knowledge.
                    </td>
                    <td colspan="4" class="bb">
                        Name of Informant :
                        <input type="text" name="informant_name" value="<?php echo $informant_name?>"><br>
                        (Patient/Relative/Accompanying Person)<br>
                        Relationship with Patient : 
                        <input type="text" name="informant_rel" value="<?php echo $informant_rel?>"><br>
                        Date:<input type="text" readonly=""> Time: <input type="text" readonly="">Signature:
                    </td>
                </tr>
                <tr class="translate" lang="gu" class="bb">
                    <td colspan="3" style="font-weight: bold">
                        Declaration by the information (Patient/Relative/<br>
                        Accompanying person)<br>
                        i hereby declare that facts recorded above are based<br>
                        on my narration and are accurate to the best of my knowledge.
                        <div id='google_translate_element'></div>
                    </td>
                    <td colspan="4" class="bb">
                        Name of Informant :
                        <input type="text" readonly="" value="<?php echo $informant_name?>"><br>
                        (Patient/Relative/Accompanying Person)<br>
                        Relationship with Patient :
                        <input type="text" readonly="" value="<?php echo $informant_rel?>"><br>
                        Date:<input type="text" readonly=""> Time: <input type="text" readonly="">Signature:
                    </td>
                </tr>
                <?php 
                        }
                    }
					else
					{
				?>
						<tr>
							<td>Diabetes 
								<input type="checkbox" name="illness_name[]" value="Diabetes">
							</td>
							<td><input type="text" name="illness_duration[]"></td>
							<td colspan="3"><input type="text" placeholder="1)" name="illness_medication[]"></td>
							<td colspan="2"><input type="text" name="illness_medication_duration[]"></td>
						</tr>
						<tr>
							<td>Ischemic Heart Disease 
								<input type="checkbox" name="illness_name[]" value="Ischemic_Heart_Disease">
							</td>
							<td><input type="text" name="illness_duration[]"></td>
							<td colspan="3"><input type="text" placeholder="2)" name="illness_medication[]"></td>
							<td colspan="2"><input type="text" name="illness_medication_duration[]"></td>                </tr>
						<tr>
							<td>Hypertension 
								<input type="checkbox" name="illness_name[]" value="Hypertension">
							</td>
							<td><input type="text" name="illness_duration[]"></td>
							<td colspan="3"><input type="text" placeholder="3)" name="illness_medication[]"></td>
							<td colspan="2"><input type="text" name="illness_medication_duration[]"></td>                </tr>
						<tr>
							<td>COPD /Asthma 
								<input type="checkbox" name="illness_name[]" value="COPD/Asthma ">
							</td>
							<td><input type="text" name="illness_duration[]"></td>
							<td colspan="3"><input type="text" placeholder="4)" name="illness_medication[]"></td>
							<td colspan="2"><input type="text" name="illness_medication_duration[]"></td>                </tr>
						<tr>
							<td>CKD 
								<input type="checkbox" name="illness_name[]" value="CKD">
							</td>
							<td><input type="text" name="illness_duration[]"></td>
							<td colspan="3"><input type="text" placeholder="5)" name="illness_medication[]"></td>
							<td colspan="2"><input type="text" name="illness_medication_duration[]"></td>
						</tr>
						<tr>
							<td>Tuberculosis 
								<input type="checkbox" name="illness_name[]" value="Tuberculosis">
							</td>
							<td><input type="text" name="illness_duration[]"></td>
							<td colspan="3"><input type="text" placeholder="6)" name="illness_medication[]"></td>
							<td colspan="2"><input type="text" name="illness_medication_duration[]"></td>
						</tr>
						<tr>
							<td>Cirshosis of Liver 
								<input type="checkbox" name="illness_name[]" value="Cirshosis_of_Liver ">
							</td>
							<td><input type="text" name="illness_duration[]"></td>
							<td colspan="3"><input type="text" placeholder="7)" name="illness_medication[]"></td>
							<td colspan="2"><input type="text" name="illness_medication_duration[]"></td>
						</tr>
						<tr>
							<td>Thyroid Illness 
								<input type="checkbox" name="illness_name[]" value="Thyroid_Illness">
							</td>
							<td><input type="text" name="illness_duration[]"></td>
							<td colspan="3"><input type="text" placeholder="8)" name="illness_medication[]"></td>
							<td colspan="2"><input type="text" name="illness_medication_duration[]"></td>
						</tr>
						<tr>
							<td>Stroke / Seizure Disorder 
								<input type="checkbox" name="illness_name[]" value="Stroke/Seizure Disorder">
							</td>
							<td><input type="text" name="illness_duration[]"></td>
							<td colspan="3"><input type="text" placeholder="9)" name="illness_medication[]"></td>
							<td colspan="2"><input type="text" name="illness_medication_duration[]"></td>
						</tr>
						<tr>
							<td>Arthritis / Gout 
								<input type="checkbox" name="illness_name[]" value="Arthritis/Gout">
							</td>
							<td><input type="text" name="illness_duration[]"></td>
							<td colspan="3"><input type="text" placeholder="10)" name="illness_medication[]"></td>
							<td colspan="2"><input type="text" name="illness_medication_duration[]"></td>
						</tr>
						<tr>
							<td>Any Malignancy 
								<input type="checkbox" name="illness_name[]" value="Malignancy">
							</td>
							<td><input type="text" name="illness_duration[]"></td>
							<td colspan="3"><input type="text" placeholder="11)" name="illness_medication[]"></td>
							<td colspan="2"><input type="text" name="illness_medication_duration[]"></td>
						</tr>
						<tr>
							<td class="bb">None
								<input type="checkbox" name="illness_name[]" value="None" checked="">
							</td>
							<td class="bb">
								<input type="text" name="illness_duration[]">
							</td>
							<td colspan="3" class="bb">
								<input type="text" placeholder="12)" name="illness_medication[]">
							</td>
							<td colspan="2" class="bb">
								<input type="text" name="illness_medication_duration[]">
							</td>
						</tr>
						<tr>
							<th colspan="2">Past H/o Operation / Hospitalisation</th>
							<th colspan="5">Family History:</th>
						</tr>
						<tr>
							<td colspan="2" rowspan="5" class="bb">
								<textarea cols="70" rows="11" name="Past_Hospitalisation"></textarea>
							</td>
							<td colspan="2">Asthma</td>
							<td>
								<label>Yes/No</label>
								<input type="checkbox" name="fam_history[]" value="Asthma" /> 
							</td>
							<td class="br">Hypertension</td>
							<td class="bl">
								<label>Yes/No</label>
								<input type="checkbox" name="fam_history[]" value="Hypertension" />
							</td>
						</tr>
						<tr>
							<td colspan="2">Stroke</td>
							<td>
								<label>Yes/No</label>
								<input type="checkbox" name="fam_history[]" value="Stroke" />
							</td>
							<td class="br">Heart Disease</td>
							<td class="bl">
								<label>Yes/No</label>
								<input type="checkbox" name="fam_history[]" value="Heart Disease" />
							</td>                
						</tr>
						<tr>
							<td colspan="2">Arthritis / Gout</td>
							<td>
								<label>Yes/No</label>
								<input type="checkbox" name="fam_history[]" value="Arthritis / Gout" />
							</td>
							<td class="br">Diabetes</td>
							<td class="bl">
								<label>Yes/No</label>
								<input type="checkbox" name="fam_history[]" value="Diabetes" />
							</td>
						</tr>
						<tr>
							<td colspan="2">Cancer</td>
							<td>
								<label>Yes/No</label>
								<input type="checkbox" name="fam_history[]" value="Cancer" />
							</td>
							<td class="br">Tuberculosis</td>
							<td class="bl">
								<label>Yes/No</label>
								<input type="checkbox" name="fam_history[]" value="Tuberculosis" />
							</td>
						</tr>
						<tr>
							<td colspan="2" class="bb">Other Chronic Disease</td>
							<td class="bb">
								<label>Yes/No</label>
								<input type="checkbox" name="fam_history[]" value="Other Chronic Disease" />
							</td>
							<td class="bb br">Epilepsy</td>
							<td class="bb bl">
								<label>Yes/No</label>
								<input type="checkbox" name="fam_history[]" value="Epilepsy" />
							</td>
						</tr>
						<tr>
							<th colspan="7" align="left">Personal History:</th>
						</tr>
						<tr>
							<td>Diet</td>
							<td colspan="2"><input type="text" name="Diet"></td>
							<td>Smoking</td>
							<td>
								<label>Yes/No</label>
								<input type="checkbox" name="addiction[]" value="Smoking" />
							</td>
							<td class="br">Since <input type="text" name="Smoking_since"> / </td>
							<td class="bl"><input type="text" name="Smoking_perday"> per day</td>
						</tr>
						<tr>
							<td>Appetite</td>
							<td colspan="2"><input type="text" name="Appetite"></td>
							<td>Alcohol</td>
							<td>
								<label>Yes/No</label>
								<input type="checkbox" name="addiction[]" value="Alcohol" />
							</td>
							<td class="br">Since <input type="text" name="Alcohol_since"> / </td>
							<td class="bl"><input type="text" name="Alcohol_freq"> (freq.)</td>
						</tr>
						<tr>
							<td>Sleep</td>
							<td colspan="2"><input type="text" name="Sleep"></td>
							<td>Drugs</td>
							<td>
								<label>Yes/No</label>
								<input type="checkbox" name="addiction[]" value="Drugs" />
							</td>
							<td class="br">Since <input type="text" name="Drugs_since"> / </td>
							<td class="bl"><input type="text" name="Drugs_freq"> (freq.)</td>
						</tr>
						<tr>
							<td>Mictrition</td>
							<td colspan="2"><input type="text" name="Mictrition"></td>
							<td>Tobacco</td>
							<td>
								<label>Yes/No</label>
								<input type="checkbox" name="addiction[]" value="Tobacco" />
							</td>
							<td  class="br">Since <input type="text" name="Tobacco_since"> / </td>
							<td class="bl"><input type="text" name="Tobacco_freq"> (freq.)</td>
						</tr>
						<tr>
							<td class="bb">Bowel Habits</td>
							<td colspan="2" class="bb"><input type="text" name="BowelHabits"></td>
							<td><input type="checkbox" name="addiction[]" value="None" checked=""/> None</td>
							<td colspan="2" class="bb br">
								Any other habit
								<input type="text" name="other_addiction">
							</td>
							<td class="bb bl"><input type="text" name="other_addiction_freq"> (freq.)</td>
						</tr>
						<?php 
						if($gender == "Female")
						{
						?>
						<tr>
							<th colspan="7">For Females :</th>
						</tr>
						<tr>
							<td class="br">Menstrual history:</td>
							<td class="bl" colspan="2">L.M.P .Dt: 
								<input type="date" name="lmpdate" value="<?php echo $row_phy_exam["LMP_date"];?>">
							</td>
							<td  class="br">
								<input type="radio" name="abortion_type" value="none"
									   <?php if($row_phy_exam["Abortion_Type"] == "none") {echo 'checked="checked"';}?>/>
								None
							</td>                    
							<td  class="bl">
								<input type="radio" name="abortion_type" value="regular" 
									   <?php if($row_phy_exam["Abortion_Type"] == "regular") {echo 'checked="checked"';}?>/>
								Regular
							</td>
							<td  class="br">
								<input type="radio" name="abortion_type" value="irregular" 
									  <?php if($row_phy_exam["Abortion_Type"] == "irregular") {echo 'checked="checked"';}?> /> 
								Irregular Abortion:
							</td>                    
							<td  class="bl"><input type="text"></td>
						</tr>
						<tr>
							<td class="bb br">Obstetric History:</td>
							<td class="bb bl" colspan="2">L.D. 
								<input type="date" name="Obstetric_lastdate" value="<?php echo $row_phy_exam["Obstetric_Lastdate"];?>"></td>
							<td class="bb bl">Others:</td>
							<td colspan="3" class="bl">
								<input type="text" name="other_female_prb" value="<?php echo $row_phy_exam["Other_female_problems"];?>"></td>
						</tr>
						<?php
						}
						else
						{
						?>
						<tr>
							<th colspan="7">For Females :</th>
						</tr>
						<tr>
							<td class="br">Menstrual history:</td>
							<td class="bl" colspan="2">L.M.P .Dt: <input type="date" name="lmpdate" readonly=""></td>
							<td  class="br" colspan="3">
								<input type="radio" name="abortion_type" value="none" checked=""  readonly=""/> None
							</td>                    
							<td  class="bl"><input type="text"  readonly=""></td>
						</tr>
						<tr>
							<td class="bb br">Obstetric History:</td>
							<td class="bb bl" colspan="2">L.D. <input type="date" name="Obstetric_lastdate" readonly=""></td>
							<td class="bb bl">Others:</td>
							<td colspan="3" class="bl"><input type="text" name="other_female_prb" readonly=""></td>
						</tr>                
						<?php
						}
						?>
						<tr>
							<td colspan="3" style="font-weight: bold"  class="bb">
								Declaration by the information (Patient/Relative/<br>
								Accompanying person)<br>
								i hereby declare that facts recorded above are based<br>
								on my narration and are accurate to the best of my knowledge.
							</td>
							<td colspan="4" class="bb">
								Name of Informant :
								<input type="text" name="informant_name" value="<?php echo $informant_name?>"><br>
								(Patient/Relative/Accompanying Person)<br>
								Relationship with Patient : 
								<input type="text" name="informant_rel" value="<?php echo $informant_rel?>"><br>
								Date:<input type="text" readonly=""> Time: <input type="text" readonly="">Signature:
							</td>
						</tr>
						<tr class="translate" lang="gu" class="bb">
							<td colspan="3" style="font-weight: bold">
								Declaration by the information (Patient/Relative/<br>
								Accompanying person)<br>
								i hereby declare that facts recorded above are based<br>
								on my narration and are accurate to the best of my knowledge.
								<div id='google_translate_element'></div>
							</td>
							<td colspan="4" class="bb">
								Name of Informant :
								<input type="text" readonly="" value="<?php echo $informant_name?>"><br>
								(Patient/Relative/Accompanying Person)<br>
								Relationship with Patient :
								<input type="text" readonly="" value="<?php echo $informant_rel?>"><br>
								Date:<input type="text" readonly=""> Time: <input type="text" readonly="">Signature:
							</td>
						</tr>
				<?php				
					}
                ?>                
            </tbody>            
        </table>
            <input type="submit" value="Update"id="updbtn">
            <button onclick="printdoc()" id="prtbtn">Print</button>
        </form>    
            
            <script type="text/javascript">
                function printdoc()
                {
                    document.getElementById('updbtn').style.display = "none";
                    document.getElementById('prtbtn').style.display = "none";                
                    window.print();                
                }                
                function googleTranslateElementInit()
                {
                    new google.translate.TranslateElement(
                    {
                        pageLanguage: 'en',
                        includedLanguages: 'en,hi,gu',
                        layout:google.translate.TranslateElement.InlineLayout.SIMPLE
                    },
                'google_translate_element'
                        );
                }
                
                function lang_disappear()
                {
                    document.getElementById('google_translate_element').style.display = "none";
					document.getElementById(':2.container').style.display = "none";
					
                    //document.getElementsByClassName('goog-te-banner').style.display = "none";
                }
                function lang_appear()
                {
                    document.getElementById('google_translate_element').style.display = "block";
                }                
            </script>
            <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
    </body>
</html>