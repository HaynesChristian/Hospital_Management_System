<html style="border: 5px solid black;">
    <head>
        <meta charset="UTF-8">
        <title></title>
        <style>
h3 {
   width: 100%; 
   text-align: center; 
   border-bottom: 3px solid #000; 
   line-height: 0.5em;
    
} 

h3 span { 
    background:#fff; 
    padding:0 10px; 
}            
        </style>
       <script>
            function Biowastedisplayreport()
            {
                window.print();
            }
            function Biowastedisplayreportcancel()
            {
                window.location.href = "department-bills.php";
            }
        </script>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hospital_management_system";

$conn = mysqli_connect($servername,$username,$password,$dbname);

?>

     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
   <body onload="Biowastedisplayreport()" onafterprint="Biowastedisplayreportcancel()">
<body>
    <center>

   
   <body style="text-align: center; padding: 2%">
      
       <h3><span>Patient Bill</span> <img style="width: 20%; height: 20%;" src="images/tattvam_banner.jpg" align="right"/></h3><br>
        
        <h2 align="right">Dr. Mrunal Panchal<br>
            Adress :Sun pharma Road,vadodara <br><br>

<html>
<body>
<center>
<table border="5">
    <tr>
        <th>patient_bill_store_id</th>
        <th>patient_bill_id</th>
        <th>patient_bill_amount</th>
        <th>patient_bill_date</th>
       
        
        <th colspan="2">Action</th>
        
    </tr>
    <?php
    $dislpaydata = "select * from patient_bill_store";
    $result = mysqli_query($conn, $dislpaydata);
    if(mysqli_num_rows($result)>0)
    {
        while ($row = mysqli_fetch_assoc($result)) 
                {
    ?>
    <tr>
    <form method="POST" autocomplete="off">
        <td><?php echo $row["patient_bill_store_id"];?></td>
        <td><?php echo $row["patient_bill_id"];?></td>
        <td><?php echo $row["patient_bill_amount"];?></td>
        <td><?php echo $row["patient_bill_date"];?></td>
       
        
       
        <td>
            <button formaction="patientbillupd.php" name="Update" value="<?php echo $row["patient_bill_store_id"];?>">Update</button>
        </td>
        <td>
            <button formaction="patientbilldel.php" name="Delete" value="<?php echo $row["patient_bill_store_id"];?>">Delete</button>
        </td>
        </tr>
    </form>
  <?php
                }
    }
    mysqli_close($conn);
    ?>
  
</table><br>
</body>

</html>  
