<?php
  function logoutFunction()
  {
    session_start();
    /*Removing data in SESSION*/
    unset($_SESSION['username']);
    unset($_SESSION['password']);
    unset($_SESSION['atype']);
    session_destroy();
    header("Location: index.php");
    exit();
  }
  return logoutFunction();
?>
