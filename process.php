<script>
$(document).on('click', '#acknowledge', function()
{
var id = "<?php echo $_GET['var_PHP_data']; ?>";
$.ajax({
    url:"updatestatus.php",
    method:"POST",
    data:{orderid:id},/* passsing the variable to insert.php*/
    success:function(data)
    {
    }
  })
});
</script>
<?php


include("Database/Connection.php");/*Database Connection*/
  $db= mysqli_select_db($conn,"shakeys_db");
  /*Getting the Variable; var_PHP_data is from the Officer.php*/
  /*SELECT Query in Database*/
  $query = mysqli_query($conn,"SELECT concern_type,transaction_type,transaction_number,guest_name,email_address,contact_number,
    mode_of_payment,
    store_name,
    concern,
    agent_id,status ,DATE(date_endorsed) as date_endorsed FROM shakeys_escalation_template_final WHERE transaction_number = '".$_GET['var_PHP_data']."'");
      /*Execute Query*/
      $rows = mysqli_num_rows($query);
  if($rows == 1)
  {       /*Retrieving Data From Database*/
    while($rows = mysqli_fetch_assoc($query))
    {
      $concern_type = $rows["concern_type"];
      $transaction_type = $rows["transaction_type"];
      $transaction_number = $rows["transaction_number"];
      $guest_name = $rows["guest_name"];
      $email_address = $rows["email_address"];
      $contact_number = $rows["contact_number"];
      $mode_of_payment = $rows["mode_of_payment"];
      $store_name = $rows["store_name"];
      $concern = $rows["concern"];
      $agent_id = $rows["agent_id"];
      $status = $rows["status"];
      $date_endorsed = $rows["date_endorsed"];
    }
  }
    echo '<form action="" method="POST">
            <label style="margin-right:5;" class="tag">Transaction Type :</label>
            <label style="margin-right:5;" class="tag">'.$transaction_type.'</label>
            <br>

            <label style="margin-right:5;" class="tag">Transaction Number</label>
            <input class= "txtof" style="height:3%;width:20%;background-color: rgb(255, 246, 206);" type="text" value ="'.$transaction_type.'">

            <label style="margin-left:20px;margin-right:15px;" class="tag">Name of Guest</label>
            <input class= "txtof" style="height:3%;width:35%;background-color: rgb(255, 246, 206);" type="text" value ="'.$guest_name.'">

            <label style="margin-right:37px;" class="tag">Email Address</label>
            <input class= "txtof" style="height:3%;width:20%;background-color: rgb(255, 246, 206);" type="text" value ="'.$email_address.'">

            <label style="margin-left:20px;margin-right:5px;" class="tag">Contact Number</label>
            <input class= "txtof" style="height:3%;width:35%;background-color: rgb(255, 246, 206);" type="text" value ="'.$contact_number.'">

            <label style="margin-right:22px;" class="tag">Mode of Payment</label>
            <input class= "txtof" style="height:3%;width:35%;background-color: rgb(255, 246, 206);" type="text" value ="'.$mode_of_payment.'">


            <label style="margin-left:10px;margin-right:5px;" class="tag">Store Name</label>
            <input class= "txtof" style="height:3%;width:26%;background-color: rgb(255, 246, 206);" type="text" value ="'.$store_name.'">

            <label style="margin-right:45px;" class="tag">Concern Type</label>
            <input class= "txtof" style="height:3%;width:20%;background-color: rgb(255, 246, 206);" type="text" value ="'.$concern_type.'">

            <div style="padding-top:10px;">
              <label class="tag">Order Details</label>
              <textarea class= "area" rows="4" cols="50" name="comment" style="background-color: rgb(255, 246, 206);max-width:100%;max-height:15%;width: 100%;min-width:100%;min-height:5%;">'.$concern.'</textarea>
            </div>

            <div style="padding-top:10px;padding-bottom:50px;">
              <label class="tag" style="margin-right:5px;">Agent ID</label>
              <input class= "txtof" style="height:3%;width:20%;margin-right:5px;background-color: rgb(255, 246, 206);" type="text" value ="'.$agent_id.'">
              <label class="tag" style="margin-right:5px;">Date Endorsed</label>
              <input class= "txtof" style="height:3%;width:20%;margin-right:5px;background-color: rgb(255, 246, 206);" type="text" value ="'.$date_endorsed.'">
              <label class="tag" style="margin-right:5px;">Status</label>
              <input class= "txtof" style="height:3%;width:20%;margin-right:5px;background-color: rgb(255, 246, 206);" type="text" value ="'.$status.'">
            </div>

            <div class="modal-footer">
              <input type="submit" id="acknowledge" class="btn btn-default" style="background-color:#2b75ff;color:white;" value="Acknowledge Order No:#">
            </div>
          </form>';
//  $conn->close();
?>
