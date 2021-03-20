<?php
$con_servername = "localhost";
$con_username = "root";
$con_password = "";
$database = "hospital_management_system";

$connection = mysqli_connect($con_servername, $con_username, $con_password, $database);

$patient_id = $_GET["patient_id"];
$treatment_id = $_GET["treatment_id"];
$Treatment_Surgery_id = $_GET["Treatment_Surgery_id"];

$view_patient = "SELECT Surgeon_name , Surgery_name , Anaesthetist_Name , Anaesthesia_Type "
        . "FROM treatment_surgery WHERE Treatment_Surgery_id = $Treatment_Surgery_id";
$result_patient = mysqli_query($connection, $view_patient);
if(mysqli_num_rows($result_patient) > 0)
{
    while ($row_patient = mysqli_fetch_assoc($result_patient))
    {
        $surgeon_name = $row_patient["Surgeon_name"];
		$surgery_name = $row_patient["Surgery_name"];
        $anaesthetist_name = $row_patient["Anaesthetist_Name"];
        $anaesthesia_type = $row_patient["Anaesthesia_Type"];
    }
}
else
{
    echo "<script>alert('Add Anaesthesia Consent details first !!');</script>";
    header("Location: Inpatient_Treatment.php?patient_id=$patient_id&treatment_id=$treatment_id");
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
        <form action="../Operative_notes_p1_Add.php" method="POST">
            <input type="hidden" value="<?php echo $login_name;?>" name="admin_name">
            <input type="hidden" value="<?php echo $treatment_id;?>" name="treatment_id">
            <input type="hidden" value="<?php echo $patient_id;?>" name="patient_id">
            <input type="hidden" value="<?php echo $anaesthesia_type;?>" id="anaesthesia_type">
            <input type="hidden" value="<?php echo $Treatment_Surgery_id;?>" name="Treatment_Surgery_id">
        <div class="justify-content-center" style="padding-top: 2%;">
            <table>
                <tbody>
                    <tr>
                        <td>Surgery Date:<input type="date" name="surgery_date"></td>
                    </tr>				
                    <tr>
                        <td>
                            Name of Surgeon:
                            <input type="text" value="<?php echo $surgeon_name;?>" readonly="">
                        </td>
                    </tr>
                    <tr>
                        <td>Diagnosis:<input type="text" name="asst_surgeon"></td>
                    </tr>
                    <tr>
                        <td>
                            Name of Anaesthesiologist:
                            <input type="text" value="<?php echo $anaesthetist_name;?>" readonly="">
                        </td>
                    </tr>
                    <tr>
                        <td>Scrub Nurse:<input type="text" name="scrub_nurse"></td>
                    </tr>
                    <tr>
                        <td>
                            Type of Anaesthesia:
							<?php
							$anesthesia = explode(",",$anaesthesia_type);
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
                        <td>Surgery Name:<input type="text" value="<?php echo $surgery_name;?>" readonly=""></td>
                    </tr>					
                    <tr>
                        <td style="text-align: center;"><lh>OPERATIVE STEPS</lh></td>
                    </tr>
                    <tr>
                        <td>
                            Incision:<br>
                            <textarea cols="175" rows="5" name="incision" required="" ></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Important Steps:<br>
                            <textarea cols="175" rows="15" name="imp_opd_steps" required="" ></textarea>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
            <input type="submit" value="Next">
        </form>
</html>
