<!--For Selecting the COUNT of Items in REJECT LIST-->
<?php
include("Database/Connection.php");/*Database Connection*/
$db= mysqli_select_db($conn,"shakeys_db");/*Load the Data in Database*/
  /*Retrieving Data from Database*/
  /*For Concern Type Reject (Product Unavailable,Wrong Routing,Accidentally Accepted)*/
  $result=mysqli_query($conn,"SELECT count(*) as Reject from shakeys_escalation_template_final where concern_type LIKE 'Reject%' AND status = 'QUEUE'");
  /*Execute Query*/
  $Reject=mysqli_fetch_assoc($result);
  echo $Reject['Reject'];
$conn->close();
 ?>
