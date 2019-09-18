<!--For SEARCH ITEMS-->
<?php
include("Database/Connection.php");/*Database Connection*/
$db= mysqli_select_db($conn,"shakeys_db");/*Load the Data in Database*/

switch ($_POST['id'])
{
  case 'fsearch':
    $result = mysqli_query($conn,"SELECT * FROM shakeys_escalation_template_final where concern_type ='follow up' AND status = 'QUEUE' AND transaction_number = '".$_POST['textid']."'");
    /*Condition if the Admin Search the user*/
    if(mysqli_num_rows($result) > 0)/*if the user is has a History Display the History*/
    {
      while($row = mysqli_fetch_array($result))  /*retrieving Data from*/
      {
        echo " <div ><li class = 'dlist'><a onclick='sampless(this)' data-toggle='modal' data-target='#myModal' style='cursor: pointer;'>" . $row['transaction_number'] . "</a></li></div>";
      }
    }
  break;

  case 'csearch':
    $result = mysqli_query($conn,"SELECT * FROM shakeys_escalation_template_final where concern_type ='Cancellation' AND status = 'QUEUE' AND transaction_number = '".$_POST['textid']."'");
    /*Condition if the Admin Search the user*/
    if(mysqli_num_rows($result) > 0)/*if the user is has a History Display the History*/
    {
      while($row = mysqli_fetch_array($result))  /*retrieving Data from*/
      {
        echo " <div ><li class = 'dlist'><a onclick='sampless(this)' data-toggle='modal' data-target='#myModal' style='cursor: pointer;'>" . $row['transaction_number'] . "</a></li></div>";
      }
    }
  break;

  case 'asearch':
    $result = mysqli_query($conn,"SELECT * FROM shakeys_escalation_template_final where concern_type ='Additional Product' AND status = 'QUEUE' AND transaction_number = '".$_POST['textid']."'");
    /*Condition if the Admin Search the user*/
    if(mysqli_num_rows($result) > 0)/*if the user is has a History Display the History*/
    {
      while($row = mysqli_fetch_array($result))  /*retrieving Data from*/
      {
        echo " <div ><li class = 'dlist'><a onclick='sampless(this)' data-toggle='modal' data-target='#myModal' style='cursor: pointer;'>" . $row['transaction_number'] . "</a></li></div>";
      }
    }
  break;

  case 'rsearch':
    $result = mysqli_query($conn,"SELECT * FROM shakeys_escalation_template_final where concern_type ='Reject' AND status = 'QUEUE' AND transaction_number = '".$_POST['textid']."'");
    /*Condition if the Admin Search the user*/
    if(mysqli_num_rows($result) > 0)/*if the user is has a History Display the History*/
    {
      while($row = mysqli_fetch_array($result))  /*retrieving Data from*/
      {
        echo " <div ><li class = 'dlist'><a onclick='sampless(this)' data-toggle='modal' data-target='#myModal' style='cursor: pointer;'>" . $row['transaction_number'] . "</a></li></div>";
      }
    }
  break;

  case 'msearch':
    $result = mysqli_query($conn,"SELECT * FROM shakeys_escalation_template_final where concern_type ='Missed out Items' AND status = 'QUEUE' AND transaction_number = '".$_POST['textid']."'");
    /*Condition if the Admin Search the user*/
    if(mysqli_num_rows($result) > 0)/*if the user is has a History Display the History*/
    {
      while($row = mysqli_fetch_array($result))  /*retrieving Data from*/
      {
        echo " <div ><li class = 'dlist'><a onclick='sampless(this)' data-toggle='modal' data-target='#myModal' style='cursor: pointer;'>" . $row['transaction_number'] . "</a></li></div>";
      }
    }
  break;

  case 'psearch':
    $result = mysqli_query($conn,"SELECT * FROM shakeys_escalation_template_final where status = 'ACKNOWLEDGE' AND order_id = '".$_POST['textid']."'");
    /*Condition if the Admin Search the user*/
    if(mysqli_num_rows($result) > 0)/*if the user is has a History Display the History*/
    {
      while($row = mysqli_fetch_array($result))  /*retrieving Data from*/
      {
          echo " <div ><li class = 'dlist'><a onclick='sampless(this)' data-toggle='modal' data-target='#myModal' style='cursor: pointer;'>" . $row['transaction_number'] . "</a></li></div>";
      }
    }
  break;

  default:
  // code...
  break;
}
?>
