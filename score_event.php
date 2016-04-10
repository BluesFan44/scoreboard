<?php require_once("/includes/validation_functions.php"); ?>
<?php $layout_context = "admin"?>


<?php include("/includes/layouts/header.php"); ?>
<?php get_selected_round(); ?>
<script src="scripts/scripts.js" type="text/javascript"></script>
<script>
  $(function() {
    $( ".jqradio" ).buttonset();
  });
  </script>
<input type="hidden" id="currentEvent" value="<?=$current_event["eventID"]?>" />
<input type="hidden" id="currentRound" value="<?=$current_round?>" />
<div id="main">
  
  <div id="page">
    <?php echo message(); ?>
    <?php echo form_errors($errors); ?>
    <h2><?= $current_event["eventTitle"] ?></h2>
      <?php if ($current_round < 10) {?>
      <p><a href="score_event.php?event=<?=$current_event["eventID"]?>&round=<?=$current_round+1?>">Round <?=$current_round+1?></a></p>
    <?php } 
      if ($current_round > 1) { ?>
      <p><a href="score_event.php?event=<?=$current_event["eventID"]?>&round=<?=$current_round-1?>">Round <?=$current_round-1?></a></p>
    <?php } ?>
    <form action="score_event.php" method="post" class="centre">
     <?php echo make_scoregrid($current_event["teams"], $current_roundset); ?>
    </form>
    

    <p><a href="index.php">Top Menu</a></p>
  </div>
</div>

<?php  include("/includes/layouts/footer.php"); ?>
