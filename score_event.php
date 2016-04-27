<?php require_once("includes/validation_functions.php"); ?>
<?php $layout_context = "admin" ?>
<?php include("includes/layouts/header.php"); ?>
<?php get_selected_round(); ?>
<script src="scripts/scripts.js" type="text/javascript"></script>
<script>
    $(function () {
        $(".jqradio").buttonset();
    });
</script>
<input type="hidden" id="currentEvent" value="<?= $current_event["eventID"] ?>" />
<input type="hidden" id="currentRound" value="<?= $current_round_int ?>" />
<div id="main">

    <div id="page">
        <?php echo message(); ?>
        <?php echo form_errors($errors); ?>
        <h2 class="w3-center"><?= $current_event["eventTitle"] ?></h2>

        <form action="score_event.php" method="post">
            <?php echo make_scoregrid(); ?>
        </form>
        <p class="w3-center"><a href="index.php">Top Menu</a></p>
    </div>
</div>

<?php include("/includes/layouts/footer.php"); ?>