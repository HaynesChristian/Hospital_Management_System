<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
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
            function staffreport()
            {
                window.print();
            }
            function staffreportcancel()
            {
                window.location.href = "department-reports.php";
            }
        </script>
        <head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
    </head>
     <body onload="staffreport()" onafterprint="staffreportcancel()">
         
         
  <body style="text-align: center; padding: 2%">
      
       <h3><span>STAFF REPORT</span> <img style="width: 20%; height: 20%;" src="images/tattvam_banner.jpg" align="right"/></h3><br>
        
        <h2 align="right">Dr. Mrunal Panchal<br>
            Adress :Sun pharma Road,vadodara <br><br>
        
        
      <h2 align="center">   <b>Report Date : <?php echo date("d/m/Y");?></b><br><br></h2>
      <div class="container">
          
          
  <table class="table table-striped">
         
    
    <tbody>
      <tr>
        <td><b>Total Staff</b></td>
        <td><b>50</b></td>
       
      </tr>
       <tr>
        <td>Total Male Staff</td>
        <td>20</td>
       
      </tr>
      <tr>
        <td>Total Female Staff</td>
        <td>30</td>
        
      </tr>
      <tr>
        <td><b>Total Salary</b></td>
        <td>2000000</td>
       
      </tr>
      <tr>
        <td>Overtime</td>
        <td>150000</td>
        
      </tr>
       <tr>
        <td>Bonuses</td>
        <td>200000</td>
        
      </tr>
    </tbody>
  </table>
</div>

</body>
</html>

