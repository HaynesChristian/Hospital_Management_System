<?php
$con_servername = "localhost";
$con_username = "root";
$con_password = "";
$database = "hospital_management_system";

$connection = mysqli_connect($con_servername, $con_username, $con_password, $database);

if($_POST)
{
    $login_name = $_POST["admin_name"];
    $treatment_id = $_POST["treatment_id"];
    $special_req = $_POST["special_req"];
    $patient_id = $_POST["patient_id"];
    $reg_date = $_POST["reg_date"];
    $reg_time = $_POST["reg_time"];
    $att_consultant_name = $_POST["att_consultant_name"];
    $mlc = $_POST["mlc"];
    $allergies = $_POST["allergies"];
    $illness_complaint_desc = $_POST["illness_complaint_desc"];
    $reports_before_hosp = $_POST["reports_before_hosp"];
    
    if($allergies == "yes")
    {
        $allergy_name = $_POST["allergy_name"];
        $allergy_reaction = $_POST["allergy_reaction"];
    }
    
    $form1 = "UPDATE illness_complaint SET Special_requirement = '$special_req' , "
            . "Reg_date = '$reg_date' , Reg_time = '$reg_time' , "
            . "Attending_consultant = '$att_consultant_name' , mlc = '$mlc' , "
            . "Illness_Complaint_Description = '$illness_complaint_desc' , "
            . "Reports_Before_Hospitalization = '$reports_before_hosp' "
            . "WHERE Treatment_id = $treatment_id";
    
/*    echo "UPDATE illness_complaint SET Special_requirement = '$special_req' , "
//            . "Reg_date = '$reg_date' , Reg_time = '$reg_time' , "
//            . "Attending_consultant = '$att_consultant_name' , mlc = '$mlc' , "
//            . "Illness_Complaint_Description = '$illness_complaint_desc' , "
//            . "Reports_Before_Hospitalization = '$reports_before_hosp' "
//            . "WHERE Treatment_id = $treatment_id";
//    echo "<br><br>";
//    
//    echo "UPDATE patient_pasthistory SET "
//                . "Patient_Allergy = '$allergies' WHERE Patient_id = $patient_id";*/
    
    if(mysqli_query($connection, $form1))
    {
        $insert_allergy_status = "UPDATE patient_pasthistory SET "
                . "Patient_Allergy = '$allergies' WHERE Patient_id = $patient_id";
        if(mysqli_query($connection, $insert_allergy_status))
        {
            if($allergies == "yes")
            {
                foreach ($allergy_name as $key => $value) 
                {
                    if($value != "")
                    {
                        $insert_allergy = "INSERT INTO patient_allergy (Patient_id , Allergy_Name , Allergy_Reaction) "
                                . "VALUES ($patient_id , '$value' , '$allergy_reaction[$key]')";
                        if(mysqli_query($connection, $insert_allergy))
                        {
                            continue;
                        }
                        else
                        {
                            echo "<script>alert('Allergy details Not Inserted');</script>";
                            break;
                        }
                    }
                }
            }
        }
        else
        {
            echo "<script>alert('Allergy status Not Updated');"
            . "window.location.href = 'patient_document_format/Admission_history_and_Physical_Assessment_form2.php?patient_id=$patient_id&treatment_id=$treatment_id&admin_name=$login_name';"
            . "</script>";
        }
        header("Location: patient_document_format/Admission_history_and_Physical_Assessment_form2.php?patient_id=$patient_id&treatment_id=$treatment_id&admin_name=$login_name");
    }
    else
    {
        echo "<script>alert('Illness Complaint Not Updated');"
        . "window.location.href = 'patient_document_format/Admission_history_and_Physical_Assessment_form2.php?patient_id=$patient_id&treatment_id=$treatment_id&admin_name=$login_name';"
        . "</script>";        
    }
}