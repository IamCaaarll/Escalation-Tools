<!--For Selecting the COUNT of Items in MISSED OUT ITEMS LIST-->
<?php
include("Database/Connection.php");/*Database Connection*/
$db= mysqli_select_db($conn,"shakeys_db");/*Load the Data in Database*/
  /*Retrieving Data from Database*/
  /*For Concern Type Missed out Items*/
  $result=mysqli_query($conn,"SELECT count(*) as MissedoutItems from shakeys_escalation_template_final where concern_type ='Missed out Items' AND status = 'QUEUE'");
  /*Execute Query*/
  $MissedoutItems=mysqli_fetch_assoc($result);
  echo $MissedoutItems['MissedoutItems'];
$conn->close();
 ?>
