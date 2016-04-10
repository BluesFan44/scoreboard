<?php
include("/includes/layouts/header.php");
?>

<script src="scripts/scripts.js" type="text/javascript"></script>

<div id="main">


    <?php echo message(); ?>
    <div id="scoreboard" > </table>
  
</div>
<?php include("/includes/layouts/footer.php"); ?>
<script>
  setInterval(function () {
    $.get("services/srvGetScores.php", function (data) {
      $("#scoreboard").html(data);
    });
  }, 1000);
</script>