<?php require_once("..//includes/session.php"); ?>
<?php require_once("..//includes/db_connection.php"); ?>
<?php require_once("..//includes/functions.php"); ?>
<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$query = "select * from vwplayingscoreboard";
$result = mysqli_query($connection, $query);
$i = 1;
$returnHTML = '<table class="scoreboard"><tr><th>Tbl</th><th>1</th><th>2</th><th>3</th><th>4</th><th>5</th><th>6</th><th>7</th><th>8</th><th>9</th><th>10</th><th>Total</th><th>Rank</th></tr>';
while (($r = mysqli_fetch_assoc($result))) {
  if ($r['isPlaying']) {
  $returnHTML .= '<tr><td>' . $r['Team'] . '</td><td>' . $r['1'] . '</td><td>' . $r['2'] . '</td><td>' . $r['3'] . '</td><td>' . $r['4'] . '</td>'
      . '<td>' . $r['5'] . '</td><td>' . $r['6'] . '</td><td>' . $r['7'] . '</td><td>' . $r['8'] . '</td><td>' . $r['9'] . '</td><td>' . $r['10'] 
      . '</td><td>' . $r['Total'] . '</td><td>' . $r['place'] . '</td>'
      . '</tr>';
  }
  else {
   // $returnHTML .= '<tr><td>' . $r['Team'] . '</td><td colspan=12>&nbsp;</td></tr>';
  }
    
  $i +=1;
}
$returnHTML .= '</table>';


echo $returnHTML;
?>


