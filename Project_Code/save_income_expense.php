<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hospital_management_system";

$conn = mysqli_connect($servername,$username,$password,$dbname);
if($_POST)
{
    $vno = $_POST['vno'];
    $date = $_POST['date'];
    $type = $_POST['type'];
    $previous_amt = $_POST['previous_amt'];
    $amt = $_POST['amt'];
    $des = $_POST['des'];
    $mode = $_POST['mode'];
    $bname = $_POST['bname'];
    $brname = $_POST['brname'];
    $ifsc = $_POST['ifsc'];
    $acc = $_POST['acc'];
    $cno = $_POST['cno'];
    
    $displaybalance = "SELECT * FROM balance_master";
    $result_balance = mysqli_query($conn, $displaybalance);
    if(mysqli_num_rows($result_balance) > 0)
    {
        while($row_balance = mysqli_fetch_assoc($result_balance))
        {

            if($type == "income")
            {
                $income_balance=$row_balance["Income_amount"];
                $income_balance -= $previous_amt;
                $income_balance += $amt;                
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
                $expense_balance -= $previous_amt;
                $expense_balance += $amt;
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
                $asset_balance -= $previous_amt;
                $asset_balance += $amt;
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
                $liability_balance -= $previous_amt;
                $liability_balance += $amt;
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
 

$sql="Update incomeexpense set Voucher_date='$date',Account_type='$type',Amount=$amt,Description='$des',Mode='$mode',Bank_Name='$bname',Branch_Name='$brname' ,IFSC_Code='$ifsc' ,Account_No=$acc,Cheque_NO='$cno' where Voucher_no=$vno";
if (mysqli_query($conn,$sql))
{
echo  "Record Update Successfull";
}
else
{
    echo 'not updated';
}
mysqli_close($conn);
header("Location:incomeexpense1.php?admin_name=<?php echo $login_name;?>");
}
?>