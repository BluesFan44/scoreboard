  <?php if ($layout_context == "admin") { ?>
<div id="footer" class="w3-container w3-indigo w3-center"><p class="w3-text-shadow w3-font">Copyright <?php echo date("Y"); ?>, The Trivia Night Guy</p></div>
<?php } ?>
	</body>
</html>
<?php
  // 5. Close database connection
	if (isset($connection)) {
	  mysqli_close($connection);
	}
?>
