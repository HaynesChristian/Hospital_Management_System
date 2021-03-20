<?php
$con_servername = "localhost";
$con_username = "root";
$con_password = "";
$database = "hospital_management_system";

$connection = mysqli_connect($con_servername, $con_username, $con_password, $database);

$patient_id = $_GET["patient_id"];
$treatment_id = $_GET["treatment_id"];
$Treatment_Investigation_Sheet_id = $_GET["Treatment_Investigation_Sheet_id"];

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
        <?php 
        $view_patient_ivs = "SELECT * FROM treatment_investigation_sheet WHERE Treatment_id = $treatment_id "
                . "AND Treatment_Investigation_Sheet_id = $Treatment_Investigation_Sheet_id";
        $result_patient_ivs = mysqli_query($connection, $view_patient_ivs);
        if(mysqli_num_rows($result_patient_ivs) > 0)
        {
            while ($row_patient_ivs = mysqli_fetch_assoc($result_patient_ivs))
            {        
        ?>        
        <div class="justify-content-center" style="padding-top: 3%;">
            <form action="Update_Investigation_Sheet.php" method="POST">
                <input type="hidden" value="<?php echo $login_name;?>" name="admin_name">
                <input type="hidden" value="<?php echo $treatment_id;?>" name="treatment_id">
                <input type="hidden" value="<?php echo $patient_id;?>" name="patient_id">
                <input type="hidden" value="<?php echo $Treatment_Investigation_Sheet_id;?>" 
                       name="Treatment_Investigation_Sheet_id">                
            <table border="1">
                <tbody>
                    <tr>
                        <td rowspan="2"></td>
                        <td>DATE<input type="date" name="ivs_date"
                                       value="<?php echo $row_patient_ivs["Investigation_Sheet_date"]?>" readonly=""/>
                        </td>
                    </tr>
                    <tr>
                        <td>TIME<input type="time" name="ivs_time"
                                        value="<?php echo $row_patient_ivs["Investigation_Sheet_time"]?>" readonly=""/>
                        </td>
                    </tr>
                    <tr>
                        <td rowspan="8" class="hwrite">HAEMATIOLOGY</td>
                        <td>Hb<input type="number" name="ivs_hb" 
                                     value="<?php echo $row_patient_ivs["Investigation_Sheet_HB"]?>"/></td>
                    </tr>
                    <tr>
                        <td>PCV<input type="number" name="ivs_pcv" 
                                      value="<?php echo $row_patient_ivs["Investigation_Sheet_PCV"]?>"/></td>
                    </tr>
                    <tr>
                        <td>TC<input type="number" name="ivs_tc" 
                                     value="<?php echo $row_patient_ivs["Investigation_Sheet_TC"]?>"/></td>
                    </tr>
                    <tr>
                        <td>DC<input type="number" name="ivs_dc" 
                                     value="<?php echo $row_patient_ivs["Investigation_Sheet_DC"]?>"/></td>
                    </tr>
                    <tr>
                        <td>ESR<input type="number" name="ivs_esr" 
                                      value="<?php echo $row_patient_ivs["Investigation_Sheet_ESR"]?>"/></td>
                    </tr>
                    <tr>
                        <td>M.P.<input type="number" name="ivs_mp" 
                                       value="<?php echo $row_patient_ivs["Investigation_Sheet_MP"]?>"/></td>
                    </tr>
                    <tr>
                        <td>PLATELETS<input type="number" name="ivs_platelets" 
                                            value="<?php echo $row_patient_ivs["Investigation_Sheet_Platelets"]?>"/></td>
                    </tr>
                    <tr>
                        <td>PT/P.T.T<input type="number" name="ivs_ptt" 
                                           value="<?php echo $row_patient_ivs["Investigation_Sheet_PTT"]?>"/></td>
                    </tr>
                    <tr>
                        <td rowspan="4" class="hwrite">URINE</td>
                        <td>Aib.<input type="text" name="ivs_aib" 
                                       value="<?php echo $row_patient_ivs["Investigation_Sheet_Aib"]?>"/></td>
                    </tr>
                    <tr><td>SUG.<input type="text" name="ivs_sug" 
                                       value="<?php echo $row_patient_ivs["Investigation_Sheet_Sug"]?>"/></td>
                    </tr>
                    <tr>
                        <td>MICRO<input type="text" name="ivs_micro" 
                                        value="<?php echo $row_patient_ivs["Investigation_Sheet_Micro"]?>"/></td>
                    </tr>
                    <tr>
                        <td>RBS<input type="text" name="ivs_rbs" 
                                      value="<?php echo $row_patient_ivs["Investigation_Sheet_RBS"]?>"/></td>
                    </tr>
                    <tr>
                        <td rowspan="2"></td>
                        <td>INR<input type="number" name="ivs_inr" 
                                      value="<?php echo $row_patient_ivs["Investigation_Sheet_INR"]?>"/></td>
                    </tr>
                    <tr>
                        <td>NA<input type="number" name="ivs_na" 
                                     value="<?php echo $row_patient_ivs["Investigation_Sheet_NA"]?>"/></td>
                    </tr>
                    <tr>
                        <td rowspan="7" class="hwrite">RENAL</td>
                        <td>K<input type="number" name="ivs_k" 
                                    value="<?php echo $row_patient_ivs["Investigation_Sheet_K"]?>"/></td>
                    </tr>
                    <tr>
                        <td>CL<input type="number" name="ivs_cl" 
                                     value="<?php echo $row_patient_ivs["Investigation_Sheet_CL"]?>"/></td>
                    </tr>
                    <tr>
                        <td>HCO<sub>3</sub><input type="number" name="ivs_hco" 
                                                  value="<?php echo $row_patient_ivs["Investigation_Sheet_HCO"]?>"/></td>
                    </tr>
                    <tr>
                        <td>Urea<input type="number" name="ivs_urea" 
                                       value="<?php echo $row_patient_ivs["Investigation_Sheet_Urea"]?>"/></td>
                    </tr>
                    <tr>
                        <td>Creatinine<input type="number" name="ivs_creatinine" 
                                             value="<?php echo $row_patient_ivs["Investigation_Sheet_Creatinine"]?>"/></td>
                    </tr>
                    <tr>
                        <td>Osmolality<input type="number" name="ivs_osmolality" 
                                             value="<?php echo $row_patient_ivs["Investigation_Sheet_Osmolality"]?>"/></td>
                    </tr>
                    <tr>
                        <td>Total Proteins<input type="number" name="ivs_proteins" 
                                                 value="<?php echo $row_patient_ivs["Investigation_Sheet_Proteins"]?>"/></td>
                    </tr>
                    <tr>
                        <td rowspan="7" class="hwrite">HEPATIC</td>
                        <td>Albumin<input type="number" name="ivs_albumin" 
                                          value="<?php echo $row_patient_ivs["Investigation_Sheet_Albumin"]?>"/></td>
                    </tr>
                    <tr>
                        <td>Globulin<input type="number" name="ivs_globulin" 
                                           value="<?php echo $row_patient_ivs["Investigation_Sheet_Globulin"]?>"/></td>
                    </tr>
                    <tr>
                        <td>Total<input type="number" name="ivs_total" 
                                        value="<?php echo $row_patient_ivs["Investigation_Sheet_Total"]?>"/></td>
                    </tr>
                    <tr>
                        <td>Bilirubin<input type="number" name="ivs_bilirubin" 
                                            value="<?php echo $row_patient_ivs["Investigation_Sheet_Bilirubin"]?>"/></td>
                    </tr>
                    <tr>
                        <td>SGOT / SGPT<input type="number" name="ivs_sgpt" 
                                              value="<?php echo $row_patient_ivs["Investigation_Sheet_SGPT"]?>"/></td>
                    </tr>
                    <tr>
                        <td>Alk. P.O. / S Amylase<input type="number" name="ivs_amylase" 
                                                        value="<?php echo $row_patient_ivs["Investigation_Sheet_Amylase"]?>"/></td>
                    </tr>
                    <tr>
                        <td>S. Lipase<input type="number" name="ivs_lipase" 
                                            value="<?php echo $row_patient_ivs["Investigation_Sheet_Lipase"]?>"/></td>
                    </tr>
                    <tr>
                        <td rowspan="2" class="hwrite">CAR-<br>DIAC</td>
                        <td>CPK / CK-MB<input type="number" name="ivs_cpk"
                                              value="<?php echo $row_patient_ivs["Investigation_Sheet_CPK"]?>"/></td>
                    </tr>
                    <tr>
                        <td>Troponin<input type="number" name="ivs_troponin"
                                           value="<?php echo $row_patient_ivs["Investigation_Sheet_Troponin"]?>"/></td>
                    </tr>
                    <tr>
                        <td rowspan="4" class="hwrite">OTHERS</td>
                        <td>HIV<input type="text" name="ivs_hiv"
                                      value="<?php echo $row_patient_ivs["Investigation_Sheet_HIV"]?>"/></td>
                    </tr>
                    <tr>
                        <td>Hbs Ag<input type="text" name="ivs_hbsag"
                                         value="<?php echo $row_patient_ivs["Investigation_Sheet_HbsAg"]?>"/></td>
                    </tr>
                    <tr>
                        <td>HCV<input type="text" name="ivs_hcv"
                                      value="<?php echo $row_patient_ivs["Investigation_Sheet_HCV"]?>"/></td>
                    </tr>
                    <tr>
                        <td>Blood Group<input type="text" name="ivs_bloodgroup"
                                              value="<?php echo $row_patient_ivs["Investigation_Sheet_Bloodgroup"]?>"/></td>
                    </tr>
                </tbody>
            </table>
                <br/>
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
        <?php
            }
        }
        ?>        
    </body>
</html>
