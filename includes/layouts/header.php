<?php
require_once("includes/functions.php");
require_once("includes/session.php");
require_once("includes/db_connection.php");

?>
<!DOCTYPE html>

<html lang="en">
    <head>
        <title>Trivia Night Scoreboard</title> 
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <link href="scripts/jquery-ui-1.11.3/jquery-ui.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
        <link href="stylesheets/public.css" rel="stylesheet" type="text/css"/>
        <link href="stylesheets/publicW3.css" media="all" rel="stylesheet" type="text/css" /> 
        <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700italic,700,400italic|Just+Another+Hand|Montserrat:700' rel='stylesheet' type='text/css'><!---->
        <script src="scripts/jquery-2.1.3.min.js" type="text/javascript"></script>
        <script src="scripts/jquery-ui-1.11.3/jquery-ui.js" type="text/javascript"></script>
    </head>
    <body>
        <div id="header" class="w3-container w3-indigo w3-padding-tiny w3-round-large">
            <h1 class="w3-xxxlarge w3-text-shadow w3-font w3-center">Trivia Night Guy Scoreboard</h1>
        </div>
