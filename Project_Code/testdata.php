<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hospital_management_system";

$conn = mysqli_connect($servername,$username,$password,$dbname);
if($_POST)
{
    $login_name=$_POST["admin_name"];
    $patientid = $_POST['patientid'];
    $treatment_id = $_POST['treatment_id'];
    
    $testdate = $_POST['testdate'];
    $testid = $_POST['testid'];
    $teststatus = $_POST['teststatus'];
    
    $displaydata = "select * from lab_master where Test_Id = $testid";
    $result = mysqli_query($conn, $displaydata);
    if(mysqli_num_rows($result)>0)
    {
        while ($row = mysqli_fetch_assoc($result))
        {
            $Test_Type=$row["Test_Type"];
            $testdescription=$row["Test_Description"];
            $tcharges=$row["Test_Charges"];
        }     
    }
    
    
    $sql = "INSERT INTO lab_test_data (Patient_id,Treatment_id,Test_Id,Test_Date,"
            . "Test_Description,Test_Charges,Test_Status) "
            . "VALUES ($patientid,$treatment_id,$testid,'$testdate',"
            . "'$Test_Type : $testdescription',$tcharges,'$teststatus')";
    if(mysqli_query($conn,$sql))
    {
        header("Location:lab_test_data.php?admin_name=$login_name&patient_id=$patientid&treatment_id=$treatment_id");
    }
    else
    {
        echo "<script>alert(Patient not registerd');"
        . "window.location.href = 'lab_test_data.php?admin_name=$login_name&patient_id=$patientid&treatment_id=$treatment_id';</script>";
    }
}