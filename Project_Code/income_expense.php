<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hospital_management_system";

$conn = mysqli_connect($servername,$username,$password,$dbname);

if($conn)
{
    echo "connection successful<br>";
}
 else 
{
    echo "connection not successfu<br>";   
}

if($_POST)
{
    
    $date = $_POST['date'];
    $type = $_POST['type'];
    $amt = $_POST['amt'];
    $des = $_POST['des'];
    $mode = $_POST['mode'];
    
    
    $displaybalance = "SELECT * FROM balance_master";
    $result_balance = mysqli_query($conn, $displaybalance);
    if(mysqli_num_rows($result_balance) > 0)
    {
        while($row_balance = mysqli_fetch_assoc($result_balance))
        {

            if($type == "income")
            {
                $income_balance=$row_balance["Income_amount"];
                $income_balance+=$amt;
                $update_income="update balance_master set Income_amount=$income_balance";
                if(mysqli_query($conn, $update_income))
                {
                    echo 'income updated';
                    
                }
                else
                {
                    echo 'income not updated';
                }
            }
            if($type == "expense")
            {
                $expense_balance=$row_balance["Expense_amount"];
                $expense_balance+=$amt;
                $update_expense="update balance_master set Expense_amount=$expense_balance";
                if(mysqli_query($conn, $update_expense))
                {
                    echo 'expense updated';
                    
                }
                else
                {
                    echo 'expense not updated';
                }
            }
            if($type == "asset")
            {
                $asset_balance=$row_balance["Asset_amount"];
                $asset_balance+=$amt;
                $update_asset="update balance_master set Asset_amount=$asset_balance";
                if(mysqli_query($conn, $update_asset))
                {
                    echo 'asset updated';
                    
                }
                else
                {
                    echo 'asset not updated';
                }
            }
            if($type == "liability")
            {
                $liability_balance=$row_balance["Liability_amount"];
                $liability_balance+=$amt;
                $update_liability="update balance_master set Liability_amount=$liability_balance";
                if(mysqli_query($conn, $update_liability))
                {
                    echo 'liability updated';
                    
                }
                else
                {
                    echo 'liability not updated';
                }
            }            
            
        }           
    }    
    
    
    
    $sql = "insert into incomeexpense (Voucher_date,Account_type,Amount,Description,Mode) "
            . "VALUES ('$date','$type',$amt,'$des','$mode')";
    if(mysqli_query($conn,$sql))
    {
        if($mode == "bank") 
        {
            $bname = $_POST['bname'];
            $brname = $_POST['brname'];
            $ifsc = $_POST['ifsc'];
            $acc = $_POST['acc'];
            $cno = $_POST['cno'];

            $get_voucher_no = "SELECT Voucher_no FROM incomeexpense WHERE Voucher_no=(SELECT max(Voucher_no) FROM incomeexpense)";
            $result_voucher_no = mysqli_query($conn, $get_voucher_no);
            if(mysqli_num_rows($result_voucher_no) > 0)
            {
                while($row_voucher = mysqli_fetch_assoc($result_voucher_no))
                {
                    $voucher_no = $row_voucher["Voucher_no"];
                }
            }
            
            echo "UPDATE incomeexpense SET Bank_Name = '$bname' , "
                    . "Branch_Name = '$brname' , IFSC_Code = '$ifsc' , Account_No = $acc , Cheque_NO = '$cno' "
                    . "WHERE Voucher_no = $voucher_no";
            
            $add_bank_details = "UPDATE incomeexpense SET Bank_Name = '$bname' , "
                    . "Branch_Name = '$brname' , IFSC_Code = '$ifsc' , Account_No = $acc , Cheque_NO = '$cno' "
                    . "WHERE Voucher_no = $voucher_no";
            if(mysqli_query($conn, $add_bank_details))
            {
                header("Location: incomeexpense1.php?admin_name=<?php echo $login_name;?>");
            }
            else
            {
                echo "<script>alert('Voucher Not Inserted');window.location.href = 'incomeexpense1.php?admin_name=<?php echo $login_name;?>';</script>";
            }
        }
        if($mode == "online") 
        {
            $online_bname = $_POST['online_bname'];
            $online_brname = $_POST['online_brname'];
            $online_ifsc = $_POST['online_ifsc'];
            $online_acc = $_POST['online_acc'];  
            
            $get_voucher_no = "SELECT Voucher_no FROM incomeexpense WHERE Voucher_no=(SELECT max(Voucher_no) FROM incomeexpense)";
            $result_voucher_no = mysqli_query($conn, $get_voucher_no);
            if(mysqli_num_rows($result_voucher_no) > 0)
            {
                while($row_voucher = mysqli_fetch_assoc($result_voucher_no))
                {
                    $voucher_no = $row_voucher["Voucher_no"];
                }
            }
               echo "UPDATE incomeexpense SET Bank_Name = '$online_bname' , "
                    . "Branch_Name = '$online_brname' , IFSC_Code = '$online_ifsc' , Account_No = $online_acc "
                    . "WHERE Voucher_no = $voucher_no";
            
            $add_online_details = "UPDATE incomeexpense SET Bank_Name = '$online_bname' , "
                    . "Branch_Name = '$online_brname' , IFSC_Code = '$online_ifsc' , Account_No = $online_acc "
                    . "WHERE Voucher_no = $voucher_no";
            if(mysqli_query($conn, $add_online_details))
            {
               header("Location: incomeexpense1.php?admin_name=<?php echo $login_name;?>");
            }
           else
          {
               echo "<script>alert('Voucher Not Inserted');window.location.href = 'incomeexpense1.php?admin_name=<?php echo $login_name;?>';</script>";
           }
        }
        if($mode == "cash") 
        {
           header("Location: incomeexpense1.php?admin_name=<?php echo $login_name;?>");
        }        
    }
}
else 
{
   echo "<script>alert('Voucher Not Inserted');window.location.href = 'incomeexpense1.php?admin_name=<?php echo $login_name;?>';</script>";         
}    
 
