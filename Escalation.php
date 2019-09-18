<?php include("Menu.php"); ?>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="style.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script type="text/javascript">
      $(document).ready(function()
      {
        $('#Eaddress').hide();
        $('#ModeOfPayment').hide();
      });

      $(document).on('click', '#insert', function()
      {
        if (!$("input[name='radio']:checked").val())
        {
          alert('Nothing is checked!');
        }
        else
        {
          var transactype = $("input[name='radio']:checked").val();
          var idorder = $('#transacID').val();/*getting the value of Order ID*/
          var Nguest = $('#NameGuest').val();/*getting the value of Concern Type*/
          var Emailadd = $('#Eaddress').val();/*getting the value of Message*/
          var storename = $('#SName').val();/*getting the value of Order ID*/
          var contactnumber = $('#Cnumber').val();/*getting the value of Concern Type*/
          var Mpayment = $('#ModeOfPayment').val();/*getting the value of Message*/
          var messages = $('#message').val();/*getting the value of Message*/
          var concerntype = $('#ctype').val();
          var radiovalue = $("input[name='radio']:checked").val();
          if(radiovalue == "Voice/Socmed")
          {
            $.ajax({
            url:"insert.php",
            method:"POST",
            data:{transactypes:transactype,
                  idorders:idorder,
                  Nguests:Nguest,
                  Emailadds:Emailadd,
                  storenames:storename,
                  contactnumbers:contactnumber,
                  Mpayments:Mpayment,
                  messagess:messages,
                  concerntypes:concerntype}, /*passsing the variable to insert.php*/
            success:function(data)
            {
              clearallfields();
            }
            })
          }
          else if(radiovalue == "online")
          {

            $.ajax({
            url:"insert.php",
            method:"POST",
            data:{transactypes:transactype,
                  idorders:idorder,
                  Nguests:Nguest,
                  Emailadds:Emailadd,
                  storenames:storename,
                  contactnumbers:contactnumber,
                  Mpayments:Mpayment,
                  messagess:messages,
                  concerntypes:concerntype}, /*passsing the variable to insert.php*/
            success:function(data)
            {
              clearallfields();
            }
            })
          }

        }
      });

      function clearallfields()
      {
        $('#transacID').val("");
        $('#NameGuest').val("");
        $('#Eaddress').val("");
        $('#SName').val("");
        $('#Cnumber').val("");
        $('#ModeOfPayment').val("--  Mode Of Payment --");
        $('#Sname').val("");
        $('#message').val("");
        $('#ctype').val("-- Concern type --");
      }
      $(document).on('click', '#online,#Voicesocmed', function()
      {
        var radioID  = $(this).attr("id");
        if(radioID == "online")
        {
          $('#Eaddress').show();
          $('#ModeOfPayment').show();
          clearallfields();

        }
        else if(radioID == "Voicesocmed")
        {
          $('#Eaddress').hide();
          $('#ModeOfPayment').hide();
          clearallfields();
        }
      });
    </script>
  </head>
  <body>
    <p class="header">ESCALATE AN ORDER</P>
    <div class="logins">
      <label class="container">Voice/Socmed
        <input type="radio" id="Voicesocmed" checked="checked" name="radio" value="Voice/Socmed">
        <span class="checkmark"></span>
      </label>
      <label class="container">Online
        <input type="radio" id="online" name="radio" value="online">
        <span class="checkmark"></span>
      </label>
      <!-- Form for Voice and Socmed-->
      <form method="POST">
        <input type="text" id="transacID" name ="orderid" placeholder="Transaction Number" required>
        <input type="text" id="NameGuest" name ="orderid" placeholder="Name of the Guest" required>
        <input type="text" id="Eaddress" name ="orderid" placeholder="Email Address" required>
        <input type="text" id="Cnumber" name ="orderid" placeholder="Contact Number" required>
        <select name="Mode Of Payment" id="ModeOfPayment">
          <option value="N/A">--  Mode Of Payment --</option>
          <option value="Cash">Cash</option>
          <option value="Exact Cash">Exact Cash</option>
          <option value="Credit Card / Master">Credit Card / Master</option>
          <option value="Credit Card / Visa">Credit Card / Visa</option>
          <option value="GC / Sodoxe Premium Pass">GC / Sodoxe Premium Pass</option>
          <option value="GC / Complementary GC">GC / Complementary GC</option>
          <option value="Debit Card / BDO">Debit Card / BDO</option>
          <option value="Online Payment / Paymaya">Online Payment / Paymaya</option>
        </select>
        <input type="text" id="SName" name ="orderid" placeholder="Store Name" required>
        <select name="ctype" id="ctype">
          <option value="N/A">-- Concern type --</option>
          <option value="Follow up">Follow up</option>
          <option value="Additional Product">Additional Product</option>
          <option value="Missed out Items">Missed out Items</option>
          <option value="Cancellation">Cancellation</option>
          <option value="Reject - Product Unavailable">Reject - Product Unavailable</option>
          <option value="Reject - Wrong Routing">Reject - Wrong Routing</option>
          <option value="Reject - Accidentally Accepted">Reject - Accidentally Accepted</option>
        </select>
          <textarea id="message" rows="8" cols="80"style="max-width:20%;max-height:20%;width: 100%;min-width:100%;min-height:5%;"></textarea>
        <input class="submits" id= "insert" name = "insert" type="submit" value="Send Message">
       </form>


     </div>
   </body>
</html>
