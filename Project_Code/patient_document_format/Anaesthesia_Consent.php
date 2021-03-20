<?php
$con_servername = "localhost";
$con_username = "root";
$con_password = "";
$database = "hospital_management_system";

$connection = mysqli_connect($con_servername, $con_username, $con_password, $database);

$patient_id = $_GET["patient_id"];
$treatment_id = $_GET["treatment_id"];

$view_patient = "SELECT treatment_surgery.Treatment_Surgery_id , patient.* FROM "
        . "treatment_surgery , patient WHERE "
        . "treatment_surgery.Treatment_id = $treatment_id AND patient.Patient_id = $patient_id";
$result_patient = mysqli_query($connection, $view_patient);
if(mysqli_num_rows($result_patient) > 0)
{
    while ($row_patient = mysqli_fetch_assoc($result_patient))
    {
        $Treatment_Surgery_id = $row_patient["Treatment_Surgery_id"];
        $patient_name = $row_patient["Patient_Name"];
        $patient_relative_name = $row_patient["Patient_Relative_name"];
        $patient_relative_rel = $row_patient["Patient_Relative_Relation"];
    }
}
else
{
    echo "<script>alert('Add Surgery Consent details first !!');</script>";
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
        <title>Anaesthesia Consent</title>
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
            table-layout: auto;
            white-space: nowrap;
        }
        td
        {
            border: 0;
        }
        img
        {
            height: 20%;
            width: 20%;
        }
        input:not([type="submit"]),select
        {
            border: 0;
            border-bottom: 1px solid black;
            width: auto;
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
        ul
        {
            list-style-type: disc;
        }
        </style>        
    </head>
    <body class="container" style="font-family: Times New Roman; font-size: 16px;" 
          onbeforeprint="lang_disappear()" onafterprint="lang_appear()">
        <img src="../images/tattvam_banner.jpg" align='right'>
        <h2>
            <span style="padding-left: 15px; padding-right: 15px;">
                CONSENT FOR ANAESTHESIA
            </span>
        </h2>
        <br><br>
        <form action="../Anesthesia_Consent_Add.php" method="POST">
            <input type="hidden" value="<?php echo $login_name;?>" name="admin_name">
            <input type="hidden" value="<?php echo $treatment_id;?>" name="treatment_id">
            <input type="hidden" value="<?php echo $patient_id;?>" name="patient_id">
            <input type="hidden" value="<?php echo $Treatment_Surgery_id;?>" name="Treatment_Surgery_id">
        <div class="justify-content-center" style="padding-top: 1%;">
            Hereby I/my relative<input type="text" value="<?php echo $patient_name;?>" readonly="">
            (Patient Name), give my full
            consent as an act of my own free will to undergo
            <input type="checkbox" name="anaesthesia_type[]" value="GA" />GA
            <input type="checkbox" name="anaesthesia_type[]" value="LA" />LA
            <input type="checkbox" name="anaesthesia_type[]" value="Spinal" />Spinal
            <input type="checkbox" name="anaesthesia_type[]" value="Epidural" />Epidural
            <input type="checkbox" name="anaesthesia_type[]" value="Regional" />Regional
            (Mention Type of Anaesthesia) in operation theater under the supervision and guidance of 
            Dr.<input type="text" name="anaesthetist_name" id="anae_name1" onblur="anae_name()" required="" >
            and his team of assistants, nurses and
            hospital staff as deemed necessary<br><br>
            <lh>RISKS </lh><br>
            <lh>Common Risks for all patients includes : </lh>
            <ul>
                <li>Bruising at the site of injections or drips</li>
                <li>Nausea or vomiting (although the anaesthesia will limit or prevent this as far as possible)</li>
                <li>
                    Sore throat from the gases and / or the breathing tube. You may notice temporary difficulty in speaking.
                    This should improve after some hours.
                </li>
                <li>Temporary muscle pains.</li>
                <li>Temporary headache or blurred vision.</li>
            </ul>
            
            <lh>Uncommon risks for all patients includes : </lh>
            <ul>
                <li>
                    Awareness of activity in the operating room during anaesthesia, particularly during certain operations and 
                    in some emergency situations.
                </li>
                <li>
                    Eye abrasions causing pain and requiring treatment with medication and patching.
                </li>
                <li>Damage to teeth or dental work, lips or tongue.</li>
            </ul>
            
            <lh>Extremely rare risks for ALL patients.These may cause brain damage or death and include: </lh>
            <ul>
                <li>
                    Obstructions in the breathing passage that cannot be readily controlled. These can lead to severe difficulty 
                    with breathing.
                </li>
                <li>
                    Allergy to drugs causing wheezing and rash and in rare cases, severe swelling, low blood pressure and 
                    poor circulation.
                </li>
                <li>
                    Inherited muscle sensitivity to particular anaesthetic drugs(malignant hyperthermia). This can cause a 
                    rapid rise in temperature, heart rate and breathing with high blood pressure and muscle rigidity.
                </li>
                <li>
                    Heart attacks, strokes and pneumonia. While these are uncommon, the risks are higher for patients with 
                    the diseases of the arteries or lungs and in smokers.
                </li>
            </ul>
            
            <lh>Regional anaesthesia has some of the risks listed above and several other risks or consequences:</lh>
            <ul>
                <li>
                    Muscle weakness in the anaesthetized limb, or difficulty passing urine for a lower body block, while the 
                    anaesthetic is working. While this returns to normal as the drugs effects weak off, a temporary urinary 
                    catheter may be necessary.
                </li>
                <li>
                    Headache, which is usually short-lived but can be severe and lasts some days.
                </li>
                <li>
                    Damage to near by blood vessels or organs e.g.: Lungs.
                </li>
                <li>
                    Back ache may follow spinal or epidural anaesthesia. This usually improves quickly, but occasionally can
                    be lasting
                </li>
                <li>
                    There is a very small risk of infection or bleeding at the injection site, which may require antibiotic or 
                    surgical treatment.
                </li>
                <li>
                    Rarely, nerves may be damaged resulting in long term weakness, pain, altered sensation or paralysis.
                </li>
            </ul>
            
            <table>
                <tbody>
                    <tr>
                        <td><input type="text" value="<?php echo $patient_relative_name;?>" readonly="" required="" ></td>
                        <td><input type="text" id="anae_name2" readonly=""></td>
                    </tr>
                    <tr>
                        <td>Name of Patient / Next Kin / Relative</td>
                        <td>Name of Anaesthetist</td>
                    </tr>
                    <tr>
                        <td>Sign of Patient / Next Kin / Relative<br></td>
                        <td>Sign of Anaesthetist</td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            Relation with Patient:
                            <input type="text" value="<?php echo $patient_relative_rel;?>" readonly=""><br>
                        </td>
                    </tr>
                    <tr>
                        <td>Date:<input type="text" readonly="">Time:<input type="text" readonly=""></td>
                        <td>Date:<input type="text" readonly="">Time:<input type="text" readonly=""></td>
                    </tr>                    
                </tbody>
            </table>
        </div>
            <input type="submit" value="Next">
        </form>
<!--            <div id='google_translate_element' align="center"></div>-->
            <script type="text/javascript">
                function anae_name()
                {
                    var a_name1 = document.getElementById("anae_name1").value;
                    document.getElementById("anae_name2").value = a_name1;
                    
                }
                
                function googleTranslateElementInit()
                {
                    new google.translate.TranslateElement({pageLanguage: 'en', includedLanguages: 'en,hi,gu', layout:
                            google.translate.TranslateElement.InlineLayout.SIMPLE},
                'google_translate_element');
                }
                
                function lang_disappear()
                {
                    document.getElementById('google_translate_element').style.display = "none";
                    document.getElementsByClassName('goog-te-banner').style.display = "none";
                }
                function lang_appear()
                {
                    document.getElementById('google_translate_element').style.display = "block";
                }                
            </script>
            <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>                
    </body>
</html>
