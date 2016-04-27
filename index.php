<?php $layout_context = "admin"; ?>
<?php include("includes/layouts/header.php");
?>

<div id="main" class="w3-container">
    <?php echo message(); ?>
    <h1 class="w3-xlarge">Welcome!</h1>

    <?php echo event_list(); ?>
    <p><A href="new_event.php" class="w3-btn w3-round-large">Add New Event</a> <A href="scoreboard.php" class="w3-btn w3-round-large">View Scoreboard</a></p>  
    <!--<p><A href="fblogin.php">Facebook Login</a></p>--> 
</div>

<?php include("includes/layouts/footer.php"); ?>