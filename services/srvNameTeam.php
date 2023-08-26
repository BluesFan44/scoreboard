<?php require_once("..//includes/session.php"); ?>
<?php require_once("..//includes/db_connection.php"); ?>
<?php require_once("..//includes/functions.php"); ?>
<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
    if ($_GET['eventid'] && $_GET['team'] && $_GET['teamName']  ) {
      $eventid = (int) $_GET["eventid"];
      $teamName = $_GET["teamName"];
      $team = (int) $_GET["team"];
      $query  = "update tblteamnames set ";
      $query .= "teamName = '{$teamName }' ";
      $query .= "where eventid = {$eventid} and teamID = {$team}";
      $result = mysqli_query($connection, $query);
      if (mysqli_affected_rows($connection) == 1) {
          echo $team;
      }
    }
    else {
      echo "";
    }
?>

