<?php
session_start();
session_destroy();
include 'functions.php';
Redirect('login.php', false);
	ob_end_flush();
	die();
	break; 
header('index.php');
?>