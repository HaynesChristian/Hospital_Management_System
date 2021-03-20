<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hospital";

$conn = mysqli_connect($servername,$username,$password,$dbname);
if($conn)
{
    echo "connection successful<br>";
}
 else 
{
    echo "connection not successful<br>";   
}

$sql = "SELECT Emp_Id, Alt_status FROM attendance";
if ($result = mysqli_query($con, $sql)) {
  // Fetch one and one row
  while ($row = mysqli_fetch_row($result)) {
    printf ("%s (%s)\n", $row[0], $row[1]);
  }
  mysqli_free_result($result);
}

mysqli_close($con);

?>


