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
        <title>Investigation Sheet</title>
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
        input:not([type="submit"])
        {
            border: 0;
            padding-left: 2%;
            width: max-content;
        }
        td
        {            
            padding: 0;
            margin: 0;
            white-space: nowrap;
        }
        .hwrite
        {
            width: 20px;
            height: 20px;
            transform: rotate(-90deg);
            font-weight: bold;
            text-align: center;
            padding: 0;
            margin: 0;
        }
        td.bl
        {
            border-left: 0;
        }
        </style>
    </head>
    <body class="container" style="font-family: Times New Roman;">
        <img src="../images/tattvam_banner.jpg" align='right'>
        <h2>
            <span style="padding-left: 15px; padding-right: 15px;">
                INVESTIGATION SHEET
            </span>
        </h2>
        <div class="justify-content-center" style="padding-top: 3%;">
            <form action="../Investigation_Sheet_Add.php" method="POST">
                <input type="hidden" value="<?php echo $login_name;?>" name="admin_name">
                <input type="hidden" value="<?php echo $treatment_id;?>" name="treatment_id">
                <input type="hidden" value="<?php echo $patient_id;?>" name="patient_id">                
            <table border="1">
                <tbody>
                    <tr>
                        <td rowspan="2"></td>
                        <td>DATE<input type="date" name="ivs_date" value="<?php echo $current_date?>" readonly=""/></td>
                    </tr>
                    <tr>
                        <td>TIME<input type="time" name="ivs_time" value="<?php echo $current_time?>" readonly=""/></td>
                    </tr>
                    <tr>
                        <td rowspan="8" class="hwrite">HAEMATIOLOGY</td>
                        <td>Hb<input type="number" name="ivs_hb"/></td>
                    </tr>
                    <tr>
                        <td>PCV<input type="number" name="ivs_pcv"/></td>
                    </tr>
                    <tr>
                        <td>TC<input type="number" name="ivs_tc"/></td>
                    </tr>
                    <tr>
                        <td>DC<input type="number" name="ivs_dc"/></td>
                    </tr>
                    <tr>
                        <td>ESR<input type="number" name="ivs_esr"/></td>
                    </tr>
                    <tr>
                        <td>M.P.<input type="number" name="ivs_mp"/></td>
                    </tr>
                    <tr>
                        <td>PLATELETS<input type="number" name="ivs_platelets"/></td>
                    </tr>
                    <tr>
                        <td>PT/P.T.T<input type="number" name="ivs_ptt"/></td>
                    </tr>
                    <tr>
                        <td rowspan="4" class="hwrite">URINE</td>
                        <td>Aib.<input type="text" name="ivs_aib"/></td>
                    </tr>
                    <tr><td>SUG.<input type="text" name="ivs_sug"/></td>
                    </tr>
                    <tr>
                        <td>MICRO<input type="text" name="ivs_micro"/></td>
                    </tr>
                    <tr>
                        <td>RBS<input type="text" name="ivs_rbs"/></td>
                    </tr>
                    <tr>
                        <td rowspan="2"></td>
                        <td>INR<input type="number" name="ivs_inr"/></td>
                    </tr>
                    <tr>
                        <td>NA<input type="number" name="ivs_na"/></td>
                    </tr>
                    <tr>
                        <td rowspan="7" class="hwrite">RENAL</td>
                        <td>K<input type="number" name="ivs_k"/></td>
                    </tr>
                    <tr>
                        <td>CL<input type="number" name="ivs_cl"/></td>
                    </tr>
                    <tr>
                        <td>HCO<sub>3</sub><input type="number" name="ivs_hco"/></td>
                    </tr>
                    <tr>
                        <td>Urea<input type="number" name="ivs_urea"/></td>
                    </tr>
                    <tr>
                        <td>Creatinine<input type="number" name="ivs_creatinine"/></td>
                    </tr>
                    <tr>
                        <td>Osmolality<input type="number" name="ivs_osmolality"/></td>
                    </tr>
                    <tr>
                        <td>Total Proteins<input type="number" name="ivs_proteins"/></td>
                    </tr>
                    <tr>
                        <td rowspan="7" class="hwrite">HEPATIC</td>
                        <td>Albumin<input type="number" name="ivs_albumin"/></td>
                    </tr>
                    <tr>
                        <td>Globulin<input type="number" name="ivs_globulin"/></td>
                    </tr>
                    <tr>
                        <td>Total<input type="number" name="ivs_total"/></td>
                    </tr>
                    <tr>
                        <td>Bilirubin<input type="number" name="ivs_bilirubin"/></td>
                    </tr>
                    <tr>
                        <td>SGOT / SGPT<input type="number" name="ivs_sgpt"/></td>
                    </tr>
                    <tr>
                        <td>Alk. P.O. / S Amylase<input type="number" name="ivs_amylase"/></td>
                    </tr>
                    <tr>
                        <td>S. Lipase<input type="number" name="ivs_lipase"/></td>
                    </tr>
                    <tr>
                        <td rowspan="2" class="hwrite">CAR-<br>DIAC</td>
                        <td>CPK / CK-MB<input type="number" name="ivs_cpk"/></td>
                    </tr>
                    <tr>
                        <td>Troponin<input type="number" name="ivs_troponin"/></td>
                    </tr>
                    <tr>
                        <td rowspan="4" class="hwrite">OTHERS</td>
                        <td>HIV<input type="text" name="ivs_hiv"/></td>
                    </tr>
                    <tr>
                        <td>Hbs Ag<input type="text" name="ivs_hbsag"/></td>
                    </tr>
                    <tr>
                        <td>HCV<input type="text" name="ivs_hcv"/></td>
                    </tr>
                    <tr>
                        <td>Blood Group<input type="text" name="ivs_bloodgroup"/></td>
                    </tr>
                </tbody>
            </table>
                <input type="submit" value="Add">
            </form>
            <br>
            <table>
                <tbody>
                    <tr>
                        <td><br/><br/>Signature of RMO</td>
                        <td><br/><br/>Signature of Staff</td>
                    </tr>
                </tbody>
            </table>

        </div>
    </body>
</html>
