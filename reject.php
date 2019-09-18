<!--For Selecting the Items in REJECT LIST-->

<script type="text/javascript">
function sampless(id)
{
  /*PASSING JS Variable to PHP Variable*/
  var var_data = id.innerHTML;
        $.ajax({
          url: 'process.php',
          type: 'GET',
          data: { var_PHP_data: var_data},
          success: function(data) {
            $('#result').html(data);
          },
        });
}

</script>
<?php
include("Database/Connection.php");/*Database Connection*/
  $db= mysqli_select_db($conn,"shakeys_db");

  $result = mysqli_query($conn,"SELECT transaction_number, TIME(date_endorsed) as date_endorsed FROM shakeys_escalation_template_final where concern_type LIKE 'Reject%' AND status = 'QUEUE' ORDER BY date_endorsed ASC");
  while($row = mysqli_fetch_array($result))
  {
    echo "<div > <li class = 'dlist'><a  onclick='sampless(this)' data-toggle='modal' data-target='#myModal' style='cursor: pointer;'>" . $row['transaction_number'] . "</a></li></div>";
  }
?>
