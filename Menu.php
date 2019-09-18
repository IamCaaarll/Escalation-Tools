<?php
  /*For Menu in Navbar*/
  session_start();
  echo '<script>window.parent.document.getElementById("lmenu").innerHTML = "'.$_SESSION['aname'].'";</script>';
?>
