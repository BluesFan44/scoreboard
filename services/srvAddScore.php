<?php require_once("..//includes/session.php"); ?>
<?php require_once("..//includes/db_connection.php"); ?>
<?php require_once("..//includes/functions.php"); ?>
<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

    if ($_GET['event'] && $_GET['team'] && $_GET['round'] && (isset($_GET['score'])) ) {
      $eventid = (int) $_GET["event"];
      $round = $_GET['round'];
      $score = (int) $_GET["score"];
      $team = (int) $_GET["team"];
      if ($score == -1) {
        $query  = "update tblscores set";
        $query .= "  round{$round}=null, isplaying=false ";
        $query .= "where eventid = {$eventid} and team = {$team}";
      }
      else {
      $query  = "update tblscores set";
      $query .= "  round{$round}={$score}, isplaying=true ";
      $query .= "where eventid = {$eventid} and team = {$team}";
      }
      $result_set = mysqli_query($connection, $query);
      confirm_query($result_set, $query);
      $total = get_team_totals($round);
      $out = array();
      while ($row = mysqli_fetch_assoc($total)) {
        $out[] = $row;
      }
    echo json_encode($out);
    }
?>