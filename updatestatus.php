<?php
include("Database/Connection.php");/*Database Connection*/
$db= mysqli_select_db($conn,"shakeys_db");
  /*Update Query for Status of Escalation Details*/
  $sql = "UPDATE shakeys_escalation_template_final SET status='ACKNOWLEDGE' WHERE transaction_number = '".$_POST['orderid']."'";
  /*Execute Query*/
  mysqli_query($conn, $sql);
?>
