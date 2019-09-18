<!-- For the Escalation Officer -->
<?php
  include("Database/Connection.php");/*Database Connection*/
  $db= mysqli_select_db($conn,"shakeys_db");/*Load the Data in Database*/
  include("Menu.php");/*Menu for Navbar*/
?>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="styleof.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script type="text/javascript">
        var ref,refcount; /*variables for the Timer in refreshing*/
      $(document).ready(function()
      {
        /*For Displaying the List of Order ID*/
        $('#follows').load('Followup.php');/*Load the list of Follow up*/
        $('#cancellist').load('cancel.php');/*Load the list of Cancel*/
        $('#addlist').load('addproduct.php');/*Load the list of Additional Product*/
        $('#rejectlist').load('reject.php');/*Load the list of Reject*/
        $('#misslist').load('missitem.php');/*Load the list of Missed Items*/
        $('#proclist').load('processed.php');/*Load the list of processed*/

        /*For Displaying the Count of Order ID*/
        $('#followcount').load('followupcount.php');/*Load the Count of Follow up*/
        $('#cancelcount').load('cancelcount.php');/*Load the Count of Cancel*/
        $('#addcount').load('addproductcount.php');/*Load the Count of Additional Product*/
        $('#rejectcount').load('rejectcount.php');/*Load the Count of Reject*/
        $('#misscount').load('missitemcount.php');/*Load the Count of Missed Items*/
        $('#processedcount').load('processedcount.php');/*Load the Count of processed*/

          /*Check if the text in search bar is Null*/
        $('#followsearch,#cancelsearch,#addsearch,#rejectsearch,#misssearch,#procsearch').keyup(function(){
          var search = $(this).val();/*pass the value of textbox to the variable*/
              /*Condition for the Textbox*/
            if(search != '')
            {
              clearTimeout(ref);  /*Clear the Timer of the function of refresh() */
              clearTimeout(refcount);/*Clear the Timer of the function of refreshcount() */
            }
            else
            {
              refresh(); /*Function for Refreshing the list*/
              refreshcount();/*Function for refreshing the count of the list*/
            }
        });
        refresh(); /*Function for Refreshing the list*/
        refreshcount();/*Function for refreshing the count of the list*/
      });
        /*For the Search bar*/
      $(document).on('click','#fsearch,#csearch,#asearch,#rsearch,#msearch,#psearch',function()
      {
        /*PASSING JS Variable to PHP Variable*/
        var btnid  = $(this).attr("id");
        var txtid = ""; /*Variable Container for search bar */
          /*Condition for the the Passing of Search bar value to the variables*/
        switch (btnid)
        {
          case 'fsearch':/*FOLLOW UP button*/
            txtid = $("#followsearch").val();/*pass the value of FOLLOW UP Searchbar to the variable*/
          break;

          case 'csearch':/*CANCELLED button*/
            txtid = $("#cancelsearch").val();/*pass the value of CANCELLED Searchbar to the variable*/
          break;

          case 'asearch':/*ADDITIONAL PRODUCT button*/
            txtid = $("#addsearch").val();/*pass the value of ADDITIONAL PRODUCT Searchbar to the variable*/
          break;

          case 'rsearch':/*REJECTED button*/
            txtid = $("#rejectsearch").val();/*pass the value of REJECTED Searchbar to the variable*/
          break;

          case 'msearch':/*Missed OUT ITEMS button*/
            txtid = $("#misssearch").val();/*pass the value of Missed OUT ITEMS Searchbar to the variable*/
          break;

          case 'psearch':/*PROCESSED button*/
            txtid = $("#procsearch").val();/*pass the value of PROCESSED Searchbar to the variable*/
          break;

          default:
            /*dEFAULT*/
          break;
        }

        $.ajax({
          url: 'Search.php',
          method: 'POST',
          data:{id:btnid,textid:txtid},
          success:function(data)
          {
            /*For DIsplaying the Searched Item*/
            switch (btnid)
            {
                /*If the user search in FOLLOW UP*/
              case 'fsearch':
                $('#follows').html(data);  /*Display the Searched Item in FOLLOW UP list*/
              break;
                /*If the user search in CANCELLED*/
              case 'csearch':
                $('#cancellist').html(data);  /*Display the Searched Item in CANCELLED list*/
              break;
                  /*If the user search in ADDITIONAL PRODUCT*/
              case 'asearch':
                $('#addlist').html(data);  /*Display the Searched Item in ADDITIONAL PRODUCT list*/
              break;
                  /*If the user search in REJECT*/
              case 'rsearch':
                $('#rejectlist').html(data);  /*Display the Searched Item in REJECT list*/
              break;
                  /*If the user search in MISSED OUT ITEMS*/
              case 'msearch':
                $('#misslist').html(data);  /*Display the Searched Item in MISSED OUT ITEMS list*/
              break;
                  /*If the user search in PROCESSED*/
              case 'psearch':
                $('#proclist').html(data);  /*Display the Searched Item in PROCESSED list*/
              break;

              default:
                /*dEFAULT*/
              break;
            }
          }
        })
      });
        /*For Refreshing the List every 1 seconds*/
      function refresh()
      {
        ref = setTimeout(function()
        {
          $('#follows').load('Followup.php');/*Refresh the list of Follow up*/
          $('#cancellist').load('cancel.php');/*Refresh the list of Cancel*/
          $('#addlist').load('addproduct.php');/*Refresh the list of Additional Product*/
          $('#rejectlist').load('reject.php');/*Refresh the list of Reject*/
          $('#misslist').load('missitem.php');/*Refresh the list of Missed Items*/
          $('#proclist').load('processed.php');/*Refresh the list of processed*/
          refresh();
        },1000);
      }

      /*For Refreshing the List every 1 seconds*/
      function refreshcount()
      {
        refcount = setTimeout(function()
        {
          $('#followcount').load('followupcount.php');/*Refresh the Count of Follow up*/
          $('#cancelcount').load('cancelcount.php');/*Refresh the Count of Cancel*/
          $('#addcount').load('addproductcount.php');/*Refresh the Count of Additional Product*/
          $('#rejectcount').load('rejectcount.php');/*Refresh the Count of Reject*/
          $('#misscount').load('missitemcount.php');/*Refresh the Count of Missed Items*/
          $('#processedcount').load('processedcount.php');/*Load the Count of processed*/
          refreshcount();
        },1000);
      }

    </script>
  </head>
  <body>
    <ul class="nav">
      <div class="overflow" >
        <div class="Followup" style="background-color:#4CAF50;">
          <div class = "inlines">
            <label class = "name">FOLLOW UP</label>
            <label class="backcolor" id = "followcount"></label>
          </div>
          <input class= "txtof" id="followsearch" type="text" placeholder="Search for Order...">
          <input class = "submits" id = "fsearch"type="submit" value="Go!">
        </div>
        <div id="follows" >

        </div>
      </div>
      <div class="overflow" >
        <div class="Followup" style="background-color:#F44336;">
          <div class = "inlines">
            <label class = "name">CANCELLED</label>
            <label class="backcolor" id="cancelcount"></label>
          </div>
          <input class= "txtof" id="cancelsearch" type="text" placeholder="Search for Order...">
          <input  class = "submits" id="csearch" type="submit" value="Go!">
        </div>
        <div id="cancellist">
        </div>
      </div>
      <div class="overflow" >
        <div class="Followup" style="background-color:#3498db;">
          <div class = "inlines">
            <label class = "name">ADDITIONAL PRODUCT</label>
            <label class="backcolor" id="addcount"></label>
          </div>
          <input class= "txtof" id="addsearch" type="text" placeholder="Search for Order...">
          <input  class = "submits" id="asearch" type="submit" value="Go!">
        </div>
        <div id="addlist">
        </div>
      </div>
      <div class="overflow" >
        <div class="Processed" style="background-color:#00BCD4;">
          <div class = "inlines">
            <label class = "name">PROCESSED</label>
            <label class="backcolor" id="processedcount" ></label>
          </div>
          <input class= "txtof" id="procsearch" type="text" placeholder="Search for Order...">
          <input class = "submits" id="psearch" type="submit" value="Go!">
        </div>
        <div id = "proclist">
        </div>
      </div>
      <div class="overflow" >
        <div class="Followup" style="background-color:#E0E0E0;">
          <div class = "inlines">
            <label class = "name">REJECTED</label>
            <label class="backcolor"id="rejectcount"></label>
          </div>
          <input class= "txtof" id="rejectsearch" type="text" placeholder="Search for Order...">
          <input  class = "submits" id="rsearch" type="submit" value="Go!">
        </div>
        <div id="rejectlist">
        </div>
      </div>
      <div class="overflow" >
        <div class="Followup" style="background-color:#ff6b81" >
          <div class = "inlines">
            <label class = "name" id = "asdf">MISSED OUT ITEMS</label>
            <label class="backcolor" id="misscount"></label>
          </div>
          <input class= "txtof" id="misssearch" type="text" placeholder="Search for Order...">
          <input  class = "submits" id="msearch" type="submit" value="Go!">
        </div>
        <div id="misslist">
        </div>
      </div>
    </ul>
    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
      <div class="modal-dialog">
        <!-- Modal content  -->
        <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h5 class="modal-title">Escallation Details</h5>
        </div>
        <div class="modal-body">
          <div class ="login" style="padding:5px;">
            <div id="result"></div>
          </div>
        </div>
        </div>
      </div>
    </div>
  </body>
</html>
