<?php
include("/includes/layouts/header.php");
?>

<script src="scripts/scripts.js" type="text/javascript"></script>

<div id="main">
    <?php echo message(); ?>
    <div style="text-align: center" id="scoreboard" ></div>
    
</div>
<?php include("/includes/layouts/footer.php"); ?>
<script>
    $.get("services/srvGetScores.php", function (data) {
            $("#scoreboard").html(data);
        });
    setInterval(function () {
        $.get("services/srvGetScores.php", function (data) {
            $("#scoreboard").html(data);
        });
    }, 10000);
</script>