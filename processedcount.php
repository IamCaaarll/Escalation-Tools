<!--For Selecting the COUNT of Items in PROCESSED LIST-->
<?php
include("Database/Connection.php");/*Database Connection*/
$db= mysqli_select_db($conn,"shakeys_db");/*Load the Data in Database*/
  /*Retrieving Data from Database*/
  /*For Concern Type Missed out Items*/
  $result=mysqli_query($conn,"SELECT count(*) as Processed from shakeys_escalation_template_final where status = 'ACKNOWLEDGE'");
  /*Execute Query*/
  $Processed=mysqli_fetch_assoc($result);
  echo $Processed['Processed'];
$conn->close();
 ?>
