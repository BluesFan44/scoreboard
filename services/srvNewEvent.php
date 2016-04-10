<?php require_once("..//includes/session.php"); ?>
<?php require_once("..//includes/db_connection.php"); ?>
<?php require_once("..//includes/functions.php"); ?>
<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

    if ($_GET['eventid'] && $_GET['team'] && $_GET['round'] && $_GET['score'] ) {
      $eventid = (int) $_GET["eventid"];
      $round = (int) $_GET["round"];
      $score = (int) $_GET["score"];
      $team = (int) $_GET["team"];
      $query  = "update tblSCORES set";
      $query .= "  round{$round}={$score} ";
      $query .= "where eventid = {$eventid} and team = {$team}";
      $result = mysqli_query($connection, $query);
      echo $query . "<br />";
      echo mysqli_affected_rows($connection);
      
      if ($result && mysqli_affected_rows($connection) == 1) {
        // Success
        $_SESSION["message"] = "Page updated.";
        redirect_to("manage_content.php?page={$id}");
      } else {
        // Failure
        $_SESSION["message"] = "Page update failed.";
      }
    }
?>