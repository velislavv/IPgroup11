<?php
$dbhost = 'localhost'; 	// Host name 
$dbuser = 'root';		// Mysql username 
$dbpass = 'root';		// Mysql password 
$dbname = 'verve';		// Database name
$conn = mysql_connect($dbhost, $dbuser, $dbpass) or die                      ('Error connecting to mysql');
mysql_select_db($dbname);
?>