<html>
  <head>
    <meta charset="utf-8">
    <title>Agent Escalation Tool</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </head>
  <body>
    <nav class="navbar navbar-inverse" style="background-color:whitesmoke;border:none;">
      <div class="container-fluid">
        <div class="navbar-header">
          <img height="75px" style="padding-left:5px;" src="src/GICFlogo.png" alt="GICFlogo">
        </div>
        <ul class="nav navbar-nav" style="float:right;margin-right:100px;">
          <li class="dropdown"><a class="dropdown-toggle" id ="lmenu"data-toggle="dropdown" style="cursor:pointer" >...<span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a style="cursor:pointer" href="logout.php">Logout</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
    <div>
      <iframe class="sample" id="nuser" src="login.php" frameborder="1"></iframe>
    </div>
  </body>
</html>
