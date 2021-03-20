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
        <title>Admission history & Physical Assessment form</title>
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
        img
        {
            height: 20%;
            width: 20%;
        }
        input:not([type="submit"])
        {
            border: 0;
            border-bottom: 1px dashed black;
            width: auto;
        }
        input.fl
        {
            border: 0;
            border-bottom: 1px dashed black;
            width: 99%;
        }        
        input[type="radio"]
        {
            border-radius: 20%;
            border: 1px solid black;
            background: transparent;
        }
        textarea
        {
            border: 1px solid black;
            border-radius: 10px;
        }
        table
        {
            width: 100%;
            line-height: 2;
            margin-right: 5%;
            border-collapse: collapse;
        }
        td
        {
            border-bottom: 3px solid black;
        }
        .notes
        {
            border: 0;
        }
        </style>
    </head>
    <body class="container" style="font-family: Times New Roman; font-size: 16px;">
        <img src="../images/tattvam_banner.jpg" align='right'>
        <h2>
            <span style="padding-left: 15px; padding-right: 15px;">
                ADMISSION HISTORY & PHYSICAL ASSESSMENT FORM
            </span>
        </h2>
        <p align="right">(To be filled up by RMO/Registrar)</p>
        <br>
        
        <?php
        $view_patient = "SELECT * FROM patient,illness_complaint,patient_pasthistory "
                . "WHERE patient.Patient_id = $patient_id "
                . "AND patient_pasthistory.Patient_id = $patient_id "
                . "AND illness_complaint.Treatment_id = $treatment_id";
        $result_patient = mysqli_query($connection, $view_patient);
        if(mysqli_num_rows($result_patient) > 0)
        {
            while ($row_patient = mysqli_fetch_assoc($result_patient))
            {        
        ?>
        <form action="Update_AH_PA_form1.php" method="POST">
            <input type="hidden" value="<?php echo $login_name;?>" name="admin_name">
        <table border="0">
            <tbody>
                <tr>
                    <td>
                        <label>Special Requirement</label> 
                        <input type="text" placeholder="" name="special_req" 
                               value="<?php echo $row_patient["Special_requirement"]?>"><span>
                            (eg. other languages or other communication methods)</span><br>
                        <input type="hidden" value="<?php echo $treatment_id;?>" name="treatment_id">
                        <input type="hidden" value="<?php echo $patient_id;?>" name="patient_id">                            
                        
                        <label>Date:</label> 
                        <input type="date" value="<?php echo $row_patient["Reg_date"]?>" readonly="" name="reg_date">
                        <label>Time:</label>
                        <input type="time" value="<?php echo $row_patient["Reg_time"]?>" readonly="" name="reg_time"><br>
                        <label>Attending Consultant</label> 
                        <input type="text" name="att_consultant_name" value="<?php echo $row_patient["Attending_consultant"]?>"><br>    
                    </td>
                    <td style="text-align: right;">
                        <textarea cols="40" rows="10"><?php echo $row_patient["Patient_Name"]?></textarea>
                    </td>
                </tr>
            </tbody>
        </table>
        
        <table style="border: 3px solid black;">
            <tbody>
                <tr>
                    <td>
                        Medical legal Case: 
                        <input type="radio" name="mlc" value="yes" required=""  
                            <?php  if($row_patient["mlc"] == "yes")
                                {echo "checked='checked'";}?>/>YES
                        <input type="radio" name="mlc" value="no" required="" 
                            <?php  if($row_patient["mlc"] == "no")
                                {echo "checked='checked'";}?>/>NO
                        
                        <br>
                        Patient's Name: <input type="text" readonly=""
                                               value="<?php echo $row_patient["Patient_Name"]?>">
                        <br>
                        Name of RMO/Registrar <input type="text">
                        <span>Emp.ID <input type="text"></span>
                    </td>
                    <td>
                        Date: <input type="date" value="<?php echo $current_date?>">
                        Time: <input type="time" value="<?php echo $current_time?>"><br>
                        Age: <input type="text" readonly=""
                                    value="<?php echo $row_patient["Patient_Age"]?>">
                        Sex:

                        <input type="radio" value="male" readonly=""
                            <?php  if($row_patient["Patient_Gender"] == "Male")
                                {echo "checked='checked'";}?>/>Male
                        <input type="radio" value="female" readonly=""
                            <?php  if($row_patient["Patient_Gender"] == "Female")
                                {echo "checked='checked'";}?>/>
                        Female                        
                        <br>
                        Height <input type="text" readonly="" value="<?php echo $row_patient["Patient_Height"]?>">
                        Weight <input type="text" readonly="" value="<?php echo $row_patient["Patient_Weight"]?>">
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        Allergies:
                        <input type="radio" name="allergies" value="none"
                            <?php  if($row_patient["Patient_Allergy"] == "none")
                                {echo "checked='checked'";}?>/>None
                        <input type="radio" name="allergies" value="yes"
                            <?php  if($row_patient["Patient_Allergy"] == "yes")
                                {echo "checked='checked'";}?>/>Yes                        
                        (If yes, describe)
                    </td>
                </tr>
                <tr>
                    <td>Drugs /Food /Latex /Dyes /Contrast /Other</td>
                    <td style="border-left: 3px solid black;">Reaction</td>
                </tr>
                <tr>                    
                    <td>
                    <?php 
                    $view_allergy_name = "SELECT Allergy_Name FROM patient_allergy "
                            . "WHERE Patient_id = $patient_id";
                    $result_allergy_name = mysqli_query($connection, $view_allergy_name);
                    if(mysqli_num_rows($result_allergy_name) > 0)
                    {
                        while ($row_allergy_name = mysqli_fetch_assoc($result_allergy_name))
                        {        
                    ?>                        
                        <input type="text" placeholder="1" class="fl" name="allergy_name[]" 
                               value="<?php echo $row_allergy_name["Allergy_Name"]?>"><br>
                    <?php 
                        }
                    }
                    ?>
                        <input type="text" placeholder="1" class="fl" name="allergy_name[]"><br>
                        <input type="text" placeholder="2" class="fl" name="allergy_name[]"><br>
                        <input type="text" placeholder="3" class="fl" name="allergy_name[]"><br>                        
                    <td style="border-left: 3px solid black;">
                    <?php 
                    $view_allergy_reaction = "SELECT Allergy_Reaction FROM patient_allergy "
                            . "WHERE Patient_id = $patient_id";
                    $result_allergy_reaction = mysqli_query($connection, $view_allergy_reaction);
                    if(mysqli_num_rows($result_allergy_reaction) > 0)
                    {
                        while ($row_allergy_reaction = mysqli_fetch_assoc($result_allergy_reaction))
                        {        
                    ?>                        
                        <input type="text" class="fl" name="allergy_reaction[]"
                               value="<?php echo $row_allergy_reaction["Allergy_Reaction"]?>"><br>
                    <?php 
                        }
                    }
                    ?> 
                        <input type="text" class="fl" name="allergy_reaction[]"><br>
                        <input type="text" class="fl" name="allergy_reaction[]"><br>
                        <input type="text" class="fl" name="allergy_reaction[]"><br>                        
                    </td>
                </tr>                
                <tr>
                    <td colspan="2">
                        <label for="cc">Cheif Complaints with Origin, Duration and Progress</label><br>
                        <textarea id="cc" class="notes" rows="11" cols="150" name="illness_complaint_desc"><?php echo $row_patient["Illness_Complaint_Description"];?></textarea>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <label for="stc">Significant test done / Laboratory report (Before Hospitalisation):</label><br>
                        <textarea id="stc" class="notes" rows="5" cols="150" name="reports_before_hosp"><?php echo $row_patient["Reports_Before_Hospitalization"]?></textarea>                        
                    </td>
                </tr>
            </tbody>
        </table>
            <input type="submit" value="Update"id="updbtn">
            <button onclick="printdoc()" id="prtbtn">Print</button>
        </form>
        <?php 
            }
        }
        ?>
        <script>
            function printdoc()
            {
                document.getElementById('updbtn').style.display = "none";
                document.getElementById('prtbtn').style.display = "none";                
                window.print();                
            }
            function cancel_op_treatment()
            {
                alert("cancel pressed");
                window.location.href = "../Inpatient_Treatment.php?patient_id=<?php echo $patient_id?>&admin_name=<?php echo $login_name?>";
            }                            
        </script>
    </body>
</html>
