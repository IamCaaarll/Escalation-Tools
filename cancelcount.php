<!--For Selecting the COUNT of Items in CANCELLED LIST-->
<?php
include("Database/Connection.php");/*Database Connection*/
  $db= mysqli_select_db($conn,"shakeys_db");/*Load the Data in Database*/
    /*Retrieving Data from Database*/
    /*For Concern Type Cancellation*/
  $result=mysqli_query($conn,"SELECT count(*) as Cancellation from shakeys_escalation_template_final where concern_type ='Cancellation' AND status = 'QUEUE'");
    /*Execute Query*/
  $Cancellation=mysqli_fetch_assoc($result);
  echo $Cancellation['Cancellation'];
$conn->close();
?>
