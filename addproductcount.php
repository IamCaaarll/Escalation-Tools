<!--For Selecting the COUNT of Items in ADDITIONAL PRODUCT LIST-->
<?php
  include("Database/Connection.php");/*Database Connection*/
  $db= mysqli_select_db($conn,"shakeys_db");/*Load the Data in Database*/
    /*Retrieving Data from Database*/
    /*For Concern Type Additional Product*/
  $result=mysqli_query($conn,"SELECT count(*) as AdditionalProduct from shakeys_escalation_template_final where concern_type ='Additional Product' AND status = 'QUEUE'");
  /*Execute Query*/
  $AdditionalProduct=mysqli_fetch_assoc($result);
  echo $AdditionalProduct['AdditionalProduct'];
  $conn->close();
?>
