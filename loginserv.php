<?php
  /*DATABASE CONNECION*/
  include("Database/Connection.php");/*Database Connection*/
  $db= mysqli_select_db($conn,"asterisk");
  session_start();
  // if(isset($_SESSION['username']) && isset($_SESSION['password']) && isset($_SESSION['atype']))
  // {
  //   if($_SESSION['atype'] == "Agent")
  //   {
  //     echo "<script type=\"text/javascript\"> window.parent.$('#nuser').attr('src',Escalation.php); </script>";
  //     // header("location: Escalation.php");
  //   }
  //   else if($_SESSION['atype'] == "Escallation Officer")
  //   {
  //     echo "<script type=\"text/javascript\"> window.parent.$('#nuser').attr('src',officer.php)</script>";
  //     // header("location: officer.php");
  //   }
  //   exit();
  // }
  $query = mysqli_query($conn,"SELECT full_name FROM vicidial_users WHERE user LIKE '".$_POST['username']."' AND pass LIKE '".$_POST['password']."' AND user_group LIKE 'Shakeys'");/*Select Query*/
  $rows = mysqli_num_rows($query);/*Return the number of rows in a result set*/
    if($rows >= 1)
    {
      while($rows = mysqli_fetch_assoc($query))/*Fetch a result row as an associative array*/
      {
          if($_POST['atype'] == "Agent")
          {
            /*If the user is Agent lOAD the Agent Page*/
            /*INSERTING Data in SESSION*/
            $_SESSION['aname'] = $rows["full_name"];
            /*LOAD Escallation an Order Page*/
            echo "Escalation.php";
          }
          else if($_POST['atype'] == "Escallation Officer")
          {
            /*If the user is Escallation Officer lOAD the Escallation Officer Page*/
            /*INSERTING Data in SESSION*/
            $_SESSION['aname'] = $rows["full_name"];
            /*LOAD Escallation an Order Page*/
            echo "Officer.php";
          }
      }
    }
    else
    {
      echo "Invalid credentials";
    }
  mysqli_close($conn);/*Database Connection Close*/
exit();
?>
