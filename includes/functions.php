<?php

$current_event = null;
$event_scores_set = null;
$current_round_int = 1;

function make_scoregrid() {
    global $current_round_int;
    global $event_scores_set;
    global $current_event;

    //<div class="w3-col m1 l2 w3-left">&nbsp;</div><div class="w3-col m1 l2 w3-right">&nbsp;</div>
    $ret_string = '<div class="w3-row">' .
            '<div class="w3-rest w3-center"><ul class="w3-pagination w3-round-large w3-khaki w3-padding-tiny">';
    $prev_round_int=$current_round_int-1;
    $ret_string .= "<li";
    if ($current_round_int === 1) {
       $ret_string .= " style='visibility:hidden'";
    }
    $ret_string .= "><a href='score_event.php?event={$current_event["eventID"]}&round={$prev_round_int}'><span class='glyphicon glyphicon-arrow-left'></span></a></li>";
    for ($i = 1; $i <= 10; $i++) {
        $ret_string .= "<li><a ";
        if ($i === $current_round_int) {
            $ret_string .= "class=w3-red ";
        }
        $ret_string .= "href='score_event.php?event={$current_event["eventID"]}&round={$i}'>{$i}</a></li>";
    }
    $next_round_int=$current_round_int+1;
    $ret_string .= "<li";
    if ($current_round_int === 10) {
       $ret_string .= " style='visibility:hidden'";
    }
    $ret_string .= "><a href='score_event.php?event={$current_event["eventID"]}&round={$next_round_int}'><span class='glyphicon glyphicon-arrow-right'></span></a></li>";
    
    $ret_string .= '</ul></div></div>' .
            '<div class="w3-row"><div class="w3-col m1 l2 w3-left">&nbsp;</div><div class="w3-col m1 l2 w3-right">&nbsp;</div>' .
            '<div class="w3-rest w3-center">' .
            '<table class="w3-table w3-striped">' .
            '<tr style="vertical-align:middle"><th class="w3-center">Table #</th>' .
            '<th class="w3-center">Round <span id="currentRound">' . $current_round_int . '</span></th>' .
            '<th class="w3-center">Total</th></tr>';
    while ($round = mysqli_fetch_assoc($event_scores_set)) {
       if ((int) $round["isPlaying"] == 1 || $current_round_int == 1) {
            $i = $round["Team"];
            $ret_string .= '<tr><td class="w3-center">' . $i . '</td><td class="jqradio w3-center" style="white-space:nowrap;vertical-align:middle">' . scoreRadio($i, $round);
            $ret_string .= '</td><td class="w3-center" id=total' . $i;
            if (isset($round[$current_round_int])) {
                $ret_string .= ' class="updated"';
            }
            $ret_string .= ' >' . $round["Total"] . '</td></tr>' . "\r\n";
        }
    }
    $ret_string .= '</table></div></div>';
    return $ret_string;
}

function scoreRadio($i, $round) {
    global $current_round_int;
    if ($current_round_int === (int) 1) {
        $stop = -1;
    } else {
        $stop = 0;
    }
    $ret_string = "";
    for ($j = 10; $j >= $stop; $j--) {
        $ret_string .= '<input type="radio" class="scoreRadio" id="tableNo' . $i . '-' . $j . '" name="tableNo' . $i . '" value=' . $j;
        if ((isset($round[$current_round_int]) && $j === (int) $round[$current_round_int]) ||
                ($j == -1 && !isset($round[$current_round_int]))) {
            $ret_string .= ' checked';
        }
        $ret_string .= '><label for="tableNo' . $i . '-' . $j . '">' . ($j == -1 ? 'Empty' : $j) . '</label>';
    }
    return $ret_string;
}

function find_all_events() {
    global $connection;

    $query = "SELECT * ";
    $query .= "FROM tblevents where eventID > 0";
    $event_set = mysqli_query($connection, $query);
    confirm_query($event_set, $query);
    return $event_set;
}

function find_newest_event_id() {
    global $connection;

    $query = "SELECT max(eventID) as maxID ";
    $query .= "FROM tblevents ";
    $event_id = mysqli_query($connection, $query);
    confirm_query($event_id, $query);
    $event = mysqli_fetch_assoc($event_id);
    return (int) $event["maxID"];
}

function set_current_event($event_id) {
    global $connection;

    $safe_event_id = mysqli_real_escape_string($connection, $event_id);

    $query1 = "update tblevents set currentevent=0;";
    $dummy1 = $event_set = mysqli_query($connection, $query1);
    confirm_query($dummy1, $query1);

    $query2 = "update tblevents set currentevent=1 where eventID = {$safe_event_id};";
    $dummy2 = $event_set = mysqli_query($connection, $query2);
    confirm_query($dummy2, $query2);

    $query = "SELECT * ";
    $query .= "FROM tblevents ";
    $query .= "WHERE eventid = {$safe_event_id} ";
    $query .= "LIMIT 1";
    $event_set = mysqli_query($connection, $query);
    confirm_query($event_set, $query);
    $event = mysqli_fetch_assoc($event_set);
    if ($event) {
        return $event;
    } else {
        return null;
    }
}

function get_team_totals($round) {
    global $connection;
    $safe_round = mysqli_real_escape_string($connection, $round);

    $query = "SELECT Team, `" . $safe_round . "` as Score, Total ";
    $query .= "FROM vwscoreboard ";
    $round_set = mysqli_query($connection, $query);
    confirm_query($round_set, $query);
    return $round_set;
}

function find_round_set_by_id() {
    global $connection;
    global $current_event;
    $query = "SELECT * FROM vwplayingscoreboard ";
    $query .= "WHERE eventid = {$current_event["eventID"]} ";
    $query .= "order by team asc";
    $round_set = mysqli_query($connection, $query);
    confirm_query($round_set, $query);
    return $round_set;
}

function get_selected_round() {
    global $current_event;
    global $event_scores_set;
    global $current_round_int;
    if (isset($_GET["event"])) {
        $current_event = set_current_event((int) $_GET["event"]);
        if (isset($_GET["round"])) {
            $current_round_int = (int) $_GET["round"];
        }
        $event_scores_set = find_round_set_by_id($current_round_int);
    } else {
        $current_event = null;
        $event_scores_set = null;
    }
}

function event_list() {
    $output = "<ul class=\"subjects w3-ul w3-border\" style=\"width:50%\">";
    $event_set = find_all_events();
    while ($event = mysqli_fetch_assoc($event_set)) {
        $output .= "<li>";
        $output .= "<a href=\"score_event.php?event=";
        $output .= urlencode($event["eventID"]);
        $output .= "\">";
        $output .= htmlentities($event["eventTitle"]);
        $output .= "</a>";

        $output .= "</li>"; // end of the subject li
    }
    mysqli_free_result($event_set);
    $output .= '</ul>';
    return $output;
}

function redirect_to($new_location) {
    header("Location: " . $new_location);
    exit;
}

function mysql_prep($string) {
    global $connection;

    $escaped_string = mysqli_real_escape_string($connection, $string);
    return $escaped_string;
}

function confirm_query($result_set, $sql) {
    if (!$result_set) {
        die("Database query failed. -- " . $sql);
    }
}

function form_errors($errors = array()) {
    $output = "";
    if (!empty($errors)) {
        $output .= "<div class=\"error\">";
        $output .= "Please fix the following errors:";
        $output .= "<ul>";
        foreach ($errors as $key => $error) {
            $output .= "<li>";
            $output .= htmlentities($error);
            $output .= "</li>";
        }
        $output .= "</ul>";
        $output .= "</div>";
    }
    return $output;
}
