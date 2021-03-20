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

$view_patient = "SELECT * FROM patient WHERE Patient_id = $patient_id";
$result_patient = mysqli_query($connection, $view_patient);
if(mysqli_num_rows($result_patient) > 0)
{
    while ($row_patient = mysqli_fetch_assoc($result_patient))
    {
        $patient_name = $row_patient["Patient_Name"];
        $patient_relative_name = $row_patient["Patient_Relative_name"];
        $patient_relative_rel = $row_patient["Patient_Relative_Relation"];
    }
}

if($_GET)
{
    $login_name=$_GET["admin_name"];
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Surgery Consent</title>
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
        textarea
        {
            border: 1px solid black;
            border-radius: 10px;
            float: right;
        }
        table
        {
            width: 100%;
            line-height: 2;
            border-collapse: collapse;
            border-spacing: 0;
            padding: 0;
            margin: 0;
            table-layout: auto;
            white-space: nowrap;
            text-align: justify;
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
        input:not([type="submit"])
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
        ul
        {
            list-style-type: lower-alpha;
        }
        </style>        
    </head>
    <body class="container" style="font-family: Times New Roman; font-size: 16px;" 
          onbeforeprint="lang_disappear()" onafterprint="lang_appear()">
        <img src="../images/tattvam_banner.jpg" align='right'>
        <h2>
            <span style="padding-left: 15px; padding-right: 15px;">
                CONSENT FOR SURGERY
            </span>
        </h2>
        <br><br>
        <form action="../Surgery_Consent_Add.php" method="POST">
            <input type="hidden" value="<?php echo $treatment_id;?>" name="treatment_id">
            <input type="hidden" value="<?php echo $patient_id;?>" name="patient_id">
            <input type="hidden" value="<?php echo $login_name;?>" name="admin_name">
        <textarea rows="10" cols="40"><?php echo $patient_name;?></textarea>
        <div class="justify-content-center" style="padding-top: 12%">
            Hereby I/my relative<input type="text" value="<?php echo $patient_name;?>" readonly="">
            (Patient Name), give my full consent
            as an act of my own free will to undergo the following surgery
            <input type="text" name="surgery_name" required="" >(Surgery name)
            at <b>Tattvam Surgical Hospital</b> under the supervision and guidance of
            Dr.<input type="text" name="doctor_name" required="" > and his team of assistants, nurses and hospital
            staff as deemed necessary.<br><br>
            
            I have been explained in the language known & understood by me about the nature of the surgery being
            performed, its benefits and costs, risks associated with, other alternatives and its prognosis.<br>
            Risks: <input type="text" name="surgery_risks"><br>
            Benefit: <input type="text" name="surgery_benefit"><br>
            Alternatives: <input type="text" name="surgery_alt"><br>
            <ul>
                <li>
                    I have been explained clearly that my Surgery is not totally safe and that Surgery can be risk to life of
                    healthy person, despite the necessary & proper steps are taken.
                </li>
                <li>
                    I understand my doctors have explained to me that excessive bleeding, infection, cardiac arrest,
                    pulmonary embolism and complication like this can arise suddenly and unexpectedly while undergoing
                    any investigation/Surgery.
                </li>
                <li>
                    I give consent and agree to the removal & disposal of body parts/tissues by the hospital Authority that
                    may be above - mentioned surgery.
                </li>
                <li>
                    I have read the above writing has been explained in detail to me. I have understood that foresaid and I am 
                    willingly giving my consent without any pressure & taking every necessary precaution & giving adequate 
                    care & treatment, above mentioned outcome occurs in the hospital, respective Surgeon or Staff members
                    are not held responsible.
                </li>
            </ul>
            <br>
            <table>
                <tbody>
                    <tr>
                        <td>
                            Name of Patient/Relative/Witness
                            <input type="text" value="<?php echo $patient_relative_name;?>">
                        </td>
                        <td>Name of Surgeon:<input type="text" name="surgeon_name" required="" ></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            Sign of: Patient/Relative/Witness<input type="text" readonly="" >
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Relation with Patient:
                            <input type="text" value="<?php echo $patient_relative_rel;?>">
                        </td>
                        <td>Sign of Surgeon:<input type="text" readonly=""></td>
                    </tr>
                    <tr>
                        <td>Date:<input type="text" readonly=""></td>
                        <td>Date:<input type="date" value="<?php echo $current_date;?>"></td>
                    </tr>
                    <tr>
                        <td>Time:<input type="text" readonly=""></td>
                        <td>Time:<input type="time" value="<?php echo $current_time;?>"></td>
                    </tr>
                </tbody>
            </table>            
        </div>
        <input type="submit" value="Next">
        </form>
            <br>
<!--            <div id='google_translate_element' align="center"></div>-->
            <script type="text/javascript">
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
