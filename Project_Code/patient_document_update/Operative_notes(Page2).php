<?php
$con_servername = "localhost";
$con_username = "root";
$con_password = "";
$database = "hospital_management_system";

$connection = mysqli_connect($con_servername, $con_username, $con_password, $database);

$patient_id = $_GET["patient_id"];
$treatment_id = $_GET["treatment_id"];
$treatment_surgery_id = $_GET["treatment_surgery_id"];

$view_patient = "SELECT Surgeon_name FROM treatment_surgery WHERE Treatment_id = $treatment_id ";
$result_patient = mysqli_query($connection, $view_patient);
if(mysqli_num_rows($result_patient) > 0)
{
    while ($row_patient = mysqli_fetch_assoc($result_patient))
    {
        $surgeon_name = $row_patient["Surgeon_name"];
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
        <title>Operative Notes (Page2)</title>
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
        input[type="text"],input[type="number"],input[type="time"]
        {
            border: 0;
            border-bottom: 1px solid black;
            width: 25%;
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
    <body class="container" style="font-family: Times New Roman; font-size: 16px;">
        <?php 
        $view_patient_op2 = "SELECT * FROM treatment_surgery WHERE Treatment_id = $treatment_id "
                . "AND Treatment_Surgery_id = $treatment_surgery_id";
        $result_patient_op2 = mysqli_query($connection, $view_patient_op2);
        if(mysqli_num_rows($result_patient_op2) > 0)
        {
            while ($row_patient_op2 = mysqli_fetch_assoc($result_patient_op2))
            {        
        ?>
        <form action="../Operative_notes_p2_Add.php" method="POST">
            <input type="hidden" value="<?php echo $login_name;?>" name="admin_name">
            <input type="hidden" value="<?php echo $treatment_id;?>" name="treatment_id">
            <input type="hidden" value="<?php echo $patient_id;?>" name="patient_id">
            <input type="hidden" value="<?php echo $treatment_surgery_id;?>" name="Treatment_Surgery_id">
        <table>
            <tbody>
                <tr>
                    <td colspan="3">
                        <!--Operative Findings:<br>-->					
                        <textarea cols="175" rows="10" name="operative_findings"><?php echo $row_patient_op2["Operative_findings"];?></textarea>
                    </td>
                </tr>
                <tr>
                    <td>Drain:<input type="text" name="drain"
                                     value="<?php echo $row_patient_op2["Drain"];?>"></td>
                    <td colspan="2">Sponge Count:<input type="number" name="sponge_count"
                                                        value="<?php echo $row_patient_op2["Sponge_Count"];?>"></td>
                </tr>
                <tr>
                    <td colspan="3">Closure:<input type="text" name="closure"
                                                   value="<?php echo $row_patient_op2["Closure"];?>"></td>
                </tr>
                <tr>
                    <td colspan="3">
                        Intra-Operative Events/Complication:<br>
                        <textarea cols="175" rows="5" name="intra_opr_events"><?php echo $row_patient_op2["Intra_operative_events"];?></textarea>
                    </td>
                </tr>
                <tr>
                    <td colspan="3">
                        Implants:<br>
                        (1)Company<input type="text" name="imp_comp"
                                         value="<?php echo $row_patient_op2["Implants_company"];?>"><br>
                        (2)Type<input type="text" name="imp_type" 
                                      value="<?php echo $row_patient_op2["Implants_type"];?>"><br>
                    </td>
                </tr>
                <tr>
                    <td>Blood Loss:<input type="number" name="blood_loss"
                                          value="<?php echo $row_patient_op2["Blood_loss"];?>"></td>
                    <td colspan="2">
                        Blood Products Given:<input type="number" name="blood_products_given"
                                                    value="<?php echo $row_patient_op2["Blood_products_given"];?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        Post Operative Orders:<br>
                        NBM till:<input type="time" name="nbm_till" 
                                        value="<?php echo $row_patient_op2["NBM_till"];?>"><br>
                        O<sup>2</sup>:<input type="number" name="oxygen"
                                             value="<?php echo $row_patient_op2["Oxygen"];?>">/hr
                    </td>
                    <td>
                        TPR:<input type="number" name="tpr" value="<?php echo $row_patient_op2["TPR"];?>">/hr<br>
                        BP:<input type="number" name="bp" value="<?php echo $row_patient_op2["BP"];?>">/hr
                    </td>
                    <td>
                        RT Aspiration:<input type="number" name="rt_apsiration" 
                                             value="<?php echo $row_patient_op2["RT_Aspiration"];?>">/hr<br>
                        AG:<input type="number" name="ag" value="<?php echo $row_patient_op2["AG"];?>">/hr                        
                    </td>
                </tr>
                <tr>
                    <td colspan="3">
                        Position of the Patient:<br>
                        <textarea cols="175" rows="2" name="patient_position"><?php echo $row_patient_op2["Patient_position"];?></textarea><br>
                        IV Fluids:<br>
                        <textarea cols="175" rows="10" name="iv_fluids"><?php echo $row_patient_op2["IV_fluids"];?></textarea><br>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        Name of Surgeon:
                        <input type="text" value="<?php echo $row_patient_op2["Surgeon_name"];?>" readonly="">
                    </td>
                    <td>Sign of Surgeon:<input type="text" readonly=""></td>
                </tr>
            </tbody>
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
        <?php
            }
        }
        ?>
    </body>
</html>
