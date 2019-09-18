<!--For Selecting the COUNT of Items in FOLLOW UP LIST-->
<?php
  include("Database/Connection.php");/*Database Connection*/
    $db= mysqli_select_db($conn,"shakeys_db");/*Load the Data in Database*/
    /*Retrieving Data from Database*/
    /*For Concern Type Follow Up*/
    $result=mysqli_query($conn,"SELECT count(*) as followup from shakeys_escalation_template_final where concern_type ='Follow up' AND status = 'QUEUE'");
    /*Execute Query*/
    $followup=mysqli_fetch_assoc($result);
    echo $followup['followup'];
  $conn->close();
?>
