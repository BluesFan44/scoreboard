<?php
$layout_context = "admin";
     include("includes/layouts/header.php");?>
?>

<div id="main">
  <div id="navigation">
    &nbsp;
  </div>
  <div id="page">
<?php echo message(); ?>
    <h2>Admin User List Menu</h2>
    <p><?= admin_list(); ?> </p>
    <ul>
      <li><a href="new_admin.php">Add Admin User</a></li>
      <li><a href="admin.php">Cancel</a></li>
    </ul>

    </div>
  </div>
</div>

<?php include("/includes/layouts/footer.php"); ?>
