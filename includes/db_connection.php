<?php
//  define("DB_SERVER", "brentbollmeier.com");
	define("DB_SERVER", "localhost");
//        define("DB_USER", "tnguser");
//	define("DB_PASS", "tkachuk7");
//	define("DB_NAME", "tng");
    
//	define("DB_SERVER", "brentbollmeier.com");
	define("DB_USER", "tng_user");
	define("DB_PASS", "tkachuk7");
	define("DB_NAME", "tng_scoreboard");

  // 1. Create a database connection
  $connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
  // Test if connection succeeded
  if(mysqli_connect_errno()) {
    die("Database connection failed: " . 
         mysqli_connect_error() . 
         " (" . mysqli_connect_errno() . ")"
    );
  }
?>
