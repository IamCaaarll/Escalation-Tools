<html>
  <head>
    <title></title>
    <link rel="stylesheet" href="style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script>
      $(document).on('click', '#login', function()
      {
        var username = $('#username').val();/*getting the value of id number*/
        var password = $('#password').val();
        var atype = $('#atype').val();
          if(username == '' && password =='' )  /*if the id is null*/
          {
            alert("Enter ID Number");
            return false;
          }
          else
          {
            /*Insert the information of user*/
            $.ajax({
            url:"loginserv.php",
            method:"POST",
            data:{username:username,password:password,atype:atype}, /*passsing the variable to insert.php*/
            success:function(data)
            {
              var str = data;
              var n = str.includes(".php");
                if (n)
                {
                  window.location = data;
                }
                else
                {
                  alert(data);
                }
            }
            })
            return false;
          }
      });
    </script>
  </head>
  <body>
    <p class="header">Agent Escalation Tool</p>
    <div class="logins">
      <form method="POST">
        <label class="label" >Username:</label>
        <input type="text" id="username" name ="username" placeholder="Please Enter your Username Here" required>
        <label class="label">Password:</label>
        <input type="password" style=" text-align: center;width: 100%; padding: 12px 20px;margin: 8px 0;display: inline-block;border: 1px solid #ccc;border-radius: 10px;box-sizing: border-box;" id="password" name ="password" placeholder="Please Enter your Password Here" required>
        <label class="label" >Select Agent Type (select one):</label>
        <select id="atype" name ="atype">
          <option value="Agent">Agent</option>
          <option value="Escallation Officer">Escallation Officer</option>
        </select>
        <input class = "submits" id ="login" type="submit" value="Submit">
      </form>
    </div>
  </body>
</html>
