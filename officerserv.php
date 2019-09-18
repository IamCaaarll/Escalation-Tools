<?php
  /*Retrieving Data from Database*/
  /*For Concern Type Follow Up*/
  $result=mysqli_query($conn,"SELECT count(*) as followup from shakeys_escalation_template_final where concern_type ='Follow up' AND status = 'QUEUE'");
  /*Execute Query*/
  $followup=mysqli_fetch_assoc($result);
  $followup['followup'];

  /*For Concern Type Additional Product*/
  $result=mysqli_query($conn,"SELECT count(*) as AdditionalProduct from shakeys_escalation_template_final where concern_type ='Additional Product' AND status = 'QUEUE'");
  /*Execute Query*/
  $AdditionalProduct=mysqli_fetch_assoc($result);
  $AdditionalProduct['AdditionalProduct'];

  /*For Concern Type Missed out Items*/
  $result=mysqli_query($conn,"SELECT count(*) as MissedoutItems from shakeys_escalation_template_final where concern_type ='Missed out Items' AND status = 'QUEUE'");
  /*Execute Query*/
  $MissedoutItems=mysqli_fetch_assoc($result);
  $MissedoutItems['MissedoutItems'];

  /*For Concern Type Cancellation*/
  $result=mysqli_query($conn,"SELECT count(*) as Cancellation from shakeys_escalation_template_final where concern_type ='Cancellation' AND status = 'QUEUE'");
  /*Execute Query*/
  $Cancellation=mysqli_fetch_assoc($result);
  $Cancellation['Cancellation'];

  /*For Concern Type Reject (Product Unavailable,Wrong Routing,Accidentally Accepted)*/
  $result=mysqli_query($conn,"SELECT count(*) as Reject from shakeys_escalation_template_final where concern_type ='Reject' AND status = 'QUEUE'");
  /*Execute Query*/
  $Reject=mysqli_fetch_assoc($result);
  $Reject['Reject'];
?>
