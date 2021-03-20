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
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Operative Notes (Page1)</title>
        <!--<script>
            function anae_type()
            {
                atype = document.getElementById("anaesthesia_type").value;
                for(i=0;i<5;i++)
                {
                    var x = document.getElementsByName("anaesthesia_type")[i].value;
                    if(atype == x)
                    {
                        document.getElementsByName("anaesthesia_type")[i].checked = true;
                    }
                }
            }
        </script>-->        
        <style>
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
        lh
        {
            text-decoration: underline;
            font-weight: bold;
        }
        table
        {
            width: 100%;
            border-collapse: collapse;
            border-spacing: 0;
            padding: 0;
            margin: 0;
            line-height: 2;
            table-layout: auto;
            white-space: nowrap;
        }
        td,textarea
        {
            border-spacing: 0;
            border: 0;
            padding: 0;
            margin: 0;
            white-space: nowrap;
        }
        img
        {
            height: 20%;
            width: 20%;
        }
        input[type="text"]
        {
            border: 0;
            border-bottom: 1px solid black;
            width: 75%;
            padding-left: 2%;
        }
        .goog-te-banner-frame.skiptranslate 
        {
            display: none !important;
        } 
        body
        {
            top: 0px !important; 
        }
        </style>        
    </head>
    <body class="container" style="font-family: Times New Roman; font-size: 16px;" onload="anae_type()">
        <img src="../images/tattvam_banner.jpg" align='right'>
        <h2>
            <span style="padding-left: 15px; padding-right: 15px;">
                OPERATIVE NOTES
            </span>
        </h2>
        <?php 
        $view_patient_op1 = "SELECT * FROM treatment_surgery WHERE Treatment_id = $treatment_id "
                . "AND Treatment_Surgery_id = $treatment_surgery_id";
        $result_patient_op1 = mysqli_query($connection, $view_patient_op1);
        if(mysqli_num_rows($result_patient_op1) > 0)
        {
            while ($row_patient_op1 = mysqli_fetch_assoc($result_patient_op1))
            {        
        ?>
        <form action="Update_Operative_notes(Page1).php" method="POST">
            <input type="hidden" value="<?php echo $login_name;?>" name="admin_name">
            <input type="hidden" value="<?php echo $treatment_id;?>" name="treatment_id">
            <input type="hidden" value="<?php echo $patient_id;?>" name="patient_id">
            <input type="hidden" value="<?php echo $treatment_surgery_id;?>" name="Treatment_Surgery_id">
            <input type="hidden" value="<?php echo $row_patient_op1["Anaesthesia_Type"];?>" id="anaesthesia_type">
        <div class="justify-content-center" style="padding-top: 2%;">
            <table>
                <tbody>
                    <tr>
                        <td>Surgery Date:<input type="date" name="surgery_date" value="<?php echo $row_patient_op1["Surgery_date"];?>"></td>
                    </tr>				
                    <tr>
                        <td>
                            Name of Surgeon:
                            <input type="text" value="<?php echo $row_patient_op1["Surgeon_name"];?>" 
                                   readonly=""/>
                        </td>
                    </tr>
                    <tr>
                        <td>Diagnosis:<input type="text" name="asst_surgeon" value="<?php echo $row_patient_op1["Asst_Surgeon_Name"];?>">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Name of Anaesthesiologist:
                            <input type="text" value="<?php echo $row_patient_op1["Anaesthetist_Name"];?>" 
                                   readonly="">
                        </td>
                    </tr>
                    <tr>
                        <td>Scrub Nurse:<input type="text" name="scrub_nurse"
                                               value="<?php echo $row_patient_op1["Scrub_Nurse_Name"];?>"></td>
                    </tr>
                    <tr>
                        <td>
                            Type of Anaesthesia:
							<?php
							$anesthesia = explode(",",$row_patient_op1["Anaesthesia_Type"]);
							//print_r ($anesthesia);
							?>			
							<input type="checkbox" name="anaesthesia_type[]" value="GA" readonly="" 
							<?php if(in_array("GA", $anesthesia)) {echo 'checked="checked"';}?>/>GA
							<input type="checkbox" name="anaesthesia_type[]" value="LA" readonly="" 
							<?php if(in_array("LA", $anesthesia)) {echo 'checked="checked"';}?>/>LA
							<input type="checkbox" name="anaesthesia_type[]" value="Spinal" readonly="" 
							<?php if(in_array("Spinal", $anesthesia)) {echo 'checked="checked"';}?>/>Spinal
							<input type="checkbox" name="anaesthesia_type[]" value="Epidural" readonly="" 
							<?php if(in_array("Epidural", $anesthesia)) {echo 'checked="checked"';}?>/>Epidural
							<input type="checkbox" name="anaesthesia_type[]" value="Regional" readonly="" 
							<?php if(in_array("Regional", $anesthesia)) {echo 'checked="checked"';}?>/>Regional
                        </td>
                    </tr>
                    <tr>
                        <td>Surgery Name:<input type="text" value="<?php echo $row_patient_op1["Surgery_name"];?>" readonly=""></td>
                    </tr>					
                    <tr>
                        <td style="text-align: center;"><lh>OPERATIVE STEPS</lh></td>
                    </tr>
                    <tr>
                        <td>
                            Incision:<br>
                            <textarea cols="175" rows="5" name="incision"><?php echo $row_patient_op1["Incision"];?></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Important Steps:<br>
                            <textarea cols="175" rows="15" name="imp_opd_steps"><?php echo $row_patient_op1["Important_opd_steps"];?></textarea>
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
</html>
