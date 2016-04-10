<?php $layout_context = "admin"; ?>
<?php include("/includes/layouts/header.php");
?>

<div id="main">
  <div id="page">
    <?php echo message(); ?>
        <p>Welcome!</p>
        
		<?php echo event_list(); ?>
        <p><A href="scoreboard.php">View Scoreboard</a></p>  
        <p><A href="fblogin.php">Facebook Login</a></p>  
  </div>
    
</div>

<?php include("/includes/layouts/footer.php"); ?>