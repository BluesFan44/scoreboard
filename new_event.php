<?php include("includes/layouts/header.php");  
require_once("includes/validation_functions.php");

if (isset($_POST['submit'])) {
// include("includes/layouts/header.php");
  // Process the form
  
  // validations
  $required_fields = array( "teams", "rounds");
  validate_presences($required_fields);
  
  $fields_with_max_lengths = array("event_title" => 30);
  validate_max_lengths($fields_with_max_lengths);
  
  if (empty($errors)) {
    // Perform Create

    $event_title = mysql_prep($_POST["event_title"]);
    $teams = (int) $_POST["teams"];
    $rounds = (int) $_POST["rounds"];
  
    $query  = "INSERT INTO tblevents (";
    $query .= "  eventTitle, rounds, teams";
    $query .= ") VALUES (";
    $query .= "  '{$event_title}', {$rounds}, {$teams}";
    $query .= ")";
    $result = mysqli_query($connection, $query);
    $event_id = find_newest_event_id();
    for ($i = 1; $i <= $teams; $i++) {
      $query  = "INSERT INTO tblscores (";
      $query .= "  eventID, team";
      $query .= ") VALUES (";
      $query .= "  {$event_id}, {$i}";
      $query .= ")";
      $result = mysqli_query($connection, $query);
    }
    
    if ($result) {
      // Success
      $_SESSION["message"] = "Event {$event_title} created.";
      redirect_to("index.php?event=" . $event_id) . "&round=1";
    } else {
      // Failure
      $_SESSION["message"] = "Event creation failed.";
    }
  }
} else {
  // This is probably a GET request
  
} // end: if (isset($_POST['submit']))

?>

<div id="main">

  <div id="page">
    <?php echo message(); ?>
    <?php echo form_errors($errors); ?>
    
    <h2>Create New Event</h2>
    <form action="new_event.php" method="post">
      <p>Event name:
        <input type="text" name="event_title" value="" />
      </p>
      <p>Number of Tables:
        <input type="input" name="teams" value="20" />
      </p>
      <p>Number of Rounds:
        <input type="input" name="rounds" value="10" />
      </p>
      <input type="submit" name="submit" value="Create Event" />
    </form>
    <br />
    <a href="index.php">Cancel</a>
  </div>
</div>

<?php include("/includes/layouts/footer.php"); ?>
