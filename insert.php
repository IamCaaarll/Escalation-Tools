<?php
include("Database/Connection.php");/*Database Connection*/
    $db= mysqli_select_db($conn,"shakeys_db");
    session_start();
    /*Inserting Data*/
    /*passing data to variables*/
    $sql = "INSERT INTO shakeys_escalation_template_final(concern_type,
      transaction_type,
      transaction_number,
      guest_name,
      email_address,
      contact_number,
      mode_of_payment,
      store_name,
      concern,
      agent_id,
      status)
      VALUES
      ('".$_POST['concerntypes']."',
      '".$_POST['transactypes']."',
      '".$_POST['idorders']."',
      '".$_POST['Nguests']."',
      '".$_POST['Emailadds']."',
      '".$_POST['contactnumbers']."',
      '".$_POST['Mpayments']."',
      '".$_POST['storenames']."',
      '".$_POST['messagess']."',
      '".$_SESSION['aname']."',
      'QUEUE')";
    /*Checking if the data is Inserted */
    if ($conn->query($sql) === TRUE)/*Execute Query*/
    {
      /*If the Query Success*/
      echo "Success";
    }
    else
    {
      /*If the Query Failed*/
        echo "Not Success";
    }
  $conn->close();/*Connection Close*/

 ?>
