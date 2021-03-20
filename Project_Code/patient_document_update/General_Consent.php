<?php
$con_servername = "localhost";
$con_username = "root";
$con_password = "";
$database = "hospital_management_system";

$connection = mysqli_connect($con_servername, $con_username, $con_password, $database);

$patient_id = $_GET["patient_id"];
$treatment_id = $_GET["treatment_id"];

$view_patient = "SELECT patient_admission.* , patient.* FROM "
        . "patient_admission , patient WHERE "
        . "patient_admission.Treatment_id = $treatment_id AND patient.Patient_id = $patient_id";
$result_patient = mysqli_query($connection, $view_patient);
if(mysqli_num_rows($result_patient) > 0)
{
    while ($row_patient = mysqli_fetch_assoc($result_patient))
    {
        $patient_name = $row_patient["Patient_Name"];
        $patient_relative_name = $row_patient["Patient_Relative_name"];
        $patient_relative_rel = $row_patient["Patient_Relative_Relation"];
        $patient_admission_date = $row_patient["Patient_Admission_date"];
        $patient_admission_time = $row_patient["Patient_Admission_time"];
        $staff_member = $row_patient["Assigned_Staff_memberName"];
    }
}
else
{
    echo "<script>alert('Add General Consent details first !!');</script>";
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
        <title>General Consent</title>
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
            margin-bottom: 5%;
        }
        input:not([type="submit"])
        {
            border: 0;
            border-bottom: 1px solid black;
            width: 25%;
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
            <script type="text/javascript">
                function printdoc()
                {
                    window.print();
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
                    document.getElementById('updbtn').style.display = "none";
                    document.getElementById('prtbtn').style.display = "none";
                    document.getElementsByClassName('goog-te-banner').style.display = "none";
                }
                function lang_appear()
                {
                    document.getElementById('google_translate_element').style.display = "";
                    alert("langauage appeared");
                    
                }
                function cancel_op_treatment()
                {
                    alert("cancel pressed");
                    window.location.href = "../Inpatient_Treatment.php?patient_id=<?php echo $patient_id?>&admin_name=<?php echo $login_name?>";
                }                
            </script>        
    </head>
    <body class="container" style="font-family: Times New Roman; font-size: 16px;" 
          onbeforeprint="lang_disappear()">
        <img src="../images/tattvam_banner.jpg" align='right'>
        <h2>
            <span style="padding-left: 15px; padding-right: 15px;">
                GENERAL CONSENT
            </span>
        </h2>
        <div class="justify-content-center" style="font-size: inherit">
            <br>
        <center><h5><u>AUTHORIZATION FOR INVESTIGATIONS, PROCEDURE, TREATMENT, PROVIDE OF INFORMATION & PAYMENTS</u><br>
            MEDICAL TREATMENT AND RELEASE OF INFORMATION:</center></h5>
            <form action="Update_General_Consent.php" method="POST">
                <input type="hidden" value="<?php echo $login_name;?>" name="admin_name">
                <input type="hidden" value="<?php echo $treatment_id;?>" name="treatment_id">
                <input type="hidden" value="<?php echo $patient_id;?>" name="patient_id">
            <p>
                I, understand, do hereby agree & give my consent for my/ <input type="text" value="<?php echo $patient_name; ?>" readonly="">(Name of
                Patient) admission to Tattvam Hospital, and I hereby request and authorize the above hospital, the physicians on itself
                medical staff, the members of its house staff & nursing staff, assisted by the employees of hospital, to provided
                such care and administer such diagnostic, radiological and/or therapeutic procedures and treatments as in the 
                judgment of the above physician is deemed necessary or advisable in my/above patient's care.This includes all
                routine diagnostic tests & procedures, including diagnostic x-rays, the administration and/or injection of 
                pharmaceutical products & medications and withdrawal of blood for laboratory examinations. I acknowledge the
                fact that the hospital has the authority to dispose off specimens taken for laboratory examination. I further agree to
                the publication of my treatment for medical, scientific or educational purposes provided the pictures of the descriptive
                texts accompanying them do not reveal my identity. In addition I hereby authorize any and all persons
                caring for me to review and/or release my personal health information to other health care providers treating me
                during this hopitalization
            </p>
            
            <h5>FINANCIAL RELEASE OF INFORMATION & PAYMENTS:</h5>
            
            <p>
                I have been explained about the approximate cost of treatment. It has been explained that a certain fixed amount
                will be required to be pairs at hour time of admission. Incase of package the entire amount adds to be price on
                admission period. Therefore the estimate given to me is only a rough indication of the approximate costs towards
                hopitalization. The final bill may, therefore vary significantly from the estimate, and the amount mentioned in the final
                shall be final amount payable to the hospital.
            </p>
            
            <h5>GENERAL RULES AND REGULATIONS:</h5>
            
            <p>
                I acknowledge receipt of instructions of the hospital which includes patient rights & responsibilities and agree to
                abide by them. All cash, jewelery & other valuables shall be removed by me to a place of safety. I shall not hold the
                hospital authorities responsible for any kind of loss sustained by me or my family.
                <br><br>
                The above has been explained in the language known to me and I have fully understood the same and I am signing.
            </p>
            <div>
                <table style="width:100%">
                    <tr>
                        <td>
                            <h5>Signature of the Patient/ Next Kin/ Relative</h5>
                            Name : 
                            <input type="text" value="<?php echo $patient_relative_name; ?>" name="patient_relative_name" required=""><br>
                            Relation : <input type="text" value="<?php echo $patient_relative_rel; ?>" name="patient_relative_rel" required=""><br>
                            Date : <input type="text" readonly="">Time : <input type="text" readonly=""><br>
                        </td>
                        <td style="padding-left: 5%">
                            <h5>Signature of the Admission Office Personal/Co-Ordinator</h5>
                            Name : <input type="text" name="staff_member" value="<?php echo $staff_member; ?>" required=""><br><br>
                            Date : <input type="date" name="admission_date"
                                          value="<?php echo $patient_admission_date; ?>" readonly="">
                            Time : <input type="time" name="admission_time"
                                          value="<?php echo $patient_admission_time; ?>" readonly=""><br>                            
                        </td>
                    </tr>
                </table>
                <br>
                <input type="submit" value="Update" id="updbtn">
                <button onclick="printdoc()" id="prtbtn">Print</button>
            </div>
            </form>
            <br>
            <div id='google_translate_element' align="center"></div>
            <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
        </div>
    </body>
</html>
