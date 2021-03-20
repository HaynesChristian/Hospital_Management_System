<html>
    <head>
        
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script type="text/javascript">
            function validate()
            {   
         if( document.form.Employee_Id.value == "" )
         {
            alert( "Please provide your name!" );
            document.form.Employee_Id.focus() ;
            return false;
         }
       if( document.form.Salary_Month.value == "" )
         {
            alert( "Please Enter Your Designation!" );
            document.form.Salary_Month.focus() ;
            return false;
         }
         if( document.form.Working_Days.value == "" )
         {
            alert( "Please Enter Your Contact No.!" );
            document.form.Working_Days.focus() ;
            return false;
         }
         if( document.form.Attendance.value == "" )
         {
            alert( "Please Enter Your Valid E-mail !" );
            document.form.Attendance.focus() ;
            return false;
         }
         if( document.form.Arrears_Amount.value == "" )
         {
            alert( "Please Enter Your PF No!" );
            document.form.Arrears_Amount.focus() ;
            return false;
        }
         if( document.form.PTAX_Amount.value == "" )
         {
            alert( "Please Enter Your Professional Tax Percentage!" );
            document.form.PTAX_Amount.focus() ;
            return false;
         }
         if( document.form.Income_Amount.value == "" )
         {
            alert( "Please Enter Your GLIC Percentage!" );
            document.form.Income_Amount.focus() ;
            return false;
         }
        </script>
    </head>
    <body>
        <form method="POST" action="salary.php" autocomplete="off">
            
            <center>
                <h1>Salary Slip</h1>
            <table border="1">
                <tbody>
                    <tr>
                        <td><b>Employee Id :</b></td>
                        <td><input type="text" name="empid" /></td>
                    </tr>
                    <tr>
                        <td><b>Salary Month :</b></td>
                            <td>
                            <select name="smonth">
                                    <option>January</option>
                                    <option>February</option>
                                    <option>March</option>
                                    <option>April</option>
                                    <option>May</option>
                                    <option>June</option>
                                    <option>July</option>
                                    <option>August</option>
                                    <option>September</option>
                                    <option>October</option>
                                    <option>November</option>
                                    <option>December</option>
                                </select>
                            </td>
                    </tr>
                    <tr>
                        <td><b>Salary Year :</b></td>
                        <td><input type="number" name="salaryyear" /></td>
                    </tr>
                    <tr>
                        <td><b>Working Days :</b></td>
                        <td><input type="text" name="working" /></td>
                    </tr>
                    <tr>
                        <td><b>Arrears Amount :</b></td>
                        <td><input type="text" name="arrears" /></td>
                    </tr>
                    <tr>
                        <td><b>PTAX Amount :</b></td>
                        <td><input type="text" name="pta" /></td>
                    </tr>
                    <tr>
                        <td><b>Income Tax :</b></td>
                        <td><input type="text" name="income" /></td>
                    </tr>
                    <tr>
                        <td align="center" colspan="2"> <input type="submit" value="submit" onclick="javascript.validate" /> </td>
                    </tr>
                </tbody>
            </table>
                    </form>
</center>
    </body>
</html>
        